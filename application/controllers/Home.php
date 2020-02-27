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
		$this->form_validation->set_rules('ano', 'Ano', 'required', array('required' => 'O ano da prova deve ser preenchido'));
		$this->form_validation->set_rules('modalidade', 'Modalidade', 'required', array('required' => 'A modalidae da prova deve ser preenchido'));

		$this->load->model("home_model");
		if ($this->form_validation->run() == FALSE)
        {
			
			
			$data['ativo'] = 'home';
			
			$data['modalidade'] = $this->home_model->getModalidade();
			$data['categoria'] = $this->home_model->getCategoria();
			$data['dificuldade'] = $this->home_model->getDificuldade();
            $this->load->view('header', $data);
			$this->load->view('home', $data);
			$this->load->view('footer');
		}
		else
		{
			$prova = $_FILES['arquivo'];
			$configuracao = array(
			'upload_path'   => './provas',
			'allowed_types' => 'pdf',
			'max_size'      => '500'
			);      
			$this->load->library('upload');
			$this->upload->initialize($configuracao);
			$this->upload->do_upload('arquivo');
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$nomeProva = $upload_data['file_name'];
			$configuracao["upload_path"] = "./questoes";
			$this->upload->initialize($configuracao);
			$nomeQuestoes = array();
			for($i = 1; $i <= $this->input->post("gambiarra"); $i++)
			{
				if(!($this->input->post('titulo')[$i-1] == ''))
				{
					$this->upload->do_upload('inputFileQuestao'.$i);
					$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
					array_push($nomeQuestoes, $upload_data['file_name']);

				}
				
			}
			
			$this->home_model->inserirProva($this->input->post(), $nomeProva, $nomeQuestoes);
			$this->session->set_flashdata('mensagem', '<p class="alert alert-success">Prova e questões cadastradas!</p>');
			redirect('home');
			
		}
		

		

		

	}


}
