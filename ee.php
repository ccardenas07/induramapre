<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
#menu{
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	-webkit-box-shadow:1px 1px 3px #888;
	-moz-box-shadow:1px 1px 3px #888;
}
#menu li{border-bottom:1px solid #FFF;}
#menu ul li, #menu li:last-child{border:none}	
a{
	display:block;
	color:#FFF;
	text-decoration:none;
	font-family:'Helvetica', Arial, sans-serif;
	font-size:13px;
	padding:3px 5px;
	text-shadow:1px 1px 1px #325179;
}
#menu a:hover{
	color:#F9B855;
	-webkit-transition: color 0.2s linear;
}
#menu ul a{background-color:#6594D1;}
#menu ul a:hover{
	background-color:#FFF;
	color:#2961A9;
	text-shadow:none;
	-webkit-transition: color, background-color 0.2s linear;
}
ul{
	display:block;
	background-color:#2961A9;
	margin:0;
	padding:0;
	width:500px;
	list-style:none;
}
#menu ul{background-color:#6594D1;}
#menu li ul {display:none;}

div.informacion
{
	width:600px;
	height:0px;
	/*min-height:180px;*/
	background-color:#f5f5f5;
	/*overflow:hidden;*/

	-webkit-transition:height 0.2s;
       overflow-y: auto;
	font-size:14px;
	text-align:justify;
	/*font-weight: bold;*/
}
p.informacion
{
	margin:20px;
	text-align:justify;
	color:#00529b;
        
	
}
</style>
<script type="text/javascript" charset="utf-8">
$(function(){
	$('#menu li a').click(function(event){
		var elem = $(this).next();
		if(elem.is('ul')){
			event.preventDefault();
			$('#menu ul:visible').not(elem).slideUp();
			elem.slideToggle();
		}
	});
});
</script>
<head>
<body> 
<ul id="menu">
<li><a href="#">1. ¿Qué hago compré un refrigerador y enfría/ congela demasiado?</a>
	<ul>
		<li>
        <a href="#">
        <div class="informacion">
    	<center>NF</center>
		<p class="informacion">
• Si la zona que enfría demasiado es en el chilled room esto es normal ya que sirve para conservar carnes y embutidos.<br />
• Verificar posición de control de temperatura.</p>
<center>DF</center>
<p class="informacion">
• Verificar si se encuentra colocada la bandeja de descongelamiento y de carnes entre el congelador y el refrigerador.<br/>
-Si el producto se encuentra con pocos alimentos bajar el control de temperatura.</p>
<center>BIOACTIVO</center>
<p class="informacion">
• Verificar que no existan alimentos que no se encuentren en contacto con la parte posterior de la nevera. 
 </p>
        
        </a>
        
        </li>
		
	</ul>
</li>
<li><a href="#">2. ¿Compre un refrigerador y no enfría /no congela?</a>
	<ul>
		<li><a href="#">Submenu 1</a></li>
		<li><a href="#">Submenu 2</a></li>
		<li><a href="#">Submenu 3</a></li>
		<li><a href="#">Submenu 4</a></li>
	</ul>
</li>
<li><a href="#">3. ¿Por qué se dan los goteos de agua?</a>
	<ul>
		<li><a href="#">Submenu 1</a></li>
		<li><a href="#">Submenu 2</a></li>
		<li><a href="#">Submenu 3</a></li>
		<li><a href="#">Submenu 4</a></li>
	</ul>
</li>
<li><a href="#">4. ¿Uso del  touch pad?</a>
	<ul>
		<li><a href="#">Submenu 1</a></li>
		<li><a href="#">Submenu 2</a></li>
		<li><a href="#">Submenu 3</a></li>
		<li><a href="#">Submenu 4</a></li>
	</ul>
</li>

<li><a href="#">5. ¿Los quemadores de mi cocina no encienden?</a>
	<ul>
		<li><a href="#">Submenu 1</a></li>
		<li><a href="#">Submenu 2</a></li>
		<li><a href="#">Submenu 3</a></li>
		<li><a href="#">Submenu 4</a></li>
	</ul>
</li>
<li><a href="#">6. ¿Mi horno no enciende qué hago?</a>
	<ul>
		<li><a href="#">Submenu 1</a></li>
		<li><a href="#">Submenu 2</a></li>
		<li><a href="#">Submenu 3</a></li>
		<li><a href="#">Submenu 4</a></li>
	</ul>
</li>
<li><a href="#">Menu sin submenu</a></li>
</ul>
</body>
</html>
</body>
</html>