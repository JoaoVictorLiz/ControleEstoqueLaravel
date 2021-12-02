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
            <?php if(auth()->guard()->check()): ?>
            <li class="list">
                    
                <form action="/logout" method="post">
                    <?php echo csrf_field(); ?>
                    <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span> 
                        <span class="text">Sair</span>
                    </a>
                </form>
            </li>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
            <li class="list">
                <a href="/register">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <span class="text">Login</span>
                </a>
            </li>
            <?php endif; ?>
            <div class="indicator"></div>
        </ul>
    </div>
    <div>
        <?php if(session('msg')): ?>
            <p class="msg" ><?php echo e(session('msg')); ?></p>
        <?php endif; ?>
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
        <?php $__currentLoopData = $produtoUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="background-color: #146861;" class="table">
            <td><?php echo e($produto->codigo); ?></td>
            <td><?php echo e($produto->nome); ?></td>
            <td>R$<?php echo e(number_format($produto->preco,2 ,',','.')); ?></td>
            <td>
            <a class="btn btn-warning" href="/estoque/edit/<?php echo e($produto->id); ?>">Editar</a>
            <form action="/estoque/delete/<?php echo e($produto->id); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-danger">Excluir</button>
            </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\Laravel\ControledeEstoque\resources\views/estoque.blade.php ENDPATH**/ ?>