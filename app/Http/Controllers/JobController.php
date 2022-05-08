<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Http\Requests\StorejobRequest;
use App\Http\Requests\UpdatejobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = job::all()->where('user_id','=',auth()->user()->id);
        return view('livewire.dashboard-my-jobs')->with('item',$jobs);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorejobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorejobRequest $request)
    {
        $job = new job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->salary = $request->salary;
        $job->status = 0;
        if($request->hasFile('images'))
         {
            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $data[] = $name;
            }
         }
        $job->images = json_encode($data);
        $job->seller_id = auth()->user()->id;
        $job->role = $request->role;
        $job->category_id = intval($request->category_id);
        $job->location = $request->location;
        $job->required_experience = $request->experience;
        $job->qualification = $request->qualification;
        $job->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(job $job)
    {
        return view('livewire.single-job')->with('ad',$job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(job $job)
    {
        return view('livewire.edit-listing')->with('type','job')->with('job',$job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatejobRequest  $request
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatejobRequest $request, job $job)
    {
        if (auth()->user()->is_admin && $job->seller_id == auth()->user()->id) {
            $job->status = 1;
        }else{
            $job->title = $request->title;
            $job->description = $request->description;
            $job->salary = $request->salary;
            if (auth()->user()->is_admin) {
                $job->status = 1;
            } else {
                $job->status = 0;
            }
            if($request->hasFile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/', $name);
                    $data[] = $name;
                }
            }
            $job->images = json_encode($data);
            $job->seller_id = auth()->user()->id;
            $job->role = $request->role;
            $job->category_id = intval($request->category_id);
            $job->location = $request->location;
            $job->required_experience = $request->experience;
            $job->qualification = $request->qualification;
        }
        $job->save();
        return redirect('job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(job $job)
    {
        $job->delete();
        return redirect()->back();
    }
}
