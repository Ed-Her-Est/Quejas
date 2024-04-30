<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class RetroalimentacionController extends ResourceController
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
        $UsuarioModel = model('UsuarioModel'); // Agrega esta línea para cargar el modelo de Usuario
    
        // Seleccionar todas las quejas con los nombres de los usuarios y su información de prioridad
        $quejas = $QuejaModel->select('queja.*, prioridad.tipoPrioridad, concat(usuarios.nombre, " ", usuarios.apaterno, " ", usuarios.amaterno) as nombre_usuario')
                             ->join('prioridad', 'prioridad.id = queja.id_prioridad')
                             ->join('usuarios', 'usuarios.id = queja.id_usuarios')
                             ->findAll();
    
        $data['quejas'] = $quejas;
    
        return view('admin/quejas/index', $data);
    }
    
    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
