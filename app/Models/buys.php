<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buys extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
