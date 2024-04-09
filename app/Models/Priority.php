<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;
    protected $table = "priority";

    protected $fillable = [
        "weight"];

    #definir regras para esse model
    #user rules
    public function rules()
    {
        return [
            'weight' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'weight' => 'O campo :attribute é obrigatório',
        ];
    }

}
