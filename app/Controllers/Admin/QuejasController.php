<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class QuejasController extends ResourceController
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
    
    

   
    public function show($id = null)
    {
        // Verifica si se proporcionó un ID válido
        if ($id === null) {
            return redirect()->to(base_url('admin/quejas'))->with('error', 'ID de queja no proporcionado.');
        }
    
        // Carga el modelo de Queja
        $QuejaModel = model('QuejaModel');
    
        // Busca la queja por su ID
        $queja = $QuejaModel->find($id);
    
        // Verifica si se encontró la queja
        if ($queja === null) {
            return redirect()->to(base_url('admin/quejas'))->with('error', 'No se encontró la queja.');
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
        return view('admin/quejas/show', $data);
    }
   
   
    public function feedback($id = null)
    {
        // Verifica si se proporcionó un ID válido
        if ($id === null) {
            return redirect()->to(base_url('admin/quejas'))->with('error', 'ID de queja no proporcionado.');
        }
    
        // Carga el modelo de Queja
        $QuejaModel = model('QuejaModel');
    
        // Busca la queja por su ID
        $queja = $QuejaModel->find($id);
    
        // Verifica si se encontró la queja
        if ($queja === null) {
            return redirect()->to(base_url('admin/quejas'))->with('error', 'No se encontró la queja.');
        }
    
        // Carga el modelo de Retroalimentacion
        $RetroalimentacionModel = model('RetroalimentacionModel');
    
        // Busca retroalimentaciones anteriores para esta queja
        $retroalimentaciones = $RetroalimentacionModel->where('id_queja', $id)->findAll();
    
        // Si hay retroalimentaciones anteriores, redirige a una vista para verlas
        if (!empty($retroalimentaciones)) {
            return redirect()->to(base_url('admin/quejas/retroalimentaciones/' . $id));
        }
    
        // Obtiene la información del tipo de prioridad
        $prioridad = $QuejaModel->select('prioridad.tipoPrioridad')
                                ->join('prioridad', 'prioridad.id = queja.id_prioridad')
                                ->where('queja.id', $id)
                                ->first();
    
        // Verifica si se pudo obtener la información de prioridad
        if ($prioridad === null) {
            return redirect()->to(base_url('admin/quejas'))->with('error', 'No se pudo obtener la información de prioridad.');
        }
    
        // Si se envió un formulario de retroalimentación
        if ($this->request->getMethod() === 'post') {
            // Validar los datos del formulario
            $rules = [
                'tipoPrioridad' => 'required',
                'retroalimentacion' => 'required',
            ];
    
            if (!$this->validate($rules)) {
                // Si la validación falla, muestra el formulario con los errores
                return view('admin/quejas/feedback', ['errors' => $this->validator->getErrors()]);
            }
    
            // Obtener el tipo de prioridad y retroalimentación del formulario
            $tipoPrioridad = $this->request->getPost('tipoPrioridad');
            $retroalimentacion = $this->request->getPost('retroalimentacion');
    
            // Actualizar el tipo de prioridad de la queja
            $QuejaModel->update($id, ['id_prioridad' => $tipoPrioridad]);
    
            // Insertar la retroalimentación en la tabla retroalimentacion
            $RetroalimentacionModel = model('RetroalimentacionModel');
            $RetroalimentacionModel->insert([
                'descripcion' => $retroalimentacion,
                'id_queja' => $id,
            ]);
    
            // Redirigir de vuelta a la página de detalles de la queja
            return redirect()->to(base_url('admin/quejas/show/' . $id))->with('success', 'Tipo de prioridad actualizado y retroalimentación agregada correctamente.');
        }
    
        // Prepara los datos para pasar a la vista
        $data['queja'] = $queja;
        $data['prioridad'] = $prioridad;
    
        // Muestra el formulario para retroalimentar la queja
        return view('admin/quejas/feedback', $data);
    }
   
   
    public function retroalimentaciones($id = null)
    {
        // Verifica si se proporcionó un ID válido
        if ($id === null) {
            return redirect()->to(base_url('admin/quejas'))->with('error', 'ID de queja no proporcionado.');
        }
    
        // Carga el modelo de Queja
        $QuejaModel = model('QuejaModel');
    
        // Busca la queja por su ID
        $queja = $QuejaModel->find($id);
    
        // Verifica si se encontró la queja
        if ($queja === null) {
            return redirect()->to(base_url('admin/quejas'))->with('error', 'No se encontró la queja.');
        }
    
        // Carga el modelo de Retroalimentacion
        $RetroalimentacionModel = model('RetroalimentacionModel');
    
        // Busca retroalimentaciones anteriores para esta queja
        $retroalimentaciones = $RetroalimentacionModel->where('id_queja', $id)->findAll();
    
        // Si se envió un formulario para modificar la prioridad
        if ($this->request->getMethod() === 'post' && $this->request->getPost('tipoPrioridad')) {
            // Validar los datos del formulario
            $rules = [
                'tipoPrioridad' => 'required',
            ];
    
            if (!$this->validate($rules)) {
                // Si la validación falla, muestra el formulario con los errores
                return view('admin/quejas/retroalimentaciones', ['queja' => $queja, 'retroalimentaciones' => $retroalimentaciones, 'errors' => $this->validator->getErrors()]);
            }
    
            // Obtener el tipo de prioridad del formulario
            $tipoPrioridad = $this->request->getPost('tipoPrioridad');
    
            // Actualizar el tipo de prioridad de la queja
            $QuejaModel->update($id, ['id_prioridad' => $tipoPrioridad]);
    
            // Redirigir de vuelta a la página de retroalimentaciones
            return redirect()->to(base_url('admin/quejas/retroalimentaciones/' . $id))->with('success', 'Tipo de prioridad actualizado correctamente.');
        }
    
        // Si se envió un formulario para agregar retroalimentación
        if ($this->request->getMethod() === 'post' && $this->request->getPost('retroalimentacion_nueva')) {
            // Validar los datos del formulario
            $rules = [
                'retroalimentacion_nueva' => 'required',
            ];
    
            if (!$this->validate($rules)) {
                // Si la validación falla, muestra el formulario con los errores
                return view('admin/quejas/retroalimentaciones', ['queja' => $queja, 'retroalimentaciones' => $retroalimentaciones, 'errors' => $this->validator->getErrors()]);
            }
    
            // Obtener la retroalimentación del formulario
            $retroalimentacionNueva = $this->request->getPost('retroalimentacion_nueva');
    
            // Insertar la retroalimentación en la tabla retroalimentacion
            $RetroalimentacionModel->insert([
                'descripcion' => $retroalimentacionNueva,
                'id_queja' => $id,
            ]);
    
            // Redirigir de vuelta a la página de retroalimentaciones
            return redirect()->to(base_url('admin/quejas/retroalimentaciones/' . $id))->with('success', 'Nueva retroalimentación agregada correctamente.');
        }
    
        // Prepara los datos para pasar a la vista
        $data['queja'] = $queja;
        $data['retroalimentaciones'] = $retroalimentaciones;
    
        // Muestra la vista de retroalimentaciones
        return view('admin/quejas/retroalimentaciones', $data);
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
