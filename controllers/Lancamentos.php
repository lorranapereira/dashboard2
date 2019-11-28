<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lancamentos extends CI_Controller {

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
	 public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');					
		$this->load->model('Lancamentos_model','model');
		

	}

	public function receitaTotal(){	
		$datai = date("Y-m-01");	
		$matriz = [];
					
		for ($i=1; $i <= 31; $i++) { 
			$lista = $this->model->receita_total(date("Y"),date("m"),$i,$_POST['id']);
			if($lista[0]->Assessor == ""){
				$lista[0]->Assessor = $_POST['id'];
			}
			$lista[0]->total =  round($lista[0]->total);
			array_push($matriz,$lista);	
		}
		$receitaTotal['receita_total'] = $matriz;
		echo json_encode($receitaTotal);
	}	
	public function capitacao(){
		$datai = date("Y-m-01");	
		$diario1 = [];
		$mensal = [];
					
		for ($i=1; $i <= 31; $i++) { 
			$lista = $this->model->listadiaria(date("Y"),date("m"),$i,intval($_POST['id']));
			if($lista[0]->Assessor == ""){
				$lista[0]->Assessor = $_POST['id'];
			}
			$lista[0]->soma =  round($lista[0]->soma);
			$lista[0]->realizado =  round($lista[0]->realizado);	

			array_push($diario1,$lista);			
		}
		$vetor['assessores'] = $this->model->lista_assessor();		
		$vetor['mensal'] = $diario1;
		echo json_encode($vetor);
	}		
	public function dashboard(){
		$datai = date("Y-m-01");	
		$diario1 = [];
		$mensal = [];
		$id_user = $this->model->buscar_id();
		$diario1 = [];					
		for ($i=1; $i <= 31; $i++) { 
			$lista = $this->model->listadiaria(date("Y"),date("m"),$i,intval($id_user[0]->Assessor));
			if($lista[0]->Assessor == ""){
				$lista[0]->Assessor = $id_user[0]->Assessor;
			}
			$lista[0]->soma =  number_format(round($lista[0]->soma), 2, '.', '');
			$lista[0]->realizado =  number_format(round($lista[0]->realizado), 2, '.', '');	

			array_push($diario1,$lista);			
		}
		$vetor['assessores'] = $this->model->lista_assessor();		
		$this->load->view('home',$vetor);	
	}	
	public function receitapie(){
		$diario1 = [];
		$mensal = [];
		$id_user = $this->model->buscar_id();
		$diario1 = [];					
		$lista = $this->model->receita_pie(date("Y"),date("m"),intval($_POST['id']));
		$lista[0]->ReceitaBovespa =  round($lista[0]->ReceitaBovespa);
		$lista[0]->ReceitaRFPublicos =  round($lista[0]->ReceitaRFPublicos);	
		$lista[0]->ReceitaRFBancarios =  round($lista[0]->ReceitaRFBancarios);
		$lista[0]->ReceitaRFPrivados =  round($lista[0]->ReceitaRFPrivados);
		$lista[0]->ReceitaFuturos =  round($lista[0]->ReceitaFuturos);			
		$vetor['receita_pie'] = $lista;		
		echo json_encode($vetor);
	}
	public function upload(){
		$lista = $this->model->upload();	
		$this->session->set_flashdata("success",$lista);
		header("Location:inserir");
		
	}		
	public function deletar(){
		 $this->model->deletar($_GET['id']);
		 $lista['lista'] = $this->model->listar($_GET['mes'],$_GET['ano']);	
		 $resultado = $this->model->somaResult($_GET['ano']);
		 $res = $resultado['total'];			
		 $lista['res'] = $res;
		 $lista['ano'] =$_GET['ano'];							 
		 $this->load->view('mes',$lista);		 
		
	}	

}	

