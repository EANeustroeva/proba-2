docker --version
apt-get update
apt-get install     apt-transport-https     ca-certificates     curl     gnupg-agent     software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
apt-key fingerprint 0EBFCD88
add-apt-repository    "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"
apt-get update
apt-get install docker-ce docker-ce-cli containerd.io
docker --version
curl -L "https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
ln -s /usr/local/bin/docker-compose /usr/bin/docker-compose
docker-compose --version
apt-get update
apt-get install software-properties-common
add-apt-repository universe
add-apt-repository ppa:certbot/certbot
apt-get install certbot
mkdir -p /etc/nginx/ssl
openssl dhparam -out /etc/nginx/ssl/dhp-4096.pem 4096
wget https://github.com/judge0/judge0/releases/download/v1.12.0/judge0-v1.12.0-https.zip
unzip judge0-v1.12.0-https.zip
cd judge0-v1.12.0-https
nano docker-compose.yml 
docker-compose up -d db redis
docker-compose up -d
docker ps
nginx -t
docker-compose restart 157274edb135
docker-compose restart  judge0-v1120-https_nginx_1
docker-compose restart nginx
cd srv/nginx/html/
git clone https://github.com/judge0/ide.git ide
docker-compose restart nginx
docker-compose restart server
docker-compose restart nginx
docker-compose restart server
docker-compose restart nginx
docker-compose restart server
docker-compose restart nginx
docker-compose restart server
docker-compose restart nginx
docker exec nginx sh -c 'exec nginx -s reload'
docker-compose restart nginx
cd judge0-v1.12.0-https/
docker-compose restart nginx
docker exec nginx sh -c 'exec nginx -s reload'
docker-compose restart nginx
nano /etc/hosts
docker-compose restart nginx
nano /etc/hosts
docker-compose restart nginx
apt install nginx
systemctl status nginx
apt purge nginx
reboot
cd judge0-v1.12.0-https/
history
apt purge nginx
reboot
