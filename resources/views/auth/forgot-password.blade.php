@extends('auth.layouts')

@section('content')

    <div class="account">
        <form action="{{ route('password.email') }}" class="form" method="post">
            @csrf
            <a class="account-logo" href="index.html">
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
                <input type="text" class="txt-l txt" placeholder="ایمیل"
                       name="email" :value="old('email')"
                >
                <br>
                <button class="btn btn-recoverpass">بازیابی</button>
            </div>
            <div class="form-footer">
                <a href="{{ route('login') }}">صفحه ورود</a>
            </div>
        </form>
@endsection
