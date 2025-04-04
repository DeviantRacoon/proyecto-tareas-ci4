<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Task;

class TaskController extends BaseController
{
  protected $taskModel;

  public function __construct()
  {
    $this->taskModel = new Task();
  }

  public function index()
  {
    $filters = [
      [
        'key' => 'name',
        'label' => 'Nombre',
        'options' => [
          ['value' => 'tarea_1', 'label' => 'Tarea 1'],
          ['value' => 'tarea_2', 'label' => 'Tarea 2'],
        ]
      ],
      [
        'key' => 'task_state',
        'label' => 'Estado',
        'options' => [
          ['value' => 'pendiente', 'label' => 'Pendiente'],
          ['value' => 'en progreso', 'label' => 'En progreso'],
          ['value' => 'completada', 'label' => 'Completada'],
        ]
      ],
    ];

    $builder = $this->taskModel;

    foreach ($filters as &$filter) {
      $key = $filter['key'];
      $value = $this->request->getGet($key);

      $filter['value'] = $value; 

      if (!empty($value)) {
        $builder = $builder->where($key, $value);
      }
    }

    $rows = $builder->paginate(15);
    $pager = $builder->pager;

    return view('task/index', [
      'rows' => $rows,
      'pager' => $pager,
      'filters' => $filters,
    ]);
  }


  public function create()
  {
    return view('task/create');
  }

  public function edit($id)
  {
    $task = $this->taskModel->find($id);
    return view('task/create', ['task' => $task]);
  }
}
