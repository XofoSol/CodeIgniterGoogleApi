<?php

require_once 'vendor/Google/Client.php';

/**
 * XofoGoogleApi
 * Librería para conexión al API de Google desde CodeIgniter.
 * @version 0.1.0
 * @author Rodolfo Solórzano
 */
class XofoGoogleMasterApi {

	private $client;
	private $service;
	/**
	 * __construct
	 * @param array $config  -  Parámetros de configuración.  Debe incluir el apikey, el secret y el servicio que se desea consultar.
	 */
	function __construct(array $config) {
		if (!$config['service']) {
			throw new Exception("Debes incluir el servicio que quieres consultar", 1);
			
		}
		if (!$config['apikey']) {
			throw new Exception("Debes incluir el api key de tu aplicación", 1);
			
		}
		if (!$config['client_id']) {
			throw new Exception("Debes incluir el client id de tu aplicación", 1);
			
		}
		if (!$config['secret']) {
			throw new Exception("Debes incluir el client secret de tu aplicación", 1);
			
		}
		if (!$config['redirect_uri']) {
			throw new Exception("Debes incluir el redirect uri de tu aplicación", 1);
			
		}
		if (!$config['scopes']) {
			throw new Exception("Debes incluir el scope de tu aplicación", 1);
			
		}
		session_start();
		$this->client = new Google_Client();
		$this->client -> setClientId($config['client_id']);
		$this->client -> setClientSecret($config['secret']);
		$this->client -> setRedirectUri($config['redirect_uri']);
		$this->client -> setDeveloperKey($config['apikey']);
		$this->client -> setScopes($config['scopes']);
		$this->client -> setUseObjects(true);

		// Iniciamos autenticación
		
		// Si tenemos un código, solicitamos el access token
		if (isset($_GET['code'])) {
			$this->client -> authenticate();
			$_SESSION['token'] = $this->client -> getAccessToken();
			$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
			header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		}
		
		// Si tenemos un access token en sesion, lo utilizamos
		if (isset($_SESSION['token'])){
			$this->client->setAccessToken($_SESSION['token']);
		}
		
	}

}
