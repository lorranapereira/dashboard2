<?php

class Lancamentos_model extends CI_Model{

    public function inserir($obj){     
        $this->db->insert('lancamentos',$obj);   
        return "Salvo com sucesso!";
    }
    public function buscar_id(){     
        $query = $this->db->query("SELECT DISTINCT `Assessor` FROM `assessorCliente` ");
        return $query->result();
    }
    public function listadiaria($ano,$mes,$dia,$id_user){     
        $query = $this->db->query("SELECT Coalesce(sum(AplicaçãoFinanceiraDeclarada),0) as soma , `Assessor`,Coalesce(sum(NetEmM),0) as realizado  from `assessorCliente` WHERE `Assessor`='".$id_user."'  and year(data) = '".$ano."' and month(data) = '".$mes."' and day(data) = '".$dia."'");   
        return $query->result();
    } 
    public function receita_total($ano,$mes,$dia,$id){     
        $query = $this->db->query("SELECT Coalesce(sum(ReceitanoMes),0) as total,`Assessor` FROM `assessor` a inner join `assessorCliente` ac WHERE ac.`Assessor` = '".$id."' and year(data) = '".$ano."' and month(data) = '".$mes."' and day(data) = '".$dia."'");
        return $query->result();
    }
    public function receita_pie($ano,$mes,$id){     
        $query = $this->db->query("SELECT Coalesce(sum(ReceitaBovespa),0) as ReceitaBovespa,Coalesce(sum(ReceitaFuturos),0) as ReceitaFuturos,Coalesce(sum(ReceitaRFBancários),0) as ReceitaRFBancarios,Coalesce(sum(ReceitaRFPublicos),0) as ReceitaRFPublicos,Coalesce(sum(ReceitaRFPrivados),0) as ReceitaRFPrivados,`Assessor` FROM `assessor` a inner join `assessorCliente` ac WHERE ac.`Assessor` = '".$id."' and year(data) = '".$ano."' and month(data) = '".$mes."'");
        return $query->result();
    }
    public function lista_assessor(){     
        $query = $this->db->query("SELECT DISTINCT a.nome,a.id FROM `assessor` a inner join `assessorCliente` ac WHERE ac.`Assessor` = a.id");
        return $query->result();
    }
    public function upload(){                 
        //$dados = $_FILES['arquivo'];
        //var_dump($dados);
        
        if(!empty($_FILES['arquivo']['tmp_name'])){
            $arquivo = new DomDocument();
            $arquivo->load($_FILES['arquivo']['tmp_name']);
            //var_dump($arquivo);
            
            $linhas = $arquivo->getElementsByTagName("Row");
            //var_dump($linhas);
            
            $i = 0;
            $num = ($linhas->length)-2985;
            foreach($linhas as $linha){
                if($i>=3 and $i<=$num) {
                    $Assessor = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                    $Cliente = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                    $Profissao = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                    $Sexo = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                    $Segmento = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                    $DatadeCadastro = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
                    $FezSegundoAporte = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
                    $DatadeNascimento = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
                    $Status = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
                    $AtivouemM = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
                    $EvadiuemM = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
                    $OperouBolsa = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
                    $OperouFundo = $linha->getElementsByTagName("Data")->item(12)->nodeValue;
                    $OperouRendaFixas = $linha->getElementsByTagName("Data")->item(13)->nodeValue;
                    $AplicaçãoFinanceiraDeclarada = $linha->getElementsByTagName("Data")->item(14)->nodeValue;
                    $ReceitanoMes = $linha->getElementsByTagName("Data")->item(15)->nodeValue;
                    $ReceitaBovespa = $linha->getElementsByTagName("Data")->item(16)->nodeValue;
                    $ReceitaFuturos = $linha->getElementsByTagName("Data")->item(17)->nodeValue;
                    $ReceitaRFBancários = $linha->getElementsByTagName("Data")->item(18)->nodeValue;
                    $ReceitaRFPrivados = $linha->getElementsByTagName("Data")->item(19)->nodeValue;
                    $ReceitaRFPublicos = $linha->getElementsByTagName("Data")->item(20)->nodeValue;
                    $CaptacaoBrutaemM = $linha->getElementsByTagName("Data")->item(21)->nodeValue;
                    $ResgateemM = $linha->getElementsByTagName("Data")->item(22)->nodeValue;
                    $CaptacaoLiquidaemM = $linha->getElementsByTagName("Data")->item(23)->nodeValue;
                    $CaptacaoTED = $linha->getElementsByTagName("Data")->item(24)->nodeValue;
                    $CaptacaoST = $linha->getElementsByTagName("Data")->item(25)->nodeValue;
                    $CaptacaoOTA = $linha->getElementsByTagName("Data")->item(26)->nodeValue;
                    $CaptacaoRF = $linha->getElementsByTagName("Data")->item(27)->nodeValue;
                    $CaptacaoTD = $linha->getElementsByTagName("Data")->item(28)->nodeValue;
                    $CaptacaoPREV = $linha->getElementsByTagName("Data")->item(29)->nodeValue;
                    $NetemM = $linha->getElementsByTagName("Data")->item(30)->nodeValue;
                    $NetEmM = $linha->getElementsByTagName("Data")->item(31)->nodeValue;
                    $NetRendaFixa = $linha->getElementsByTagName("Data")->item(32)->nodeValue;
                    $NetFundosImobiliarios = $linha->getElementsByTagName("Data")->item(33)->nodeValue;
                    $NetRendaVariavel = $linha->getElementsByTagName("Data")->item(34)->nodeValue;
                    $NetFundos = $linha->getElementsByTagName("Data")->item(35)->nodeValue;
                    $NetFinanceiro = $linha->getElementsByTagName("Data")->item(36)->nodeValue;
                    $NetPrevidencia = $linha->getElementsByTagName("Data")->item(37)->nodeValue;
                    $NetOutros = $linha->getElementsByTagName("Data")->item(38)->nodeValue;
                    $ReceitaAluguel = $linha->getElementsByTagName("Data")->item(39)->nodeValue;
                    $Complemento = $linha->getElementsByTagName("Data")->item(40)->nodeValue;                    
                    $query = $this->db->query("INSERT INTO `assessorCliente`(                       
                    `Assessor`,
                    `Cliente`,
                    `Profissao`,
                    `Sexo`,
                    `Segmento`,
                    `DatadeCadastro`,
                    `FezSegundoAporte`,
                    `DatadeNascimento`,
                    `Status`,
                    `AtivouemM`,
                    `EvadiuemM`,
                    `OperouBolsa`,
                    `OperouFundo`,
                    `OperouRendaFixas`,
                    `AplicaçãoFinanceiraDeclarada`,
                    `ReceitanoMes`,
                    `ReceitaBovespa`,
                    `ReceitaFuturos`,
                    `ReceitaRFBancários`,
                    `ReceitaRFPrivados`,
                    `ReceitaRFPublicos`,
                    `CaptacaoBrutaemM`,
                    `ResgateemM`,
                    `CaptacaoLiquidaemM`,
                    `CaptacaoTED`,
                    `CaptacaoST`,
                    `CaptacaoOTA`,
                    `CaptacaoRF`,
                    `CaptacaoTD`,
                    `CaptacaoPREV`,
                    `NetemM-1`,
                    `NetEmM`,
                    `NetRendaFixa`,
                    `NetFundosImobiliarios`,
                    `NetRendaVariavel`,
                    `NetFundos`,
                    `NetFinanceiro`,
                    `NetPrevidencia`,
                    `NetOutros`,
                    `ReceitaAluguel`,
                    `ReceitaComplemento/PacoteCorretagem`) VALUES (
                        '".$Assessor."',
                        '".$Cliente."',
                        '".$Profissao."',
                        '".$Sexo."',
                        '".$Segmento."',                                
                        '".$DatadeCadastro."',
                        '".$FezSegundoAporte."',
                        '".$DatadeNascimento."',
                        '".$Status."',
                        '".$AtivouemM."',
                        '".$EvadiuemM."',
                        '".$OperouBolsa."',
                        '".$OperouFundo."',
                        '".$OperouRendaFixas."',
                        '".$AplicaçãoFinanceiraDeclarada."',
                        '".$ReceitanoMes."',
                        '".$ReceitaBovespa."',
                        '".$ReceitaFuturos."',
                        '".$ReceitaRFBancários."',
                        '".$ReceitaRFPrivados."',
                        '".$ReceitaRFPublicos."',
                        '".$CaptacaoBrutaemM."',
                        '".$ResgateemM."',
                        '".$CaptacaoLiquidaemM."',
                        '".$CaptacaoTED."',
                        '".$CaptacaoST."',
                        '".$CaptacaoOTA."',
                        '".$CaptacaoRF."',
                        '".$CaptacaoTD."',
                        '".$CaptacaoPREV."',
                        '".$NetemM."',
                        '".$NetEmM."',
                        '".$NetRendaFixa."',
                        '".$NetFundosImobiliarios."',
                        '".$NetRendaVariavel."',
                        '".$NetFundos."',
                        '".$NetFinanceiro."',
                        '".$NetPrevidencia."',
                        '".$NetOutros."',
                        '".$ReceitaAluguel."',
                        '".$Complemento."'
                        )");
                    }
                    $i += 1;                    
                }
            }
        return "Dados inseridos com sucesso!";        
            
    }
    public function listamensal($datai,$dataf,$id_user){     
        $query = $this->db->query("SELECT Coalesce(sum(AplicaçãoFinanceiraDeclarada),0) as declarado,  Coalesce(sum(NetEmM),0) as realizado, `Assessor`  from `assessorCliente` WHERE `Assessor`='".$id_user."' and data BETWEEN '".$datai."' and '".$dataf."' ");   
        return $query->result();
    } 
}


?>
