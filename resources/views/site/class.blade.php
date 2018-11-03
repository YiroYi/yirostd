@extends('layouts.master')

@section('content')
<div class="main-container">
  <!-- page title & breadcrumbs start -->
  <div class="single-class-bg page-head parallax overlay">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="section-title text-center">
                      <h3>Nuestras clases</h3>
                  </div>
              </div>
              <!-- /.colour-service-1-->
              <div class="col-md-12">
                  <ol class="breadcrumb">
                      <li><a href="index.html">inicio</a></li>
                      <li>।</li>
                      <li>clases</li>
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

  <!--single-class start-->
  <div class="single-class pad90">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <div class="single-content">
                      <div class="single-img">
                          <img src="images/blog/class.jpeg"  alt=" Blog img">
                      </div>
                      <div class="single-title">
                          <h4 class="mt50">Conoce las actividades de Yiro's FS</h4>
                          </p>
                      </div>
                  </div>
                  <!--accordion-->
                  <div id="accordion" class="mt50" role="tablist">
                      <div class="card">
                          <div class="card-header" role="tab" id="headingOne">
                              <h5 class="mb-0">
                                  <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Qué es la zumba?</a>
                              </h5>
                          </div>

                          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                  <p>Zumba es una disciplina deportiva que se imparte en clases dirigidas en la que se realizan ejercicios aeróbicos al ritmo de música latina (merengue, samba, reggaeton, cumbia y salsa) con la finalidad de <span style="color:#fc328a;font-weight: bold;">perder peso de forma divertida y mejorar el estado de ánimo de los deportistas.</span></p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" role="tab" id="headingTwo">
                              <h5 class="mb-0">
                                  <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">¿Cómo ayuda en el día a día la realización de Pilates?</a>
                              </h5>
                          </div>
                          <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                  <p>Principalmente, la práctica de esta disciplina <span style="color:#fc328a;font-weight: bold; ">favorece a que se tenga una mejoría en la calidad de vida, una mayor sensación de bienestar, una conciencia corporal,</span>ayuda a que adoptemos una postura correcta, que realicemos movimientos más fluidos y eficientes y que tengamos una mayor fuerza, movilidad y coordinación.</p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" role="tab" id="headingThree">
                              <h5 class="mb-0">
                                  <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Yoga y la maestra más longeva</a>
                              </h5>
                          </div>
                          <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                  <p>La candiense Ida Herbert es la maestra de yoga más veterana del mundo. En agosto de 2016 celebró sus 100 años. Herbert, quien aún imparte clases a un grupo de mujeres adulto mayor, es un ejemplo de que esta <span style="color:#fc328a;font-weight: bold;">sanadora disciplina puede revitalizar el cuerpo.</span></p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" role="tab" id="headingfive">
                              <h5 class="mb-0">
                                  <a class="collapsed" data-toggle="collapse" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">5 beneficios del baile para la salud</a>
                              </h5>
                          </div>
                          <div id="collapsefive" class="collapse" role="tabpanel" aria-labelledby="headingfive" data-parent="#accordion">
                              <div class="card-body">
                                <ul>
                                  <li style="color:#6b6b6b;font-size: 15px;">1. <span style="color:#fc328a;font-weight: bold; ">Fortalece</span> el corazón</li>
                                  <li style="color:#6b6b6b;font-size: 15px;">2. <span style="color:#fc328a;font-weight: bold; ">Combate</span> el Alzheimer</li>
                                  <li style="color:#6b6b6b;font-size: 15px;">3. <span style="color:#fc328a;font-weight: bold; ">Aumenta</span> tu memoria</li>
                                  <li style="color:#6b6b6b;font-size: 15px;">4. <span style="color:#fc328a;font-weight: bold; ">Aliado</span> en la pérdida de peso</li>
                                  <li style="color:#6b6b6b;font-size: 15px;">5. <span style="color:#fc328a;font-weight: bold; ">Disminuye</span> el colesterol</li>
                                </ul>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" role="tab" id="headingsix">
                              <h5 class="mb-0">
                                  <a class="collapsed" data-toggle="collapse" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">Zumba Kids: Importancia del deporte para los niños</a>
                              </h5>
                          </div>
                          <div id="collapsesix" class="collapse" role="tabpanel" aria-labelledby="headingsix" data-parent="#accordion">
                              <div class="card-body">
                                  <p>El deporte ayuda a los niños a desarrollarse tanto física como mentalmente. La actividad física debería formar parte de su día a día, ya que los beneficios son múltiples: les ayuda en el desarrollo psicomotor y a relacionarse, <span style="color:#fc328a;font-weight: bold;">les enseña a seguir unas reglas, a trabajar en equipo, a reconocer la importancia del esfuerzo personal y a ponerse metas.</span></p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--accordion-->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                  <div class="single-list mt50">
                      <h4 class="mb20">categories</h4>
                      <ul>
                          <li><a>zumba</a></li>
                          <li><a>pilates</a></li>
                          <li><a>yoga</a></li>
                          <li><a>clases de bailes</a></li>
                          <li><a>zumba kids</a></li>
                      </ul>
                  </div>
              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </div>
      <!-- /.container -->
  </div>
  <!--single-class end-->

</div>
@endsection
