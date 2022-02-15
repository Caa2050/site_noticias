<?php
/*Essa função foi feita para realizar a conexão com a base de dados. Foi usado phpmyadmin para a criação do banco de dados.
Nome da base/ database name: banco_noticia
host: localhost
senha/password: nenhuma
usuario/user: root

Eu usei a variavel global $sql para as funções: mysqli_query, mysqli_escape_string.
*/
function conecta_db($host,$user,$databese,$password){
	global $sql;

	$sql = mysqli_connect($host,$user,$password,$databese);
  mysqli_query($sql,"SET NAMES 'utf8'");
  mysqli_query($sql,'SET character_set_connection=utf8');
  mysqli_query($sql,'SET character_set_client=utf8');
  mysqli_query($sql,'SET character_set_results=utf8');
}

conecta_db("localhost","root","banco_noticia","");
?>