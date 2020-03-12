<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cost;

class CostController extends Controller
{
  public function index(Request $request)
  {
      if (!$request->ajax()) return redirect('/');
      $buscar = $request->buscar;
      $criterio = $request->criterio;

      if ($buscar==''){
      $costs = Cost::orderBy('id','desc')->paginate(10);
        }
        else{
            $costs = Cost::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
        }
      return [
        'pagination' => [
            'total'        => $costs->total(),
            'current_page' => $costs->currentPage(),
            'per_page'     => $costs->perPage(),
            'last_page'    => $costs->lastPage(),
            'from'         => $costs->firstItem(),
            'to'           => $costs->lastItem(),
        ],
        'costs' => $costs
      ];
  }



  public function store(Request $request)
  {

      if (!$request->ajax()) return redirect('/');
      $cost = new Cost();
      $cost->name = $request->name;
      $cost->description = $request->description;
      $cost->status = '1';
      $cost->save();
  }



  public function update(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $cost = Cost::findOrFail($request->id);
    $cost->name = $request->name;
    $cost->description = $request->description;
    $cost->status = '1';
    $cost->save();
  }


  public function desactivate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $cost = Cost::findOrFail($request->id);
    $cost->status = '0';
    $cost->save();
  }

  public function activate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $cost = Cost::findOrFail($request->id);
    $cost->status = '1';
    $cost->save();
  }

  public function selectCost(Request $request){
      if (!$request->ajax()) return redirect('/');
      $costs = Cost::where('status','=','1')->select('id','name')->orderBy('id', 'asc')->get();

      return ['costs' => $costs];
  }

  public function getCostId(Request $request){
      if (!$request->ajax()) return redirect('/');

      $id = $request->id;
      $costdetails = Cost::where('costs.id','=',$id)
      ->select('costs.name')
      ->orderBy('costs.id', 'desc')->take(1)->get();

      return ['costdetails' => $costdetails];
  }
}
