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

                            <h3 class="card-title">ویرایش کتاب</h3>
                            @if ($errors->any())
                                <div class="text-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" action="{{ route('books.update' , $book->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>نام کتاب</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="نام را وارد کنید.." value="{{ old('name', $book->book_name) }}">
                                </div>
                                <div class="form-group">
                                    <label>نام نویسنده</label>
                                    <input type="text" class="form-control" name="author"
                                           placeholder="نام نویسنده را وارد کنید.." value="{{ old('author', $book->author_name) }}">
                                </div>
                                <div class="form-group">
                                    <label>قیمت کتاب</label>
                                    <input type="text" class="form-control" name="price"
                                           placeholder="قیمت را وارد کنید.." value="{{ old('price', $book->price) }}">
                                </div>
                                <div class="form-group">
                                    <label>عکس کتاب</label>
                                    <input type="file" class="form-control" name="img">
                                    <img src="{{ asset('storage/img/' . $book->img) }}" alt="">
                                </div>
                                <div class="form-group">
                                    <label>توضیحات درمورد کتاب</label>
                                    <textarea name="text" class="form-control" rows="5">{{ old('text', $book->text) }}</textarea>

                                </div>
                                <div class="form-group">
                                    <label>فایل کتاب</label>
                                    <input type="file" class="form-control" name="bookfile">

                            <div class="p-3">
                                <a href="{{ asset('storage/pdf/' . $book->book_file) }}">download</a>

                            </div>
                                </div>
                                <div class="form-group">
                                    <label>تگ ها</label>
                                    <select name="tag[]" id="" class="form-control" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ $bookTags->find($tag->id) ? 'selected' : '' }}>{{ $tag->tag }}</option>
                                        @endforeach
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
