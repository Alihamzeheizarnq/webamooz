@extends('auth.layouts')

@section('content')


    <form action="{{ route('password.update') }}" class="form" method="post">
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
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-content form-account">
            <input name="email"  type="text" class="txt-l txt" placeholder="ایمیل" value="{{ old('email', $request->email) }}">
            <input name="password"  type="text" class="txt-l txt" placeholder="رمز عبور جدید">
            <input name="password_confirmation" type="text"class="txt-l txt" placeholder="تکرار رمز عبور جدید">
            <br>
            <button class="btn btn--login">تغییر رمز عبور</button>
            <label class="ui-checkbox">
                مرا بخاطر داشته باش
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
            </label>
        </div>
        <div class="form-footer">
            <a href="{{ route('register') }}">صفحه ثبت نام</a>
        </div>
    </form>

@endsection
