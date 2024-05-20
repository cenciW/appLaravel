<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;

    protected $table = "user_project";
    protected $fillable = [
        'dt_admission',
    ];

    public function rules()
    {
        return [
            'dt_admission' => 'required',
        ];
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function personalUser()
    {
        return $this->belongsTo(PersonalUser::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function feedback()
    {
        return [
            'dt_admission' => 'O campo ::attribute é obrigatório',
        ];
    }
}
