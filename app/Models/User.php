<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    // Untuk access table . digunakan untuk Read
    protected $table = 'home';
    // Untuk penanda primayKey . digunakan untuk Delete
    protected $primaryKey = 'id';
    // Untuk penanda isiTable . digunakan untuk Create
    protected $allowedFields = ['nama', 'hp', 'alamat', 'created_at', 'updated_at', 'deleted_at'];
    protected $returnType   = 'object';
    protected $useTimestamps   = 'true';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
