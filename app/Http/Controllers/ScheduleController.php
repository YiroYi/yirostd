<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
  public function index(Request $request)
  {
      if (!$request->ajax()) return redirect('/');
      $buscar = $request->buscar;
      $criterio = $request->criterio;

      if ($buscar==''){
      $schedules = Schedule::orderBy('id','desc')->paginate(10);
        }
        else{
            $schedules = Schedule::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
        }
      return [
        'pagination' => [
            'total'        => $schedules->total(),
            'current_page' => $schedules->currentPage(),
            'per_page'     => $schedules->perPage(),
            'last_page'    => $schedules->lastPage(),
            'from'         => $schedules->firstItem(),
            'to'           => $schedules->lastItem(),
        ],
        'schedules' => $schedules
      ];
  }



  public function store(Request $request)
  {

      if (!$request->ajax()) return redirect('/');
      $schedule = new Schedule();
      $schedule->time = $request->time;
      $schedule->status = '1';
      $schedule->save();
  }



  public function update(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $schedule = Schedule::findOrFail($request->id);
    $schedule->time = $request->time;
    $schedule->status = '1';
    $schedule->save();
  }


  public function desactivate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $schedule = Schedule::findOrFail($request->id);
    $schedule->status = '0';
    $schedule->save();
  }

  public function activate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $schedule = Schedule::findOrFail($request->id);
    $schedule->status = '1';
    $schedule->save();
  }

  public function selectSchedule(Request $request){
      if (!$request->ajax()) return redirect('/');
      $schedules = Schedule::where('status','=','1')->select('id','time')->orderBy('id', 'asc')->get();

      return ['schedules' => $schedules];
  }

  public function getTime(Request $request){
      if (!$request->ajax()) return redirect('/');

      $id = $request->id;
      $scheduletime = Schedule::where('id','=',$id)->select('id','time')->orderBy('id', 'asc')->get();

      return ['scheduletime' => $scheduletime];
  }
}
