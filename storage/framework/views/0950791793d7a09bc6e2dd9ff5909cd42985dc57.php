

<?php $__env->startSection('title' , 'Editando: ' . $produto->nome); ?>
    <a class="btn btn-primary" href="/estoque">Voltar ao Estoque</a> 
    <div class="container">    
        <h1>Editar Produto</h1>
        <form action="/estoque/update/<?php echo e($produto->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input class="input" type="text" name="codigo" id="codigo" placeholder="Código do Produto" value="<?php echo e($produto->codigo); ?>">
            <br><br>
            <input class="input" type="text" name="nome" id="nome" placeholder="Nome do Produto" value="<?php echo e($produto->nome); ?>">
            <br><br>
            <input class="input" type="text" name="preco" id="preco" placeholder="Preço do Produto" value="<?php echo e(number_format($produto->preco, 3)); ?>">
            <br><br>
            <input type="submit" id="botao" name="submit" value="Editar Produto">
        </form>
    </div>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel\ControledeEstoque\resources\views/edit.blade.php ENDPATH**/ ?>