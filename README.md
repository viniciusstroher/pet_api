laravel new pet_api
composer require --dev phpunit/phpunit
vendor\bin\phpunit

composer require fzaninotto/faker
composer require laravel/passport


php artisan make:model Pet --migration --seed
php artisan make:model MedicalConversation --migration --seed
php artisan make:request PetRequest
php artisan make:request MedicalConversationRequest
php artisan make:controller PetController --resource
php artisan make:controller MedicalConversationController --resource
php artisan make:test PetControllerTest
php artisan make:test MedicalConversationControllerTest

php artisan migrate:refresh --seed
php artisan passport:install



php artisan test

php artisan serve
