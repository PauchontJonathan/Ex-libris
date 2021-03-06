<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_book extends Model
{
    use HasFactory;

    protected $table = 'users_books';

    protected $fillable = [
        'user_id',
        'book_id',
    ];

    protected $guarded = [
        'created_at',
        'updated_ad',
    ];
}
