@extends('auth.layouts')

@section('content')


    <form action="{{ route('register') }}" class="form" method="post">
        @csrf
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
            <input type="text" name="name" class="txt" placeholder="نام"
                value="{{ old('name') }}"
            >
            <input type="text" name="lastname" class="txt" placeholder="نام خانوادگی"
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

            <button class="btn continue-btn">ثبت نام و ادامه</button>

        </div>
        <div class="form-footer">
            <a href="{{ route('login') }}">صفحه ورود</a>
        </div>
    </form>

@endsection
