<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Eventos;
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

    //métodos relacionados aos professores

    public function professores(){
        $professores = DB::table('professor')->get();
        //$professores = auth()->user()->
        return view('admin/professores', compact ('professores'));
    }

    public function cadastroProfessores(){
        return view ('admin/professoresCadastro');
    }
    //método que cadastra professores
    public function storeProfessores(Request $request, Professor $professor){
        
        $professor = new Professor; 

        $data = $request->all();
        $professorName = $data['name'];

        if($request->hasFile('image') && $request->file('image')->isValid()) { //verifica se tem imagem cadastrada, se não ele salva com o nome do professor
            
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
        $professor->disciplina      = $request->disciplina;
        $professor->save(); //salva o professor
       
        if($professor->save()){
            return redirect()->route('admin/professores')->with('success','Sucesso ao atualizar o perfil');
        }
        return redirect()->back()->with('error','Falha ao atualizar o perfil');
        //return view ('site.profile.profile');

    }
    // abre a edição de professor
    public function editProfessor($id){
        $professor = Professor::findOrFail($id);
 
        if($professor) {
            return view('admin/editprofessor', compact('professor'));
            
        } else {
            return redirect()->back();
        }
    
    }
    //conclui a edição de professor
    public function updateProfessor(Request $request, Professor $professor, $id){
        
        $professor = Professor::where('id', $id)->update($request->except('_token', '_method'));
    
        if ($professor) {
            return redirect()->route('admin/professores');
        }
    }
    // deletar o professor com o id selecionado.
    public function deleteProfessor($id){
        $professor = Professor::where('id', $id)->delete();
       
        if($professor) {
            return redirect()->route('admin/professores');
        }
    }

    // Métodos para Eventos

    public function getEventos(){
        $eventos = DB::table('eventos')->get();
        return view('admin/eventos/eventos', compact ('eventos'));
    }

    public function cadastroEventos(){
        return view('admin/eventos/eventosCadastro');
    }

    public function storeEventos(Request $request, Eventos $eventos){
        $eventos = new Eventos; 

        $data = $request->all();

        $eventos->title         = $request->title;
        $eventos->body          = $request->body;
        $eventos->date          = $request->date;
        $eventos->save(); //salva o evento

        if($eventos->save()){
            return redirect()->route('admin/eventos')->with('success','Evento cadastrado');
        }
        return redirect()->back()->with('error','Falha ao cadastrar evento');
    }
}
