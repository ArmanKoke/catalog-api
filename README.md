<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Catalog_api
- copy ``.env`` from ``.env.example``
- run ``composer install``
- run ``php artisan migrate --seed``
- enjoy using api

## Usage
Put to the header next variables:  
``key:Accept, value:application/json``  
``key:email,  value:asd@asd.asd``  
``key:token,  value:eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzUxMiIsImp0aSI6IjdzZ253OTIwYXNscyJ9.eyJqdGkiOiI3c2dudzkyMGFzbHMiLCJpc3MiOiJjYXRhbG9nIiwiaWF0IjoxMCwiYXVkIjoiYXNkQGFzZC5hc2QiLCJzdWIiOiJ0ZXN0In0.``  

Then feel free to issue another tokens for any user to check authentication and authorization.

#### Minuses
- Jwt issue algorithm too simple, maybe use more complex logic.
- For now jwt not related with user explicitly, but maybe logic must be more strict.
- Missing validation in some places (user, role, etc.)
- Advanced rights in const for now, but should be in db if too many advanced rights would be created. (permission system should be implemented)
- Have some security breaches that i've missed.
