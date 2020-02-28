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

        public function getCategoria(){
            $this->load->database('default');
            $this->db->where('ativo', 1);
            $this->db->from('categorias');
            return $this->db->get()->result();
        }

        public function getAno()
        {
            $this->load->database('default');
            $this->db->where('ativo', 1);
            $this->db->from('provas');
            return $this->db->get()->result();
        }

        public function getDificuldade()
        {
            $this->load->database('default');
            $this->db->where('ativo', 1);
            $this->db->from('dificuldades');
            return $this->db->get()->result();
        }

        public function inserirProva($tudo, $nomeProva, $nomeQuestoes)
        {
            $this->load->database('default');
            var_dump($tudo);
            var_dump($nomeProva);
            var_dump($nomeQuestoes);
            $data = array ('nome'=>$nomeProva);
            $this->db->insert('arquivos', $data);
            $last_id = $this->db->insert_id();
            $data = array (
                'ano' => $tudo['ano'],
                'descricao' => $tudo['descricao'],
                'modalidades_id' => $tudo['modalidade'],
                'arquivos_id' => $last_id
            );
            $this->db->insert('provas', $data);
            $last_id = $this->db->insert_id();

            for($i = 0; $i < count($nomeQuestoes); $i++)
            {
                $data = array ('nome'=>$nomeQuestoes[$i]);
                $this->db->insert('arquivos', $data);
                $aux = $this->db->insert_id();
                $data = array(
                    'titulo' => $tudo['titulo'][$i],
                    'provas_id' => $last_id,
                    'categorias_id' => $tudo['categoria'][$i],
                    'dificuldades_id' => $tudo['dificuldade'][$i],
                    'arquivos_id' => $aux

                );
                $this->db->insert('questoes', $data);
            }
        }
    }
