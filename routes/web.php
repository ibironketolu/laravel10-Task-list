<?php
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

#=====================================================
                #ROUTES
#=====================================================
Route::get('/tasks', function ()  {
    return view ('index', [
        'name'=>'Toluwanimi Ibironke',
        'tasks' => \App\Models\Task::latest()->where('completed', true)->get(),
    ]);
})->name("tasks.index");

// Route::get('/tasks/{id}', function($id){
//     return "One Single Task";

// })->name('tasks.show');

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

Route::view('/tasks/create', 'create')
->name('tasks.create'); #to view a page without name or the rest it mmust be above the id one the /tasks/create is where i want the url

Route::get('/tasks/{id}', function($id)  {
    return view ('show', ['tasks' => Task::findOrFail($id)]);
})->name('tasks.show');


#GET


#POST
Route::post('/tasks', function(Request $request){
    $data = $request->validate([
      'title'=> 'required|max:255',
      'description'=> 'required',
      'long_description'=> 'required',
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description =$data['description'];
    $task->long_description =$data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.store');

#PUT


#DELETE