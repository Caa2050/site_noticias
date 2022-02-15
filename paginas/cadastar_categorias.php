<?php
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");
?>
<?php /*Aqui começa o formulario de cadastro de categorias*/?>
<h4 class="center-align">Cadastrar Categorias</h4>
<div class="row">
	<form class=" col s6 offset-m3" action="cadastar_categorias.php" method="POST">
		<div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite o nome da categoria" name="categorias" type="text" class="validate">
        </div>
    </div>
  <button class="waves-effect waves-light btn" type="submit" name="cadastrar"> Cadastrar</button>

	</form>
</div>
<?php /*Aqui termina o formulario de cadastro de categorias*/?>

<?php
if(isset($_POST['cadastrar'])){
    $categorias = $_POST['categorias'];
    $cadastro = "INSERT INTO categoria (categorias) VALUES ('$categorias')";
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