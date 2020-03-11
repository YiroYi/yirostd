@extends('layouts.master')

@section('content')
<div class="main-container">
  <!-- page title & breadcrumbs start -->
  <div class="diet-bg page-head parallax overlay">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="section-title text-center">
                      <h3>diet program</h3>
                  </div>
              </div>
              <!-- /.colour-service-1-->
              <div class="col-md-12">
                  <ol class="breadcrumb">
                      <li><a href="{{route('/')}}">home</a></li>
                      <li>।</li>
                      <li>diet program</li>
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
                          <img src="images/blog/1.jpg"  alt=" Blog img">
                      </div>
                      <div class="single-title">
                          <h4 class="mt50">muscle builing classroom</h4>
                          <p class="mt20">Lorem ipsum dolor sit amet, dolor forensibus eum eu. Quodsi postulant eu ius. In quod disputationi eos, no qui quis nostrum constituam, minim novum pericula est et. Eu partem accusam mel, te sed nibh ancillae. Possit nonumes mentitum ea quo, est eu mazim integre blandit. Ad illud adversarium est, no pro autem noluisse. Eripuit bonorum cum ex. In nam vitae decore, at mel malis expetenda, sonet interesset mel id. Eu offendit tincidunt interesset vel.
                          </p>
                      </div>
                  </div>
                  <!--accordion-->
                  <div id="accordion" class="mt50" role="tablist">
                      <div class="card">
                          <div class="card-header" role="tab" id="headingOne">
                              <h5 class="mb-0">
                                  <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Weight Loss: Insider Secrets To Staying Fuller</a>
                              </h5>
                          </div>

                          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                  <p>Lorem ipsum dolor sit amet, dolor forensibus eum eu. Quodsi postulant eu ius. In quod disputationi eos, no qui quis nostrum constituam, minim novum pericula est et. Eu partem accusam mel, te sed nibh ancillae. Possit nonumes mentitum ea quo, est eu mazim integre blandit. Ad illud adversarium est, no pro </p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" role="tab" id="headingTwo">
                              <h5 class="mb-0">
                                  <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Protein Pow No-Bake Buckeyes</a>
                              </h5>
                          </div>
                          <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                  <p>Lorem ipsum dolor sit amet, dolor forensibus eum eu. Quodsi postulant eu ius. In quod disputationi eos, no qui quis nostrum constituam, minim novum pericula est et. Eu partem accusam mel, te sed nibh ancillae. Possit nonumes mentitum ea quo, est eu mazim integre blandit. Ad illud adversarium est, no pro </p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" role="tab" id="headingThree">
                              <h5 class="mb-0">
                                  <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">5 High-Protein Game Birds You Should Try</a>
                              </h5>
                          </div>
                          <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                  <p>Lorem ipsum dolor sit amet, dolor forensibus eum eu. Quodsi postulant eu ius. In quod disputationi eos, no qui quis nostrum constituam, minim novum pericula est et. Eu partem accusam mel, te sed nibh ancillae. Possit nonumes mentitum ea quo, est eu mazim integre blandit. Ad illud adversarium est, no pro </p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" role="tab" id="headingfive">
                              <h5 class="mb-0">
                                  <a class="collapsed" data-toggle="collapse" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">Protein Pow No-Bake Buckeyes</a>
                              </h5>
                          </div>
                          <div id="collapsefive" class="collapse" role="tabpanel" aria-labelledby="headingfive" data-parent="#accordion">
                              <div class="card-body">
                                  <p>Lorem ipsum dolor sit amet, dolor forensibus eum eu. Quodsi postulant eu ius. In quod disputationi eos, no qui quis nostrum constituam, minim novum pericula est et. Eu partem accusam mel, te sed nibh ancillae. Possit nonumes mentitum ea quo, est eu mazim integre blandit. Ad illud adversarium est, no pro </p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" role="tab" id="headingsix">
                              <h5 class="mb-0">
                                  <a class="collapsed" data-toggle="collapse" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">Hacks That Make Calorie Counting A Breeze</a>
                              </h5>
                          </div>
                          <div id="collapsesix" class="collapse" role="tabpanel" aria-labelledby="headingsix" data-parent="#accordion">
                              <div class="card-body">
                                  <p>Lorem ipsum dolor sit amet, dolor forensibus eum eu. Quodsi postulant eu ius. In quod disputationi eos, no qui quis nostrum constituam, minim novum pericula est et. Eu partem accusam mel, te sed nibh ancillae. Possit nonumes mentitum ea quo, est eu mazim integre blandit. Ad illud adversarium est, no pro </p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--accordion-->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                  <div class="search-box mb50">
                      <input type="text" placeholder="search">
                      <a href="#"><i class="fa fa-search"></i></a>
                  </div>
                  <div class="single-list mt50">
                      <h4 class="mb20">categories</h4>
                      <ul>
                          <li><a href="#">bodybuidling</a></li>
                          <li><a href="#">boxing</a></li>
                          <li><a href="#">fitness training</a></li>
                          <li><a href="#">yaga and crossfit</a></li>
                          <li><a href="#">running</a></li>
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
