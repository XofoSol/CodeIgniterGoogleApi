<?php

require_once 'Google/Client.php';

/**
 * XofoGoogleApi
 * Librería para conexión al API de Google desde CodeIgniter.
 * @version 0.1.0
 * @author Rodolfo Solórzano
 */
class XofoGoogleApi{
		
	/**
	 * __construct
	 * @param array $config  -  Parámetros de configuración.  Debe incluir el apikey, el secret y el servicio que se desea consultar.
	 */
	function __construct(array $config) {
		if(!$config['service']){
			show_error('Debes incluir el servicio que deseas consultar.',500);
			exit;
		}
		if(!$config['apikey']){
			show_error('Debes incluir el apikey de tu aplicación.',500);
			exit;
		}
		if(!$config['client_id']){
			show_error('Debes incluir el client_id de tu aplicación.',500);
			exit;
		}
		if(!$config['secret']){
			show_error('Debes incluir el secret de tu aplicación.',500);
			exit;
		}
		if(!$config['redirect_uri']){
			show_error('Debes incluir el redirect_uri de tu aplicación.',500);
			exit;
		}
		if(!$config['scopes']){
			show_error('Debes incluir el scopes de tu aplicación.',500);
			exit;
		}
		session_start();
		require_once 'Google/Service/'.$config['service'];
		$client = new Google_Client();
		$client->setClientId($config['client_id']);
		$client->setClientSecret($config['secret']);
		$client->setRedirectUri($config['redirect_uri']);
		$client->setDeveloperKey($config['apikey']);
		$client->setScopes($config['scopes']);
	}
}

