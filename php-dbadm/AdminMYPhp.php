<?php 

class AdminMYPhp{
    
    
    
    public static function main(){

        $adm = new AdminMYPhp();
        $adm->aplicacao();
    }
    public function aplicacao(){
        $dao = new DAO();
        $sqlTables = "SHOW TABLES;";
        $result = $dao->getConexao()->query($sqlTables);
        foreach($result as $linha){
            $nomeDaTabela = $linha['Tables_in_jefponte_dti'];
            echo '<h1>'.$nomeDaTabela.'</h1>';
            echo '<br>';
            $n = 10;
            
            echo '<br>'.$n.' primeiros dados<br>';
            $sqlPrimeirosDados = "SELECT * FROM $nomeDaTabela LIMIT $n";
            $resultPrimeirosDados = $dao->getConexao()->query($sqlPrimeirosDados);
            $i = 0;
            echo '<table border=1>';
            foreach ($resultPrimeirosDados as $linhaPrimeirosDados){
                
                if(!$i){
                    echo '<tr>';
                    foreach ($linhaPrimeirosDados as $chave => $valor){
                        if(!is_int($chave))
                            echo '<th>'.$chave.'</th>';
                    }
                    echo '</tr>';
                    $i++;
                    
                }
                echo '<tr>';
                foreach ($linhaPrimeirosDados as $chave => $valor){
                    if(!is_int($chave))
                        echo '<td>'.utf8_encode ( $valor).'</td>';
                }
                echo '</tr>';
                
            }
            echo '</table>';
            
            echo '<hr>';
            
        }
    }
    
    
    
    
    
    
}

?>