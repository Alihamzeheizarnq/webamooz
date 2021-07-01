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
                                        <th>ویرایش</th>
                                        <th>حذف</th>

                                    </tr>

                                    @foreach($tags as $tag)
                                        <tr>
                                            <td style="width: 70%">{{ $tag->tag }}</td>
                                            <td><a href="{{ route('tags.edit' , $tag->id) }}"><span class="badge badge-success">ویرایش</span></a>
                                            </td>
                                            <td><a href="" onclick="event.preventDefault(); document.querySelector('#delete-tags-{{$tag->id}}').submit()"><span class="badge badge-danger">حذف</span></a>
                                            </td>
                                            <form method="post" action="{{ route('users.destroy' , $tag->id) }}" id="delete-tags-{{$tag->id}}">
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
