<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;

class UserController extends Controller
{
  public function index(Request $request)
  {
      if (!$request->ajax()) return redirect('/');
      $buscar = $request->buscar;
      $criterio = $request->criterio;

      if ($buscar==''){
      $users = User::join('rols','users.idrol','=','rols.id')
      ->select('users.id','users.name','users.email','users.password','users.access_user','users.last_name','users.phone','users.status','users.sex','users.idrol',
                'rols.name as rol_name')
      ->orderBy('users.id','desc')->paginate(5);
        }
        else{
            $users = User::join('rols','users.idrol','=','rols.id')
            ->select('users.id','users.name','users.email','users.password','users.access_user','users.last_name','users.phone','users.status','users.sex','users.idrol',
                      'rols.name as rol_name')
            ->where('users.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('users.id', 'desc')->paginate(5);
        }
      return [
        'pagination' => [
            'total'        => $users->total(),
            'current_page' => $users->currentPage(),
            'per_page'     => $users->perPage(),
            'last_page'    => $users->lastPage(),
            'from'         => $users->firstItem(),
            'to'           => $users->lastItem(),
        ],
        'users' => $users
      ];
  }



  public function store(Request $request)
  {

      if (!$request->ajax()) return redirect('/');
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt( $request->password);
      $user->access_user = $request->access_user;
      $user->last_name = $request->last_name;
      $user->phone = $request->phone;
      $user->sex = $request->sex;
      $user->idrol = $request->idrol;
      $user->status = '1';

      $user->save();
  }



  public function update(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $user = User::findOrFail($request->id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->access_user = $request->access_user;
    $user->last_name = $request->last_name;
    $user->phone = $request->phone;
    $user->sex = $request->sex;
    $user->idrol = $request->idrol;
    $user->status = '1';
    $user->save();
  }


  public function desactivate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $user = User::findOrFail($request->id);
    $user->status = '0';
    $user->save();
  }

  public function activate(Request $request)
  {
    if (!$request->ajax()) return redirect('/');
    $user = User::findOrFail($request->id);
    $user->status = '1';
    $user->save();
  }
}
