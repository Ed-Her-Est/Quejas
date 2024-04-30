<?php

namespace App\Controllers\Admin;

use App\Models\OperacionModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class OperacionController extends ResourceController
{

    private $usuarioModel;
    private $operacionModel;

    public function __construct()
    {
        helper(['form', 'url', 'session']);
        $this->session = \Config\Services::session();
        $this->usuarioModel = new UsuarioModel();
        $this->operacionModel = new OperacionModel();
    }


    public function index()
    {
        //
    }



    public function show($id = null)
    {
        //
    }



    public function new()
    {
        //
    }



    public function create()
    {
        //
    }



    public function edit($id = null)
    {
        //
    }



    public function update($id = null)
    {
        //
    }



    public function delete($id = null)
    {
        //
    }
}
