@extends('layouts.master')
@section('title')
 | Horarios
@endsection
@section('content')
<div class="main-container">
  <!-- page title & breadcrumbs start -->
  <div class="schedule-bg page-head parallax overlay">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="section-title text-center">
                      <h3>Horarios</h3>
                  </div>
              </div>
              <!-- /.colour-service-1-->
              <div class="col-md-12">
                  <ol class="breadcrumb">
                      <li><a href="{{route('/')}}">home</a></li>
                      <li>।</li>
                      <li>horarios</li>
                  </ol>
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container -->
  </div>
  <!-- /.page-header -->
  <!-- page title & breadcrumbs end -->

  <!--schedule-area start-->
  <div class="schedule-area bg20 parallax pad90">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="section-title text-center">
                      <div class="title-bar full-width mb20">
                          <img src="images/logo/ttl-bar.png" alt="title-img">
                      </div>
                      <p style="color:white;font-size:25px;">Las mejores cosas están después de la línea del miedo</p>
                  </div>
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
              <div class="col-md-12">
                  <ul id="tabsJustified" class="nav nav-tabs schdl-tab-area">
                      <li class="nav-item full-width"><a href="" data-target="#level1" data-toggle="tab" class="nav-link small text-uppercase active" style="color:white;">lunes </a></li>
                      <li class="nav-item full-width"><a href="" data-target="#level2" data-toggle="tab" class="nav-link small text-uppercase " style="color:white;">martes</a></li>
                      <li class="nav-item full-width"><a href="" data-target="#level3" data-toggle="tab" class="nav-link small text-uppercase " style="color:white;">miercoles</a></li>
                      <li class="nav-item full-width"><a href="" data-target="#level4" data-toggle="tab" class="nav-link small text-uppercase " style="color:white;">jueves</a></li>
                      <li class="nav-item full-width"><a href="" data-target="#level5" data-toggle="tab" class="nav-link small text-uppercase " style="color:white;">viernes</a></li>
                      <li class="nav-item full-width"><a href="" data-target="#level6" data-toggle="tab" class="nav-link small text-uppercase " style="color:white;">sabado</a></li>
                      <li class="nav-item full-width"><a href="" data-target="#level7" data-toggle="tab" class="nav-link small text-uppercase " style="color:white;">domingo</a></li>
                  </ul>
                  <div id="tabsJustifiedContent" class="tab-content">
                      <div id="level1" class="tab-pane fade active show">
                          <div class="schdl-box">
                              <h5 style="color:white;">Zumba</h5>
                              <p class="mb-0" style="color:white;">08.00 am – 09.00am</p>
                          </div>
                          <div class="schdl-box">
                              <h5 style="color:white;">Zumba</h5>
                              <p class="mb-0" style="color:white;">09.00 am – 10.00am</p>
                          </div>

                          <div class="schdl-box">
                              <h5 style="color:white;">Zumba Kids</h5>
                              <p class="mb-0" style="color:white;">05.00 pm – 06.00pm</p>
                          </div>
                          <div class="schdl-box">
                              <h5 style="color:white;">Zumba</h5>
                              <p class="mb-0" style="color:white;">07.00 pm – 08.00pm</p>
                          </div>
                          <div class="schdl-box">
                              <h5 style="color:white;">Pilates</h5>
                              <p class="mb-0" style="color:white;">08.00 pm – 09.00pm</p>
                          </div>
                      </div>
                      <div id="level2" class="tab-pane fade">
                          <div class="schdl-box">
                              <h5 style="color:white;">Zumba</h5>
                              <p class="mb-0" style="color:white;">08.00 am – 09.00am</p>
                          </div>
                          <div class="schdl-box">
                              <h5 style="color:white;">Pilates</h5>
                              <p class="mb-0" style="color:white;">09.00 am – 10.00am</p>
                          </div>
                          <div class="schdl-box">
                              <h5 style="color:white;">Yoga</h5>
                              <p class="mb-0" style="color:white;">10.00 am – 11.00am</p>
                          </div>
                          <div class="schdl-box">
                              <h5 style="color:white;">Yoga</h5>
                              <p class="mb-0" style="color:white;">06.00 pm – 07.00pm</p>
                          </div>
                          <div class="schdl-box">
                              <h5 style="color:white;">Zumba</h5>
                              <p class="mb-0" style="color:white;">07.00 pm – 08.00pm</p>
                          </div>
                          <div class="schdl-box">
                              <h5 style="color:white;">Baile</h5>
                              <p class="mb-0" style="color:white;">08.00 pm – 09.00pm</p>
                          </div>
                      </div>
                      <div id="level3" class="tab-pane fade">
                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba</h5>
                            <p class="mb-0" style="color:white;">08.00 am – 09.00am</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba</h5>
                            <p class="mb-0" style="color:white;">09.00 am – 10.00am</p>
                        </div>

                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba Kids</h5>
                            <p class="mb-0" style="color:white;">05.00 pm – 06.00pm</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba</h5>
                            <p class="mb-0" style="color:white;">07.00 pm – 08.00pm</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Pilates</h5>
                            <p class="mb-0" style="color:white;">08.00 pm – 09.00pm</p>
                        </div>
                      </div>
                      <div id="level4" class="tab-pane fade">
                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba</h5>
                            <p class="mb-0" style="color:white;">08.00 am – 09.00am</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Pilates</h5>
                            <p class="mb-0" style="color:white;">09.00 am – 10.00am</p>
                        </div>

                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba Kids</h5>
                            <p class="mb-0" style="color:white;">05.00 pm – 06.00pm</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba</h5>
                            <p class="mb-0" style="color:white;">07.00 pm – 08.00pm</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Baile</h5>
                            <p class="mb-0" style="color:white;">08.00 pm – 09.00pm</p>
                        </div>
                      </div>
                      <div id="level5" class="tab-pane fade">
                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba</h5>
                            <p class="mb-0" style="color:white;">08.00 am – 09.00am</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba</h5>
                            <p class="mb-0" style="color:white;">09.00 am – 10.00am</p>
                        </div>

                        <div class="schdl-box">
                            <h5 style="color:white;">Yoga</h5>
                            <p class="mb-0" style="color:white;">06.00 pm – 07.00pm</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba</h5>
                            <p class="mb-0" style="color:white;">07.00 pm – 08.00pm</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Pilates</h5>
                            <p class="mb-0" style="color:white;">08.00 pm – 09.00pm</p>
                        </div>
                      </div>
                      <div id="level6" class="tab-pane fade">
                        <div class="schdl-box">
                            <h5 style="color:white;">Zumba</h5>
                            <p class="mb-0" style="color:white;">08.00 am – 09.00am</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Pilates</h5>
                            <p class="mb-0" style="color:white;">09.00 am – 10.00am</p>
                        </div>
                        <div class="schdl-box">
                            <h5 style="color:white;">Yoga</h5>
                            <p class="mb-0" style="color:white;">10.00 am – 11.00am</p>
                        </div>
                      </div>
                      <div id="level7" class="tab-pane fade">

                          <div class="schdl-box">
                              <h5 style="color:white;">-----</h5>
                              <p class="mb-0" style="color:white;">Descanso</p>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- /.col -->
          </div>

      </div>
      <!-- /.container -->
  </div>
  <!--schedule-area end-->

</div>
@endsection
