<?php
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");
if(isset($_POST['selecionar'])){
	$idnoticia = $_POST['idnoticia'];
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
<br>
<?php /*Aqui começa o formulario de confirmação de exclusão*/?>
<div class="row">

			<h5 class="center-align">Tem certeza que quer excluir essa noticia?</h5>
	      <form action="deletar_noticias.php" method="POST">
	      	<input type="hidden" name = "id" value="<?php echo $dados['idnoticia'];?>">
	      	<center>
	      	 <button type="submit" name="Deletar" class="btn green">Confirmar</button>
	      	  <button type="submit" name="Cancelar" class="btn red">Cancelar</button>
	      	</center>
	      </form>
 </div>
 <?php /*Aqui termina o formulario de confirmação de exclusão*/?>
<?php
if(isset($_POST['Deletar'])){
	$idnoticia = mysqli_escape_string($sql,$_POST['id']);
	$deletar = "DELETE FROM noticias WHERE idnoticia = '$idnoticia'";
	if(mysqli_query($sql,$deletar)){
		header('Location:home.php');
	}
	else{
		print("<script type = 'text/javascript' > alert('Não foi possivel realizar a exclusão');</script>");
	}

}
if(isset($_POST['Cancelar'])){
	header('Location:selecionar_noticia(excluir).php');
}
require_once("../footer.php");
?>