<?php
$apiUrl = 'https://dashboard.armeriabalam.com/api';
$apiKey = 'c3ca395a0e0a16c9e6fa4f1239a2dc5578b59d8f386e488a78af81417d8d313';

$ch = curl_init($apiUrl . '/website-content');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-API-KEY: ' . $apiKey]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, false);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

echo "HTTP CODE: $httpCode\n";
echo "CURL ERROR: $error\n";
echo "RAW RESPONSE (first 2000 chars):\n";
echo substr($response, 0, 2000) . "\n";
