<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRequest extends Model
{
    use HasFactory;
    protected $table = "status_request";
    protected $fillable = [
        'status',
    ];

    public function rules()
    {
        return [
            'status' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'status' => 'O campo ::attribute é obrigatório',
        ];
    }
}
