<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $table = "request";
    protected $fillable = [
        'status_request_id',
        'user_project_id',
        'description',
        'dt_request',
    ];

    public function rules()
    {
        return [
            'status_request_id' => 'required', // 'status_request_id' => 'required|exists:status_request,id
            'user_project_id' => 'required', // 'user_project_id' => 'required|exists:user_project,id
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
            'dt_request' => 'O campo ::attribute é obrigatório',
            'description' => 'O campo ::attribute é obrigatório',
            'user_project_id' => 'O campo ::attribute é obrigatório',
            'status_request_id' => 'O campo ::attribute é obrigatório',
        ];
    }
}
