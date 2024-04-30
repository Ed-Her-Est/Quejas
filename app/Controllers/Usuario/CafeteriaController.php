<?php

namespace App\Controllers\Usuario;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class CafeteriaController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    
    public function index()
    {
        helper(['form', 'url']);
        $QuejaModel = model('QuejaModel');

        $data['quejas'] = $QuejaModel->findAll();

        return view('usuario/cafeteria/index', $data);
    }

    public function insert()
{
    helper(['form']);
    $QuejaModel = model('QuejaModel');

    // Validar el formulario
    $validation = $this->validate([
        'fecha' => 'required',
        'asunto' => 'required',
        'lugar' => 'required',
        'descripcion' => 'required'
    ]);

    if (!$validation) {
        // Mostrar errores de validación
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    try {
        $data = [
            "id_usuarios" => session()->get('id'), // Obtener el id_usuario de la sesión
            "fecha" => $this->request->getPost('fecha'),
            "asunto" => $this->request->getPost('asunto'),
            "lugar" => $this->request->getPost('lugar'),
            "id_prioridad" => 1, // Valor predeterminado
            "descripcion" => $this->request->getPost('descripcion'),
            
        ];

        $QuejaModel->insert($data);

        return redirect()->to(base_url('usuario/mquejas'))->with('success', 'Datos insertados correctamente.');
    } catch (\Exception $e) {
        // Manejar errores
        return redirect()->back()->with('error', 'Error al insertar los datos: ' . $e->getMessage());
    }
}

}


   