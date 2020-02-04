# Anotações:

- Adicionar no gitpod:
    - `mysql -e 'create database homestead'`
    - `php artisan migrate`

- Obter ajuda de comandos do artisan: `php artisan help make:migration`
- migrations
    - Criar migration:
        `php artisan make:migration create_tasks_table`
    - Criar migration especificando tabela: 
        `php artisan make:migration create_tasks_table --create=tasks`
    - Resolvendo problemas com autoload do composer ao apagar uma migration na mão:
        `composer dump-autoload`
    - Rodando migrations:
        `php artisan migrate`
    - Ver comandos sql sem rodar migrations:
        `php artisan migrate --pretend`
    - Desfazendo uma migration:
        `php artisan migrate:rollback`
    - Reseta e roda migrations novamente:
        `php artisan migrate:refresh`

- Queries antes de configurar seeders:
    ```sh
    php artisan migrate
    mycli -uroot
    ```
    ```sql
    insert into tasks (body, created_at, updated_at) values ('Go to store', now(), now());
    insert into tasks (body, created_at, updated_at) values ('Finish screencast', now(), now());
    ```