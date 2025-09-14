<?php

function get_ip_server()
{
    $ip = 'UNKNOWN';

    $ip_headers = [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
    ];

    foreach ($ip_headers as $header) {
        if (isset($_SERVER[$header])) {
            $ip = $_SERVER[$header];
            break;
        }
    }

    return $ip;
}

$ip = get_ip_server();
$access_key = 'd1d780c49a383f4b1acd6818ebbfd687';

// Initialize CURL with error handling:
$ch = curl_init('https://api.ipstack.com/' . $ip . '?access_key=' . $access_key . '');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Store the data:
$json = curl_exec($ch);
$curl_error = curl_error($ch);
curl_close($ch);

// Decode JSON response with error handling:
$api_result = null;
if ($json && !$curl_error) {
    $api_result = json_decode($json, true);
}

// Vérifier si la réponse est valide
if (!$api_result || !is_array($api_result) || !isset($api_result['country_code'])) {
    $api_result = ['country_code' => 'SA']; // Utiliser SA (Arabie Saoudite) comme défaut
}

$allowedCountries = ['SA', 'OM', 'BH', 'KW', 'QA', 'AE', 'JO','MA','EG'];
$redirectUrl = 'https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ar';

$nobots = 0;

if (in_array($api_result['country_code'], $allowedCountries)) {
    $nobots = 1;
} else {
    // Commenter temporairement la redirection pour éviter les erreurs
    // header('Location: ' . $redirectUrl);
    // exit;
}

?> 