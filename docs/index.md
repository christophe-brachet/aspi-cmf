---
layout: default
---

ASPI-CMF (Content Management Framework). Use Aspi-Framework (https://github.com/christophe-brachet/aspi-framework)
# Installation on MacOS Mojave

Step 1 - Installer PHP 7.2 on your computer (to develop)
On MacOS :
a) Install homebrew (package manager)
```sh
iMac-de-christophe:~ christophebrachet$ ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)
```
b) Check for issues and conflicts that may occur during installation
```sh
iMac-de-christophe:~ christophebrachet$ brew doctor
```
c) Update Homebrew
```sh
iMac-de-christophe:~ christophebrachet$  brew update && brew upgrade
```
Step 2- Install MariaDB database (Best performance than Mysql)
On MacOS
a) Install MariaDB with Homebrew
```sh
iMac-de-christophe:~ christophebrachet$ brew install mariadb
```
b) Run the database installer
```sh
iMac-de-christophe:~ christophebrachet$ sudo mysql_install_db
```
c) Start MariaDB Server
```sh
iMac-de-christophe:~ christophebrachet$ mysql.server start
```
d) Securise MariaDB Server
```sh
iMac-de-christophe:~ christophebrachet$ mysql_secure_installation
```
```
NOTE: RUNNING ALL PARTS OF THIS SCRIPT IS RECOMMENDED FOR ALL MariaDB
      SERVERS IN PRODUCTION USE!  PLEASE READ EACH STEP CAREFULLY!

In order to log into MariaDB to secure it, we'll need the current
password for the root user.  If you've just installed MariaDB, and
you haven't set the root password yet, the password will be blank,
so you should just press enter here.

Enter current password for root (enter for none):
OK, successfully used password, moving on...

Setting the root password ensures that nobody can log into the MariaDB
root user without the proper authorisation.

Set root password? [Y/n]
New password:
Re-enter new password:
Password updated successfully!
Reloading privilege tables..
 ... Success!


By default, a MariaDB installation has an anonymous user, allowing anyone
to log into MariaDB without having to have a user account created for
them.  This is intended only for testing, and to make the installation
go a bit smoother.  You should remove them before moving into a
production environment.

Remove anonymous users? [Y/n]
 ... Success!

Normally, root should only be allowed to connect from 'localhost'.  This
ensures that someone cannot guess at the root password from the network.

Disallow root login remotely? [Y/n]
 ... Success!

By default, MariaDB comes with a database named 'test' that anyone can
access.  This is also intended only for testing, and should be removed
before moving into a production environment.

Remove test database and access to it? [Y/n]
 - Dropping test database...
 ... Success!
 - Removing privileges on test database...
 ... Success!

Reloading the privilege tables will ensure that all changes made so far
will take effect immediately.

Reload privilege tables now? [Y/n]
 ... Success!

Cleaning up...

All done!  If you've completed all of the above steps, your MariaDB
installation should now be secure.

Thanks for using MariaDB!
```
Step 3 -Install PHP 7.2
On MacOS :
a) Install PHP
```sh
iMac-de-christophe:~ christophebrachet$ brew tap homebrew/dupes
iMac-de-christophe:~ christophebrachet$ brew tap homebrew/php
iMac-de-christophe:~ christophebrachet$ brew install --without-apache --with-fpm --with-mysql php72
iMac-de-christophe:~ christophebrachet$ sudo rm /usr/bin/php 
iMac-de-christophe:~ christophebrachet$ sudo ln -s /usr/local/Cellar/php/7.2.8/bin/php /usr/bin/php 
```
b) install swoole with pecl
```sh
iMac-de-christophe:~ christophebrachet$ pecl install swoole
```
Step 4 - Install composer (dependency manager)
```sh
iMac-de-christophe:~ christophebrachet$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
iMac-de-christophe:~ christophebrachet$ php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
iMac-de-christophe:~ christophebrachet$ php composer-setup.php
iMac-de-christophe:~ christophebrachet$ php -r "unlink('composer-setup.php');"
iMac-de-christophe:~ christophebrachet$ mv composer.phar /usr/local/bin/composer

```
Step 5 - Install imap 
On MacOS
a) Download PHP 7.2.8 on Github(https://github.com/php/php-src/tree/PHP-7.2.8) and uncompressed it on the your desktop.
```sh
iMac-de-christophe:~ christophebrachet$ brew install imap-uw
iMac-de-christophe:~ christophebrachet$ brew install openssl
iMac-de-christophe:~ brew link --force openssl
iMac-de-christophe:~ ln -s /usr/local/opt/openssl/include/openssl /usr/local/include
iMac-de-christophe:~ sudo mv /usr/bin/phpize /usr/bin/phpize-old
iMac-de-christophe:~ sudo mv /usr/bin/php-config /usr/bin/php-config
iMac-de-christophe:~ cd /Users/christophebrachet/Desktop/php-src-PHP-7.2.8/ext/imap/
iMac-de-christophe:imap christophebrachet$ phpize –clean
iMac-de-christophe:imap christophebrachet$ ./configure --with-kerberos --with-imap-ssl
iMac-de-christophe:imap christophebrachet$ make
iMac-de-christophe:imap christophebrachet$ cd modules
iMac-de-christophe:imap christophebrachet$ cp imap.so /usr/local/lib/php/pecl/20170718/
iMac-de-christophe:imap christophebrachet$ cp imap.la /usr/local/lib/php/pecl/20170718/
```
b) Modify your php.ini:
```sh
iMac-de-christophe:imap christophebrachet$ sudo nano  /usr/local/etc/php/7.2/php.ini
```
c) and add this line to load imap-php module:
```sh
extension="imap.so"
```
Step 6 - Install aspi CMF project from composer
```sh
Brachets-Mac-mini:Desktop cbrachet$ composer create-project aspi-cmf-components/app
```
Step 7 - Go to application directy
```sh
Brachets-Mac-mini:Desktop cbrachet$ cd aspi-app
```
Step 8 - Create Config directory 
```sh
Brachets-Mac-mini:Desktop cbrachet$  sudo mkdir src/CMS/Config
Brachets-Mac-mini:Desktop cbrachet$  sudo chmod -R 777 src/CMS/Config
Brachets-Mac-mini:Desktop cbrachet$  cd src/CMS/Config
```
Step 9 - Create cms.json file
```sh
Brachets-Mac-mini:Desktop cbrachet$  sudo nano cms.json
```
```json
{ "host":"127.0.0.1",
    "port":8083,
    "mode":"development",
    "administrator_email": "contact@brachet-breizh.fr",
    "aspi_title": "Association Autisme-ça-suffit !"
}
```
Step 10 - Install npm dependencies
```sh
Brachets-Mac-mini:aspi-app cbrachet$ cd ../../../
Brachets-Mac-mini:aspi-app cbrachet$ npm install
```
Step 11 - Init web application
```sh
Brachets-Mac-mini:aspi-app cbrachet$ php bin/console aspi:init
```

Step 12 - Start Swoole WebServer
```sh
Brachets-Mac-mini:aspi-app cbrachet$ php bin/console aspi:webserver
```
# Installation on GNU/Linux Debian (For Production)

Step 1- Install MariaDB database (Best performance than Mysql)
On Gnu/Linux Debian

```sh
christophe@vpsOVH:~$ sudo apt-get -y install mariadb-server mariadb-client
christophe@vpsOVH:~$ sudo mysql_secure_installation
christophe@vpsOVH:~$ sudo mysql -u root -p
```
```sql
MariaDB [mysql]> UPDATE user SET plugin='' WHERE User='root';
Query OK, 1 row affected (0.00 sec)
Rows matched: 1  Changed: 1  Warnings: 0

MariaDB [mysql]> FLUSH PRIVILEGES;
Query OK, 0 rows affected (0.00 sec)

MariaDB [mysql]> EXIT;
Bye
```
Now , you can connect without sudo ...MariaDB is ready to use.

Step 2- Install PHP

```sh
christophe@vpsOVH:~$ sudo apt-get -y install php7.2 php7.2-dev php7.2-fpm php7.2-common php7.2-mysql php7.2-cli php7.2-opcache php7.2-curl php7.2-json php7.2-gd php7.2-mcrypt php7.2-msgpack php7.2-apc php7.2-intl php7.2-sqlite3 php7.2-gmp php7.2-geoip php7.2-mbstring php7.2-xml php7.2-zip php-pear php7.2-imagick php7.2-imap php7.2-ps php7.2-pspell php7.2-recode php7.2-tidy php7.2-xmlrpc php7.2-xsl php7.2-memcache php7.2-memcached php7.2-apcu
christophe@vpsOVH:~$ sudo nano /etc/php/7.2/fpm/php.ini
[...]
cgi.fix_pathinfo=1
[...]date.timezone="Europe/Paris"[...]
```
Step 3-Install Swoole Server
```sh
christophe@vpsOVH:~$ sudo git clone https://github.com/swoole/swoole-src
christophe@vpsOVH:~$ cd swoole-src
christophe@vpsOVH:/swoole-src$ sudo phpize
christophe@vpsOVH:/swoole-src$ sudo ./configure 
christophe@vpsOVH:/swoole-src$ sudo make
christophe@vpsOVH:/swoole-src$ sudo make install
christophe@vpsOVH:/swoole-src$ php -i | grep php.ini  
Configuration File (php.ini) Path => /etc/php/7.2/cli
Loaded Configuration File => /etc/php/7.2/cli/php.ini
christophe@vpsOVH:/swoole-src$ sudo echo "extension=swoole.so" >  /etc/php/7.2/cli/php.ini
christophe@vpsOVH:/swoole-src$ php -m | grep swoole
christophe@vpsOVH:/swoole-src$ cd ..
christophe@vpsOVH:~$ sudo rm -R swoole-src
```

Step 4- Deploy your DNS

Step 5 - Install aspi CMF project from composer
```sh
christophe@vpsOVH:~$ cd /var/www
christophe@vpsOVH:/var/www$ sudo composer create-project aspi-cmf-components/app
```
Step 6 - Go to application directy
```sh
christophe@vpsOVH:/var/www$ cbrachet$ cd aspi-app
```
Step 7 - Create Config directory 
```sh
christophe@vpsOVH:/var/www/aspi-app$ sudo mkdir src/CMS/Config
christophe@vpsOVH:/var/www/aspi-app$ sudo chmod -R 777 src/CMS/Config
christophe@vpsOVH:/var/www/aspi-app$ cd src/CMS/Config
```
Step 8 - Create cms.json file
```sh
christophe@vpsOVH:/var/www/aspi-app/src/CMS/Config$  sudo nano cms.json
```
```json
{ "host":"127.0.0.1",
    "port":8083,
    "mode":"production",
    "administrator_email": "contact@brachet-breizh.fr",
    "aspi_title": "Association Autisme-ça-suffit !"
}
```
Step 9 - Install npm dependencies
```sh
christophe@vpsOVH:/var/www/aspi-app/src/CMS/Config$ cd ../../../
christophe@vpsOVH:/var/www/aspi-app$ npm install
```
Step 10 - Init web application
```sh
christophe@vpsOVH:/var/www/aspi-app$ php bin/console aspi:init
```

Step 11 - Create the service file

```sh
christophe@vpsOVH:/var/www/aspi-app$ sudo nano  /etc/systemd/system/cmf.service
```
```sh
[Unit]
Description=Aspi CMF

[Service]
ExecStart=/var/www/aspi-app/bin/console aspi:webserver
Restart=always
# Restart service after 10 seconds if th e api service crashes:
RestartSec=10
KillSignal=SIGINT
SyslogIdentifier=aspi-cmf
User=www-data

[Install]
WantedBy=multi-user.target
```
```sh
christophe@vpsOVH:/var/www/aspi-app$ sudo systemctl enable cmf.service
```



Step 12 - Start Swoole WebServer
```sh
christophe@vpsOVH:/var/www/aspi-app$ php bin/console aspi:webserver
```
Webserver run in local... Now we must use a Proxy WebServer to access the website from a web browser.
In this example we use Nginx. But you can use also Apache2 ou Lighttpd ...
Step 13 -Install cerbot
```sh
christophe@vpsOVH:/var/www/aspi-app$ sudo apt-get install python-certbot-apache -t stretch-backports
christophe@vpsOVH:/var/www/aspi-app$ sudo certbot renew --dry-run
```
Step 13 - Generate SSL certificates
```sh
christophe@vpsOVH:/var/www/aspi-app$ sudo certbot certonly --standalone -d testcms.brachet-breizh.fr
```

Start the service and verify that it's running.

Step 14 - Install Nginx
```sh
christophe@vpsOVH:/var/www/aspi-app$ sudo apt-get install nginx -y
christophe@vpsOVH:/var/www/aspi-app$ sudo rm /etc /nginx/sites-available/default
christophe@vpsOVH:/var/www/aspi-app$ sudo nano /etc/nginx/sites-available/default
```
Adapt your configuration (IP public, domain name ...)
```sh
server {

 listen 80;
 server_name testcms.brachet-breizh.fr;
 rewrite ^ https://$server_name$request_uri? permanent;
}
server {
    listen           51.255.165.236:443 ssl;
    server_name       testcms.brachet-breizh.fr;
        # By default, certificates generated with certbot go to / etc / letsencrypt / live /
        # You ust replace the path by that corresponding  domain
        ssl_certificate /etc/letsencrypt/live/testcms.brachet-breizh.fr/fullchain.pem;
        ssl_certificate_key /etc/letsencrypt/live/testcms.brachet-breizh.fr//privkey.pem;
        ssl_trusted_certificate /etc/letsencrypt/live/testcms.brachet-breizh.fr/chain.pem;
        ssl_protocols TLSv1.2;
        ## Diffie-Hellman
        ssl_ecdh_curve secp384r1;
        ## Ciphers
        ssl_ciphers EECDH+CHACHA20:EECDH+AESGCM:EECDH+AES;
        ssl_prefer_server_ciphers on;

        # OCSP Stapling
        resolver 80.67.169.12 80.67.169.40 valid=300s;
        resolver_timeout 5s;
        ssl_stapling on;
        ssl_stapling_verify on;

        ## TLS parameters
        ssl_session_cache shared:SSL:10m;
        ssl_session_timeout 5m;
        ssl_session_tickets off;

        ## HSTS
        add_header Strict-Transport-Security "max-age=15552000; includeSubdomains; preload";
        location / {
                proxy_pass         http://localhost:8083;
                proxy_http_version 1.1;
                proxy_set_header   Upgrade $http_upgrade;
                proxy_set_header   Connection keep-alive;
                proxy_set_header   Host $host;
                proxy_cache_bypass $http_upgrade;
                proxy_set_header   X-Forwarded-For $proxy_add_x_forwarded_for;
                proxy_set_header   X-Forwarded-Proto $scheme;
       }

}
```
```sh
christophe@vpsOVH:/var/www/aspi-app$ sudo service nginx start
```

You can now access the CMF by typing in your favorite webbrowser the following url : http://testcms.brachet-breizh.fr


