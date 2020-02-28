<?php
    class Busca_model extends CI_Model {
        public function __construct(){
            parent::__construct();

        }
        public function busca($tudo)
        {
            $this->load->database('default');
            $this->db->select('questoes.titulo, provas.descricao as descProva, provas.ano, categorias.descricao as categoria, dificuldades.descricao as dificuldade, modalidades.descricao as modalidade, arquivoProva.nome as arquivoProva, arquivos.nome as arquivoQuestao');
            $this->db->from('provas');
            $this->db->join('arquivos as arquivoProva', 'arquivoProva.id = provas.arquivos_id');
            $this->db->join('modalidades', 'modalidades.id = provas.modalidades_id');
            $this->db->join('questoes', 'questoes.provas_id = provas.id');
            $this->db->join('categorias', 'categorias.id = questoes.categorias_id');
            $this->db->join('dificuldades', 'dificuldades.id = questoes.dificuldades_id');
            $this->db->join('arquivos', 'arquivos.id = questoes.arquivos_id');
            if(count($tudo) != 0)
            {
                if($tudo['titulo'])
                    $this->db->like('questoes.titulo', $tudo['titulo']);
                if($tudo['modalidade'])
                    $this->db->where('provas.modalidades_id', $tudo['modalidade']);
                if($tudo['ano'] && $tudo['ano'] != '1')
                    $this->db->where('provas.ano', $tudo['ano']);
                if($tudo['dificuldade'])
                    $this->db->where('questoes.dificuldades_id', $tudo['dificuldade']);
                if($tudo['categoria'])
                    $this->db->where('questoes.categorias_id', $tudo['categoria']);
            }
            
            $this->db->order_by('provas.ano', 'ASC');
            return $this->db->get()->result();
        }
        
    }
