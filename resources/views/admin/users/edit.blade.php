@extends('admin.layouts.layouts')
@section('content')
    <div class="content-wrapper" style="min-height: 600px;">

        <section class="content-header">
            <section class="content">

                <div>

                    <div class="card card-warning">
                        <div class="">

                        </div>

                        <div class="card-header">

                            <h3 class="card-title">ویرایش کاربر</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" action="{{ route('users.update' , $user->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>نام کاربر</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="نام کاربر را وارد کنید.."
                                           value="{{ old('name' , $user->name) }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>نام خانوادگی</label>
                                    <input type="text" class="form-control" name="lastname"
                                           placeholder="نام خوانوادگی را وارد کنید.."
                                           value="{{ old('lastname' , $user->lastname) }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input type="text" class="form-control" name="email"
                                           placeholder="ایمیل را وارد کنید.."
                                           value="{{ old('email' , $user->email) }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>اعتبار</label>
                                    <input type="text" class="form-control" name="credit"
                                           placeholder="اعتبار را وارد کنید.."
                                           value="{{ old('credit' , $user->credit) }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>وضعیت</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>فعال</option>
                                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>غیرفعال</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>مقام</label>
                                    <select name="role" id="" class="form-control">
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>ادمین
                                        </option>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>کاربر معمولی
                                        </option>
                                    </select>
                                </div>


                                <div>
                                    <button type="submit" class="btn btn-primary">ارسال</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </section>
        </section>

    </div>

@endsection
