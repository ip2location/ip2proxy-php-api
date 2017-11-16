<?php

require_once 'class.IP2ProxyAPI.php';

$apiKey = 'YOUR_API_KEY';
$ip = '8.8.8.8';

$ipx = new IP2ProxyAPI($apiKey, false);

if (!$ipx->query($ip)) {
	die('ERROR');
}

echo '<pre>';
echo 'Response     : ' . $ipx->response . "\n";
echo 'Country Code : ' . $ipx->countryCode . "\n";
echo 'Country Name : ' . $ipx->countryName . "\n";
echo 'Region Name  : ' . $ipx->regionName . "\n";
echo 'City Name    : ' . $ipx->cityName . "\n";
echo 'ISP          : ' . $ipx->isp . "\n";
echo 'Proxy Type   : ' . $ipx->proxyType . "\n";
echo 'Is Proxy     : ' . $ipx->isProxy . "\n";
echo '</pre>';
