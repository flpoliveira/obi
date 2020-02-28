<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busca extends CI_Controller {

	
	public function __construct()
    {
    	parent::__construct();
    	
    	

    }
	public function index()
	{
		
		$this->load->helper('form');
		
        $this->load->model('busca_model');
        $data['resultado'] = $this->busca_model->busca($this->input->post());
       
        $this->load->model('home_model');
        $data['modalidade'] = $this->home_model->getModalidade();
        $data['dificuldade'] = $this->home_model->getDificuldade();
        $data['categoria'] = $this->home_model->getCategoria();
        $data['ano'] = $this->home_model->getAno();
        $this->load->view("busca", $data);
       
    }
  

	
}
