<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;

    protected $table = 'editors';

    protected $fillable = [
        'id',
        'name',
    ];

    protected $guarded = [
        'updated_at',
        'created_at',
    ];
}
