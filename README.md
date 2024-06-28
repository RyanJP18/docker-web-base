database login: 206.189.122.95:8080 
backend address: 206.189.122.95:80
(see backend .env for login details)



First time setup
---
CTRL+SHIFT+F RENAME (replace with app name)
CTRL+SHIFT+F WEBSITE.URL (replace with website url, e.g. appname.com)


Run containers
---
cd to root folder
systemctl start docker
docker-compose up


Storage issues
---
cd backend 
bash container
chown -R devuser:www-data ./storage && chmod -R 775 ./storage


Seed backend
---
cd backend
bash container
composer install 
php -d memory_limit=-1 artisan migrate:fresh --seed


Generate ssl certificates
---
(Run the same command for renewals)
sudo certbot certonly --manual --preferred-challenges dns -d WEBSITE.URL


