<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = "autors";

    protected $fillable = [
        "nome", "apelido", "cidade", "bairro", "cep", "email", "telefone"
    ];

    protected $hidden = [
        "created_at", "updated_at"
    ];

    #definir regras para esse model
    public function rules()
    {
        return [
            'nome' => 'required',
            'apelido' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'cep' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'nome' => 'O campo :attribute é obrigatório',
            'apelido' => 'O campo :attribute é obrigatório',
            'cidade' => 'O campo :attribute é obrigatório',
            'bairro' => 'O campo :attribute é obrigatório',
            'cep' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute é obrigatório',
            'telefone' => 'O campo :attribute é obrigatório',
        ];
    }

    public function livros()
    {
        $this->hasMany('App\Models\Livro', 'autor_id');
    }
}
