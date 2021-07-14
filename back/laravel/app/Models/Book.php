<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'authors_id',
        'summary',
        'editors_id',
    ];

    protected $guarded = [
        'updated_at',
        'created_at',
    ];
}
