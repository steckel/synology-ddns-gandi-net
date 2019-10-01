#!/usr/bin/php

<?php

if ($argc !== 5) {
    echo 'badparam';
    exit();
}

$account = (string)$argv[1];
$pwd = (string)$argv[2];
$hostname = (string)$argv[3];
$ip = (string)$argv[4];

// check the hostname contains '.'
if (strpos($hostname, '.') === false) {
    echo 'badparam';
    exit();
}

// only for IPv4 format
if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    echo "badparam";
    exit();
}

$url = 'https://dns.api.gandi.net/api/v5/domains/'.$hostname.'/records/%40/A';

$data = array("rrset_ttl" => 10800, "rrset_values" => array($ip));
$data_string = json_encode($data);

$req = curl_init();
curl_setopt($req, CURLOPT_URL, $url);
curl_setopt($req, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($req, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($req, CURLOPT_HTTPHEADER, array(
    'X-Api-Key: '.$pwd,
    'Content-Type: application/json',
    'Content-Length: '.strlen($data_string)));
$res = curl_exec($req);
curl_close($req);
