## Introduction

The goal of this project is to develop a website that allows its visitors to 
easily reserve a golf play (a tee-time) in golf clubs in Switzerland, using the 
SCRUM methodology.

## Specifications

Mandatory functionalities:

* responsive web design
* multi-language
* user registration and login
* ability to search tee-time using filters
* warranty payment of the tee-times
* profile page for golf clubs

## Technologies used

As far as responsive web design is concerned, this project relies on Twitter 
Bootstrap 3.0. This framework has allowed us to quickly build a nice-looking 
and responsive prototype, compatible with devices of all sizes.

Since one of the requirements of the project was that a native application 
should be able to connect to the database later on, we decided that a Web 
Service was necessary in the architecture. We have therefore decided to look 
for a server-side framework that would allow us to build it quickly.

The programming language we chose is PHP 5 because all the members of the team 
were already experienced with it. This was not the case with other languages we 
could have chosen such as ASP and Ruby on Rails.

We then decided which framework to use. Two members of the team were 
experienced with CakePHP and another with Yii. None of us was really too keen 
on those solutions, so we chose to look for something new. This is where we met 
Laravel 4, whose simple and clear documentation really impressed us. We decided 
to try it.

We decided to store our project on GitHub because we were already experienced 
with it and it provides easy to use applications for all operating systems.

We then tried to deploy our Laravel repository on Microsoft's Azure cloud 
platform because the Product Owner had access to an account designed for 
start-ups with a few free features. The deployment from GitHub was done in a 
few clicks and went really well. However we soon realized that Laravel wasn't 
fully compatible with the platform we were using. Laravel was meant for Apache 
servers and everything wasn't working out of the box with Microsoft tools. We 
were able to solve those problems, however it took us time and by reading 
Laravel's documentation we realized that more were to come.

This is where we suggested to the Product Owner to switch to Fortrabbit, as 
suggested by Jason Agnew from Big Bite Creative, author of a blog post on how 
to make Laravel work on Azure. The PO then asked us if we could use Linux on 
Azure and this is when we realized that we could create a virtual machine 
running Linux. This is what we have done. We chose Ubuntu Server and installed 
Apache and MySQL on it.

## migrations

php artisan migrate

## connect to the server

ssh azureuser@teezy-vm.cloudapp.net
password : tfW7LiHK5chSfr

## tests

/vendor/bin/phpunit in teezy-linux/

## MySQL login

username : root
password : jc0WFdiIjiLX2h

## TODO

- excel sheet agile : product backlog, release plan, burn down, release plan, 
daily meetings, retrospective
- architecture
- description dossiers laravel (includes etc.)
- use case (user types : unidentified, patients, doctors)

## Sources

- http://code.tutsplus.com/tutorials/authentication-with-laravel-4--net-35593
- http://culttt.com/2013/05/20/getting-started-with-testing-laravel-4-models/
- http://bigbitecreative.com/deploying-laravel-4-azure/
- http://getbootstrap.com
- http://laravel.com
- http://www.windowsazure.com/
