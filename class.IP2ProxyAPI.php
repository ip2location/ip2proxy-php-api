<?php

class IP2ProxyAPI
{
	public $response;
	public $ipAddress;
	public $countryCode;
	public $countryName;
	public $regionName;
	public $cityName;
	public $isp;
	public $domain;
	public $usageType;
	public $asn;
	public $as;
	public $lastSeen;
	public $proxyType;
	public $isProxy;
	public $threat;

	protected $apiKey;
	protected $useSSL;

	public function __construct($apiKey = '', $useSSL = false)
	{
		$this->apiKey = $apiKey;
		$this->useSSL = $useSSL;
	}

	public function query($ip, $package = 'PX8')
	{
		if (!filter_var($ip, FILTER_VALIDATE_IP)) {
			return false;
		}

		$response = $this->get('http' . (($this->useSSL) ? 's' : '') . '://api.ip2proxy.com/?' . http_build_query([
			'key'     => $this->apiKey,
			'ip'      => $ip,
			'package' => $package,
			'format'  => 'json',
		]));

		if (($json = json_decode($response)) === null) {
			return false;
		}

		$this->response = (string) $json->response;
		$this->countryCode = (string) $json->countryCode;
		$this->countryName = (string) $json->countryName;
		$this->regionName = (string) $json->regionName;
		$this->cityName = (string) $json->cityName;
		$this->isp = (string) $json->isp;
		$this->domain = (string) $json->domain;
		$this->usageType = (string) $json->usageType;
		$this->asn = (string) $json->asn;
		$this->as = (string) $json->as;
		$this->lastSeen = (string) $json->lastSeen;
		$this->proxyType = (string) $json->proxyType;
		$this->isProxy = (string) $json->isProxy;
		$this->threat = (string) $json->threat;

		return true;
	}

	private function get($url)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, 'IP2ProxyAPI_PHP-3.0.0');
		curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		$response = curl_exec($ch);

		return $response;
	}
}
