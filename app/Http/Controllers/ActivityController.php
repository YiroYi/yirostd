<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
  public function index(Request $request)
  {
      if (!$request->ajax()) return redirect('/mainlogin');
      $buscar = $request->buscar;
      $criterio = $request->criterio;

      if ($buscar==''){
      $activities = Activity::orderBy('id','desc')->paginate(10);
        }
        else{
            $activities = Activity::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
        }



      return [
        'pagination' => [
            'total'        => $activities->total(),
            'current_page' => $activities->currentPage(),
            'per_page'     => $activities->perPage(),
            'last_page'    => $activities->lastPage(),
            'from'         => $activities->firstItem(),
            'to'           => $activities->lastItem(),
        ],
        'activities' => $activities
      ];
  }


  public function store(Request $request)
  {

      if (!$request->ajax()) return redirect('/');
      $activity = new Activity();
      $activity->name = $request->name;
      $activity->description = $request->description;
      $activity->price_membership = $request->price_membership;
      $activity->price_individual = $request->price_individual;
      $activity->status = '1';
      $activity->save();
  }



  public function update(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $activity = Activity::findOrFail($request->id);
    $activity->name = $request->name;
    $activity->description = $request->description;
    $activity->price_membership = $request->price_membership;
    $activity->price_individual = $request->price_individual;
    $activity->status = '1';
    $activity->save();
  }


  public function desactivate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $activity = Activity::findOrFail($request->id);
    $activity->status = '0';
    $activity->save();
  }

  public function activate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $activity = Activity::findOrFail($request->id);
    $activity->status = '1';
    $activity->save();
  }

  public function selectActivity(Request $request){
      if (!$request->ajax()) return redirect('/');
      $activities = Activity::where('status','=','1')->select('id','name')->orderBy('name', 'asc')->get();

      return ['activities' => $activities];
  }

  public function selectActivityAjax(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $filter = $request->search;
    $activities = Activity::where('activities.name','like','%'.$filter.'%')
    ->select('activities.id','activities.name','price_membership','price_individual')
    ->orderBy('activities.name','asc')->get();

    //$activities = Activity::where('activities.name','like','zumba')->select('activities.id','activities.name','price_membership','price_individual')->orderBy('activities.name','asc')->get();



    return ['activities' => $activities];
  }

  public function selectActivityEdit(Request $request)
  {
    if (!$request->ajax()) return redirect('/');

    $activitiesEdit = Activity::all();

    return ['activitiesEdit'=>$activitiesEdit ];
  }





}
