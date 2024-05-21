<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = "permission";

    protected $fillable = [
        "role"
    ];

  
    #definir regras para esse model
    #user rules
    public function rules()
    {
        return [
            'role' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'role' => 'O campo :attribute é obrigatório',
        ];
    }
}
