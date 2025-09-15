
<?php $__env->startSection('title','Novo Livro'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">Novo Livro</div>
  <div class="card-body">

    <?php if($errors->any()): ?>
      <div style="background:#fee2e2;color:#b91c1c;padding:10px;border-radius:8px;margin-bottom:15px">
        <strong>Erro(s):</strong>
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('livros.store')); ?>">
      <?php echo csrf_field(); ?>

      <div class="form-group">
        <label>Título *</label>
        <input name="titulo" value="<?php echo e(old('titulo')); ?>" required>
      </div>

      <div class="form-group">
        <label>Autor</label>
        <input name="autor" value="<?php echo e(old('autor')); ?>">
      </div>

      <div class="form-group">
        <label>ISBN</label>
        <input name="isbn" value="<?php echo e(old('isbn')); ?>">
      </div>

      <div class="form-group">
        <label>Ano</label>
        <input type="number" name="ano" value="<?php echo e(old('ano')); ?>">
      </div>

      <div class="form-group" style="flex-direction:row;align-items:center;gap:8px">
        <input type="hidden" name="ativo" value="0">
        <input type="checkbox" id="ativo" name="ativo" value="1" <?php echo e(old('ativo', 1) ? 'checked' : ''); ?>>
        <label for="ativo">Ativo</label>
      </div>

      <button class="btn">Salvar</button>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\ProjetoLaravel\biblioteca\resources\views/livros/create.blade.php ENDPATH**/ ?>