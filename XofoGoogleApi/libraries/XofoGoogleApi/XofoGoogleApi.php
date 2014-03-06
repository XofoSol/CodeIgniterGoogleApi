<?php
/**
 * XofoGoogleApi
 */


class XofoGoogleApi {
	
	private $config;
	
	function __construct(array $config) {
		$this->config = $config;
	}
	
	public function servicio() {
		require_once 'Xofo'.$this->config['service'].'.php';
		$service = 'Xofo'.$this->config['service'];
		return new $service($this->config);
	}
}
