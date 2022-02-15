<?php
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");
?>
<?php /*Aqui começa o formulario de cadastro de noticias*/?>
<h4 class="center-align">Cadastrar Noticias</h4>
<div class="row">
	<form class=" col s6 offset-m3" action="cadastro_noticias.php" method="POST">
		<div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite o nome da noticias" name="nome" type="text" class="validate">
        </div>
		<div class="input-field col s6">
          <input placeholder="Sobre a noticia" name="descricao" type="text" class="validate">
        </div>
    </div>
    <select class="browser-default" name="categoriafk">
    <?php 
    	$consulta = "SELECT * FROM categoria";
    	$resultado = mysqli_query($sql,$consulta);
    	while ($dados = mysqli_fetch_array($resultado)) {
    ?>
    <option value="<?php echo $dados['idcategoria'];?>" ><?php echo $dados['categorias']?></option>
    <?php } ?>
  </select>
  <br>
  
  <button class="waves-effect waves-light btn" type="submit" name="cadastrar"> Cadastrar</button>

	</form>
</div>
<?php /*Aqui termina o formulario de cadastro de noticias*/?>

<?php
if(isset($_POST['cadastrar'])){
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$categoriafk = $_POST['categoriafk'];

	$cadastro = "INSERT INTO noticias(nome,categoriafk,descricao) VALUES ('$nome','$categoriafk','$descricao')";

	if(mysqli_query($sql,$cadastro)){
		header('Location:home.php');
	}
	else{
		 print("<script type = 'text/javascript'> 
        alert('Não foi possive realizar o cadastro!!!');</script>");
	}
}
require_once("../footer.php");
?>