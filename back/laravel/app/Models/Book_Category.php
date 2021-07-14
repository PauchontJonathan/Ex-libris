<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'category_id',
    ];

    protected $guarded = [
        'created_at',
        'updated_at',
    ];
}
