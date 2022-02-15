<?php
session_start();
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");

if(isset($_POST['selecionar'])){
  $idcategoria = $_POST['idcategoria'];
  $editar = "SELECT * FROM categoria WHERE idcategoria = '$idcategoria'";
  $resultado_editar = mysqli_query($sql,$editar);
  $dados_categoria = mysqli_fetch_array($resultado_editar);
}
?>
<?php /*Aqui começa o formulario de edição*/?>
<h4 class="center-align">Editar Categorias</h4>
<div class="row">
  <form class=" col s6 offset-m3" action="editar_categorias.php" method="POST">
    <input type="hidden" name = "id" value="<?php echo $dados_categoria['idcategoria'];?>">
    <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite o nome da categoria" name="categorias" type="text" class="validate" value="<?php echo $dados_categoria['categorias'];?>">
        </div>
    </div>
  <br>
  
  <button class="waves-effect waves-light btn" type="submit" name="Salvar">Salvar Alterações</button>

  </form>
</div>
<?php /*Aqui termina o formulario de edição*/?>

<?php
if (isset($_POST['Salvar'])) {
  $categoria = $_POST['categorias'];

  $id = mysqli_escape_string($sql,$_POST['id']);
  $atualizar = "UPDATE categoria SET categorias = '$categoria' WHERE idcategoria = '$id'";

  if(mysqli_query($sql,$atualizar)){
    header('Location:home.php');
  }
  else{
    print("<script type= 'text/javascript'> alert ('Não foi possivel atualizar!!!');</script>");
  }
}
require_once("../footer.php");
?>