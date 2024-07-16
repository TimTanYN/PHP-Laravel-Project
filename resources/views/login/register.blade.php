@extends('loginlayout')
@section('title', 'Staff Login')
@section('body')

<form class="form" method="post" action="/register" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <label class="login__input">Password : </label>
                    <input name="password" type="password" ID="staffPassword">
                    <span class="error_message">@error('password') {{ $message }} @enderror</span>
                    
                    <i class="login__icon fas fa-user"></i>
                    <label class="login__input">First Name :</label>
                    <input name="firstname" ID="staffFirst">
                    <span class="error_message">@error('staffFirst') {{ $message }} @enderror</span>
                
                    <i class="login__icon fas fa-user"></i>
                    <label class="login__input">Last Name :</label>
                    <input name="lastname" ID="staffLast">
                    <span class="error_message">@error('staffLast') {{ $message }} @enderror</span>
                
                    <i class="login__icon fas fa-user"></i>
                    <label class="login__input">Email :</label>
                    <input name="email" ID="staffEmail">
                    <span class="error_message">@error('staffLast') {{ $message }} @enderror</span>
                    
                    <i class="login__icon fas fa-user"></i>
                    <label class="login__input">Phone Number :</label>
                    <input name="phonenumber" ID="staffPhone">
                    <span class="error_message">@error('staffPhone') {{ $message }} @enderror</span>
                    
                    <i class="login__icon fas fa-user"></i>
                    <label class="login__input">Position :</label>
                    <input name="position" ID="staffPosition">
                    <span class="error_message">@error('staffPosition') {{ $message }} @enderror</span>
                    
                    <i class="login__icon fas fa-user"></i>
                    <label class="login__input">Gender :</label>
                    <input name="gender" ID="staffGender">
                    <span class="error_message">@error('staffGender') {{ $message }} @enderror</span>
                </div>
                
                <div>
                @error('login')
                <span class="error_message">{{ $message }}</span>
                @enderror
                </div>

                <button type="submit" class="button login__submit">Login</button>
                <i class="button__icon fas fa-chevron-right"></i>
                <a href="/register" class="button login__submit">Register Account</a>
                <i class="button__icon fas fa-chevron-right"></i>
                </form>
            </div>

        </div>
        
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>		
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>		
    </div>