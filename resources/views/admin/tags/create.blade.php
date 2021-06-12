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

                            <h3 class="card-title">افزودن تگ</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>نام تگ</label>
                                    <input type="text" class="form-control" name="tag" placeholder="نام تگ را وارد کنید..">
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
