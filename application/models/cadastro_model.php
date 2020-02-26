<?php
    class Cadastro_model extends CI_Model {
        public function __construct(){
            parent::__construct();

        }
       
        public function cadastrar($nome, $email, $senha){
            $this->load->database('default');
            $data = array(
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha
            );
            $this->db->insert('usuarios', $data);
        }   
    }
