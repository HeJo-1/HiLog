import subprocess

def install_php():
    try:
        # Termux'te PHP'yi yükleme komutunu çalıştır
        subprocess.run(['pkg', 'update', '-y'], check=True)
        subprocess.run(['pkg', 'upgrade', '-y'], check=True)
        subprocess.run(['pkg', 'install', 'php', '-y'], check=True)
        print("PHP başarıyla kuruldu.")
    except subprocess.CalledProcessError as e:
        print(f"Bir hata oluştu: {e}")

# PHP'yi yükle
install_php()
