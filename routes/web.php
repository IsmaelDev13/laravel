<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    $jobs = Job::with('employer')->paginate(3);
    return view('jobs',[
        'jobs'=> $jobs
    ]);
});


Route::get("/jobs", function() {
    return view('jobs.index',[
        'jobs'=> Job::all()
    ]);
});

//Create
Route::get('/jobs/create', function(){
    return view('jobs.create');    
});
//Show
Route::get("/jobs/{id}", function($id){
 
    $job = Job::find($id);
    return view("jobs.show", ['job'=> $job]);
});

// Store
Route::post("/jobs", function(){
    request()->validate([
      'title'=> ['required', 'min:3'],
      'salary'=>   ['required'] 
    ]);
    Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id'=>1,
    ]);
    return redirect('/jobs');
});



//Edit
Route::get("/jobs/{id}/edit", function($id){
 
    $job = Job::find($id);
    return view("jobs.edit", ['job'=> $job]);
});

//Update
Route::patch("/jobs/{id}", function($id){
 
    //validate
    request()->validate([
        'title'=> ['required', 'min:3'],
        'salary'=>   ['required'] 
      ]);
    //authorize (On hold...)
    // update the job
    // and persist
      $job=Job::findOrFail($id);
    $job->update([
    'title'=> request('title'),
    'salary'=> request('salary'),
    ]);
    // redirect to the job page 
    return redirect('/jobs/', $job->id);
});

//Destroy
Route::delete("/juri: jobs/{id}", function($id){
 
    $job = Job::findOrFail($id);
    $job->delete();

    return redirect("/jobs");
});


Route::get("/contact", function(){
    return view("contact");
});