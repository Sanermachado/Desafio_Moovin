<?php
require_once 'ContaBanco.php'; //codigo para chamar os atributos da Class conta banco
Class Transferencia{
/*Função para realizar a transferencia de biters de uma conta para outra,
retornando o s valos  */
public function transferir($l0, $l1, $valor){
    if($valor >= 0){
        echo "                   <i>OPÇÃO DE TRANSFERENCIA<br></i>";
        echo "<p>valor invalido para transferencia";
        }elseif($l0->getSaldo() > $valor ){
            $l0->setSaldo($l0->getSaldo() - $valor);
            $l1->setSaldo($l1->getSaldo() + $valor);
            echo "                   <i>OPÇÃO DE TRANSFERENCIA<br></i>";
            echo "valor da transferencia de ".$l0->getDono()." para ".$l1->getDono()." é de </b><u>".$valor." biters</u>";
            echo "<p><b>Saldo do beneficiado ".$l1->getDono()." é de </b><u>".$l1->getSaldo()." biters</u></p>";
            echo "<p><b>Saldo do Beneficiante ".$l0->getDono()." é de </b><u>".$l0->getSaldo()." biters</u></p>";
        } else{
            echo "saldo insuficiente";
        }
    }
}


?>