<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class RolController extends Controller
{
  public function index(Request $request)
  {
      if (!$request->ajax()) return redirect('/');
      $buscar = $request->buscar;
      $criterio = $request->criterio;

      if ($buscar==''){
      $rols = Rol::orderBy('id','desc')->paginate(10);
        }
        else{
            $rols = Rol::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(10);
        }
      return [
        'pagination' => [
            'total'        => $rols->total(),
            'current_page' => $rols->currentPage(),
            'per_page'     => $rols->perPage(),
            'last_page'    => $rols->lastPage(),
            'from'         => $rols->firstItem(),
            'to'           => $rols->lastItem(),
        ],
        'rols' => $rols
      ];
  }



  public function store(Request $request)
  {

      if (!$request->ajax()) return redirect('/');
      $rol = new Rol();
      $rol->name = $request->name;
      $rol->description = $request->description;
      $rol->status = '1';
      $rol->save();
  }



  public function update(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $rol = Rol::findOrFail($request->id);
    $rol->name = $request->name;
    $rol->description = $request->description;
    $rol->status = '1';
    $rol->save();
  }


  public function desactivate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $rol = Rol::findOrFail($request->id);
    $rol->status = '0';
    $rol->save();
  }

  public function activate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $rol = Rol::findOrFail($request->id);
    $rol->status = '1';
    $rol->save();
  }

  public function selectRol(Request $request){
      if (!$request->ajax()) return redirect('/');
      $rols = Rol::all();

      return ['rols' => $rols];
  }
}
