<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "sos";
	
	
	//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
mysqli_set_charset($conn,"utf8");

date_default_timezone_set('America/Sao_Paulo');
$data1 = date('Y-m-d');
$hora2 = date('H:i:s');
$datageral = date('Y-m-d');	
$data = substr($data1,8,2) . '/' .substr($data1,5,2) . '/' . substr($data1,0,4);
$hora = substr($hora2,0,2) . 'h' .substr($hora2,3,2) . 'min';
$segd = date('Ymd');
$segh = date('His');

$seguranca = $segd.$segh;

?>