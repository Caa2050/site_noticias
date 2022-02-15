<?php
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");
$selecao = "SELECT * FROM noticias";
$resultado = mysqli_query($sql,$selecao);

/*Select feito para escolher a noticia para ser feita a edição*/
?>
<div class="row">
	<form class=" col s6 offset-m3" action="editar_noticias.php" method="POST">
	<div class="col s12 m7">
    <h4 class="header">Escolha uma noticia</h4>
    <div class="card horizontal">
      <div class="card-stacked">
        <div class="card-content">
          <select class="browser-default" name="idnoticia">
    <?php while($dados = mysqli_fetch_array($resultado)){?>
    <option value="<?php echo $dados['idnoticia'];?>"><?php echo $dados['nome'];?></option>
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
require_once("../footer.php");
?>