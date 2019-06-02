<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisos_c extends CI_Controller
{

    public function index()
    {
        //datos para pasar a las vistas
        $datos['titulo'] = "Feed";
        $datos['contenido'] = "avisos_v";
        $this->load->model('Avisos_m');
        $datos['avisos'] = $this->Avisos_m->getAvisos();
        $this->load->view('template_v', $datos);
    }

    public function crear()
    {
        $this->load->model('Avisos_m');
        $_POST['fecha_an'] = date('Y-m-d H:i:s');
        if ($this->Avisos_m->insertar($this->input->post())) {
            $_SESSION['flashdata'] = "Aviso creado con exito";
            $_SESSION['error'] = false;
        } else {
            $_SESSION['flashdata'] = "Aviso no creado, ha ocurrido un error";
            $_SESSION['error'] = true;
        }
        redirect(base_url('Avisos_c/'));
    }
}