<?php
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");

?>
<?php /*Inicio da barra de pesquisa*/ ?>
<div class="row">
  <form class="col s6 offset-m3" action="pesquisa.php" method="POST">
        <div class="input-field">
          <input name="search" type="search" required> 
          <i class="material-icons">close</i>
          <button class="btn waves-effect waves-light" type="submit" name="pesquisar">Buscar</button>
        </div>
 </form>
</div>
<?php /*Fim da barra de pesquisa*/ ?>

<div class="divider"></div>
<?php /*Parte com as novas noticias*/ ?>

<?php

$verificar_noticias = "SELECT * FROM noticias";
$resultado_da_verificacao = mysqli_query($sql,$verificar_noticias);
if(mysqli_num_rows($resultado_da_verificacao) == 0){


?>
<h4 class="center-align">Não há novas noticias</h4>
<?php }
else{?>
<h4 class="center-align"> Novas Noticias</h4>
<div class="row">
  <div class="row">
    <?php
        $consulta = "SELECT * FROM noticias";
        $resultado = mysqli_query($sql,$consulta);
        while($dados = mysqli_fetch_array($resultado)):

    ?>
    <div class="col s12 m3">
      <div class="card white">
        <div class="card-content black-text">
          
          <span class="card-title"><?php echo $dados['nome'];?></span>
        </div>
        <?php /*Aqui mando o id da noticia para a pagina ver_noticia.php */ ?>
        <div class="card-action purple darken-3">
          <a href="ver_noticia.php?id=<?php echo $dados['idnoticia'];?>">Ver Mais</a>
        </div>
      </div>
    </div>
  <?php endwhile;?>
  </div>
</div>

<?php
}
require_once("../footer.php");
?>
