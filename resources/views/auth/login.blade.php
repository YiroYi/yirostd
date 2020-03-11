@extends('auth.content')

@section('login')
<div class="form-title">
    <img src="images/logo/yirosNB.png" alt="" class="logoAdmin">
    <h1>AdminFitness</h1>
</div>
<!-- Login Form-->
<div class="login-form text-center login-formAdmin">
    <div class="">
    </div>
        <div class="form formRegister">
            <h2 style="color: #fe346e;">Login</h2>
            <form class="form-horizontal was-validated" method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group mb-3{{$errors->has('email' ? 'is-invalid' : '')}}">
                  <input type="text" value="{{old('email')}}" name="email" id="email" placeholder="Usuario" />
                  {!!$errors->first('email','<span>:message</span>')!!}

                </div>
                <div class="form-group mb-3{{$errors->has('password' ? 'is-invalid' : '')}}">
                  <input type="password" name="password" id="password" placeholder="Password" />
                  {!!$errors->first('password','<span>:message</span>')!!}
                </div>
                <button type="submit" class="adminButton">Acceder</button>
            </form>
        </div>
    </div>
</div>
<!-- start js include path -->
@endsection
