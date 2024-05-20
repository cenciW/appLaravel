<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTask extends Model
{
    use HasFactory;

    protected $table = "statusTask";

    protected $fillable = [
        "status"];

    #definir regras para esse model
    #user rules
    public function rules()
    {
        return [
            'status' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'status' => 'O campo :attribute é obrigatório',
        ];
    }
}
