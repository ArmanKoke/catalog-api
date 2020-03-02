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
Header:  
``key:Accept, value:application/json``  
Token for auth:
``eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzUxMiIsImp0aSI6IjdzZ253OTIwYXNscyJ9.eyJqdGkiOiI3c2dudzkyMGFzbHMiLCJpc3MiOiJjYXRhbG9nIiwiaWF0IjoxMCwiYXVkIjoiYXNkQGFzZC5hc2QiLCJzdWIiOiJ0ZXN0In0.``  

Then feel free to issue another tokens for any user to check authentication and authorization.

## Methods

| Method    | Route                         | Name             |
|-----------|-------------------------------|------------------|
| GET       | api/category                  | category.index   |
| POST      | api/category                  | category.store   |
| DELETE    | api/category/{id}             | category.destroy |
| PUT       | api/category/{id}             | category.update  |
| GET       | api/category/{id}             | category.show    |
| GET       | api/item                      | item.index       |
| POST      | api/item                      | item.store       |
| POST      | api/item/detach_from_category |                  |
| POST      | api/item/filter               | item.filter      |
| GET       | api/item/{id}                 | item.show        |
| PUT       | api/item/{id}                 | item.update      |
| DELETE    | api/item/{id}                 | item.destroy     |
| POST      | api/tag                       | tag.store        |
| GET       | api/tag                       | tag.index        |
| POST      | api/tag/detach_from_category  |                  |
| POST      | api/tag/detach_from_item      |                  |
| DELETE    | api/tag/{id}                  | tag.destroy      |
| PUT       | api/tag/{id}                  | tag.update       |
| GET       | api/tag/{id}                  | tag.show         |
| GET       | api/user                      | user.index       |
| POST      | api/user                      | user.store       |
| POST      | api/user/detach_from_role     |                  |
| POST      | api/user/issue_token          |                  |
| GET       | api/user/{id}                 | user.show        |
| PUT       | api/user/{id}                 | user.update      |
| DELETE    | api/user/{id}                 | user.destroy     |

#### Minuses
- Jwt issue algorithm too simple, maybe use more complex logic.
- For now jwt not related with user explicitly, but maybe logic must be more strict.
- Missing validation in some places (user, role, etc.)
- Advanced rights in const for now, but should be in db if too many advanced rights would be created. (permission system should be implemented)
- Have some security breaches that i've missed.
