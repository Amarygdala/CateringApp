# Catering App

# Setup
Install XAMPP from https://www.apachefriends.org/index.html
Open up the folder where you installed XAMPP and go to htdocs
Delete all the files preinstalled into htdocs
Drag all of the files from the repository EXCEPT FOR THE .sql FILES into htdocs
Run the XAMPP Control Panel/xampp-control.exe
Press the Config button beside Apache and select httpd-xampp.conf
Scroll down and find the <Directory "yourpath/phpMyAdmin"> and replace content with this

AllowOverride AuthConfig
	Order allow,deny
	Require local
	Allow from all
ErrorDocument 403 /error/XAMPP_FORBIDDEN.html.var

(This will make the phpmyadmin page only accessible to the host)

Now press Start beside Apache and MySQL
Open up a browser and go to http://localhost/phpmyadmin/ (If a login is prompt, the user should be 'root' with no password)
Go to the left navbar and press New
Name the new database 'cateringapp' with collation utf8_general_ci
Now you can drag the cateringapp.sql file into the database. You should see two tables, cateringdata and log
Then do the exact same with the loginsystem.sql file
If you now type in localhost in the address bar it should redirect you to localhost/login_page.php

