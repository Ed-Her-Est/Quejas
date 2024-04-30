<?php

namespace App\Controllers\Usuario;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class MQuejasController extends ResourceController
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
    
        // Obtener el ID del usuario actual
        $userId = session()->get('id');
    
        // Seleccionar las quejas del usuario actual y su información de prioridad
        $quejas = $QuejaModel->select('queja.*, prioridad.tipoPrioridad')
                             ->where('queja.id_usuarios', $userId)
                             ->join('prioridad', 'prioridad.id = queja.id_prioridad')
                             ->findAll();
    
        $data['quejas'] = [];
        foreach ($quejas as $queja) {
            $data['quejas'][] = (array) $queja;
        }
    
        return view('usuario/mquejas/index', $data);
    }
   
    public function show($id = null)
    {
        // Verifica si se proporcionó un ID válido
        if ($id === null) {
            return redirect()->to(base_url('usuario/mquejas'))->with('error', 'ID de queja no proporcionado.');
        }
    
        // Carga el modelo de Queja
        $QuejaModel = model('QuejaModel');
    
        // Busca la queja por su ID
        $queja = $QuejaModel->find($id);
    
        // Verifica si se encontró la queja
        if ($queja === null) {
            return redirect()->to(base_url('usuario/mquejas'))->with('error', 'No se encontró la queja.');
        }
    
       
        // Obtiene la información del tipo de prioridad
        $prioridad = $QuejaModel->select('prioridad.tipoPrioridad')
        ->join('prioridad', 'prioridad.id = queja.id_prioridad')
        ->where('queja.id', $id)
        ->first();
        
        // Obtiene la información del usuario
        $usuario = $QuejaModel->select('CONCAT(usuarios.nombre, " ", usuarios.apaterno, " ", usuarios.amaterno) as nombre_completo')
        ->join('usuarios', 'usuarios.id = queja.id_usuarios')
        ->where('queja.id', $id)
        ->first();

    
        // Prepara los datos para pasar a la vista
        $data['queja'] = $queja;
        $data['prioridad'] = $prioridad;
        $data['usuario'] = $usuario;

    
        // Muestra la vista con los detalles de la queja seleccionada
        return view('usuario/mquejas/show', $data);
    }
    
    public function feedback($id = null)
    {
        // Verifica si se proporcionó un ID válido
        if ($id === null) {
            return redirect()->to(base_url('usuario/mquejas'))->with('error', 'ID de queja no proporcionado.');
        }
    
        // Carga el modelo de Retroalimentación
        $RetroalimentacionModel = model('RetroalimentacionModel');
    
        // Busca la retroalimentación más reciente por el ID de la queja
        $feedback = $RetroalimentacionModel->where('id_queja', $id)
                                            ->orderBy('created_at', 'desc')
                                            ->first();
    
        // Verifica si se encontró la retroalimentación
        if ($feedback === null) {
            return redirect()->to(base_url('usuario/mquejas'))->with('error', 'No se encontró la retroalimentación para la queja seleccionada.');
        }
    
        // Prepara los datos para pasar a la vista
        $data['feedback'] = $feedback;
    
        // Muestra la vista con los detalles de la retroalimentación
        return view('usuario/mquejas/feedback', $data);
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
