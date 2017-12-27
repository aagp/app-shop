@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
    <div class="header header-filter"
         style="background-image: url('{{ asset('img/city.jpg') }}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">

                        <form class="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="header header-primary text-center">
                                <h4>Inicio de Sesión</h4>
                                {{--<div class="social-line">--}}
                                    {{--<a href="#" class="btn btn-simple btn-just-icon">--}}
                                        {{--<i class="fa fa-facebook-square"></i>--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="btn btn-simple btn-just-icon">--}}
                                        {{--<i class="fa fa-twitter"></i>--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="btn btn-simple btn-just-icon">--}}
                                        {{--<i class="fa fa-google-plus"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            </div>
                            <p class="text-divider">Ingresa tus datos</p>
                            <div class="content">

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email..." required autofocus>
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password..."     required>
                                </div>

                                <!-- If you want to add a checkbox to this form, uncomment this code -->

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>

                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-simple btn-primary btn-lg">
                                    Ingresar
                                </button>
                                {{--<a href="#pablo" class="btn btn-simple btn-primary btn-lg">Ingresar</a>--}}
                            </div>



                            <a class="pull-right" href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        @include('includes.footer');

    </div>


    {{--<form class="form-horizontal" >--}}


        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

            {{--<div class="col-md-6">--}}


                {{--@if ($errors->has('email'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('email') }}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

            {{--<div class="col-md-6">--}}


                {{--@if ($errors->has('password'))--}}
                    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('password') }}</strong>--}}
    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<div class="col-md-6 col-md-offset-4">--}}
                {{--<div class="checkbox">--}}
                    {{--<label>--}}

                    {{--</label>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<div class="col-md-8 col-md-offset-4">--}}



            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}

@endsection
