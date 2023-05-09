<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
  $_SESSION['msg'] = "Área restrita";
  header("Location: ../../login.php");
}

$sqlor = "SELECT * FROM orcamentos o
inner join clientes cl on o.orcamento_cliente = cl.cliente_id
inner join equipamentos eq on o.orcamento_equipamento = eq.equipamento_id
inner join marcas mc on eq.equipamento_id_marca = mc.marca_id
inner join modelos md on eq.equipamento_modelo = md.modelo_id


where o.orcamento_os = $id   ";
$exeor = mysqli_query($conn, $sqlor);
$orcamento = mysqli_fetch_array($exeor);

?>
<!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<!-- INICIO DADOS INICIAIS -->
<style>
  .container {
    max-width: 450px;
  }

  .imgGallery img {
    padding: 8px;
    max-width: 100px;
  }
</style>




<div class="row">



  <!--Inicio Formulario-->
  <div class="row">

    <h4 class="mb-sm-0">Técnica / OS / ORÇAMENTOS</h4>
    <div class="row gy-3">
      <div class="card">
        <div class="card-body">

          <div class="row">

            <h4>Detalhes</h4>


            <div class="row gy-3">

              <div class="col-lg-12">
                <div>

                  <strong> Cliente:</strong> <?php echo $orcamento[cliente_fantasia] ?> <br>
                  <strong> Equipamento:</strong> <?php echo $orcamento[equipamento_nome] ?> <strong> Marca: </strong> <?php echo $orcamento[marca_nome] ?> <strong> Modelo: </strong> <?php echo $orcamento[modelo_nome] ?>
                  <strong> Porta: </strong> <?php echo $orcamento[equipamentos_porta] ?> <strong> Paradas: </strong> <?php echo $orcamento[equipamentos_paradas] ?> <br>

                  <strong>Produtos</strong>



                  <?php
                  $pattern = '/(?<=\[)(\d+(,\d+)*)(?=\])/';
                  preg_match_all($pattern, $orcamento['orcamento_produtos'], $produtos);
                  $produtos = explode(",", $produtos[0][0]);

                  for ($i = 0; $i < count($produtos); $i++) {
                    $sql_produto = "SELECT * FROM produtos WHERE produto_id = $produtos[$i]";
                    $exe = mysqli_query($conn, $sql_produto);
                    $produto = mysqli_fetch_array($exe);
                    echo $produto['produto_nome'] . "<br>";

                    preg_match_all($pattern, $produto['produto_fornecedores'], $fornecedores);
                    if (count($fornecedores) > 0) {
                      $fornecedores = explode(",", $fornecedores[0][0]);
                      for ($j = 0; $j < count($fornecedores); $j++) {
                        array_push($lista_fornecedores, $fornecedores[$j]);
                      }
                    }
                    //FORNECEDORES NO ARRAY $lista_fornecedores
                  }


                  ?>

                  <br>


                </div>
              </div>


              <div class="col-lg-6">
                <div>
                  <label class="form-label mb-0">Fornecedores</label><br>
                  <select class="selectpicker form-control" name="fornecedor[]" multiple data-live-search="true">
                    <?php

                    $sqlaca = "SELECT * FROM fornecedores   ";
                    $exeaca = mysqli_query($conn, $sqlaca);
                    while ($categoria = mysqli_fetch_array($exeaca)) {


                    ?>
                      <option value="<?php echo $categoria['fornecedor_id'] ?>"><?php echo $categoria['fornecedor_nome'] ?> </option>



                    <?php


                    }
                    ?>
                  </select>
                </div>

              </div>

              <div class="col-lg-6">
                <div>
                  <label class="form-label mb-0">Aplicações</label><br>

                  <select class="selectpicker form-control" name="aplicacao[]" multiple data-live-search="true">
                    <?php

                    $sqlaca = "SELECT * FROM marcas m inner join modelos mo ON m.marca_id = mo.modelo_marca order by mo.modelo_marca  ";
                    $exeaca = mysqli_query($conn, $sqlaca);
                    while ($categoria = mysqli_fetch_array($exeaca)) {


                    ?>
                      <option value="<?php echo $categoria['modelo_id'] ?>"><?php echo $categoria['marca_nome'] ?> - <?php echo $categoria['modelo_nome'] ?> </option>



                    <?php


                    }
                    ?>
                  </select>
                </div>
              </div>



              <div class="col-lg-6">
                <div>
                  <label class="form-label mb-0">Tipo</label>
                  <?php // listando usuaris 

                  echo "<SELECT NAME='tipo' SIZE='1' class='form-control'>

<OPTION VALUE='' SELECTED>Escolha ";
                  // Selecionando os dados da tabela em ordem decrescente
                  $sql = "SELECT * FROM tipos_produtos  ORDER BY nome_tipo_produtos";
                  // Executando $sql e verificando se tudo ocorreu certo.
                  $resultado = mysqli_query($conn, $sql);
                  //Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
                  while ($linha = mysqli_fetch_array($resultado)) {
                    echo "<OPTION VALUE='" . $linha['id_tipo_produto'] . "'>" . utf8_encode($linha['nome_tipo_produtos']);
                  }
                  echo "</SELECT>";

                  ?>
                </div>

              </div>

              <div class="col-lg-6">
                <div>
                  <label class="form-label mb-0">NCM</label>
                  <input name="ncm" type="text" class="form-control" id="fantasia">
                </div>

              </div>

              <div class="col-lg-6">
                <div>
                  <label class="form-label mb-0">Local no estoque</label>
                  <?php // listando usuaris 

                  echo "<SELECT NAME='localestoque' SIZE='1' class='form-control'>

<OPTION VALUE='' SELECTED>Escolha ";
                  // Selecionando os dados da tabela em ordem decrescente
                  $sql = "SELECT * FROM local_estoque  ORDER BY nome_local_estoque";
                  // Executando $sql e verificando se tudo ocorreu certo.
                  $resultado = mysqli_query($conn, $sql);
                  //Realizando um loop para exibi&ccedil;&atilde;o de todos os dados 
                  while ($linha = mysqli_fetch_array($resultado)) {
                    echo "<OPTION VALUE='" . $linha['id_local_estoque'] . "'>" . utf8_encode($linha['nome_local_estoque']);
                  }
                  echo "</SELECT>";

                  ?>
                </div>

              </div>

              <div class="col-lg-6">
                <div>
                  <label class="form-label mb-0">Estoque minimo</label>
                  <input name="estoqueminimo" type="text" class="form-control" id="fantasia">
                </div>

              </div>

              <div class="col-lg-6">
                <div>
                  <label class="form-label mb-0">Valor Venda</label>
                  <input name="venda" type="text" class="form-control money" id="fantasia">
                </div>

              </div>

              <div class="col-lg-6">
                <div>
                  <label class="form-label mb-0">Valor Compra</label>
                  <input name="compra" type="text" class="form-control money" id="fantasia">
                </div>

              </div>




            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>









<button class="btn btn-primary"> Cadastrar </button> <br><br>

</form>

</div>
</div>
</div>
</div>
</div>