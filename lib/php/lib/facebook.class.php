    <?php  
    require_once 'facebook.php';  
      
    /** 
     * Clase para facilitar el trabajo con Facebook. Proporciona métodos para 
     * publicar imágenes en un álbum, notas en el muro, y eventos 
     * 
     * Ejemplos de uso: 
     * $fb = new Fb(); 
     * $fb->publicarNota('Prueba'); 
     * $fb->publicarImagen('/home/zootropo/html/imagenes/mi-imagen.jpg'); 
     * $fb-gt;publicarEvento('Prueba de evento', 'Descripción del evento', '2011-03-08'); 
     */  
    class Fb {  
        const ID_APP = '397987133545320';  
        const SECRETO = 'f829e6bbabe9e6455fcbdb734e36e451';  
        const ACCESS_TOKEN = 'AAAFp95m4W2gBANFShWKxBToJ1vCHTgYsmFMZCBkU6R9uZCJy639XE12SocGppA4NvWU0010fgGxeZAYBVEKAl1ZALmEJquVdmb5IgKM5MnRuQpP9QP3x';  
        const ID_ALBUM = 'ID ALBUM';  
        const ID_PAGINA = 'ID PAGINA';  
        private $fb;  
      
        /** 
         * Constructor de la clase. Crea el objeto Facebook que utilizaremos 
         * en los métodos que interactúan con la red social 
         */  
        function __construct() {  
            $this->fb = new Facebook(array(  
              'appId'  => self::ID_APP,  
              'secret' => self::SECRETO,  
              'cookie' => true  
            ));  
        }  
      
        /** 
         * Publica un evento 
         * @param string $titulo Título del evento 
         * @param string $descripcion Descripción del evento 
         * @param string $inicio Fecha o fecha y hora de inicio del evento, en formato ISO-8601 o timestamp UNIX 
         * @return bool Indica si la acción se llevó a cabo con éxito 
         */  
        function publicarEvento($titulo, $descripcion, $inicio) {  
            $params = array(  
                'access_token' => self::ACCESS_TOKEN,  
                'name' => $titulo,  
                'description' => $descripcion,  
                'start_time' => $inicio,  
            );  
            $res = $this->fb->api('/'.self::ID_PAGINA.'/events', 'POST', $params);  
            if(!$res or $res->error)  
                return false;  
      
            return true;  
        }  
      
        /** 
         * Publica una nota en el muro de la página 
         * @param string $mensaje 
         * @return bool Indica si la acción se llevó a cabo con éxito 
         */  
        function publicarNota($mensaje) {  
            $params = array(  
                'access_token' => self::ACCESS_TOKEN,  
                'message' => $mensaje  
            );  
            $res = $this->fb->api('/'.self::ID_PAGINA.'/feed', 'POST', $params);  
            if(!$res or $res->error)  
                die($res);
                return false;  
      
            return true;  
        }  
      
        /** 
         * Publica una imagen en el álbum de la página 
         * @param string $ruta Ruta absoluta a la imagen en nuestro servidor 
         * @param string $mensaje Mensaje a mostrar en el muro, si queremos avisar 
         * de la subida de la imagen 
         * @return bool Indica si la acción se llevó a cabo con éxito 
         */  
        function publicarImagen($ruta, $mensaje='') {  
            $this->fb->setFileUploadSupport(true);  
      
            $params = array(  
                'access_token' => self::ACCESS_TOKEN,  
                'source' => "@$ruta"  
            );  
            if($mensaje) $params['message'] = $mensaje;  
      
            $res = $this->fb->api('/'.self::ID_ALBUM.'/photos', 'POST', $params);  
            if(!$res or $res->error)  
                return false;  
      
            return true;  
        }  
		/*
		 * Postea un mensaje en el muro 
		 * @param string $idFacebook identificativo del usuario de facebook
		 * @param array $params conteniendo los parametros para generar el mensaje
		 * @return boolean true si se envio el posteo o false si no  
		 */
		function publicarMuro($idFacebook,$params)
		{
			/*
			 * @params array tiene la estructura:
			 * 'mensaje' => el texto del mensaje que se desea mostrar
			 * 'link' => la dir url a donde se dirige el usuario al darle click al post "https://apps.facebook.com/..."
			 * 'picture' => la dir url de una magen que deseemos mostrar en el post max 90 x 90 "http://www.matte.cg/mae/img/radioButtonSexo.png"
			 * 'name' => el texto que representa el link
			 * 'caption' => informacion que va debajo del link
			 * 'description' => informacion que va debajo de caption 
			*/ 
			/*$params = array('message' => $params['mensaje'], 
							'link' => $params['link'],
							'picture' => $params['pathImg'], 
							'name' => $params['name'],
							'caption' => $params['caption'],
							'description' => $params['description']);
			*/
			$res = $this->fb->api('/'.$idFacebook.'/feed', 'post', $params);
			if (!$res or $res -> error)
			{
				//si hubo error
				die($res);
				return FALSE;
			}
			else
			{
				//si no hubo error 
				return TRUE;
			}
		}
		/*
		 * obtine los datos de los amigos del usuario logeado
		 * @param string $idFacebook identificativo de usuario de facebook
		 * @return array con los datos de los amigos 
		 */
		function amigosUsuarioFacebook($idfacebook)
		{
			try 
			  {
			  	//optengo array de amigos
				$myFriends = $this->fb->api($idfacebook."/friends");
				//recorro el array para obtener los arrays con los datos de cada amigo
				foreach ($myFriends['data'] as $friend)
				{
					$datosFriends[$friend['id']] = array('first_name' => $friend['first_name'],'last_name' => $friend['last_name']);
				}
			  }catch (FacebookApiException $e) 
			  {
				// Aqui escribe tus propias funciones para capturar el error de la excepcion "$e"
				var_dump($e);
			  }	
			  return $datosFrinds;	
		}
    }  