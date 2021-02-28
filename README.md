# A vulnerable university website

This website is a vulnerable php webpage simulating a series of webpages for a university business.
There are vulnerable SQL fields alongside vulnerable access control.
The projects aim is to simulate a real world business and penetration test with this being a focal point of vulnerability alongside other vulnerabilities deployed on a docker swarm.
## DISCLAIMER
This is a vulnerable Web Application that should not be used as a front end website for any business.
This application is for academic and educational pruposes only.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Install apache2 and MySQL onto your environment (On windows recommend to use * [XAMPP](https://www.apachefriends.org/download.html))
Otherwise on Linux (debian)

```
sudo apt-get update && upgrade
```

### Installing

A step by step series of examples to recreate on your own env.

### Install apache2

```
sudo apt-get apache2
```

Edit the config file appropriatly to add a line saying ServerName which is either the ip or domain name of your server.

```
sudo nano /etc/apache2/apache2.conf
```

Restart apache2 service

```
sudo systemctl restart apache2
```

Adjust firewall either ufw or iptables to allow for ports 80 and 8080 tcp connections in and out.

```
sudo ufw allow in "Apache Full"
```

Install curl

```
sudo apt-get install curl
```

### Installing MySQL for the database

```
sudo apt-get install mysql-server
```

(!WARNING if using for public use ensure to use)

```
mysql_secure_installation
```

This will remove some insecure configurations that is needed for public use.

### Install PHP

```
sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql
```

This will install tools to help communicate to SQL server.
You are then required to indicate to apache to use index.php first, doing so by changing the order in the dir.conf.

```
sudo nano /etc/apache2/mods-enabled/dir.conf
```
Restart apache2 server

```
sudo systemctl restart apache2
```
Look at any packages you wish to install.

```
sudo apt-get install php-cli
```
Voila! Installation of working environment completed

## Running the tests

To check php is running create a file within /var/www/html/ named info.php

```
sudo nano /var/www/html/info.php
<?php
phpinfo();
?>
```
Navigate to the ip address to display the php infomation


##Adding this website

First we need to install GIT to pull the repository

```
sudo apt-get install git
```

Change working directory too /var/www/html/ then git clone the repository to deploy it.

```
sudo git clone https://github.com/SamP10/UniVulnerableWebsite.git
```

The next part is to import the SQL database script into your own sql database. Doing this via command line or installing phpMyAdmin which is a web interface for MySQL databases.
Follow these guides to get up and running * [phpMyAdmin](https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-20-04)


## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors
* **Sam Plant** - *Code work* - [Sam Plant](https://github.com/SamP10)

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
