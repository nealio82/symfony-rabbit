echo "installing vhost"

cp /vagrant/vhost/* /etc/nginx/sites-available/

/etc/init.d/nginx restart