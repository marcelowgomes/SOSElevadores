<?php
include "database/conexao.php";

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DO USUARIO
$iduser = $_SESSION['user_id'];
$sqluser = "SELECT * FROM users WHERE user_id = '$iduser'";
$exeuser = mysqli_query($conn, $sqluser);




$conn->query($insert = "INSERT INTO fluxo_caixa (fluxo_caixa_valor, fluxo_caixa_data, fluxo_caixa_cliente, fluxo_caixa_colaboradores, fluxo_caixa_procedimento, fluxo_caixa_forma_pagamento, fluxo_caixa_quem, fluxo_caixa_emp) VALUES ('$_POST[valor]','$_POST[data]','$_POST[cliente]','$_POST[colaboradores]','$_POST[procedimento]','$_POST[pagamento]','$iduser','1')");




	
	//$ultimo_id = $conn->insert_id;


    ?>

<style>

.button {     
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;        
}

</style>
<body onload="sendForm();">
<button type="button" class="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="sa-departamento"></button>


                                                <!-- staticBackdrop Modal -->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
                                                                <lord-icon
                                                                    src="https://cdn.lordicon.com/lupuorrc.json"
                                                                    trigger="loop"
                                                                    colors="primary:#121331,secondary:#08a88a"
                                                                    style="width:120px;height:120px">
                                                                </lord-icon>
                                                                
                                                                <div class="mt-4">
                                                                    <h4 class="mb-3">Tudo certo!</h4>
                                                                    <p class="text-muted mb-4"> Cadastro realizado com sucesso.</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        
                                                                        <a href="" class="btn btn-success">Fechar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

<script>
	function sendForm() {
        $("#sa-departamento").click();
      } 	
		
		</script>