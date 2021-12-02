<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="js/jquery-3.6.0.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/estoque.css">
    <title>Estoque</title>
</head>
<body>
<h1 style="display: flex; justify-content: center; color: white;">Estoque de Produtos</h1>
    <div class="navigation">
        <ul>
            <li class="list active">
                <a href="/">
                    <span class="icon">
                        <ion-icon name="add-outline"></ion-icon>
                    </span>
                    <span class="text">Cadastrar</span>
                </a>
            </li>
            <li class="list">
                <a href="/estoque">
                    <span class="icon">
                        <ion-icon name="cube-outline"></ion-icon>
                    </span>
                    <span class="text">Estoque</span>
                </a>
            </li>
            <li class="list">
                <a href="https://wa.me/5551995528628" target="_blank" rel="external">
                    <span class="icon">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </span>
                    <span class="text">Suporte</span>
                </a>
            </li>
            @auth
            <li class="list">
                    
                <form action="/logout" method="post">
                    @csrf
                    <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span> 
                        <span class="text">Sair</span>
                    </a>
                </form>
            </li>
            @endauth
            @guest
            <li class="list">
                <a href="/register">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <span class="text">Login</span>
                </a>
            </li>
            @endguest
            <div class="indicator"></div>
        </ul>
    </div>
    <div>
        @if(session('msg'))
            <p class="msg" >{{session('msg')}}</p>
        @endif
    </div>
    <br>
    <table id="tabela" border=2 class="table table-hover ">
        <thead>
        <tr>
            <td><strong>Código</strong></td>
            <td><strong>Nome do Produto</strong></td>
            <td><strong>Preço</strong></td>
            <td><strong>Ação</strong></td>
        </tr>
        </thead>
        @foreach($produtoUser as $produto)
        <tr style="background-color: #146861;" class="table">
            <td>{{$produto->codigo}}</td>
            <td>{{$produto->nome}}</td>
            <td>R${{number_format($produto->preco,2 ,',','.')}}</td>
            <td>
            <a class="btn btn-warning" href="/estoque/edit/{{$produto->id}}">Editar</a>
            <form action="/estoque/delete/{{$produto->id}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Excluir</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        let list = document.querySelectorAll('.list');
        function setActiveClass(){
            list.forEach((item) => 
            item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover', setActiveClass));
    </script>
    <footer>
        <p>Baron Satoshi &copy; 2021</p>
    </footer>
</body>
</html>
