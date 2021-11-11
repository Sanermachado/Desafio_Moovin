<html>
    <head><meta charset="UTF-8">
    <title></title>
</head>
<body ><pre>
<?php
require_once 'ContaBanco.php';
require_once 'Transfere.php';
echo "                   <i>SALDO ATUAL DAS CONTAS<br></i>";
$l = array ();
$l[0] = new ContaBanco();
$l[1] = new ContaBanco();

//Abrindo Conta
$l[0]->abrirConta("CC","Daniele");
$l[1]->abrirConta("CP", "Eduarda");

//Realiza Deposito
echo $l[1]->depositar(50);

//Realiza Saque
echo $l[1]->sacar(40, 'CC');

//Realiza Transferencia
$movimentacao = new Transferencia();
$movimentacao->transferir($l[1],$l[0],100);
        ?>
        </pre>
    </body>
</html>