<?php

class Usuario_model extends CI_Model{


/*    public function inserirUser($obj){
        $email = $obj['email'];
        $query = $this->db->query("SELECT * FROM usuario WHERE email='".$email."'");
        if ($query->result() != NULL){
            return "Este email já foi registrado!";            
        }      
        else {
            $this->db->insert('usuario',$obj);   
            return "Cadastro realizado com sucesso!";            
        }

    }*/
    public function listar(){     
        $query = $this->db->query("SELECT *FROM usuario");   
        return $query->result();
    }
    public function alterar($obj){ 
        $this->db->where('id', $obj['id']);        
        $this->db->set($obj);        
        $this->db->update('lancamento',$obj);  
    }
    public function verificarUser($nome,$senha){     
        $query = $this->db->get_where('usuario', array('nome'=>$nome,'senha'=>$senha));
        return $query->row_array();
    }
    public function aprovar($id){     
        $query = $this->db->query("UPDATE usuario SET aprovado = 'true' WHERE id = '".$id."'  ");
        return "Usuário aprovado!";
    }
    public function deletar($id){     
        $query = $this->db->query("DELETE from usuario  WHERE id = '".$id."'  ");
        return "Usuário deletado!";
    }
    public function lista_pendentes(){     
        $query = $this->db->query("SELECT *from usuario where aprovado = 'false'");
        return $query->result();
    }

    
    
 
}

?>
