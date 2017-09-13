# symfony-cours
Support de cours pour symfony 2/3

## Configuration vhost

```
<VirtualHost *:80>
    ServerName symfony-blog.fr
    ServerAlias www.symfony-blog.fr
    DocumentRoot "C:/xampp/htdocs/blog/web"
    DirectoryIndex app_dev.php
    <Directory "C:/xampp/htdocs/blog/web">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride None
        Order allow,deny
        allow from all
        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^(.*)$ /app_dev.php [QSA,L]
        </IfModule>
    </Directory>
</VirtualHost>
```

* BackOffice with login
* Add entity Comment and user log can add comment to article
* Page index list article by dateCreated with pagination
* Search Bar with category and plaintext

PHP Mess Detector: http://github.com/ryanmcdermott/clean-code-javascript

## Theme for backoffice
https://almsaeedstudio.com/themes/AdminLTE/index.html
