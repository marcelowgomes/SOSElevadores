<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}


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
                               
                                    <h4 class="mb-sm-0">Técnica /  Controle de OS</h4>
                                    <div class="row gy-3">  

                                     <div align="right">  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Abrir Nova OS
</button>   </div>       

                                <div class="card">
									 <div class="card-body"> 
                               
										 <div class="row">

											 <h4>OS Abertas</h4>
											
											 
                                                  
												 
                                                

												  </div> </div> </div> </div> </div> </div></div>
								
		

				
				
		
		
		
			
								
								
								</div></div></div>		</div></div>
								
					
							

								
     
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Abrir Nova OS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <label>Cliente</label>
     
    <select name="cliente" id="cliente-select" required class="form-control">
    <option value="">Informe</option>
    
    <?php
$sql = "SELECT * FROM clientes WHERE cliente_lixeira ='1'  ORDER BY cliente_fantasia";
$resultado = mysqli_query($conn, $sql);
while ($linha = mysqli_fetch_array($resultado)) { ?>
    <option value="dog"><?php echo $linha[cliente_fantasia] ?></option>
    <?php } ?>
</select>


        <label>Tipo</label>
        <input class="form-control"> 

        <label>Informações Adicionais </label>
   
        <textarea class="form-control" id="story" name="story" rows="5" cols="33"></textarea>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
</form>
    </div>
  </div>
</div>