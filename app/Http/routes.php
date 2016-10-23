<?php


use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Task;
use Illuminate\Http\Request;


Route::get('/', function () {

    $tasks = Task::all();

    return View::make('welcome')->with('tasks',$tasks);
});

Route::get('/tasks/{task_id?}',function($task_id){
    $task = Task::find($task_id);

    return Response::json($task);
});

Route::post('/tasks',function(Request $request){
    $task = Task::create($request->all());
    $data=[
        'id'=>$task->id,
        'task'=>$task->task,
        'description'=>$task->description,
        'deadline'=>$task->deadline,
        'created_at'=>$task->created_at->diffForHumans(),


    ];

    return Response::json($data);
});

Route::put('/tasks/{task_id}',function(Request $request,$task_id){
    $task = Task::find($task_id);

    $task->task = $request->task;
    $task->description = $request->description;
    $task->deadline=$request->deadline;

    $task->save();

    $data=[
        'id'=>$task->id,
        'task'=>$task->task,
        'description'=>$task->description,
        'created_at'=>$task->created_at->diffForHumans(),
        'deadline'=>$task->deadline->diffForHumans(),
    ];

    return Response::json($data);
});

Route::delete('/tasks/{task_id}',function($task_id){
    $task = Task::destroy($task_id);

    return Response::json($task);
});
