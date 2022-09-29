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
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center m-5 bg-white rounded">
        <div id="login-column" class="col-md-6 border border-dark p-4">
            <div id="login-box" class="col-md-12">                
                <form id="login-form" class="form"  action="{{ route('login') }}" method="post">
                    @csrf
                    <h2 class="text-left text-center">Login</h2>
                    <div class="form-group my-4">                       
                        <input type="text" name="email" id="email" class="form-control @error('email') border border-danger   @enderror"  placeholder="Email id" value="{{old('email')}}">
                        @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group my-4">
                        <input type="password" name="password" id="password" class="form-control @error('password') border border-danger   @enderror" autocomplete="off"  placeholder=" Password">
                        @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group row my-4">
                        <div class="col-md-4">
                            <input type="text" value="{{ $sixRandomDigit }}" name="ramdamNumber" id="ramdamNumber"  class="bg-secondary form-control text-lg-center text-white" value="{{ old('u')}}" readonly>   
                                                            
                        </div>
                        <div class="col-md-2">
                            <a href="/"> <i class="fa fa-refresh" aria-hidden="true"></i></a>                                 
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
                        <input type="submit" name="submit" class="btn btn-block btn-info btn-md" value="submit">
                    </div>
                    <div id="register-link" class="text-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
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