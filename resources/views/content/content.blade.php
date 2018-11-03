@extends('master')

@section('content')
  <template v-if="menu==0">
    <example-component></example-component>
  </template>

  <template v-if="menu==1">
    <h1>1</h1>
  </template>

  <template v-if="menu==2">
    <h1>2</h1>
  </template>

  <template v-if="menu==3">
    <h1>3</h1>
  </template>

  <template v-if="menu==4">
    <h1>4</h1>
  </template>

  <template v-if="menu==5">
    <h1>5</h1>
  </template>

  <template v-if="menu==6">
    <h1>6</h1>
  </template>
@endsection
