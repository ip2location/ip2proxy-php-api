# IP2Proxy PHP API

This module allows user to query an IP address if it was being used as open proxy, web proxy, VPN anonymizer and TOR exits. It lookup the proxy IP address using **IP2Proxy API**. 


## Getting Started
To begin, an API key is required for this module to function. Find further information at https://www.ip2location.com/ip2proxy-web-service

## Installation
Add the following to your composer.json file:

```
{
  "require": {
	"ip2location/ip2proxy-php-api": "1.*"
  }
}
```

## Usage

```
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
	public $proxyType;
	public $isProxy;

	protected $apiKey;
	protected $useSSL;

	public function __construct($apiKey = '', $useSSL = false)
	{
		$this->apiKey = $apiKey;
		$this->useSSL = $useSSL;
	}

	public function query($ip)
	{
		if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
			return false;
		}

		$response = $this->get('http' . (($this->useSSL) ? 's' : '') . '://api.ip2proxy.com/?' . http_build_query([
			'key'     => $this->apiKey,
			'ip'      => $ip,
			'package' => 'PX4',
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
		$this->proxyType = (string) $json->proxyType;
		$this->isProxy = (string) $json->isProxy;

		return true;
	}

	private function get($url)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, 'IP2ProxyAPI_PHP-1.0.0');
		curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		$response = curl_exec($ch);

		return $response;
	}
}
?>
```


