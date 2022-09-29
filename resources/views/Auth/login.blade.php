@extends('layouts.app')

@section('content')
<?php $sixRandomDigit = mt_rand(100000, 999999); ?>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card card-body">
    <h1 class="text-center text-primary mb-3">Login Your Account</h1>
    <form id="login-form" class="form"  action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">                       
            <label for="email" class="col-form-label">Username</label>
            <input type="text" name="email" id="email" class="form-control @error('email') border border-danger   @enderror"  placeholder="Email id" value="{{old('email')}}">
            @error('email')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="password" class="col-form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') border border-danger   @enderror" autocomplete="off"  placeholder=" Password">
            @error('password')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    
        <div class="form-group form-row align-items-end mb--3 mt-3">
            <div class="col-md-4">
                <label for="ramdamNumber" class="col-form-label">Captcha</label>
                <input type="text" value="{{ $sixRandomDigit }}" name="ramdamNumber" id="ramdamNumber"  class="bg-secondary form-control text-lg-center text-white" value="{{ old('u')}}" readonly>   
                                                
            </div>
            <div class="col-md-2">
                <div class="text-center">
                    <a class="btn btn-outline-primary" href="/"> <i class="fa fa-refresh" aria-hidden="true"></i></a>   
                </div>                              
            </div>
           
            <div class="col-md-6 text-right" >
                <input type="text" class="form-control @error('recaptcha') border border-danger  @enderror" name="recaptcha" maxlength="6" placeholder="Enter Recaptcha" id="recaptcha" onchange="return checkValue()"> 
                @error('recaptcha')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror   
            </div>
            
            
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Login">
        </div>
        <div id="register-link" class="text-right">
        </div>
    </form>
</div>

<script>
    function checkValue(){
         var recaptcha = document.getElementById("recaptcha").value;
         var ramdamNumber = document.getElementById("ramdamNumber").value;
         if(recaptcha != ramdamNumber){
            window.alert("Please Enter correct Recapcha."); 
             return false;
         }
     }
  </script>
@endsection