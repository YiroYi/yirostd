@extends('admin.master')

@section('content')

@if(Auth::check())
  @if(Auth::user()->idrol == 1)
    <template v-if="menu==0">
      <activity></activity>
    </template>
    <!--<template v-if="menu==1">
      <h1>Clientes</h1>
    </template>-->
    <template v-if="menu==2">
      <cost></cost>
    </template>
    <template v-if="menu==3">
      <schedule></schedule>
    </template>
    <template v-if="menu==4">
      <coach></coach>
    </template>
    <template v-if="menu==5">
      <user></user>
    </template>
    <template v-if="menu==6">
      <sale></sale>
    </template>
    <template v-if="menu==7">
      <rol></rol>
    </template>
  @elseif(Auth::user()->idrol == 2)
    <template v-if="menu==6">
      <sale></sale>
    </template>
  @endif
@endif


@endsection
