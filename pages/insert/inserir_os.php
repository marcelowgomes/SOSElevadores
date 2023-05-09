<?php
//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}


$conn->query($insert = "INSERT INTO os (os_tipo,os_cliente,os_usuario,os_consideracoes,os_solicitante)
VALUES ('$_POST[tipo]','$_POST[cliente]','$iduser','$_POST[consideracoes]','$_POST[solicitante]')");


	//$ultimo_id = $conn->insert_id;
//echo $insert;

?>

<script>
alert("OS Aberta com sucesso!");
window.location.href = "tela_cliente/<?php echo $_POST[cliente] ?> ";

</script>