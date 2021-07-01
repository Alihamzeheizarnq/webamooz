<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function store(Request $request)
    {

        $book = Book::find($request->book_id);
        $user = auth()->user();
        if (!! $user->buys->where('book_id' , $request->book_id)->count()){
            alert()->warning('این کتاب را قبلا خریداری کرده اید');
            return back();
        }
        if ($user->credit < $book->price){
            alert()->warning('موجودی شما کافی نیست');
            return back();
        }

        $user->buys()->create(['book_id'=> $book->id , 'price' => $book->price]);
        $user->decrement('credit' , $book->price);
        alert()->success('خرید کتاب با موفقیت انجام شد');
        return back();
    }
}
