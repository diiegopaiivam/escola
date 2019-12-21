<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Professor;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function professores(){
        $professores = DB::table('professor')->get();
        //$professores = auth()->user()->
        return view('admin/professores', compact ('professores'));
    }

    public function cadastroProfessores(){
        return view ('admin/professoresCadastro');
    }
}
