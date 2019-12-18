Application pour la gestion des apprenants et de leurs compétences
Laravel est utilisé en API et un front est créé pour permettre les requêtes

# INSTALLER LARAVEL

-Initialiser une Vagrant et utiliser la box ubuntu/xenial64

-Modifier le Vagrantfile

    --> Décommenter :
	config.vm.provider "virtualbox" do |vb| 
	vb.memory = "2048" 
	end
	
-Installer un LAMP (Apache2, mysql-server, et php7.4)

	sudo apt update
	sudo apt-add-repository ppa:ondrej/php
	sudo apt update
	sudo apt install apache2 php7.4 mysql-server 
	
-Installer composer et le mettre en local pour plus de commodité

	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	php -r "if (hash_file('sha384', 'composer-setup.php') === 'baf1608c33254d00611ac1705c1d9958c817a1a33bce370c0595974b342601bd80b92a3f46067da89e3b06bff421f182') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
	php composer-setup.php
	php -r "unlink('composer-setup.php');"
	sudo mv composer.phar /usr/local/bin/composer
	
-Installer des paquets supplémentaires: zip, dom et mbstring

	sudo apt install zip php7.4-zip php7.4-dom php7.4-mbstring
	
-Installer Laravel

	composer create-project --prefer-dist laravel/laravel blog
	
-Modifier le fichier 000-default.conf

	- sudo nano /etc/apache2/sites-available/000-default.conf
	Modifier le DocumentRoot avec le bloc suivant
    	<Directory /var/www/html/NomDuProject/public>
        	Options Indexes FollowSymLinks MultiViews
        	AllowOverride All
        	Order allow,deny
        	allow from all
    	</Directory>
	
-Modifier les permissions dans le fichier envvars

	sudo nano /etc/apache2/envvars
        modifier www-data en vagrant x2
	
-Activer la réecriture d'url

	sudo a2enmod rewrite

GESTION DES API
-Télécharger Postman

UTILISATION DE L'API
-Télécharger le repo Git
-Lancer la vagrant
-Naviguez ! (Navigateur internet de préférence Chrome)
