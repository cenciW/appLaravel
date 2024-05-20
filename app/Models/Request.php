<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $table = "request";
    protected $fillable = [
        'description',
        'dt_request',
    ];

    public function rules()
    {
        return [
            'description' => 'required',
            'dt_request' => 'required',
        ];
    }

    #1 User project has many requests
    public function userProject()
    {
        return $this->belongsTo(UserProject::class);
    }

    #1 Request has 1 StatusRequest
    public function statusRequest()
    {
        return $this->hasOne(StatusRequest::class);
    }

    public function feedback()
    {
        return [
            'type' => 'O campo ::attribute é obrigatório',
            'dt_request' => 'O campo ::attribute é obrigatório',
        ];
    }
}
