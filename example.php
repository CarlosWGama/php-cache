<?php
require("cache.class.php");

//Diretório onde os dados vão ser salvos
$diretorio = dirname(__FILE__).'/cache/';

$cache = new Cache($diretorio);

//===== Salva =====//

//Forma 1 
$dados = "teste";
$cache->setVar("nomeVariavel", $dados, 10);

//Forma 2
$dados = array(1, 2, 3, 'teste');
$cache->setVar("nomeVariavel2", $dados);

//===== Busca =====//
echo $cache->getVar("nomeVariavel");

$dados2 = $cache->getVar("nomeVariavel2");
print_r($dados2);