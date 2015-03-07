
# add the admin page plugin
# https://www.rabbitmq.com/management.html
rabbitmq-plugins enable rabbitmq_management

# have to add an admin user before we can see the admin page because guest:guest doesn't work
# http://www.rabbitmq.com/man/rabbitmqctl.1.man.html
rabbitmqctl add_user symfony rabbit
rabbitmqctl set_user_tags symfony administrator
rabbitmqctl set_permissions -p / symfony ".*" ".*" ".*"
rabbitmqctl delete_user guest