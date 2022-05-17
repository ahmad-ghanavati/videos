@extends('auth-layout')

@section('content')

<div id="log-in" class="site-form log-in-form">

    <div id="log-in-head">
        <h1>ثبت نام</h1>
        <div id="logo"><a href="{{ route('index') }}"><img src="img/logo.png"></a></div>
    </div>

    <div class="form-output">
        <x-validation-errors></x-validation-errors>
        <form action="{{ route('register.store')}}" method="POST">
            @csrf

        <div class="form-group lable-floating">
            <label class="control-lable">نام</label>
            <input class="form-control" name="name" placeholder="" type="text">
        </div>

        <div class="form-group lable-floating">
            <label class="control-lable">ایمیل</label>
            <input class="form-control" name="email" placeholder="" type="email">
        </div>

        <div class="form-group lable-floating">
            <label class="control-lable">رمز عبور</label>
            <input name="password" class="form-control" placeholder="" type="password">
        </div>

        <div class="form-group lable-floating">
            <label class="control-lable">تایید رمز عبور</label>
            <input name="password_confirmation" class="form-control" placeholder="" type="password">
        </div>

        <div class="remember">
            <div class="checkbox">
                <label>
                    <input name="remember" type="checkbox">
                    مرا بخاطر بسپار
                </label>
            </div>
            
        </div>
        <button type="submit" class="btn btn-lg btn-primary full-width">ثبت نام</button>
        <div class="or"></div>
        <p>شما یک حساب کاربری دارید؟ <a href="{{ route('login.create') }}">ورود</a></p>
    </form>

    </div>
      
</div>
@endsection 

