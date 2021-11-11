<?php
class ContaBanco{
    //atributo
    private $dono;
    protected $tipo;
    private $saldo;
    private $status;
    // metodos
/*Esta fução esta fixando o nome e o tipo de conta que a mesma possui e fixando um saldo caso seja
corrente ou poupança.*/
    public function abrirConta($t, $nome){
        $this->setTipo($t);
        $this->setDono($nome);
        $this->setStatus(true);
        if($t == "CC"){
            $this->setSaldo(250); 
            echo "<b>".$this->getDono()." possui saldo da conta ".$t."  </b>de<u> ".$this->getSaldo()." biteris </u></br>";
        }elseif($t =="CP"){
            $this->saldo = 350;
            echo "<b>".$this->getDono()." possui saldo da conta ".$t."  </b>de<u> ".$this->getSaldo()." biteris </u></br>";
            echo "<p>---------------------------------------------------------------------</p>";
        }  
    }
    public function depositar($v){
        
            $this->setSaldo($this->getSaldo() + $v);
            echo "                   <i>OPÇÃO DE DEPOSITO<br></i>";
            echo "<b> Deposito de </b> <u>$v biteris </u> <b>realizado na conta de ".$this->getDono()."</b>";"<br>";
            echo "<p><b> Saldo após o deposito é de: </b><u>".$this->getSaldo()." biteris</u></p>" ;
            echo "<p>---------------------------------------------------------------------</p>";
    }
    /*Função sacar ta chamando as duas outras funções que possue as limitações para cada tipo de conta,
    a mesma verifica se é corrente ou poupança abreviadas como CC e CP e realiza o saque caso estejam
    abaixo do valor permitido.*/
    public function sacar($v, $t){
            if($t == 'CC' and $v > 0){
            $this->sacarCC($v);
            }elseif($t =='CP' and $v > 0)
            $this->sacarCP($v);     
    }
    /*Função sacar já com a subtração da taxa ao realizar saque em conta corrente*/
    public function sacarCC($v){
        if($this->getSaldo() >= ($v + 2.50) and $v <= 602.50){
            $this->setSaldo(($this->getSaldo()- 2.50) -$v);
            echo "                   <i>OPÇÃO DE SAQUE<br></i>";
            echo "<b> Saque de  </b><u>$v biteris</u> <b>realizado com sucesso da conta Corrente </b>";
            echo "<p><b> Saldo atual de ".$this->getDono()." é de </b> <u>".$this->getSaldo()." biters</u></p>";
            echo "<p>---------------------------------------------------------------------</p>";
     }else{
        echo "                   <i>OPÇÃO DE SAQUE<br></i>";
        echo "<p><b>Valor a ser sacado ultrapassa o Saldo que é de  <u>".$this->getSaldo()." biters </u></br></p>";
        echo "<p>---------------------------------------------------------------------</p>";
     }  
    }
    /*Função sacar já com a subtração da taxa ao realizar saque em conta poupança*/
    public function sacarCP($v){
        if($this->getSaldo() >= ($v + 0.80)  and $v <= 1002.50){
            $this->setSaldo(($this->getSaldo()-0.80) - $v);
            echo "                   <i>OPÇÃO DE SAQUE<br></i>";
            echo "Saque de  </b><u>$v biteris</u> <b>realizado com sucesso da conta Poupança <b>";
            echo "<b> <p>Saldo atual de ".$this->getDono()." é de </b> <u>".$this->getSaldo()." biters</u></p>";
            echo "<p>---------------------------------------------------------------------</p>";

     }else{
        echo "                   <i>OPÇÃO DE SAQUE<br></i>";
         echo "<b>A tentativa de saque de valor </b><u>$v biters</u> <b>ultrapassa o Saldo que é de  </b><u>".$this->getSaldo()." biters </u></br></p>";
         echo "<p>---------------------------------------------------------------------</p>";
     }  

    }
    //Metodos Especiais    
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
    public function getSaldo()
    {
        return $this->saldo;
    }
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;

        return $this;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
    public function getDono()
    {
        return $this->dono;
    }
    public function setDono($dono)
    {
        $this->dono = $dono;
        return $this;
    }
}