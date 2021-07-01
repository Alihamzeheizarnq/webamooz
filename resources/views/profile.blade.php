<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title>Panel</title>
    <link rel="stylesheet" href="/panel/css/style.css">
    <link rel="stylesheet" href="/panel/css/responsive_991.css" media="(max-width:991px)">
    <link rel="stylesheet" href="/panel/css/responsive_768.css" media="(max-width:768px)">
    <link rel="stylesheet" href="/panel/css/font.css">
</head>
<body>
<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href="https://webamooz.net"></a>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img"><img src="/panel/img/pro.jpg" class="avatar___img">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
        <span class="profile__name">کاربر :  {{ auth()->user()->name }}</span>
    </div>

    <ul>

        <li class="item-li i-my__peyments is-active"><a href="/dashboard">پرداخت های من</a></li>
        </li>
    </ul>

</div>
<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            <a class="header__logo" href="https://webamooz.net"></a>
        </div>
        <div class="header__left d-flex flex-end item-center margin-top-2">
            <span class="account-balance font-size-12">موجودی : {{ number_format(auth()->user()->credit) }} تومان</span>
            <div class="notification margin-15">
                <a class="notification__icon"></a>
                <div class="dropdown__notification">
                    <div class="content__notification">
                        <span class="font-size-13">موردی برای نمایش وجود ندارد</span>
                    </div>
                </div>
            </div>
            <a href="{{ route('logout') }}" class="logout" title="خروج"></a>
        </div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="/dashboard" title="پیشخوان">پیشخوان</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="row no-gutters font-size-13 margin-bottom-10">
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p> نام » </p>
                <p>{{ auth()->user()->name }}</p>
            </div>

            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p> ایمیل » </p>
                <p>{{ auth()->user()->email }}</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p> شماره همراه » </p>
                <p>{{ auth()->user()->mobile }}</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-bottom-10">
                <p> نام خانوادگی » </p>
                <p>{{ auth()->user()->name }}</p>
            </div>
        </div>

        <div class="row bg-white no-gutters font-size-13">
            <div class="title__row">
                <p>خرید های من</p>
            </div>
            <div class="table__box">
                <table width="100%" class="table">
                    <thead role="rowgroup">
                    <tr role="row" class="title-row">
                        <th>نام کتاب</th>
                        <th>عکس کتاب</th>
                        <th>فایل کتاب</th>
                        <th>قیمت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->buys as $buy)
                    <tr role="row">
                        <td>{{ $buy->book->book_name }}</td>
                        <td><img src="{{ asset('storage/img/' . $buy->book->img) }}" alt=""></td>
                        <td><a href="{{ asset('storage/pdf/' . $buy->book->book_file) }}">download</a></td>
                        <td>{{ $buy->price }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<script src="/panel/js/jquery-3.4.1.min.js"></script>
<script src="/panel/js/js.js"></script>
</html>
