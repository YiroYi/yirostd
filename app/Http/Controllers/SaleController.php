<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Sale;
use App\Detailsale;
use App\Activity;
use Auth;



class SaleController extends Controller
{

  public function index(Request $request){

      if (!$request->ajax()) return redirect('/');

      $buscar = $request->buscar;
      $criterio = $request->criterio;

      if ($buscar==''){
          $sales = Sale::join('users','sales.iduser','=','users.id')
          ->join('statuses','sales.status','=','statuses.id')
          ->select('sales.id','sales.status','sales.created_at','sales.total','sales.sale_date',
          'users.name')
          ->orderBy('sales.id', 'desc')->paginate(5);
      }
      elseif($criterio=='sale_date'){

          $sales = Sale::join('users','sales.iduser','=','users.id')
          ->select('sales.id','sales.status','sales.created_at','sales.total','sales.sale_date',
          'users.name')
          ->where('sales.sale_date', 'like', '%'. $buscar . '%')
          ->orderBy('sales.sale_date', 'asc')->paginate(5);
      }
      elseif($criterio=='status'){

          $sales = Sale::join('users','sales.iduser','=','users.id')
          ->select('sales.id','sales.status','sales.created_at','sales.total','sales.sale_date',
          'users.name')
          ->where('sales.status', 'like', '%'. $buscar . '%')
          ->orderBy('sales.status', 'asc')->paginate(5);
        }

      return [
          'pagination' => [
              'total'        => $sales->total(),
              'current_page' => $sales->currentPage(),
              'per_page'     => $sales->perPage(),
              'last_page'    => $sales->lastPage(),
              'from'         => $sales->firstItem(),
              'to'           => $sales->lastItem(),
          ],
          'sales' => $sales
      ];
  }


  public function createDay(Request $request){

      if (!$request->ajax()) return redirect('/');

      $day = new Sale();
      $day->iduser = Auth::user()->id;
      $day->status = 1;
      $day->total  = 0;
      $day->sale_date = Carbon::today()->toDateString();
      $day->save();
  }

  public function storeDayActivity(Request $request)
  {

    if (!$request->ajax()) return redirect('/');

    try
    {
      DB::beginTransaction();

        $details = $request->data;//Array de detalles
        //Recorro todos los elementos
        $idDay = $request->idsale;
        $total = $request->total;

        foreach($details as $ep=>$det)
        {
            $detail = new Detailsale();
            $detail->idsale = $det['idsale'];
            $detail->idactivity = $det['idactivity'];
            $detail->idcouch = $det['idcouch'];
            $detail->idcost = $det['idcost'];
            $detail->idschedule = $det['time'];
            $detail->cost_expense = $det['cost_expense'];
            $detail->membership_fee = $det['membership_fee'];
            $detail->individual_fee = $det['individual_fee'];
            $detail->qty_individual = $det['qty_individual'];
            $detail->qty_membership = $det['qty_membership'];
            $detail->save();
        }

          $totalDay = Sale::where('id','=',$idDay)->first();
          $totalDay->total =$totalDay->total + $total;
          $totalDay->save();


          DB::commit();
      } catch (Exception $e) {
        DB::rollback();
      }

  }

  public function editDetail(Request $request)
  {
    if(!$request->ajax()) return redirect('/');
    $idSale=$request->idSale;

    $saleDetail = Detailsale::join('activities','detailsales.idactivity','=','activities.id')
    ->join('couches','detailsales.idcouch','=','couches.id')
    ->join('costs','detailsales.idcost','=','costs.id')
    ->join('schedules','detailsales.idschedule','=','schedules.id')
    ->select('detailsales.id','detailsales.idsale','detailsales.membership_fee','detailsales.individual_fee','detailsales.cost_expense','detailsales.qty_individual','detailsales.qty_membership',
    'activities.id as idactivity','activities.name',
    'couches.id as idcouch','couches.name as couch_name',
    'costs.id as idcost','costs.name as cost_name',
    'schedules.id as idschedule','schedules.time')
    ->where('idsale','=',$idSale)->get();

    return['saleDetail'=>$saleDetail];

  }

  public function deleteDay(Request $request)
  {
    if(!$request->ajax()) return redirect('/');

    try
    {
      DB::beginTransaction();
        $id = $request->id;

        $details = Detailsale::where('idsale','=',$id);
        $details->delete();


        $day = Sale::where('id','=',$id)->first();
        $day->delete();

        DB::commit();
    } catch (Exception $e) {
      DB::rollback();
    }
  }


  public function deleteDetail(Request $request)
  {

      if (!$request->ajax()) return redirect('/');

      try
      {
        DB::beginTransaction();

          $detId = $request->detId;
          $saleId = $request->saleId;
          $deleteTotal = $request->deleteTotal;

          $detail = Detailsale::where('id','=',$detId)->first();

          $detail->delete();

          $totalDay = Sale::where('id','=',$saleId)->first();
          $totalDay->total =$totalDay->total - $deleteTotal;
          $totalDay->save();


          DB::commit();
      } catch (Exception $e) {
        DB::rollback();
      }
  }

  public function saveEditDetail(Request $request)
  {

    if (!$request->ajax()) return redirect('/');

    try
    {
      DB::beginTransaction();

            $id = $request->id;
            $idsale = $request->idsale;
            $idactivity = $request->idactivity;

            $editDetail = Detailsale::where('id','=',$id)
            ->where('idsale','=',$idsale)->first();

            $priceMembership = Activity::select('activities.price_membership')
            ->where('id','=',$idactivity)->first();

            $pM = $priceMembership->price_membership;
            $pM = intval($pM);
            $pM = $pM/10;



            $priceMembershipIndividual = Activity::select('activities.price_individual')
            ->where('id','=',$idactivity)->first();
            $pMI = $priceMembershipIndividual->price_individual;
            $pMI = intval($pMI);

            $editTotal = ((($request->qty_individual*$pMI)+($request->qty_membership*$pM))-($request->cost_expense));

            $editDetail->cost_expense = $request->cost_expense;
            $editDetail->qty_individual = $request->qty_individual;
            $editDetail->qty_membership = $request->qty_membership;
            $editDetail->idcost = $request->idcost;
            $editDetail->idschedule = $request->idschedule;
            $editDetail->idcouch = $request->idcouch;
            $editDetail->idactivity = $request->idactivity;
            $editDetail->membership_fee = $pM;
            $editDetail->individual_fee = $pMI;

            $editDetail->save();



            $totalMembership = 0;
            $totalIndividual = 0;
            $totalQtyIndividual = 0;
            $totalQtyMembership = 0;
            $totalCost = 0;

            $totalDetails = Detailsale::where('idsale','=',$idsale)->select('detailsales.membership_fee','detailsales.individual_fee','detailsales.cost_expense','detailsales.qty_individual','detailsales.qty_membership')->get();

            foreach($totalDetails as $ep=>$det)
            {
                $totalMembership = $totalMembership + ($det['membership_fee']*$det['qty_membership']);
                $totalIndividual = $totalIndividual + ($det['individual_fee']*$det['qty_individual']);
                $totalCost = $totalCost + $det['cost_expense'];

            }

            $editTotal = (($totalMembership+$totalIndividual)-($totalCost));

            $totalDay = Sale::where('id','=',$idsale)->first();
            $totalDay->total =$editTotal;
            $totalDay->save();


        DB::commit();
    } catch (Exception $e) {
      DB::rollback();
    }

  }

  public function activateDay(Request $request)
  {
    $id = $request->idsale;
    $activateStatus = Sale::where('id','=',$id)->first();
    $activateStatus->status=1;
    $activateStatus->save();

  }

  public function closeDay(Request $request)
  {
    $id = $request->idsale;
    $closeStatus = Sale::where('id','=',$id)->first();
    $closeStatus->status=2;
    $closeStatus->save();

  }

}
