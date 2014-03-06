<?php

/**
 * XofoGoogleApi
 * Librería para conexión al API de Google desde CodeIgniter.
 * @version 0.1.0
 * @author Rodolfo Solórzano
 */
abstract class XofoGoogleMasterApi {

	protected $client;
	protected $service;
	
	/**
	 * __construct
	 * @param array $config  -  Parámetros de configuración.  Debe incluir el apikey, el secret y el servicio que se desea consultar.
	 */
	function __construct(array $config) {
		
		$CI =& get_instance();
		$CI->load->library("session");
		set_include_path(get_include_path().PATH_SEPARATOR.$config['gapi_path']);
		require_once 'Google/Client.php';
		$this->client = new Google_Client();
		$this->client->setApplicationName('Tracking Performance');
		$this->client->setScopes($config['scopes']);
		$this->client->setRedirectUri($config['redirect_uri']);
		$this->client->setClientId($config['client_id']);
		$this->client->setClientSecret($config['secret']);
		if(isset($_GET['code'])){
			$this->client->authenticate($_GET['code']);
			$CI->session->set_userdata('token', $this->client->getAccessToken());
			header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
		}
		if($CI->session->userdata('token')){
			$this->client->setAccessToken($CI->session->userdata('token'));
		}
		if(!$this->client->getAccessToken() || $this->client->isAccessTokenExpired($this->client->getAccessToken())){
			$url = $this->client->createAuthUrl();
			header('Location: '.$url);
		}
		
	}

}
