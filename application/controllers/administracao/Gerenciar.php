<?php defined('BASEPATH') or exit('No direct script acess allowed');
	class Gerenciar extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			if(!$this->session->userdata('logado')){
				redirect("administracao/login");
			}
		}
		
		public function index(){
			$data['banda'] = $this->db->get('banda')->result();
			$this->load->helper('form');
			$this->load->view('administracao/tela_bandas',$data);
		}
		
		public function call_adicionar() {
			$this->load->helper('form');
			$this->load->view('administracao/cadastrar_banda');
		}
		
		public function adicionar(){
			$data['nome'] = $this->input->post('txt_titulo');
			$data['qtd_integrantes'] = $this->input->post('txt_texto');
			$dia = (int) $this->input->post('txt_dia');
			$mes = (int) $this->input->post('txt_mes');
			$ano = (int) $this->input->post('txt_ano');
			
			$confirm = true;
			
			if ((!is_numeric($dia)) || (!is_numeric($mes)) || (!is_numeric($ano)) ) {
				$confirm = false;
			}
			
			if (($dia < 1) || ($dia > 31) || ($mes < 1) || ($mes > 12) || ($ano > 2017) ) {
				$confirm = false;
			}
			
			if ((($mes == 4) || ($mes == 6) || ($mes == 9) || ($mes == 11)) && ((int)$dia > 30)) {
				$confirm = false;
			}

			if (($mes == 2) && ($dia > 28)) {
				$confirm = false;
			}

			if ($confirm == true) {
				$data['data_fundacao'] = $ano."-".$mes."-".$dia;
				if($this->db->insert('banda', $data)){
					redirect(base_url('administracao/gerenciar'));
				}
			} else {
				echo "Inclusão impossibilitada";
			}
		}
		
		public function alterar($id){
			$this->db->where('id', $id);
			$data['banda'] = $this->db->get('banda')->result();
			$this->load->helper('form');
			$this->load->view('administracao/alterar_postagem', $data);
		}
		public function salvar_alteracao(){
			$data['nome'] = $this->input->post('txt_titulo');
			$data['qtd_integrantes'] = $this->input->post('txt_texto');
			$data['data_fundacao'] = $this->input->post('txt_data');
			$this->db->where('id', $this->input->post('id'));
			
			if($this->db->update('banda', $data)){
				redirect(base_url('administracao/gerenciar'));
			}else{
				echo "Alteração impossibilitada";
			}
		}
		public function excluir($id){
			$this->db->where('id', $id);
			if($this->db->delete('banda')){
				redirect(base_url('administracao/gerenciar'));
			}else{
				echo "Exclusão impossibilitada";
			}
		}
		
		public function gerarpdf() {
			$data['banda'] = $this->db->get('banda')->result();
			$this->load->helper('form');
			$this->load->view('administracao/pdf', $data);
		}	
	}
