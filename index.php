<html>
    <body>
<?php

if(isset($_POST['enviar-formulario'])):
   
    $formatosPermitidos = array("png", "jpeg", "jpg", "gif");
    $quantidade = count($_FILES['arquivo']['name']);
    $contador = 0;
    
    while ($contador < $quantidade):
    $extensao = pathinfo($_FILES['arquivo']['name'] [$contador], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatosPermitidos)):
        $pasta = "arquivos/";
        $temporario = $_FILES['arquivo']['tmp_name'][$contador];
        $NovoNome =  uniqid()."$extensao";
        if(move_uploaded_file($temporario, $pasta.$NovoNome)):
            $mensagem = "Upload feito com sucesso ";
        else: 
            $mensage = "Erro, não foi possível fazer o upload";
        endif;
    else:
            $mensagem =  "Formato inválido";
endif;
echo $mensagem;
endwhile;

endif;
?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"      method="POST" enctype="multipart/form-data">
    
    <input type="file" name="arquivo[]" multiple><br>
    <input type="submit" name="enviar-formulario">
    </form>

    </body>
  



</html>  

