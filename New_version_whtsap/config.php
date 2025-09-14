<?php
// Configuration pour diagnostiquer les problèmes de redirection

// Vérifier si on est dans le bon répertoire
$currentDir = __DIR__;
$documentRoot = $_SERVER['DOCUMENT_ROOT'] ?? '';

echo "<h1>Configuration du serveur</h1>";

echo "<h2>Chemins :</h2>";
echo "<p><strong>Répertoire actuel :</strong> $currentDir</p>";
echo "<p><strong>Document Root :</strong> $documentRoot</p>";

// Vérifier si on est dans htdocs
if (strpos($currentDir, 'htdocs') !== false) {
    echo "<p style='color: orange;'>⚠️ Vous êtes dans le dossier htdocs</p>";
} else {
    echo "<p style='color: green;'>✅ Vous n'êtes pas dans htdocs</p>";
}

echo "<h2>Fichiers présents :</h2>";
$files = scandir('.');
foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
        $color = is_dir($file) ? 'blue' : 'green';
        echo "<p style='color: $color;'>" . (is_dir($file) ? '📁' : '📄') . " $file</p>";
    }
}

echo "<h2>Test d'accès :</h2>";
echo "<p><a href='index.php'>Accéder à index.php</a></p>";
echo "<p><a href='test_redirect.php'>Accéder à test_redirect.php</a></p>";

echo "<h2>Variables serveur importantes :</h2>";
echo "<p><strong>REQUEST_URI :</strong> " . ($_SERVER['REQUEST_URI'] ?? 'Non défini') . "</p>";
echo "<p><strong>SCRIPT_NAME :</strong> " . ($_SERVER['SCRIPT_NAME'] ?? 'Non défini') . "</p>";
echo "<p><strong>PATH_INFO :</strong> " . ($_SERVER['PATH_INFO'] ?? 'Non défini') . "</p>";

echo "<h2>Test de redirection :</h2>";
if (isset($_GET['redirect_test'])) {
    echo "<p style='color: green;'>✅ Redirection fonctionne - Paramètre reçu : " . htmlspecialchars($_GET['redirect_test']) . "</p>";
} else {
    echo "<p><a href='?redirect_test=working'>Tester la redirection</a></p>";
}

echo "<h2>Configuration recommandée :</h2>";
echo "<p>Si vous êtes redirigé vers htdocs, vérifiez :</p>";
echo "<ul>";
echo "<li>La configuration Apache (httpd.conf)</li>";
echo "<li>Le DocumentRoot dans la configuration</li>";
echo "<li>Les alias ou redirections dans .htaccess</li>";
echo "<li>La configuration du VirtualHost</li>";
echo "</ul>";

echo "<h2>Solution rapide :</h2>";
echo "<p>Si le problème persiste, essayez d'ajouter ceci au début de votre .htaccess :</p>";
echo "<pre>";
echo "RewriteEngine On\n";
echo "RewriteBase /\n";
echo "RewriteRule ^$ index.php [L]\n";
echo "</pre>";
?>
