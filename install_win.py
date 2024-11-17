import subprocess
import os
import urllib.request
import zipfile

def download_php():
    try:
        # PHP'nin Windows sürümünün indirme bağlantısı
        php_url = 'https://windows.php.net/downloads/releases/archives/php-7.4.3-Win32-vc15-x64.zip'
        download_path = 'php.zip'
        
        # PHP'yi indir
        print("PHP indiriliyor...")
        urllib.request.urlretrieve(php_url, download_path)
        print("PHP indirildi.")
        
        # Zip dosyasını çıkart
        print("PHP dosyası çıkarılıyor...")
        with zipfile.ZipFile(download_path, 'r') as zip_ref:
            zip_ref.extractall('C:\\php')  # PHP'yi C:\\php dizinine çıkart
        print("PHP çıkarıldı.")
        
        # Çıkarılan PHP'yi PATH'e ekleyelim
        php_path = 'C:\\php'
        subprocess.run(f'setx PATH "%PATH%;{php_path}"', shell=True)
        print("PHP'nin yolu sisteme eklendi.")
        
        # PHP'nin doğru kurulduğunu kontrol et
        subprocess.run('php -v', shell=True)
        print("PHP kurulum tamamlandı.")
        
        # İndirilen zip dosyasını temizle
        os.remove(download_path)
    
    except Exception as e:
        print(f"Bir hata oluştu: {e}")

# PHP'yi indir ve kur
download_php()
