<?php

namespace App\Models;

use CodeIgniter\Model;

class GetModel extends Model
{
    protected $table      = 't_libros';
    //  Uncomment below if you want add primary key
    protected $primaryKey = 'id_libro';
    //  activar el acceso alas rutas
    protected $allowedFields = ['titulo', 'autor', 'descripcionC', 'rutaImg','descripcionL','isbn','editorial','numPaginas','edicion','pais'];
}
