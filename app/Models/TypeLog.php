<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeLog extends Model
{
    use HasFactory;

    protected $table = "type_log";
    protected $fillable = [
        'type',
    ];

    public function rules()
    {
        return [
            'type' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'type' => 'O campo ::attribute é obrigatório',
        ];
    }
}
