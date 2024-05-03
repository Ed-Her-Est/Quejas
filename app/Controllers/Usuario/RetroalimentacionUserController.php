<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class RetroalimentacionUserController extends ResourceController
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
    
        return view('usuario/quejas/index', $data);
    }


    public function responder($id)
    {
        $request = $this->request;
        
        // Validación de los datos del formulario de respuesta
        $validationRules = [
            'respuesta' => 'required|max_length[255]' // Puedes ajustar las reglas de validación según tus necesidades
        ];
        
        if (!$this->validate($validationRules)) {
            // Si la validación falla, redirige de vuelta con los errores
            return redirect()->back()->withInput()->with('error', 'Hubo un problema al procesar tu respuesta.');
        }
        
        // Obtener la retroalimentación asociada
        $retroalimentacionModel = new RetroalimentacionModel();
        $retroalimentacion = $retroalimentacionModel->find($id);
        
        if (!$retroalimentacion) {
            // Si no se encuentra la retroalimentación, redirige de vuelta con un mensaje de error
            return redirect()->back()->withInput()->with('error', 'La retroalimentación asociada no existe.');
        }
        
        // Guardar la respuesta del usuario en la base de datos
        $retroalimentacion->respuesta = $request->getPost('respuesta');
        $retroalimentacionModel->save($retroalimentacion);
        
        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', '¡Tu respuesta ha sido enviada correctamente!');
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
