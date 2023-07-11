<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    // // Untuk access table . digunakan untuk Read
    // protected $table = 'home';
    // // Untuk penanda primayKey . digunakan untuk Delete
    // protected $primaryKey = 'id';
    // // Untuk penanda isiTable . digunakan untuk Create
    // protected $allowedFields = ['nama', 'hp', 'alamat'];
    // protected $returnType   = 'object';
    // protected $useTimestamps   = 'true';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // master produk
    // Untuk access table . digunakan untuk Read
    protected $table = 'produk';
    // Untuk penanda primayKey . digunakan untuk Delete
    protected $primaryKey = 'idp';
    // Untuk penanda isiTable . digunakan untuk Create
    protected $allowedFields = ['namap', 'skup', 'desp', 'merekp'];
    protected $returnType   = 'object';
    protected $useTimestamps   = 'true';
    protected $createdField  = 'created_at_p';
    protected $updatedField  = 'updated_at_p';
    protected $deletedField  = 'deleted_at_p';
}
