<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLog extends Model
{
    use HasFactory;
    protected $table = "project_log";
    protected $fillable = [
        'project_id',
        'user_project_id',
        'type_log_id',
        'dt_modified',
    ];

    public function rules()
    {
        return [
            'dt_modified' => 'required',
        ];
    }

    #1 Project has many ProjectLog
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    #1 UserProject has many projectLogs
    public function userProject()
    {
        return $this->belongsTo(UserProject::class);
    }

    #1 TypeLog has many projectLogs
    public function typeLog()
    {
        return $this->belongsTo(TypeLog::class);
    }

    public function feedback()
    {
        return [
            'dt_modified' => 'O campo ::attribute é obrigatório',
            'project_id' => 'O campo ::attribute é obrigatório',
            'user_project_id' => 'O campo ::attribute é obrigatório',
            'type_log_id' => 'O campo ::attribute é obrigatório',
        ];
    }
}
