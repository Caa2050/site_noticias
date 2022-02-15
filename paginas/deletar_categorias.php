<?php
session_start();
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");

if(isset($_POST['selecionar'])){
  $idcategoria = $_POST['idcategoria'];
  $buscar = "SELECT * FROM categoria WHERE idcategoria = '$idcategoria'";
  $resultado_bucar = mysqli_query($sql,$buscar);
  $dados_categoria = mysqli_fetch_array($resultado_bucar);
}
?>
<?php /*Aqui começa o formulario de confirmação de exclusão*/?>
<h4 class="center-align"><?php echo $dados_categoria['categorias'];?></h4>
<div class="row">
  <h5 class="center-align">Tem certeza que deseja excluir essa categoria?</h5>
  <form class=" col s6 offset-m3" action="deletar_categorias.php" method="POST">
    <input type="hidden" name = "id" value="<?php echo $dados_categoria['idcategoria'];?>">
    <center>
           <button type="submit" name="Deletar" class="btn green">Confirmar</button>
            <button type="submit" name="Cancelar" class="btn red">Cancelar</button>
          </center>
  <br>
  
  </form>
</div>
<?php /*Aqui terminaa o formulario de confirmação de exclusão*/?>
<?php
if (isset($_POST['Deletar'])) {
  $categoria = $_POST['categorias'];

  $id = mysqli_escape_string($sql,$_POST['id']);
  $deletar = "DELETE FROM categoria WHERE idcategoria = '$id'";

  if(mysqli_query($sql,$deletar)){
    header('Location:home.php');
  }
  else{
    print("<script type= 'text/javascript'> alert ('Não foi possivel atualizar!!!');</script>");
  }
}
require_once("../footer.php");
?>