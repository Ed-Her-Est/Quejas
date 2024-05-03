<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = []; // Puedes pasar datos a tu vista si es necesario
        return view('welcome_message', $data);
    }
    
}
