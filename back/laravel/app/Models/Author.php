<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    $table = 'authors';

    protected $fillable = [
        'id',
        'name',
        'surname',
    ];

    protected $guarded = [
        'updated_at',
        'created_at',
    ];
}
