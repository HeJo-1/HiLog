<?php
$logDir = __DIR__ . '/logs/';

// Log dosyalarını listeleme
$logFiles = array_diff(scandir($logDir), ['.', '..']); // '.' ve '..' hariç dosyaları al

// Log dosyalarını görüntüle
echo "<h1>Log Files</h1>";

foreach ($logFiles as $logFile) {
    $filePath = $logDir . $logFile;
    
    if (is_file($filePath)) {
        echo "<h3>$logFile</h3>";
        echo "<pre>" . htmlspecialchars(file_get_contents($filePath)) . "</pre>";
    }
}
?>
