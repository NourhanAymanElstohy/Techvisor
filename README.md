<p align="center"> <img src="logo-bg.png"  width="400" height="270"alt=""></p>

<p align="center">
<a href="#" target="_blank"><i class="fa fa-facebook" style="color: #4267B2;"></i></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Techvisor

Techvisor is a professional consulting web application specially in IT fields. We learned from laravel that development must be an enjoyable and creative experience to be truly fulfilling. Techvisor provides a rich community of professionals that can solve users’ problems or consulting them in many different IT fields and development technologies, such as:

-   PHP.
-   [Laravel](https://laravel.com/docs).
-   Node.Js.
-   DataBase.

## Tech/framework used

<b>Built with</b>

-   [Laravel](https://laravel.com)

## Features

For User:

-   User can ask public question.
-   User can answer to any public question.
-   User can ask specific Professional.
-   User can connect to Free Professional through Zoom.
-   User can rate Professionals.
-   User connect to premium Professional after payment through PayPal.

For Professional:

-   Professional has all user functionality.
-   Professional can't ask himself or connect to himself through zoom.
-   If Professional rate reach 5 stars it will promoted to premium.
-   Premuim Professionals' money reach to Techvisor PayPal account.

## Contributing

We are an ITI graduation team.

## Send Reviewe

In order to ensure that we are welcoming to recieve any reviews, please send it to us on [Techvisor Email](techvisor.consulting@gmail.com).

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/7.x/installation#installation)

Clone the repository

```
git clone https://github.com/NourhanAymanElstohy/Techvisor.git
```

Switch to the repo folder

```
cd Techvisor
```

Install all the dependencies using composer

```
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

Generate a new application key

```
php artisan key:generate
```

Run the database migrations and seed (**Set the database credentials in .env before migrating**)

```
php artisan migrate:fresh --seed
```

Start the local development server

```
    php artisan serve
```

You can now access the server at http://localhost:8000

-   Then finally add these env varables to your .env

```
ZOOM_CLIENT_KEY=7Fjee5qCR-qmS5UUSQWFWA
ZOOM_CLIENT_SECRET=dy7dSQHJvb1z9YpNe5HYQ0A76uhF0008bHKF
PAYPAL_SANDBOX_CLIENT_ID=Afj1767c5EBDnNKKMr0g36iX4TteG0YnrARwdsoDBIctrLjng0DcllcfuwZKrNxMB_VCVlp2Kmzm92b6
PAYPAL_SANDBOX_SECRET=EMpKZOOG9CNwKiWtY8p-PBzXQOhn5EsdFuapx_JN7X8Op4r0kk5vEuoLXcz46HibCRMOyQoRC0A0D637
PAYPAL_MODE=sandbox
```

-   You can check payment with paypal with this account

```
email: sb-yjgs472285024@personal.example.com
pass: #}C9o_*3
```
