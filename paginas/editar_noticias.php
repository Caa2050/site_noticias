<?php
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");

if(isset($_POST['selecionar'])){
	$idnoticia = $_POST['idnoticia'];
	$editar = "SELECT * FROM noticias WHERE idnoticia = '$idnoticia'";
	$resultado_editar = mysqli_query($sql,$editar);
	$dados_noticia = mysqli_fetch_array($resultado_editar);
}
?>
<?php /*Aqui começa o formulario de edição */?>
<div class="row">
      <div class="col s12 m6 push-m3">
        <h3>Editar Noticias</h3>
        <form action="editar_noticias.php" method="POST">
          <input type="hidden" name = "id" value="<?php echo $dados_noticia['idnoticia'];?>">
          <div class="input-field col s6">
            <input type="text" name="nome" value= "<?php echo $dados_noticia['nome'];?>">
          </div>
          <div class="input-field col s6">
            <input type="text" name="descricao" id="nome" value= "<?php echo $dados_noticia['descricao'];?>">
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
          <button type= "submit"name="btn-editar" class="btn">Atualizar</button>
        </form>
        </div>
      </div>

<?php /*Aqui termina o formulario de edição*/?>

<?php
if (isset($_POST['btn-editar'])) {
	$nome = mysqli_escape_string($sql,$_POST['nome']);
  $descricao = mysqli_escape_string($sql,$_POST['descricao']);
  $categoriafk = mysqli_escape_string($sql,$_POST['categoriafk']);
  $idnoticia = mysqli_escape_string($sql,$_POST['id']);
  $atualizacao = "UPDATE noticias SET nome ='$nome',descricao= '$descricao',categoriafk = '$categoriafk' WHERE idnoticia = '$idnoticia'";

if (mysqli_query($sql,$atualizacao)) {
    header('Location:home.php');
  }
  else{
     print("<script type = 'text/javascript'> 
        alert('Não foi possive realizar o cadastro!!!');</script>");
  }
}
require_once("../footer.php");
?>