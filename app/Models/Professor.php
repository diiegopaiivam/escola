<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Professor extends Model
{
    public $timestamps = false;

    use Notifiable;
    
    protected $table = 'professor';

    protected $fillable = [
        'name', 'date', 'email', 'phone1', 'phone2', 
    ];

    public function getProfessores(){
        $professores = DB::table('professor')->get();
        return $professores;
    }


}
