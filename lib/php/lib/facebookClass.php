<?php
/**
 * verificacion de usario al ingresar a la aplicacion, permite verificar si es "FAN" obtener la informacion necesaria del
 * usuario, registrar la misma, etc
 *
 * @author User
 */
require "facebook.php";
class facebookClass {
    /**VARIABLES PRIVADAS PARA USO DEL API FB.**/
    private $APPID;
    private $APPSECRET;
    private $APPNAME;
    private $IDPAGE;
    private $NOFANPAGE;
    /**FIN DE LA DECLARACION**/
    /**DECLARACION DE VARIABLES DE BDD LOCAL**/
    private $IP;
    private $USUARIO;
    private $PASSWORD;
    private $BD;
    /**FIN VARIABLES LOCALES**/
    /**CONSTRUCTOR**/
    public function __construct($appId,$appSecret,$appName,$idpage,$noFanPage,$ip="",$usuario="",$password="",$bd="") {
        /**ASIGNACION DE VARIABLES PRIVADAS**/
        $this->APPID = $appId;
        $this->APPSECRET = $appSecret;
        $this->APPNAME = $appName;
        $this->IDPAGE = $idpage;
        $this->NOFANPAGE = $noFanPage;
        /************************************/
        $this->IP = $ip;
        $this->USUARIO = $usuario;
        $this->PASSWORD = $password;
        $this->BD = $bd;
    }
    private function _verificarUsuario(){
        $canvas_page = "https://apps.facebook.com/".$this->APPNAME."/";
        $scope = 'publish_stream,email,user_birthday,user_likes';
        $auth_url = "https://www.facebook.com/dialog/oauth?client_id=".$this->APPID."&redirect_uri=".urlencode($canvas_page)."&scope=".$scope;
        $signed_request = $_REQUEST["signed_request"];
        list($encoded_sig, $payload) = explode('.', $signed_request, 2);
        $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
    }
    /**FIN CONSTRUCTOR**/
}

?>
