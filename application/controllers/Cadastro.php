<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

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
    	$logged = $this->session->userdata('logado');
    	if(isset($logged) && $logged) {
            redirect('home');
        }

    }
	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->database();

		$this->form_validation->set_rules('nome', 'Nome', 'required',  array('required' => 'O nome deve ser preenchido'));
		$this->form_validation->set_rules('password', 'Password', 'required',  array('required' => 'A senha deve ser preenchido'));
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',  array('required' => 'A confirmacao de senha deve ser preenchido', 'matches' => 'As senhas nao coincidem'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuarios.email]',  array('required' => 'O email deve ser preenchido', 'is_unique' => 'Email já cadastrado.'));
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("cadastro");
        }
        else
        {
        	$this->load->model("cadastro_model");
        	$this->cadastro_model->cadastrar($this->input->post('nome'), $this->input->post('email'), $this->input->post('password'));
        	$this->session->set_flashdata('mensagem', 'Usuario cadastrado com sucesso!');
			redirect("login");
        	// if($this->cadastro_model())
        	// {
        	// 	$this->session->set_flashdata('mensagem', 'Usuario cadastrado com sucesso!');
        	// 	redirect("login");
        	// }
        	
        }

	}
}
