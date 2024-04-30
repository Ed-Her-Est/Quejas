<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AreasQuejasController extends BaseController
{
    public function index()
    {
        return view('/areasQueja');// Lógica para mostrar la página principal de quejas
    }




}