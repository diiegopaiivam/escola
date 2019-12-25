<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfessoresRequest;

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

    public function storeProfessores(Request $request, Professor $professor){
        
        $professor = new Professor;

        $data = $request->all();
        $professorName = $data['name'];

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $extension = $request->image->extension();
            $nameFile = "{$professorName}.{$extension}";
            $data['image'] = $nameFile;
            
            $upload = $request->image->storeAs('professor', $nameFile);
            if (!$upload) {
                return redirect()->back()->with('error', 'Falha ao carregar a imagem');
            }
        }
        $professor->name            = $request->name;
        $professor->date            = $request->date;
        $professor->email           = $request->email;
        $professor->image           = $upload;
        $professor->phone1          = $request->phone1;
        $professor->phone2          = $request->phone2;
        $professor->save();
       
        if($professor->save()){
            return redirect()->route('admin/professores')->with('success','Sucesso ao atualizar o perfil');
        }
        return redirect()->back()->with('error','Falha ao atualizar o perfil');
        //return view ('site.profile.profile');

    }

    public function deleteProfessor($id){
        $professor = Professor::where('id', $id)->delete();
       
        if($professor) {
            return redirect()->route('admin/professores');
        }
    }
}
