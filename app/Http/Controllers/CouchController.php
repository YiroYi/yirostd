<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Couch;
use App\Rol;

class CouchController extends Controller
{
  public function index(Request $request)
  {
      if (!$request->ajax()) return redirect('/');
      $buscar = $request->buscar;
      $criterio = $request->criterio;

      if ($buscar==''){
      $couches = Couch::join('activities','couches.idactivity','=','activities.id')
      ->select('couches.id','couches.name','couches.last_name','couches.phone','couches.email','couches.status','couches.idactivity','couches.comments',
                'activities.name as activity_name')
      ->orderBy('couches.id','desc')->paginate(5);
        }
        else{
            $couches = Couch::join('activities','couches.idactivity','=','activities.id')
            ->select('couches.id','couches.name','couches.last_name','couches.phone','couches.email','couches.status','couches.idactivity','couches.comments',
                      'activities.name as activity_name')
            ->where('couches.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('couches.id', 'desc')->paginate(5);
        }
      return [
        'pagination' => [
            'total'        => $couches->total(),
            'current_page' => $couches->currentPage(),
            'per_page'     => $couches->perPage(),
            'last_page'    => $couches->lastPage(),
            'from'         => $couches->firstItem(),
            'to'           => $couches->lastItem(),
        ],
        'couches' => $couches
      ];
  }



  public function store(Request $request)
  {

      if (!$request->ajax()) return redirect('/');
      $coach = new Couch();
      $coach->name = $request->name;
      $coach->last_name = $request->last_name;
      $coach->email = $request->email;
      $coach->phone = $request->phone;
      $coach->idactivity = $request->idactivity;
      $coach->comments = $request->comments;
      $coach->status = '1';

      $coach->save();
  }



  public function update(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $coach = Couch::findOrFail($request->id);
    $coach->name = $request->name;
    $coach->last_name = $request->last_name;
    $coach->email = $request->email;
    $coach->phone = $request->phone;
    $coach->idactivity = $request->idactivity;
    $coach->comments = $request->comments;
    $coach->status = '1';

    $coach->save();
  }


  public function desactivate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $coach = Couch::findOrFail($request->id);
    $coach->status = '0';
    $coach->save();
  }

  public function activate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $coach = Couch::findOrFail($request->id);
    $coach->status = '1';
    $coach->save();
  }

  public function selectCoachAjax(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $filter = $request->filtro;
    $couches = Couch::
    where('couches.name','like','%'.$filter.'%')
    ->select('couches.id','couches.name')
    ->orderBy('couches.name','asc')->get();

    return ['couches' => $couches];
  }

  public function selectCoachEdit(Request $request)
  {

    if (!$request->ajax()) return redirect('/');

    $coachesEdit = Couch::all();

    return['coachesEdit'=>$coachesEdit];

  }

}
