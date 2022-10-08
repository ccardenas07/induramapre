<?php
require_once('conexion/Trabajo.php');
if(isset($_POST)) 
       
{
     if($_POST["grabar"]=="si")
     {
        ($_POST);
   $id=new Trabajo();
$idu=$id->consultaidusu(); /*
$id->insertusuariop();
exit;*/}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js" ></script>

<script type="text/javascript" src="js/funciones.js"></script>

<script type="text/javascript" src="js/jquery.min.js"></script>     

<script type="text/javascript" src="js/validCampoFranz.js"></script>

<script type="text/javascript">

            $(function(){

                //Para escribir solo letras

                $('#minombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');

				$('#miapellido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');

				$('#miciudad').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');

                //Para escribir solo numeros    

                $('#micel').validCampoFranz('0123456789'); 

				 $('#micedula').validCampoFranz('0123456789'); 

				  $('#miedad').validCampoFranz('0123456789');   

            });

        </script>      
<title>Poema</title>
<script type="text/javascript">
function calcular()
{
	/*document.getElementById('total').innerHTML=document.form.texto.value.length;*/
	document.getElementById('total').innerHTML=2000-document.form.texto.value.length;
}
</script>
</head>

<body>
<img src="images/03_app_poema_subir.jpg" width="790px" height="800px" />
<div id="contenedor">
    <form name="form" action="poema.php" method="post">
<div class="lnombre">Nombres Completos:</div>
<div class="nombre"><input type="text" size="35px" id="minombre" name="nom" /></div>
<div class="lcel">N&uacute;mero Celular:</div>
<div class="cel"><input type="text" size="35px" id="micel" name="cel"/></div>
<div class="lciu">Ciudad:</div>
<div class="ciudad"><input type="text" size="35px" id="miciudad" name="ciudad"/></div>
<div class="lpoema">Tu Poema</div> 
<div class="poema">
<textarea  name="texto" cols="10" rows="30" onkeypress="calcular();" onkeyup="calcular();" style="width: 240px; height: 168px;" maxlength='2000' >
</textarea >

<br />
<div class="mensaje">le quedan <span id="total">2000</span> de 2000 caracteres</div>
</div>
<div class="btnform">
<input type="hidden" name="grabar" id="grabar"  value="si" />    
<input type="hidden" name="userfb" value="<?php echo $idu[0]["user_fb"]?>" />
<a href="#"  onclick="document.form.submit();"><img src="images/btn_enviar.png" width="89px" height="30px" /> </a>
</div>
</form>
</div>
</body>
</html>