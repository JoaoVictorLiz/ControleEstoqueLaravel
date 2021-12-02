<?php $__env->startSection('title','Controle De Estoque'); ?>

<?php $__env->startSection('content'); ?>

<section>
    <div>
        <?php if(session('msg')): ?>
            <p class="msg"><?php echo e(session('msg')); ?></p>
        <?php endif; ?>
    </div>
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
    <div class="container">   
        <h1>Cadastre seu Produto</h1>
        <form action="" method="POST">
            <?php echo csrf_field(); ?>
            <input class="input" type="text" name="codigo" id="codigo" placeholder="Código do Produto">
            <br><br>
            <input class="input" type="text" name="nome" id="nome" placeholder="Nome do Produto">
            <br><br>
            <input class="input" type="text" name="preco" id="preco" placeholder="Preço do Produto">
            <br><br>
            <input id="botao" type="submit" name="submit" value="Cadastrar">
        </form>
    </div>
</section>

    <script>
        let list = document.querySelectorAll('.list');
        function setActiveClass(){
            list.forEach((item) => 
            item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover', setActiveClass))
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\ControledeEstoque\resources\views/welcome.blade.php ENDPATH**/ ?>