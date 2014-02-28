<?php
require_once 'XofoGoogleApi.php';

/**
 * XofoAnalytics
 */
class XofoAnalyticsReports extends XofoGoogleMasterApi {
	
	private $viewId;
	
	function __construct($config) {
		parent::__construct($config);
		$this->client = new Google_Client();
		// Si no tenemos un access token, vamos a pedir autenticación a Google
		if(!$this->client->getAccessToken()) {
			$authUrl = $this->client->createAuthUrl();
			header('Location: '.$authUrl);
		}else{
			require_once 'vendor/Google/Service/' . $config['service'];
			$this->service = new apiAnalyticsService($this->client);
		}
	}
	
	public function getReport($fechaInicial, $fechaFinal, $metrics, array $params = null) {
		return $this->service->data_ga->get(
			$this->viewId,
			$fechaInicial,
			$fechaFinal,
			$metrics,
			$params
		);
	}
	
}
