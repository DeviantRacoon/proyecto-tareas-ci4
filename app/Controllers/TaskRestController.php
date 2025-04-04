<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Task;

class TaskRestController extends BaseController
{
  protected $taskModel;

  public function __construct()
  {
    $this->taskModel = new Task();
  }

  public function saveTask()
  {
    $data = $this->request->getPost(['title', 'task_ds',]);

    if (!$this->taskModel->insert($data)) {
      return redirect()->back()
        ->withInput()
        ->with('errors', $this->taskModel->errors());
    }

    return redirect()->to('/task')
      ->with('toastType', 'success')
      ->with('toastMessage', 'Producto creado correctamente.');
  }

  public function updateTask($id)
  {
    $data = $this->request->getPost(['id', 'title', 'task_ds', 'task_state']);
    $this->taskModel->update($id, $data);
    return redirect()->to('/task')
      ->with('toastType', 'success')
      ->with('toastMessage', 'Producto actualizado correctamente.');
  }

  public function deleteTask($id)
  {
    $this->taskModel->delete($id);
    return redirect()->to('/task')
      ->with('toastType', 'success')
      ->with('toastMessage', 'Producto eliminado correctamente.');
  }
}
