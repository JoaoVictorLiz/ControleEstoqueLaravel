@extends('layout.main')

@section('title' , 'Editando: ' . $produto->nome)
    <a class="btn btn-primary" href="/estoque">Voltar ao Estoque</a> 
    <div class="container">    
        <h1>Editar Produto</h1>
        <form action="/estoque/update/{{$produto->id}}" method="POST">
            @csrf
            @method('PUT')
            <input class="input" type="text" name="codigo" id="codigo" placeholder="Código do Produto" value="{{$produto->codigo}}">
            <br><br>
            <input class="input" type="text" name="nome" id="nome" placeholder="Nome do Produto" value="{{$produto->nome}}">
            <br><br>
            <input class="input" type="text" name="preco" id="preco" placeholder="Preço do Produto" value="{{number_format($produto->preco, 3)}}">
            <br><br>
            <input type="submit" id="botao" name="submit" value="Editar Produto">
        </form>
    </div>