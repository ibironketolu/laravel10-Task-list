<?php
use App\Http\Requests\Taskrequest;
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
        // 'tasks' => Task::latest()->where('completed', true)->get(),
        // 'tasks' => Task::latest()->get(),
        'tasks' => Task::latest()->paginate(12), #for pagination
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

Route::get('/tasks/{task}/edit', function(Task $task)  {
    return view ('edit', [
        'tasks' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function(Task $task)  {
    return view ('show', [
        'tasks' => $task]);
})->name('tasks.show');


#GET


#POST
Route::post('/tasks', function(TaskRequest $request){
    #a shorter way of writng this data above it can be written like this
    $task = Task::create($request ->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success' ,'Tasks Successfully Created !!');
})->name('tasks.store');

#PUT
Route::put('/tasks/{task}', function(Task $task,TaskRequest $request){

    $task->update($request ->validated()) ;

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success' ,'Tasks Updated Successfully !!');
})->name('tasks.update');


        #tO TOGGLE TASK COMPLETED FOR 1-0
Route::put('tasks/{task}/toggle-complete', function(Task $task){
    $task->toggleComplete() ;

    return redirect()->back()->with('success','Task updated successfully');

})->name('tasks.toggle-complete');

#DELETE

Route::delete('/tasks/{task}', function(Task $task){
    
    $task->delete();

    return redirect()->route('tasks.index')
    ->with('success','Task Successfully Deleted');
})->name('tasks.destroy');















#================================================================================
#                           SAMPLE CODES FOR READING
#================================================================================

// FOR PASSING ID TO EDIT PAGE TO MAKE USE OF 
// Route::get('/tasks/{id}/edit', function($id)  {
//     return view ('edit', [
//         'tasks' => Task::findOrFail($id)]);
// })->name('tasks.edit');


// FOR SAVING DATA TO THE DATABASE SYSTEM

// Route::post('/tasks', function(Request $request){
//     $data = $request->validate([
//       'title'=> 'required|max:255',
//       'description'=> 'required',
//       'long_description'=> 'required',
//     ]);

//     $task = new Task; #create an object for the model
//     $task->title = $data['title'];
//     $task->description =$data['description'];
//     $task->long_description =$data['long_description'];
//     $task->save();

//     return redirect()->route('tasks.show', ['id' => $task->id])
//     ->with('success' ,'Tasks Successfully Created !!');
// })->name('tasks.store');



    // $data = ;
    // $task = Task::findOrFail($id); #create an object for the model
    // $task->title = $data['title'];
    // $task->description =$data['description'];
    // $task->long_description =$data['long_description'];
    // $task->save();

        // $data = $request->validated();
    // $task = new Task; #create an object for the model
    // $task->title = $data['title'];
    // $task->description =$data['description'];
    // $task->long_description =$data['long_description'];
    // $task->save();