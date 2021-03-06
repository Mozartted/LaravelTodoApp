<?php

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
use App\Like;
use Illuminate\Database\Eloquent\Collection;

Route::group(['namespace'=>'tasks'],function(){
    Route::get('/{task_id?}',function($task_id){
        $task = Task::find($task_id);

        return Response::json($task);
    });

    Route::post('/',function(Request $request){
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

    //adding new like to a task
    Route::post('/like/{task}',function(Request $request,Task $task){
        Like::create($request->all());

        $tasklikes=count((array)$task->likes());
        $likes=[
            'likes_number'=>$tasklikes,
        ];

        return Response::json($likes);

    });

    Route::put('/{task_id}',function(Request $request,$task_id){
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

    Route::delete('{task_id}',function($task_id){
        $task = Task::destroy($task_id);

        return Response::json($task);
    });
});

Route::get('/', function () {

    $tasks = Task::all();

    return View::make('welcome')->with('tasks',$tasks);
});
