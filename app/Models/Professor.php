<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Professor extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'phone1',
    ];

    public function getProfessores(){
        $professores = DB::table('professor')->get();
        return $professores;
    }
}
