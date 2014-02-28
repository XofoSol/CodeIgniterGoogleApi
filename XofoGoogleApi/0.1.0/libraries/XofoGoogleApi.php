<?php
/**
 * XofoGoogleApi
 */
class XofoGoogleApi {
	
	function __construct(array $config) {
		$service = 'Xofo'.$config['service'];
		return new $service($config);
	}
}
