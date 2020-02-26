<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curriculos extends CI_Controller {

	public function index()
	{
		$this->load->view('cadastro');
	}
	public function cadastro()
	{
     $this->load->view('cadastro');
	}
	public function salvar()
	{
    	$cpf = $this->input->post('cpf');
     	$curriculo = $_FILES['curriculo'];
     	$configuracao = array(
         'upload_path'   => './curriculos/',
         'allowed_types' => 'pdf',
         'file_name'     => $cpf.'.pdf',
         'max_size'      => '500'
     	);      
     	$this->load->library('upload');
     	$this->upload->initialize($configuracao);
     	if($this->upload->do_upload('curriculo'))
         	echo 'Arquivo salvo com sucesso.';
     	else
        	echo $this->upload->display_errors();
 	}
 	public function test()
 	{
 		var_dump(shell_exec('/usr/local/bin/pdftotext test.pdf -'));
 	}
}
