<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GetModel;

class ListaControllers extends Controller
{
	public function index()
	{
		$session = \Config\Services::session();
		if ($session->has('email')) {
			$autenticado = true;
			$datos['cabecera'] = view('cuerpo/cabecera', array(
				'autenticado' => $autenticado
			));
			$datos['autenticado'] = $autenticado;
		}
		$libro = new GetModel();
		$datos['libros'] = $libro->orderBy('id_libro', 'ASC')->findALL();
		$datos['PiePagina'] = view('cuerpo/PiePagina');
		$datos['cabecera'] = view('cuerpo/cabecera');
		return view('listadoLibroViews', $datos);
	}

	public function agregar()
	{ // Este metodo es para poder ir ala vista agregar
		$session = \Config\Services::session();
		if ($session->has('email')) {
			$autenticado = true;
			$datos['cabecera'] = view('cuerpo/cabecera', array(
				'autenticado' => $autenticado
			));
			$datos['autenticado'] = $autenticado;
		}
		$datos['cabecera'] = view('cuerpo/cabecera');
		$datos['PiePagina'] = view('cuerpo/PiePagina');
		return view('AgregarViews', $datos);
	}

	public function eliminar()
	{ // este metodo es para redireccionarme ala vista eliminar o editar
		$session = \Config\Services::session();
		if ($session->has('email')) {
			$autenticado = true;
			$datos['cabecera'] = view('cuerpo/cabecera', array(
				'autenticado' => $autenticado
			));
			$datos['autenticado'] = $autenticado;
		}
		$libro = new GetModel();
		$datos['libros'] = $libro->orderBy('id_libro', 'ASC')->findALL();
		$datos['cabecera'] = view('cuerpo/cabecera');
		$datos['PiePagina'] = view('cuerpo/PiePagina');
		return view('EliminarViews', $datos);
	}

	public function guardar()
	{ // este metodo es para agregar un libro ala BD
		// crear una instancia 
		$libro = new GetModel();
		if ($imagen = $this->request->getFile('imagen')) {
			$nombreImg = $imagen->getRandomName();
			$imagen->move('./public/uploads/', $nombreImg);
			$datosF = [
				'titulo' => $this->request->getVar('titulo'),
				'autor' => $this->request->getVar('autor'),
				'isbn' => $this->request->getVar('isbn'),
				'editorial' => $this->request->getVar('editorial'),
				'numPaginas' => $this->request->getVar('numPaginas'),
				'edicion' => $this->request->getVar('edicion'),
				'descripcionC' => $this->request->getVar('descripcionCorta'),
				'descripcionL' => $this->request->getVar('descripcionL'),
				'pais' => $this->request->getVar('pais'),
				'rutaImg' => $nombreImg
			];
			$libro->insert($datosF);
			return $this->response->redirect(base_url('/agregar'));
		}
	}
	public function borrar($id = null)
	{
		$libro = new GetModel();
		$datosLibro = $libro->where('id_libro', $id)->first();
		$ruta = ('./public/uploads/' . $datosLibro['rutaImg']);
		unlink($ruta);
		$libro->where('id_libro', $id)->delete($id);
		return $this->response->redirect(base_url('/eliminar'));
	}
	public function actualizar($id = null)
	{ // metodo para ir ala ruta de actualizar
		$libro = new GetModel();
		$datos['libros'] = $libro->where('id_libro', $id)->first();
		$datos['cabecera'] = view('cuerpo/cabecera');
		$datos['PiePagina'] = view('cuerpo/PiePagina');
		return view('actualizarViews', $datos);
	}
	public function editar()
	{
		$libro = new GetModel();
		$datosF = [
			'titulo' => $this->request->getVar('titulo'),
			'autor' => $this->request->getVar('autor'),
			'isbn' => $this->request->getVar('isbn'),
			'editorial' => $this->request->getVar('editorial'),
			'numPaginas' => $this->request->getVar('numPaginas'),
			'edicion' => $this->request->getVar('edicion'),
			'descripcionC' => $this->request->getVar('descripcionCorta'),
			'descripcionL' => $this->request->getVar('descripcionL'),
			'pais' => $this->request->getVar('pais'),
		];
		$id = $this->request->getVar('id_libro');
		$libro->update($id, $datosF);
		//validar si hay img
		$validacion = $this->validate([
			'imagen' => [
				'uploaded[imagen]',
				'mime_in[imagen, image/jpg,image/jpeg,image/png]',
				'max_size[imagen,1024]',
			]
		]);
		// si si hay entonces elimina el anterior y actualiza
		if ($validacion) {
			if ($imagen = $this->request->getFile('imagen')) {
				$datoLibro = $libro->where('id_libro', $id)->first();
				$ruta = ('./public/uploads/' . $datoLibro['rutaImg']);
				unlink($ruta);
				$nombreImg = $imagen->getRandomName();
				$imagen->move('./public/uploads/', $nombreImg);
				$datosF = ['rutaImg' => $nombreImg];
				$libro->update($id, $datosF);
			}
		} else {
			$message = ['tipo' => 'error', 'mensaje' => 'La imagen no tiene el formato correcto'];
			return $this->response->redirect(base_url('/'));
		}

		return $this->response->redirect(base_url('/'));
	}
	// mostrar libro individual
	public function mostrar($id = null)
	{
		$session = \Config\Services::session();
		if ($session->has('email')) {
			$autenticado = true;
			$datos['cabecera'] = view('cuerpo/cabecera', array(
				'autenticado' => $autenticado
			));
			$datos['autenticado'] = $autenticado;
		}
		$libro = new GetModel();
		$datos['libro'] = $libro->where('id_libro', $id)->first();
		$datos['cabecera'] = view('cuerpo/cabecera');
		$datos['PiePagina'] = view('cuerpo/PiePagina');
		return view('mostrarViews', $datos);
	}
	// metdos para el buscador
	public function buscarV()
	{ // funcion para ir ala vista de buscar 
		//bibliotecas de codelgniter
		$pager = \Config\Services::pager();
		$db = \Config\Database::connect();
		$libro = new GetModel();
		
		$dato = $this->request->getPost('search');
		
		$datos['libros']= $libro->like('titulo', $dato)->orLike('autor', $dato)
		->orLike('descripcionC', $dato)->orLike('descripcionL', $dato)->orLike('editorial', $dato)->findALL();


		$datos['cabecera'] = view('cuerpo/cabecera');
		$datos['PiePagina'] = view('cuerpo/PiePagina');
		return view('buscarViews', $datos);
	}
}
