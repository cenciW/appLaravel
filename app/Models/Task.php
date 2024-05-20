<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "task";

    protected $fillable = [
        "card_id", "statustask_id", "priority_id", "description", "dtStart", "dtEnd", "deadLine"];

    #definir regras para esse model
    #user rules
    public function rules()
    {
        return [
            'card_id' => 'required',
            'statustask_id' => 'required',
            'priority_id' => 'required',
            'description' => 'required',
            'dtStart' => 'required',
            'dtEnd' => 'required',
            'deadLine' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'card_id' => 'O campo :attribute é obrigatório',
            'statustask_id' => 'O campo :attribute é obrigatório',
            'priority_id' => 'O campo :attribute é obrigatório',
            'description' => 'O campo :attribute é obrigatório',
            'dtStart' => 'O campo :attribute é obrigatório',
            'dtEnd' => 'O campo :attribute é obrigatório',
            'deadLine' => 'O campo :attribute é obrigatório',
        ];
    }
}
