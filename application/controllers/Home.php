<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		if(!isset($logged) && !$logged) {
            redirect('login');
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('aba', 'Abacate', 'required', array('required' => 'O usuario deve ser preenchido'));
		if ($this->form_validation->run() == FALSE)
        {
			
			
			$data['ativo'] = 'home';
			$this->load->model("home_model");
			$data['modalidade'] = $this->home_model->getModalidade();
            $this->load->view('header', $data);
			$this->load->view('home', $data);
			$this->load->view('footer');
		}
		else
		{
			var_dump($this->input->post());
			exit();
		}
		

		

		

	}


}
