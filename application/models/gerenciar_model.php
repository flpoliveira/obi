<?php
    class Gerenciar_model extends CI_Model {
        public function __construct(){
            parent::__construct();

        }
       
       
        public function getProvas(){
            $this->load->database('default');
            $this->db->select('provas.id, modalidades.descricao, provas.ano, arquivos.nome as arquivoProva');
            $this->db->from('provas');
            $this->db->join('modalidades', 'modalidades.id = provas.modalidades_id');
            $this->db->join('arquivos', 'arquivos.id = provas.arquivos_id');
            $this->db->where('provas.ativo', 1);
            $this->db->order_by('provas.ano', 'ASC');
            return $this->db->get()->result();
        }

        public function getQuestoes()
        {
            $this->load->database('default');
            $this->db->select('questoes.id, questoes.titulo, categorias.descricao as categoria, dificuldades.descricao as dificuldade, arquivos.nome');
            $this->db->from('questoes');
            $this->db->join('dificuldades', 'dificuldades.id = questoes.dificuldades_id');
            $this->db->join('categorias', 'categorias.id = questoes.categorias_id');
            $this->db->join('arquivos', 'arquivos.id = questoes.arquivos_id');
            $this->db->where('questoes.ativo',1);
            return $this->db->get()->result();
        }
        public function excluirQuestoes($id)
        {
            $this->load->database('default');
            $this->db->select('arquivos_id');
            $this->db->from('questoes');
            $this->db->where('id', $id);
            $aux = $this->db->get()->row()->arquivos_id;

            $this->db->set('ativo', 0);
            $this->db->where('id', $id);
            $this->db->update('questoes');

            $this->db->set('ativo', 0);
            $this->db->where('id', $aux);
            $this->db->update('arquivos');
        }
        public function excluirProvas($id)
        {
            $this->load->database('default');
            $this->db->select('questoes.arquivos_id');
            $this->db->from('questoes');
            $this->db->where('questoes.provas_id', $id);
            $aux = $this->db->get()->result();
            
            $this->db->select('arquivos_id');
            $this->db->from('provas');
            $this->db->where('id', $id);
            $aux2 = $this->db->get()->row()->arquivos_id;

            $this->db->set('ativo', 0);
            $this->db->where('id', $aux2);
            $this->db->update('arquivos');

            $this->db->set('ativo', 0);
            $this->db->where('questoes.provas_id', $id);
            $this->db->update('questoes');

            foreach($aux as $key)
            {
                
                $this->db->set('ativo', FALSE);
                $this->db->where('id', $key->arquivos_id);
                $this->db->update('arquivos');
            }

            $this->db->set('ativo', 0);
            $this->db->where('id', $id);
            $this->db->update('provas');
        }
    }
?>