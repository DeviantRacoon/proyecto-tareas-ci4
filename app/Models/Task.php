<?php

namespace App\Models;

use CodeIgniter\Model;

class Task extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = [
        'title',
        'task_ds',
        'task_state',
    ];

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'task_ds' => 'required|max_length[1000]',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'El titulo es obligatorio.',
            'min_length' => 'El titulo debe tener al menos 3 caracteres.',
            'max_length' => 'El titulo no puede superar los 255 caracteres.',
        ],
        'task_ds' => [
            'required' => 'La descripción es obligatorio.',
            'max_length' => 'La descripción no puede superar los 1000 caracteres.',
        ],
    ];

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
