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
| GET       | api/categories                  | categories.index   |
| POST      | api/categories                  | categories.store   |
| DELETE    | api/categories/{id}             | categories.destroy |
| PUT       | api/categories/{id}             | categories.update  |
| GET       | api/categories/{id}             | categories.show    |
| GET       | api/items                      | items.index       |
| POST      | api/items                      | items.store       |
| POST      | api/items/detach_from_category |                  |
| POST      | api/items/filter               | items.filter      |
| GET       | api/items/{id}                 | items.show        |
| PUT       | api/items/{id}                 | items.update      |
| DELETE    | api/items/{id}                 | items.destroy     |
| POST      | api/tags                       | tags.store        |
| GET       | api/tags                       | tags.index        |
| POST      | api/tags/detach_from_category  |                  |
| POST      | api/tags/detach_from_item      |                  |
| DELETE    | api/tags/{id}                  | tags.destroy      |
| PUT       | api/tags/{id}                  | tags.update       |
| GET       | api/tags/{id}                  | tags.show         |
| GET       | api/users                      | users.index       |
| POST      | api/users                      | users.store       |
| POST      | api/users/detach_from_role     |                  |
| POST      | api/users/issue_token          |                  |
| GET       | api/users/{id}                 | users.show        |
| PUT       | api/users/{id}                 | users.update      |
| DELETE    | api/users/{id}                 | users.destroy     |

#### Minuses
- Jwt issue algorithm too simple, maybe use more complex logic.
- For now jwt not related with user explicitly, but maybe logic must be more strict.
- Missing validation in some places (user, role, etc.)
- Advanced rights in const for now, but should be in db if too many advanced rights would be created. (permission system should be implemented)
- Have some security breaches that i've missed.
