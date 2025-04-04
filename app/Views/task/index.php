<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Tasks<?= $this->endSection() ?>
<?= $this->section('content') ?>

<?= view('components/header', [
  'title' => 'Listado de Tareas',
  'description' => 'Estas son las tareas que tienes registradas por hacer.',
  'actions' => [
    [
      'icon' => 'bi bi-plus-circle',
      'label' => 'Crear Tarea',
      'color' => 'primary',
      'url' => site_url('task/create'),
    ],
  ]
]) ?>

<?= view('components/table', [
  'columns' => [
    ['key' => 'title', 'name' => 'Titulo', 'type' => 'text', 'textAlign' => 'left'],
    ['key' => 'task_ds', 'name' => 'Descripción', 'type' => 'text', 'textAlign' => 'left', 'overflow' => true],
    ['key' => 'task_state', 'name' => 'Estatus', 'type' => 'status', 'textAlign' => 'center'],
    ['key' => 'created_at', 'name' => 'Fecha creación', 'type' => 'date', 'textAlign' => 'center'],
    ['key' => 'updated_at', 'name' => 'Ult. Actualización', 'type' => 'datetime', 'textAlign' => 'center'],
  ],
  'rows' => $rows,
  'pager' => $pager,
  'actions' => [
    [
      'icon' => 'bi bi-pencil-square',
      'label' => 'Editar',
      'color' => 'primary',
      'url' => fn($item) => site_url('task/edit/' . $item['id']),
    ],
    [
      'icon' => 'bi bi-trash',
      'label' => 'Eliminar',
      'color' => 'danger',
      'url' => fn($item) => site_url('task/delete/' . $item['id']),
      'hidden' => fn($item) => $item['task_state'] === 'PENDIENTE',
      'method' => 'DELETE',
    ]
  ],
  'filters' => [
    [
      'key' => 'task_state',
      'label' => 'Estado',
      'value' => '',
      'options' => [
        ['value' => 'pendiente', 'label' => 'Pendiente'],
        ['value' => 'en progreso', 'label' => 'En Progreso'],
        ['value' => 'completada', 'label' => 'Completada'],
      ]
    ]
  ]
]) ?>

<?= $this->endSection() ?>