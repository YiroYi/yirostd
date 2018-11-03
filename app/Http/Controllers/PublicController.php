<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
      return view('site.index');
    }

    public function about()
    {
      return view('site.about');
    }

    public function class()
    {
      return view('site.class');
    }

    public function membership()
    {
      return view('site.membership');
    }

    public function schedule()
    {
      return view('site.schedule');
    }

    public function diet()
    {
      return view('site.diet');
    }

    public function store()
    {
      return view('site.store');
    }
}
