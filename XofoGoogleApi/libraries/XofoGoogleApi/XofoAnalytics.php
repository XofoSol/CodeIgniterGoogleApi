<?php
require_once 'XofoGoogleMasterApi.php';

/**
 * XofoAnalytics
 */
class XofoAnalytics extends XofoGoogleMasterApi {
	
	private $viewId;
	
	function __construct($config) {
		parent::__construct($config);
		require_once 'Google/Service/' . $config['service'].'.php';
		$this->service = new Google_Service_Analytics($this->client);
	}
	public function setReportId($id){
		$this->viewId = $id;
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
