<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $data = $this->userModel->findAll();
        $nama = [
            "user" => $data
        ];
        return view('welcome', $nama);
    }
}
