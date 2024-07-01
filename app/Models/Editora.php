<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    use HasFactory;
    protected $table = "editoras";
    
    protected $fillable = [
        'nome'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function livros()
    {
        return $this->hasMany('App\Models\Livro', 'editora_id');
    }
}
