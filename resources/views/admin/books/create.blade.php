@extends('admin.layouts.layouts')
@section('content')
    <div class="content-wrapper" style="min-height: 600px;">

        <section class="content-header">
            <section class="content">

                <div >

                    <div class="card card-warning">
                        <div class="">

                        </div>

                        <div class="card-header">

                            <h3 class="card-title">افزودن کتاب</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" action="/creatBook" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>نام کتاب</label>
                                    <input type="text" class="form-control" name="name" placeholder="نام را وارد کنید..">
                                </div>
                                <div class="form-group">
                                    <label>قیمت کتاب</label>
                                    <input type="text" class="form-control" name="price" placeholder="قیمت را وارد کنید..">
                                </div>
                                <div class="form-group">
                                    <label>عکس کتاب</label>
                                    <input type="file" class="form-control" name="img">
                                </div>
                                <div class="form-group">
                                    <label>توضیحات درمورد کتاب</label>
                                    <textarea name="text" class="form-control" rows="5"></textarea>

                                </div>
                                <div class="form-group">
                                    <label>فایل کتاب</label>
                                    <input type="file" class="form-control" name="bookfile">
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
