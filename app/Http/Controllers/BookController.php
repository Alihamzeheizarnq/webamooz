<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Tag;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.books.create' , compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'author' => ['required'],
            'img' => ['required', 'mimes:jpeg,bmp,png'],
            'bookfile' => ['required', 'mimes:pdf'],
            'price' => ['required'],
            'text' => ['required'],
            'tag' => ['required'],
            'tag.*' => ['string']
        ]);
        $file = $this->uploadedFile($request);
        $book = Book::create([
            'book_name' => $request->name,
            'author_name' => $request->author,
            'img' => $file['img'],
            'book_file' => $file['pdf'],
            'price' => $request->price,
            'text' => $request->text,
        ]);
        $book->tags()->attach($request->tag);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    public function home()
    {
        $books = Book::all();
        return view('index' , compact('books'));
    }

    private function uploadedFile(Request $request)
    {
        $img = $request->file('img');
        $pdf = $request->file('bookfile');

        $imgName = time() . $img->getClientOriginalName();
        $pdfName = time() . $pdf->getClientOriginalName();

        $img->storeAs('/img' , $imgName,['disk' => 'public']);
        $pdf->storeAs('/pdf' , $pdfName , ['disk' => 'public']);

        return [
            'pdf' => $pdfName,
            'img' => $imgName
        ];
    }
}
