@extends('loginlayout')
@section('title', 'Staff Login')
@section('body')

<form method="POST" action="/login">
    @csrf
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <label for="staffid" class="login__input">Staff ID : </label>
                    <input id="staff_id" type="staff_id" name="staff_id">
                    @error('staff_id')
                    <span class="error_message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <label for="password" class="login__input">Password : </label>
                    <input id="password" type="password" name="password">
                    @error('password')
                    <span class="error_message">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
                </div>
                
                <div>
                @error('login')
                <span class="error_message">{{ $message }}</span>
                @enderror
                </div>

                <button type="submit" class="button login__submit">Login</button>
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