<?php 
session_start();
//require_once("conexion/Coneccion.php");
require_once 'lib/config_face.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--        <link rel="stylesheet" type="text/css" href="css/style.css">-->
		<title>Trivia</title>
        <script src="https://connect.facebook.net/en_US/all.js#appId=325858467570372&amp;xfbml=1"></script>
        <script type="text/javascript">
			FB.Canvas.setSize({ width: 790, height: 1000 });
			FB.Canvas.setAutoGrow( { width: 790, height: 1000 });       
		</script>
<style type="text/css">
     /*   body{
         
			background:url(images/1_back_instrucciones.jpg);
			width:790px;
			height:800px;
			background-repeat:no-repeat;
        }*/
        .facebook_friends{
            margin: 630px 0px 0px 610px;
            border-radius: 6px;
            border: 0px;
            border-radius: 5px;
            color: #fbfbfb;
            width: 150px;
			height: 52px;
			
         
            cursor: pointer;
			/*background-image:url(images/btn_continuar1.png);*/
			background-repeat:no-repeat;
			background-position:center;
			
			
        }
		  .facebook_friends:hover{
            margin: 630px 0px 0px 610px;
            border-radius: 6px;
            border: 0px;
            border-radius: 5px;
            color: #fbfbfb;
            width: 150px;
			height: 52px;
			
         
            cursor: pointer;
			/*background-image:url(images/btn_continuar1.png);*/
			background-repeat:no-repeat;
			background-position:center;
			
			
        }
    </style>	
    
    </head>
	
	<body >
	  
        
		<? require('../../utils/srcfb/facebook.php');
	    $app_id = "325858467570372";
		$app_secret = "027bbc0b81db8e1fd348a9e9d49bd6fd";
			
			$facebook = new Facebook(array(
			'appId' => $app_id,
			'secret' => $app_secret,
			'cookie' => true
			));
			
$signed_request = $facebook->getSignedRequest();
			function parsePageSignedRequest() {
				if (isset($_REQUEST['signed_request'])) {
					$encoded_sig = null;
					$payload = null;
					list($encoded_sig, $payload) = explode('.', $_REQUEST['signed_request'], 2);
					$sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
					$data = json_decode(base64_decode(strtr($payload, '-_', '+/'), true));
					return $data;
				}
				return false;
			}
			 ?>
				
 <?php
   	  
$canvas_page = "https://apps.facebook.com/$appName/";
$scope = 'publish_stream,email,user_birthday,user_likes';
$auth_url = "https://www.facebook.com/dialog/oauth?client_id=" . $appId . "&redirect_uri=" . urlencode($canvas_page) . "&scope=" . $scope;
$signed_request = $_REQUEST["signed_request"];
list($encoded_sig, $payload) = explode('.', $signed_request, 2);
$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
if (empty($data["user_id"])) 
{
    echo("<script> top.location.href='" . $auth_url . "'</script>");
   	
}
else
{


echo("<script> top.location.href='" . $urlredirecs . "'</script>");

}
$objetoUser = $facebook->api('/me');
//Objeto de facebook
//Iniciamos las variables de sesión
foreach ($objetoUser as $key => $value)
{
   // echo '<strong>' . $key . '</strong> => ' . $value . '<br />';
//                                        if ($key == 'username') {
//                                            $_SESSION['username'] = $value;
//                                        }
    if ($key == 'id') {
        $_SESSION['idFacebook'] = $value;
//                                            $_SESSION['image'] = 'https://graph.facebook.com/'.$value.'/picture';
    }
    if ($key == 'email') {
        $_SESSION['email'] = $value;
    }
    if ($key == 'first_name') {
        $_SESSION['nameface'] = (string) $value;
    }
    if ($key == 'last_name') {
        $_SESSION['lastface'] = $value;
    }
}
/*try{
    $sql="SELECT * FROM usuarios where user_fb='".$_SESSION['idFacebook']."' LIMIT 1";
    $result=mysql_query($sql,Coneccion::con());
    if (!$result)
    {
        die('Error conslta: ' . mysql_error($sql,Coneccion::con()));
    }
    $row = mysql_fetch_array($result);
    if(!$row)
    {
        $sql="INSERT INTO usuarios (id,user_fb, nombre, email)
        VALUES
        (null,'".$_SESSION['idFacebook']."',
        '".$_SESSION['nameface']." ".$_SESSION['lastface']."',
        '".$_SESSION['email']."')";
        $res=mysql_query($sql,Coneccion::con());
        if (!$res)
        {
          die('Error insercion: ' . mysql_error(Coneccion::con()));
        }
//        echo("<script> top.location.href='" . $urlredirecs . "'</script>");                        
    }
} catch(Exception $e) {
echo '<script language="JavaScript"> alert("error no se pudo ingresar"); </script>';
}*/
?>
<div  >

</div>
		
	</body>
</html>