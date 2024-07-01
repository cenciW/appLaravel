<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    
    protected $table = "livros";

    protected $fillable = [
        'titulo', 'ano_edicao', 'area', 'autor_id', 'editora_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    
    #1 Autor - N Livros
    public function autor(){
        return $this->belongsTo('App\Models\Autor', 'autor_id');
    }
    
    #1 Editor - N livros
    public function editora(){
        return $this->belongsTo('App\Models\Editora', 'editora_id');
    }
}
