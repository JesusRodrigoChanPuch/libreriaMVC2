<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{

    protected $table = 'usuarios';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_usuario';
    protected $allowedFields =['nombre','password','correo'];
}
