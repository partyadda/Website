@extends('includes.layout')
@section('title','Index')

@section('content')
        <div class="card card-outline card-primary">
				<div class="card-header"> <a href="index.html" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
					<center><img src="https://partyadda.com/public/assets/img/logo.png" style="width:100px;height:100px;"><h1 class="mb-0"> <b>Party</b>Adda</h1></a>
				</div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your Dashboard</p>
                @if(session('error'))
                    <div>{{ session('error') }}</div>
                @endif
                <form  method="POST" action="{{ route('index.login') }}">
                     @csrf
                    <div class="input-group mb-1">
                        <div class="form-floating"> <input id="loginEmail" type="email" class="form-control" value="" placeholder="" name="email"> <label for="loginEmail">Email</label> </div>
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating"> <input id="loginPassword" type="password" class="form-control" placeholder="" name="password"> <label for="loginPassword">Password</label> </div>
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div> <!--begin::Row-->
                    <div class="row">
                        <div class="col-6 d-inline-flex align-items-center">
                            <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                    Remember
                                </label> </div>
                        </div> <!-- /.col -->
                        <div class="col-6">
                            <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Login</button> </div>
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </form>
                <p class="mb-1"> <a href="forgot-password.html">I forgot my password</a> </p>
            </div> <!-- /.login-card-body -->
        </div>
   @endsection