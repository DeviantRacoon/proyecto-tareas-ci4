<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title><?= $this->renderSection('title') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
  <?= view('components/toast', [
    'type' => session('toastType'),
    'message' => session('toastMessage')
  ]) ?>

  <div class="container mt-5">
    <?= $this->renderSection('content') ?>
  </div>

  <?= view('components/modal') ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="<?= base_url('js/index.js') ?>"></script>
</body>


<style>
  body {
    font-family: 'Roboto', sans-serif;
  }
</style>

</html>