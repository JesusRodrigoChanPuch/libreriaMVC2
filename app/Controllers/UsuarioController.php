<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;
use CodeIgniter\HTTP\Request;
use PHPUnit\Framework\MockObject\Verifiable;

class UsuarioController extends Controller
{ // vistas 

    public function __construct()
    {
    }
    public function index()
    // funcion para la vista de iniciar sesion
    {

        $datos['cabecera'] = view('cuerpo/cabecera');
        $datos['PiePagina'] = view('cuerpo/PiePagina');
        return view('iniciarSesionViews', $datos);
    }
    public function registrarse()
    // funcion para la vista de registrarse
    {

        $datos['cabecera'] = view('cuerpo/cabecera');
        $datos['PiePagina'] = view('cuerpo/PiePagina');
        return view('registrarseViews', $datos);
    }
    // fin de vistas
    // inicio de funcionalidad(peticion ala base de datos)
    public function iniciar()
    {
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');
        if ($this->exists($correo, $password)) {
            $session = \Config\Services::session();
            $data = [
                'email' => $correo
            ];
            $session->set($data);
            return $this->response->redirect(base_url('/'));
        } else {
            return redirect()->back()->with('mensaje', 'correo o contraseña incorrecto');
            
        }
    }
    public function registro()
    // esta funcion es para registar los datos del usuario
    {
        $nombre = $this->request->getVar('nombre');
        $password = $this->request->getVar('password');
        $passwordConfirm = $this->request->getVar('passwordConfirm');
        $correo = $this->request->getVar('correo');

        if ($password !== $passwordConfirm) {
            echo "Las contraseñas no coinciden";
        }

        $datos = ['nombre' => $nombre, 'password' => $password, 'correo' => $correo];

        $user = new UsuariosModel();

        $user->save($datos);
        $message = "creado con exito";
        return $this->response->redirect(base_url('/entrar'));
    }
    // fin de Funccionalidad

    private function exists($email, $password)
    {
        $model = new UsuariosModel();
        $account = $model->where('correo', $email)->where('password', $password)->first();
        if ($account != NULL) {
            return $account;
        }
        return NULL;
    }

    public function cerrarSesion()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return $this->response->redirect(base_url('/entrar'));
    }
}
