<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Home;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    public function books()
    {
        return $this->belongsToMany(\App\Models\Book::class, \App\Models\Home::class, 'author_id', 'book_id');
    }
}
