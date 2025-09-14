<?php
// PROTECTION ANTIBOTS RENFORCÉE - NEW_VERSION_WHTSAP
// COMPLÈTEMENT DÉSACTIVÉE POUR LES OPEN GRAPH

// Démarrer la session
session_start();

// TEMPORAIREMENT DÉSACTIVÉ POUR TESTER OPEN GRAPH
// Blocage des bots principaux des réseaux sociaux
$blockedBots = [
    'facebookexternalhit', 'Facebot', 'Twitterbot', 'WhatsApp', 
    'TelegramBot', 'LinkedInBot', 'Pinterest', 'Instagram',
    'whatsapp', 'telegram', 'facebook', 'twitter', 'linkedin',
    'pinterest', 'instagram', 'snapchat', 'tiktok'
];

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

// Vérifier si c'est un bot de réseau social (COMPLÈTEMENT DÉSACTIVÉ)
/*
foreach ($blockedBots as $bot) {
    if (stripos($userAgent, $bot) !== false) {
        // Retourner une page vide ou une erreur 403
        header('HTTP/1.1 403 Forbidden');
        header('Content-Type: text/html; charset=utf-8');
        echo '<!DOCTYPE html><html><head><title>Access Denied</title></head><body><h1>Access Denied</h1></body></html>';
        exit;
    }
}
*/

// Fonction pour vérifier si c'est un bot
function isBot() {
    $bots = array(
        'bot', 'spider', 'crawler', 'wget', 'curl', 
        'python-requests', 'ruby', 'perl', 'facebook', 'twitter',
        'whatsapp', 'telegram', 'linkedin', 'pinterest', 'instagram'
    );
    
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
    
    foreach ($bots as $bot) {
        if (strpos($userAgent, $bot) !== false) {
            return true;
        }
    }
    
    return false;
}

// Vérification du referrer
function checkReferrer() {
    $referrer = $_SERVER['HTTP_REFERER'] ?? '';
    $allowedDomains = array('voteenlign');
    
    foreach ($allowedDomains as $domain) {
        if (strpos($referrer, $domain) !== false) {
            return true;
        }
    }
    
    return !empty($referrer); // Accepter si le referrer n'est pas vide
}

// Si c'est un bot, bloquer l'accès (COMPLÈTEMENT DÉSACTIVÉ)
/*
if (isBot()) {
    http_response_code(403);
    header('Content-Type: text/html; charset=utf-8');
    echo '<!DOCTYPE html><html><head><title>Access Denied</title></head><body><h1>Access Denied</h1></body></html>';
    exit;
}
*/

// Générer un token de session si non existant
if (!isset($_SESSION['security_token'])) {
    $_SESSION['security_token'] = bin2hex(random_bytes(32));
}

// Variables globales
$ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
$userToken = bin2hex(random_bytes(16));
?>
