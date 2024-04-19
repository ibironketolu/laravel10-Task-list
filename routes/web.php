<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

#=====================================================
                #ROUTES
#=====================================================
Route::get('/tasks', function () use($tasks) {
    return view ('index', [
        'name'=>'Toluwanimi Ibironke',
        'tasks' => $tasks,
    ]);
})->name("tasks.index");

Route::get('/tasks/{id}', function($id){
    return "One Single Task";

})->name('tasks.show');

Route::get('/hello', function (){
    return "Hello";
})->name('hello');

Route::get('/hallo', function(){
    return redirect()->route('hello');
});
Route::get('/greet/{name}', function($name){
    return "Wassup ". $name . " How you doing"; 
});

// Route::fallback(function(){
//     return "Still wanna go somewhere";
// });

Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks/{id}', function($id) use($tasks) {
    $result = collect($tasks)->firstWhere('id',$id);
    if (!$result){
         abort(Response::HTTP_NOT_FOUND);
    }
    return view ('show', ['result' => $result]);
})->name('tasks.show');


#GET


#POST


#PUT


#DELETE