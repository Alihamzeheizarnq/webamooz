@extends('admin.layouts.layouts')
@section('content')
    <div class="content-wrapper" style="min-height: 600px;">

        <section class="content-header">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">لیست کتاب ها</h3>

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
                                        <th>نام نویسنده</th>
                                        <th>قیمت</th>
                                        <th>عکس کتاب</th>
                                        <th>فایل کتاب</th>
                                        <th>ویرایش</th>
                                        <th>حذف</th>

                                    </tr>

                                    @foreach($books as $book)
                                        <tr>
                                            <td >{{ $book->book_name }}</td>
                                            <td>{{ $book->author_name }}</td>
                                            <td>{{ $book->price }}</td>
                                            <td><img height="80" width="80" src="{{ asset('/storage/img/' . $book->img) }}" alt=""></td>
                                            <td><a href="{{ asset('/storage/pdf/' . $book->book_file) }}" alt="">download</a></td>


                                            @if($book->role != 'superAdmin')
                                            <td><a href="{{ route('books.edit' , $book->id) }}"><span class="badge badge-success">ویرایش</span></a>
                                            </td>
                                            <td><a href="" onclick="event.preventDefault(); document.querySelector('#delete-book-{{$book->id}}').submit()"><span class="badge badge-danger">حذف</span></a>
                                            </td>
                                            @endif
                                            <form method="post" action="{{ route('books.destroy' , $book->id) }}" id="delete-book-{{$book->id}}">
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
