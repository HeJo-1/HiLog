import subprocess
import platform

def install_php():
    try:
        # İşletim sistemine göre komutları belirle
        os_type = platform.linux_distribution()[0].lower()
        
        if 'ubuntu' in os_type or 'debian' in os_type:
            # Ubuntu/Debian tabanlı sistemler için apt komutu
            print("Ubuntu veya Debian tabanlı bir sistem tespit edildi. PHP kurulumu başlıyor...")
            subprocess.run(['sudo', 'apt', 'update'], check=True)
            subprocess.run(['sudo', 'apt', 'install', 'php', '-y'], check=True)
        elif 'centos' in os_type or 'redhat' in os_type or 'fedora' in os_type:
            # Red Hat/CentOS/Fedora tabanlı sistemler için dnf veya yum komutu
            print("CentOS, Red Hat veya Fedora tabanlı bir sistem tespit edildi. PHP kurulumu başlıyor...")
            subprocess.run(['sudo', 'dnf', 'install', 'php', '-y'], check=True)
        else:
            print("Desteklenmeyen bir Linux dağıtımı. PHP kurulumu yapılmadı.")
            return
        
        print("PHP başarıyla kuruldu.")
    
    except subprocess.CalledProcessError as e:
        print(f"Bir hata oluştu: {e}")

# PHP'yi yükle
install_php()
