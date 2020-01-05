<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Eventos extends Model
{
    public $timestamps = false;

    use Notifiable;
    
    protected $table = 'eventos';

    protected $fillable = [
        'title', 'body', 'date', 
    ];

    public function getEventos(){
        $eventos = DB::table('professor')->get();
        return $eventos;
    }
}
