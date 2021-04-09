<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GetModel;
use \Mpdf\Mpdf;
use Mpdf\Output\Destination;


class PdfController extends Controller
{
    public function index()
    {
        $mpdf = new Mpdf();
        $libro = new GetModel();
        $datos['libros'] = $libro->orderBy('id_libro', 'ASC')->findALL();
        // Write some HTML code:
        $mpdf->WriteHTML(view('Pdf',$datos));

        // Output a PDF file directly to the browser
        $mpdf->Output('ListadoLibros.pdf', Destination::DOWNLOAD);
die;
        
        return $this->response->redirect(view('/'));
    }
}
