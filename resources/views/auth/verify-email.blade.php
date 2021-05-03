
@extends('auth.layouts')

@section('content')


    <form action="{{ route('verification.send') }}" class="form" method="post">
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
            @if (session('status') == 'verification-link-sent')
                <span class="rules">لینک فعال سازی مجددا ارسال شد</span>

            @endif
            <span class="rules">لینک فعال سازی به ایمیل شما ارسال شد</span>
            <br>
            <button class="btn continue-btn">ارسال مجدد لینک فعال سازی</button>

        </div>
        <div class="form-footer">
            <a href="{{ route('login') }}">صفحه ورود</a>
        </div>
    </form>

@endsection
