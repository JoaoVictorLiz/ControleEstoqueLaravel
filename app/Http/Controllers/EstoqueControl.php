<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Controle;

use App\Models\User;

class EstoqueControl extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function dashboard(){

        return redirect('/');
    }

    public function store(Request $request){

        $produto = new Controle;

        $produto->codigo = $request->codigo;
        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        //$produto->data = $resquest->data;

        $user = auth()->user();
        $produto->user_id = $user->id;

        $produto->save();

        $user
        ->produtoUser()
        ->attach($produto);

        return redirect('/')->with('msg', 'Produto Cadastrado com Sucesso!!');
    }

    public function showEstoque(){
        $user = auth()->user();

        $produtoUser = $user->produtoUser;

        return view('estoque', ['produtoUser' => $produtoUser]);
    }

    public function delete($id){
        $user = auth()->user();

        $user
        ->produtoUser()
        ->detach($id);
    
        return redirect('/estoque')->with('msg', 'Produto Excluído com Sucesso!!');
    }

    public function edit($id){
        $user = auth()->user();

        $produto = Controle::findOrFail($id);

        if($user->id != $produto->user_id){
            return redirect('/dashboard');
        }

        return view('edit', ['produto' => $produto]);
    }
    
    public function update(Request $request, $id){

        $produto = Controle::findOrFail($id);

        $produto->update([
            'codigo' => $request->codigo,
            'nome' => $request->nome,
            'preco' => $request->preco,
        ]);

        return redirect('/estoque')->with('msg', 'Produto editado com sucesso!!');
    }

}
