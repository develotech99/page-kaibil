<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Http;

$apiKey = "c3ca395a0e0a16c9e6fa4f1239a2dc5578b59d8f386e488a78af81417d8d3131";
$urls = [
    'Melchor' => 'https://187.124.224.77/api/catalogo',
];
$host = 'melchordemencos.armeriabalam.com';

foreach ($urls as $name => $url) {
    echo "Probando $name ($url) con Host: $host..." . PHP_EOL;
    try {
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Accept'    => 'application/json',
                'Host'      => $host
            ])->timeout(10)->get($url);

        echo "Status: " . $response->status() . PHP_EOL;
        echo "Body: " . substr($response->body(), 0, 200) . PHP_EOL;
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . PHP_EOL;
    }
    echo "----------------------------" . PHP_EOL;
}
