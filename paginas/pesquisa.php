<?php 
require_once("../header.php");
require_once("../menu.php");
require_once("../conexao_sql.php");
/*Essa parte é o sistema de pesquisa com palavras-chave! Essa parte foi um pouco complicada de fazer, já que essa é a primeira vez que faço um sistema de pesquisa com palavras-chave! Esse sistema abaixo eu aprendi no youtube, mas tem um problema: ele pode acabar duplicando os resultados da pesquisa.*/
if(isset($_POST['pesquisar'])){
  $search = $_POST['search'];
  $pesq = explode(' ', $search);
  $quant = count($pesq);


  for($i = 0; $i<$quant;$i++){
    $pesquisar = $pesq[$i];
    $busca = "SELECT * FROM noticias WHERE nome LIKE '%$pesquisar%'";
    $resultado = mysqli_query($sql,$busca);
    while ($dados = mysqli_fetch_array($resultado)) {
?>
<div class="row">
  <div class="row">
    <div class="col s12 m3">
      <div class="card white">
        <div class="card-content black-text">
          <span class="card-title"><?php echo $dados['nome'];?></span>
        </div>
        <div class="card-action purple darken-3">
          <a href="ver_noticia.php?id=<?php echo $dados['idnoticia'];?>">Ver Mais</a>
        </div>
      </div>
    </div>
  <?php }
}
}?>
  </div>
</div>