<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
    	parent::__construct();
    	
    	

    }
	public function index()
	{
		$logged = $this->session->userdata('logado');
		if(isset($logged) && $logged) {
            redirect('home');
        }
		$this->load->helper('form');
		
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'User', 'required', array('required' => 'O usuario deve ser preenchido'));
        $this->form_validation->set_rules('password', 'Password', 'required',  array('required' => 'A senha deve ser preenchida'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("login");
        }
        else
        {
        	$this->load->model("login_model");
        	if($this->login_model->login($this->input->post("user"), $this->input->post("password")))
        	{
        		$this->session->set_userdata("logado", TRUE);
            	redirect('home');
        	}
        	else
        	{
        		$this->session->set_flashdata('mensagem', 'Autenticacao falhou!');
        		redirect();
        	}
        	
        }

	}

	public function sair()
	{
        $this->session->unset_userdata('logado');
        $this->session->set_flashdata('mensagem', 'Você saiu!');
        redirect('login');
	}
}
