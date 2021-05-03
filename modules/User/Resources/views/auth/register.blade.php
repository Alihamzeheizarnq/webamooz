@extends('User::auth.layouts')

@section('content')


    <form action="{{ route('register') }}" class="form" method="post">
        @csrf
        <a class="account-logo" href="{{ asset('/') }}">
            <img src="img/weblogo.png" alt="">
        </a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-content form-account">
            <input type="text" name="name" class="txt" placeholder="نام و نام خانوادگی"
                value="{{ old('name') }}"
            >
            <input type="text" name="email" class="txt txt-l" placeholder="ایمیل"
                value="{{ old('email') }}"
            >
            <input type="text" name="mobile" class="txt txt-l" placeholder="شماره موبایل"
                value="{{ old('mobile') }}"
            >
            <input type="text" name="password" class="txt txt-l" placeholder="رمز عبور">
            <input type="text" name="password_confirmation" class="txt txt-l" placeholder="تکرار رمز عبور ">
            <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
            <br>
            <button class="btn continue-btn">ثبت نام و ادامه</button>

        </div>
        <div class="form-footer">
            <a href="{{ route('login') }}">صفحه ورود</a>
        </div>
    </form>

@endsection
