<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $__env->yieldContent('title','Biblioteca'); ?></title>
  <style>
    body{font-family:system-ui,Arial;background:#f6f7fb;margin:0}
    .container{max-width:860px;margin:24px auto;padding:0 16px}
    .topbar{display:flex;gap:10px;margin-bottom:20px}
    a.btn, button.btn{padding:10px 14px;border-radius:8px;border:1px solid #e5e7eb;background:#2563eb;color:#fff;text-decoration:none;cursor:pointer}
    .btn-danger{background:#ef4444;border-color:#ef4444}
    .btn-secondary{background:#6b7280;border-color:#6b7280}
    .flash{margin:16px 0;padding:12px 16px;border-radius:10px;background:#ecfeff;border:1px solid #a5f3fc;color:#155e75}
    .card{background:#fff;border:1px solid #e5e7eb;border-radius:12px;box-shadow:0 8px 24px rgba(15,23,42,.06);margin-bottom:20px}
    .card-header{padding:16px 20px;border-bottom:1px solid #e5e7eb;font-weight:600}
    .card-body{padding:20px}
    .form-group{display:flex;flex-direction:column;gap:6px;margin-bottom:12px}
    input{border:1px solid #e5e7eb;border-radius:10px;padding:10px;background:#fff;width:100%}
    table{width:100%;border-collapse:collapse}
    th,td{padding:8px;border-bottom:1px solid #e5e7eb;text-align:left}
  </style>
</head>
<body>
  <div class="container">
    <div class="topbar">
      <a class="btn" href="<?php echo e(route('livros.index')); ?>">📚 Listar livros</a>
      <a class="btn" href="<?php echo e(route('livros.create')); ?>">➕ Novo livro</a>

      <?php if(auth()->guard()->check()): ?>
        <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin-left:auto">
          <?php echo csrf_field(); ?>
          <button class="btn">Sair</button>
        </form>
      <?php endif; ?>
    </div>

    <?php if(session('ok')): ?> <div class="flash"><?php echo e(session('ok')); ?></div> <?php endif; ?>

    
    <?php echo $__env->yieldContent('content'); ?>
  </div>
</body>
</html>
<?php /**PATH C:\ProjetoLaravel\biblioteca\resources\views/layouts/app.blade.php ENDPATH**/ ?>