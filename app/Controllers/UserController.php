<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class UserController extends BaseController
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|min_length[3]|max_length[100]',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Nombre de usuario o contraseña incorrecta",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('auth/login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UsuarioModel();

                $user = $model->where('username', $this->request->getVar('username'))->first();

                $this->setUserSession($user);

                if(($user['perfil'] == 1) && ($user['status'] == 1)) {
                    return redirect()->to(base_url('admin'));
                }

                if(($user['perfil'] == 2) && ($user['status'] == 1)) {
                    return redirect()->to(base_url('usuario'));
                }

                
            }
        }
        return view('auth/login');
    }


    private function setUserSession($user)
    {
        $data = [
            'id'            => $user['id'],
            'nombre'        => $user['nombre'],
            'apaterno'      => $user['apaterno'],
            'amaterno'      => $user['amaterno'],
            'username'      => $user['username'],
            'email'         => $user['email'],
            'isLoggedIn'    => true,
            'perfil'        => $user['perfil'],
            'sexo'          => $user['sexo'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }


}


