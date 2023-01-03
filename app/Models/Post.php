<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //protected $table = 'nome_da_sua_tabela';
    protected $fillable = [
        'title',
        'description',
        'content',
        'slug',
        'is_active',
        'user_id'
    ];
}