@extends('layouts.master')
@section('title')
 | Acerca de
@endsection
@section('content')
<div class="main-container">
  <!-- page title & breadcrumbs start -->
  <div class="about-bg page-head parallax overlay">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="section-title text-center">
                      <h3>acerca de</h3>
                  </div>
              </div>
              <!-- /.colour-service-1-->
              <div class="col-md-12">
                  <ol class="breadcrumb">
                      <li><a href="{{route('/')}}">inicio</a></li>
                      <li>।</li>
                      <li>conocenos</li>
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

  <!--about-area start-->
  <div class="about-area pad90">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="section-title text-center">
                      <div class="title-bar full-width mb20">
                          <img src="images/logo/ttl-bar.png" alt="title-img">
                      </div>
                      <h3>bienvenido a ser fit</h3>
                      <p>Las mejores cosas están después de la linea del miedo </p>
                  </div>
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
              <div class="col-lg-8 col-md-12">
                  <div class="aboutus-box">
                      <div class="about-desc">
                          <p>Somos Yiro's fitness estudio y estamos aqui para ti, no te vamos a decir que somos los numero uno ó que somos los mejores de la zona , lo que si te podemos asegurar es que estamos trabajando para serlo.
                              </p> <br>
                          <p>En Yiro's FS encontraras un lugar donde recibirás todo el apoyo y atención necesario para que alcances tus metas, ya sea estar en forma, eliminar el estrés de la rutina ó solo divertirte, nosotros lo haremos junto a ti y te guiaremos para que lo consigas.

                          </p><br>
                          <p>Recuerda que uno de los pilares para alcanzar cualquiera que sea tu meta es simplemente es tener un cuerpo sano, ya que tendrás la fuerza,energía y disciplina para poder lograrlo y podrás llegar hasta dónde tú quieras.</p>><br>
                          <p>
                          Ven a conocernos y prueba nuestras clases de Zumba al ritmo e intensidad de nuestros instructores, prueba nuestras clases de Yoga ó Pilates y aporta firmeza y elasticidad a tus músculos , libera tu mente, no sabes bailar?, ven y aprende Salsa en línea, Bachata, Salsa casino, diviértete y conoce nuevos amigos, quieres inculcar el habito del deporte a tus pekes traelos a nuestras clases de Zumba Kids! </p>
                      </div>
                      <div class="about-benefit mt50">
                          <a href="#"><span><i class="fa fa fa-stop-circle"></i></span>Entrenadores capacitados :</a>
                          <p>Todos nuestros instructores están certificados y son expertos en su área.</p>
                      </div>
                      <div class="about-benefit mt30">
                          <a href="#"><span><i class="fa fa fa-stop-circle"></i></span>Horarios multiples :</a>
                          <p>No puedes venir en la mañana porqué trabajas?, ó en la tarde tienes que cuidar a los pekes,tenemos multiples horarios para que el tiempo no sea un pretexto</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-12">
                  <div class="about-opening">
                      <div class="opening-hours">
                          <h3>Horarios</h3>
                          <ul>
                              <li>lunes a viernes <span>08.00 - 21.00</span></li>
                              <li>sabados <span>08.00 - 11.00</span></li>
                              <li>domingo<span>cerrado</span></li>
                          </ul>
                      </div>
                      <div class="opening-img">
                          <img src="images/about/yiros.jpeg" alt="About Img">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- about-area end-->

</div>
@endsection
