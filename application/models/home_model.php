<?php
    class Home_model extends CI_Model {
        public function __construct(){
            parent::__construct();

        }
       
        public function login( $user, $senha){
            

            $hash_user = '$2y$10$rVhBPu9xizgzvzqcpGOTteINCKmqFiDN0k4oN7z9WWSYM2xJGP22C';
            $hash_password = '$2y$10$2HVVPwTRw1MkdT/cwTI5n.zolaDtZRo34mYbRH4QDi5TyyjsJ8vNu';

            return password_verify($user, $hash_user) && password_verify($senha, $hash_password);


            // $this->load->database('default');
            // $this->db->where('email', $email);
            // $this->db->where('senha', $senha);
            // $this->db->from('usuarios');
            // return $this->db->count_all_results() > 0;
        }   
        public function getModalidade(){
            $this->load->database('default');
            $this->db->where('ativo', 1);
            $this->db->from('modalidades');
            return $this->db->get()->result();
        }
    }
