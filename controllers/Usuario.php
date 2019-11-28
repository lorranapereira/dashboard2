<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
		$this->load->model('Usuario_model','model');

	}
	public function index()
	{
		$this->load->view('index.php');	
	}
    public function logar(){
		if ($_SERVER['REQUEST_METHOD'] == "POST"){
			$nome = $_POST['nome'];
			$senha = md5(md5(md5($_POST['senha'])));
			$data = $this->model->verificarUser($nome,$senha);
			if($data){
				$_SESSION['nome'] = $data['nome'];
				$_SESSION['id'] = $data['id'];
				$this->session->set_userdata('usuario', $data);
				header('Location:home');
			}
			else{
				$this->session->set_flashdata("error",'Usuário ou senha incorretos'.$senha);
				header('Location:index');
			} 
		}
		else{
			$this->load->view('index');	
		}
	}
	public function deletar(){    
		if (isset($_GET['id'])){
			$msg = $this->model->deletar($_GET['id']);
			$this->session->set_flashdata("danger",$msg);
			$users['users'] = $this->model->lista_pendentes();			
			$this->load->view('aprovar',$users);
		}	
	}
    public function aprovar(){    
		if (isset($_GET['id'])){
			$msg = $this->model->aprovar($_GET['id']);
			$this->session->set_flashdata("success",$msg);
			$users['users'] = $this->model->lista_pendentes();			
			$this->load->view('aprovar',$users);
		}
		else {
			$users['users'] = $this->model->lista_pendentes();
			$this->load->view('aprovar',$users);
		}		
	}
    public function logout(){     
        session_destroy();
		header('Location:index');
		
	}
}

