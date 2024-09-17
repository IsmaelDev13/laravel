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

Route::get('/jobs/create', function(){
    return view('jobs.create');    
});

Route::get("/jobs/{id}", function($id){
 
    $job = Job::find($id);
    return view("jobs.show", ['job'=> $job]);
});

Route::post("/jobs", function(){
 
    Job::create([
        'title'=>'',
        'salary'=>'',
        'employer_id'=>'',
    ]);
    return redirect('/jobs');
});



Route::get("/contact", function(){
    return view("contact");
});