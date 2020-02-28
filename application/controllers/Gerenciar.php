<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerenciar extends CI_Controller {

	
	public function __construct()
    {
    	parent::__construct();
    	
    	$logged = $this->session->userdata('logado');
		if(!isset($logged) && !$logged) {
            redirect('login');
		}

    }
	public function index()
	{
		
		
        $this->load->model('gerenciar_model');
        $data['resultado'] = $this->gerenciar_model->getProvas();
        
        $data['ativo'] = 'gerenciar';
        $this->load->view('header', $data);
        $this->load->view('gerenciar', $data);
        $this->load->view('footer');
       
    }

    public function questoesProva($id)
    {
        $this->load->model('gerenciar_model');
        $data['resultado'] = $this->gerenciar_model->getQuestoes($id);
        $data['prova'] = $id;
        $data['ativo'] = 'gerenciar';
        $this->load->view('header', $data);
        $this->load->view('gerenciarQuestoes', $data);
        $this->load->view('footer');
       
    }
    public function excluir($id)
    {
        $this->load->model('gerenciar_model');
        $this->gerenciar_model->excluirProvas($id);
        $this->session->set_flashdata('mensagem', '<p class="alert alert-warning">Prova e questões excluidas!</p>');
        redirect('gerenciar/index');
    }

    public function excluirQuestao($idp, $idq)
    {
        $this->load->model('gerenciar_model');
        $this->gerenciar_model->excluirQuestoes($idq);
        $this->session->set_flashdata('mensagem', '<p class="alert alert-warning">Questão excluída!</p>');
        redirect('gerenciar/questoesProva/'.$idp);
    }
  

	
}
