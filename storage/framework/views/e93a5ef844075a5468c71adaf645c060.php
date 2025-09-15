
<?php $__env->startSection('title','Lista de Livros'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">Livros cadastrados</div>
  <div class="card-body">
    <?php if($livros->count() === 0): ?>
      <p>Nenhum livro cadastrado.</p>
      <a href="<?php echo e(route('livros.create')); ?>" class="btn">Cadastrar novo livro</a>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Título</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Ano</th>
            <th>Ativo</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $livros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($livro->id); ?></td>
              <td><?php echo e($livro->titulo); ?></td>
              <td><?php echo e($livro->autor); ?></td>
              <td><?php echo e($livro->isbn); ?></td>
              <td><?php echo e($livro->ano); ?></td>
              <td><?php echo e($livro->ativo ? 'Sim' : 'Não'); ?></td>
              <td style="display:flex;gap:8px">
                <a class="btn btn-secondary" href="<?php echo e(route('livros.edit', $livro)); ?>">Editar</a>
                <form method="POST" action="<?php echo e(route('livros.destroy', $livro)); ?>" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-danger">Excluir</button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

      <div style="margin-top:12px">
        <?php echo e($livros->links()); ?>

      </div>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\ProjetoLaravel\biblioteca\resources\views/livros/index.blade.php ENDPATH**/ ?>