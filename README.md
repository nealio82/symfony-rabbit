Symfony and RabbitMQ example application
=================

Getting started
----

This example includes a fully-functioning Symfony application with RabbitMQ installed on a Vagrant VM (configured using <http://www.puphpet.com>).

You do not have to use Vagrant, but it could save you a lot of time. If you choose not to use the provided Vagrant config, you will have to install and configure RabbitMQ and your webserver yourself :)

To get running, go to <https://www.vagrantup.com/downloads.html>. You'll also need to head to <https://www.virtualbox.org/wiki/Downloads> and download an appropriate version for your development machine.
Once installed, navigate to the 'example' directory and run:

<code>
vagrant up
</code>

This will automatically set up a running version of the example application, pull composer dependencies and configure the Nginx web server for you. Go and make a cup of tea, it could take a few minutes to do everything.

You'll need to add a line to your system's hosts file:

<code>
192.168.56.105  dev.symfony-rabbit
</code>

Once done, you should be able to go to <http://dev.symfony-rabbit> in your browser to see the application.

The RabbitMQ admin panel has also been installed and will be available at <http://dev.symfony-rabbit:15672>.

* The username is 'symfony'
* The password is 'rabbit'

Using Vagrant
----

From within the example directory you will be able to open an ssh connection to the VM by running

<code>
vagrant ssh
</code>

The Symfony application files will be visible in the VM at /var/www/

Running the consumer
----

* If using Vagrant, open an ssh connection to the Vagrant machine (see above) and navigate to /var/www/
* Run <code>php app/console rabbitmq:consume -w send_email</code>
* Go to <http://dev.symfony-rabbit> in your browser and click 'consume now' or 'delay queue'. Keep an eye on the terminal window with the consumer running.