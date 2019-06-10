# IP2Proxy PHP API

This module allows user to query an IP address if it was being used as open proxy, web proxy, VPN anonymizer and TOR exits. It lookup the proxy IP address using **IP2Proxy API**. 


## Getting Started
To begin, an API key is required for this module to function. Find further information at https://www.ip2location.com/ip2proxy-web-service

## Installation
Add the following to your composer.json file:

```json
{
  "require": {
	"ip2location/ip2proxy-php-api": "1.*"
  }
}
```

## Usage

```php
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
```


## Response message

| Name | Description |
| ---------- | ------------- |
| response | OK if success, otherwise failed. |
| countryCode | 2 digits country code. |
| countryName | Country name. |
| regionName | Region or state name. |
| cityName | City name. |
| isp | The service provider name. |
| isProxy | YES if the IP is a Proxy. NO if the IP is not a proxy. DCH if the IP belongs to Hosting Provider, Data Center or Content Delivery Network. Note: DCH is only available for PX2, PX3 and PX4 query |
| proxyType | The type of proxy service. |
| domain | Internet domain name associated with IP address range. |
| usageType | Usage type classification of ISP or company. Refer **Usage Type** section. |
| asn | Autonomous system number (ASN).                              |
| as | Autonomous system (AS) name. |
| lastSeen | Proxy last seen in days. |



##### Usage Type

- (COM) Commercial
- (ORG) Organization
- (GOV) Government
- (MIL) Military
- (EDU) University/College/School
- (LIB) Library
- (CDN) Content Delivery Network
- (ISP) Fixed Line ISP
- (MOB) Mobile ISP
- (DCH) Data Center/Web Hosting/Transit
- (SES) Search Engine Spider
- (RSV) Reserved