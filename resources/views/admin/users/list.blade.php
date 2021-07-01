@extends('admin.layouts.layouts')
@section('content')
    <div class="content-wrapper" style="min-height: 600px;">

        <section class="content-header">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">لیست تگ ها</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">


                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>نام</th>
                                        <th>نام خانوادگی</th>
                                        <th>ایمیل</th>
                                        <th>شماره موبایل</th>
                                        <th>اعتبار</th>
                                        <th>مقام</th>
                                        <th>وضعیت</th>
                                        <th>ویرایش</th>
                                        <th>حذف</th>

                                    </tr>

                                    @foreach($users as $users)
                                        <tr>
                                            <td >{{ $users->name }}</td>
                                            <td>{{ $users->lastname }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>{{ $users->mobile }}</td>
                                            <td>{{ $users->credit ?? '' }}</td>
                                            <td>
                                                @if($users->role == 'admin')
                                                    ادمین
                                                @elseif($users->role == 'superAdmin')
                                                    مدیر کل
                                                @else
                                                    کاربر معمولی
                                                @endif
                                            </td>
                                            <td>
                                                @if($users->status == 1)
                                                    فعال
                                                @else
                                                    غیر فعال
                                                @endif
                                            </td>
                                            @if($users->role != 'superAdmin')
                                            <td><a href="{{ route('users.edit' , $users->id) }}"><span class="badge badge-success">ویرایش</span></a>
                                            </td>
                                            <td><a href="" onclick="event.preventDefault(); document.querySelector('#delete-tags-{{$users->id}}').submit()"><span class="badge badge-danger">حذف</span></a>
                                            </td>
                                            @endif
                                            <form method="post" action="{{ route('users.destroy' , $users->id) }}" id="delete-tags-{{$users->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
        </section>

    </div>
@endsection
