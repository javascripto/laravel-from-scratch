# Anotações:

- Adicionar no gitpod:
    - `mysql -e 'create database homestead'`
    - `php artisan migrate`

- Obter ajuda de comandos do artisan: `php artisan help make:migration`
- Migrations
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
    - Resetar migrations
        `php artisan migrate:reset`

- Model (Active Record)
    - Criando uma model
        `php artisan make:model Task`
    - Criando uma model com migration (-m), controller (-c) e resource (-r)
        `php artisan make:model Task -mcr`
    - Acessando o Tinker
        `php artisan tinker`
    - Brincando com models no tinker
        - `App\Task::all()`
        - `App\Task::find(1)`
        - `App\Task::first()`
        - `App\Task::pluck('body')`
        - `App\Task::where('id', 1)->get()`
        - `App\Task::where('id', '>', 1)->get()`
        - `App\Task::whereIn('id', [1, 2])->get()`
        - `App\Task::select('id', 'body')->whereIn('id', [1, 2])->get()`

    - Adicionando comportamento à Model
    ```php
    class Task extends Model
    {
        // uso: Task::incompleted();
        public static function incompleted()
        {
            return static::where('completed', 0)->get();
        }

        // uso: Task::completed(false)->get();
        public function scopeCompleted($query, $value)
        {
            return $query->where('completed', $value);
        }
    }
    ```

    - Recebendo informações na rota para query
    ```php
    // Uso: curl localhost/tasks/1
    Route::get('/tasks/{id}', function(int $id) {
        $task = Task::find($id);
        return view('tasks.show')->with(compact('task'));
    });
    ```
    - Recebendo informações na rota injetando model
    ```php
    // Uso: curl localhost/tasks/1
    Route::get('/tasks/{task}', function(Task $task) {
        return view('tasks.show')->with(compact('task'));
    });
    ```

- Controllers
    - Comando para criar um controller: `php artisan make:controller TasksController`
    - Diretório para Controllers: `app/Http/Controllers`
    - Principais métodos de um controller: `index`, `show`, `store`, `update`, `delete`
   ```php
    <?php
        namespace App\Http\Controllers;

        use App\Task;
        use Illuminate\Http\Request;

        class TasksController extends Controller
        {
            public function index(Request $request)
            {
                $tasks = Task::all();
                return view('tasks.index', compact('tasks'));
            }

            public function show(Task $task)
            {
                return view('tasks.show')->with(compact('task'));
            }
        }
    ```

- Templates Blade
    - Criando um Model com migration e controller: `php artisan make:model Post -mc`
    - Criando um layout mestre para herdar em outro arquivo e incluir partes de layouts. (yield, extends, section, include)
        ```php
            <!-- layouts/master.blade.php -->
            <h1>Template Master</h1>
            <div>
                @yield ('content')
            </div>
        ```
        ```php
            <!-- page.blade.php -->
            @extends ('layouts.master')

            @section ('content')
                Here goes the content
            @endsection

            @include('layouts.footer')
        ```
