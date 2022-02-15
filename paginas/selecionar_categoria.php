<?php
session_start();
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");
$selecao = "SELECT * FROM categoria";
$resultado = mysqli_query($sql,$selecao);


?>
<div class="row">
	<form class=" col s6 offset-m3" action="selecionar_categoria.php" method="POST">
	<div class="col s12 m7">
    <h4 class="header">Escolha uma Categoria</h4>
    <div class="card horizontal">
      <div class="card-stacked">
        <div class="card-content">
          <select class="browser-default" name="idcategoria">
    <option value="" disabled selected>Escolha a Categoria</option>
    <?php while($dados = mysqli_fetch_array($resultado)){?>
    <option value="<?php echo $dados['idcategoria'];?>"><?php echo $dados['categorias'];?></option>
  <?php }?>
  </select>
  <br>
  		<button class="btn waves-effect waves-light" type="submit" name="selecionar">Selecionar
  </button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<?php
if(isset($_POST['selecionar'])){
  
}
require_once("../footer.php");
?>