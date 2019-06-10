<?php

require 'class.IP2ProxyAPI.php';

$api = new IP2ProxyAPI('YOUR_API_KEY');

if ($api->query('1.2.3.4')) {
	echo '<strong>Country Code</strong>: ' . $api->countryCode . '<br>';
	echo '<strong>Country Name</strong>: ' . $api->countryName . '<br>';
	echo '<strong>Region</strong>: ' . $api->regionName . '<br>';
	echo '<strong>City</strong>: ' . $api->cityName . '<br>';
	echo '<strong>ISP</strong>: ' . $api->isp . '<br>';
	echo '<strong>Domain</strong>: ' . $api->domain . '<br>';
	echo '<strong>Usage Type</strong>: ' . $api->usageType . '<br>';
	echo '<strong>ASN</strong>: ' . $api->asn . '<br>';
	echo '<strong>AS</strong>: ' . $api->as . '<br>';
	echo '<strong>Last Seen</strong>: ' . $api->lastSeen . '<br>';
	echo '<strong>Proxy Type</strong>: ' . $api->proxyType . '<br>';
	echo '<strong>Is Proxy</strong>: ' . $api->isProxy . '<br>';
}
