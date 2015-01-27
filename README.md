# kittix
Create meme from Zabbix trigger

# What you need:
* php-gd
* some ttf Font (http://www.commonvision.org/files/fonts/Impact.ttf)
* some image for your meme

# how to do it
* save kittix.php in your zabbix alertscript path, chmod +x
* edit settings in file (sizes, locations)
* add new media type (script, kittix.php)
* add media to user. Enter absolute output path as "send to" (for example: /var/www/mytriggermeme.png)
* create a new action. Subject goes to the memes top, text to the bottom
* enjoy
