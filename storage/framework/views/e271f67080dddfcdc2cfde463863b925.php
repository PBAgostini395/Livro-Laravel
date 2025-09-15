<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $__env->yieldContent('title','Biblioteca'); ?></title>
  <style>
    :root{
      --bg:#f6f7fb; --card:#fff; --line:#e5e7eb; --shadow:0 8px 24px rgba(15,23,42,.06);
      --ok-bg:#ecfdf5; --ok-bd:#10b981; --ok-fg:#065f46;
      --er-bg:#fef2f2; --er-bd:#f87171; --er-fg:#991b1b;
      --btn:#2563eb; --btn-fg:#fff; --btn-danger:#ef4444; --btn-secondary:#6b7280;
    }
    *{box-sizing:border-box}
    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Arial,sans-serif;background:var(--bg);margin:0}
    .container{max-width:960px;margin:28px auto;padding:0 16px}
    .topbar{display:flex;gap:10px;margin-bottom:20px;align-items:center}
    a.btn, button.btn{padding:10px 14px;border-radius:10px;border:1px solid var(--btn);background:var(--btn);color:var(--btn-fg);text-decoration:none;cursor:pointer}
    .btn-danger{background:var(--btn-danger);border-color:var(--btn-danger)}
    .btn-secondary{background:var(--btn-secondary);border-color:var(--btn-secondary)}
    .card{background:var(--card);border:1px solid var(--line);border-radius:12px;box-shadow:var(--shadow);margin-bottom:20px}
    .card-header{padding:16px 20px;border-bottom:1px solid var(--line);font-weight:600}
    .card-body{padding:20px}
    .flash-ok{margin:16px 0;padding:12px;border-radius:10px;background:var(--ok-bg);border:1px solid var(--ok-bd);color:var(--ok-fg)}
    .flash-er{margin:16px 0;padding:12px;border-radius:10px;background:var(--er-bg);border:1px solid var(--er-bd);color:var(--er-fg)}
    .form-group{display:flex;flex-direction:column;gap:6px;margin-bottom:12px}
    input,select,textarea{border:1px solid var(--line);border-radius:10px;padding:10px;background:#fff;width:100%}
    table{width:100%;border-collapse:collapse}
    th,td{padding:10px;border-bottom:1px solid var(--line);text-align:left}
  </style>
</head>
<body>
  <div class="container">

    <div class="topbar">
      <a class="btn" href="<?php echo e(route('livros.index')); ?>">📚 Livros</a>
      <a class="btn" href="<?php echo e(route('livros.create')); ?>">➕ Novo livro</a>

      <?php if(auth()->guard()->check()): ?>
        <span style="margin-left:auto;opacity:.8">Olá, <?php echo e(auth()->user()->name); ?></span>
        <form method="POST" action="<?php echo e(route('logout')); ?>">
          <?php echo csrf_field(); ?>
          <button class="btn btn-secondary">Sair</button>
        </form>
      <?php endif; ?>
      <?php if(auth()->guard()->guest()): ?>
        <a class="btn btn-secondary" style="margin-left:auto" href="<?php echo e(route('login')); ?>">Entrar</a>
      <?php endif; ?>
    </div>

    
    <?php if(session('success')): ?>
      <div class="flash-ok">
        <?php echo e(session('success')); ?>

      </div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
      <div class="flash-er">
        <strong>Ocorreram erros:</strong>
        <ul style="margin:8px 0 0 18px">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    
    <?php echo $__env->yieldContent('content'); ?>

  </div>
</body>
</html>
<?php /**PATH C:\ProjetoLaravel\biblioteca\resources\views/layouts/app.blade.php ENDPATH**/ ?>