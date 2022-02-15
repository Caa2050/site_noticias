<?php
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");
/*Usando o metodo GET para pegar o id passado no link*/
if(isset($_GET['id'])){
	$idnoticia = $_GET['id'];
	$pesquisar = "SELECT * FROM noticias WHERE idnoticia = '$idnoticia'";
	$resultado = mysqli_query($sql,$pesquisar);
	$dados = mysqli_fetch_array($resultado);

	// Aqui estou pegando a chave estrangeira de noticias para buscar pela categoria da mesma.

	$idcategoria = $dados['categoriafk'];
	$buscar = "SELECT * FROM categoria WHERE idcategoria = '$idcategoria'";
	$resultado_da_busca = mysqli_query($sql,$buscar);
	$dado = mysqli_fetch_array($resultado_da_busca);

}
?>
<h4 class="center-align"><?php echo $dados['nome'];?></h4>
<?php // Na proxima linha, eu coloco o resultado da pesquisa na tabela 'Categorias'?>
<h6 class="center-align">Categoria:<?php echo $dado['categorias'];?></h6>
<p class="center-align"><?php echo $dados['descricao']?></p>
<?php
require_once("../footer.php");
?>