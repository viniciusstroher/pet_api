# PET API!
## Instalar Ambiente
### Requisitos
#####	[x] PHP 7+
#####	[x] Composer
#####	[x] Mysql / Mariadb 10+ (.env -> username:root / password:     (sem senha)

### Instalação
##### git clone https://github.com/viniciusstroher/pet_api.git
##### cd pet_api
##### composer install

### Instalar database (verificar conexoes no .env)
##### php artisan migrate:refresh --seed

### Iniciando Servidor
##### php artisan server


# Importar Endpoints para o postman e testar
##### importar o arquivo api_test.postman_collection.json para o postman e testa
##### Api usa autenticação passando o header Authorization: Bearer 8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918
