<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\job;
use App\Http\Requests\StoreJobApplicationRequest;
use App\Http\Requests\UpdateJobApplicationRequest;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = job::all()->where('user_id',auth()->user()->id);
        $j = [];
        foreach ($jobs as $key => $value) {
            if ($key == 'id') {
                array_push($j,$key);
            }
        }
        $jobapplications = JobApplication::all()->whereIn('jobid',$j);
        // return $jobapplications;
        return view('livewire.dashboard-my-job-applications')->with('item',$jobapplications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobApplicationRequest $request)
    {
        $application = new JobApplication();
        $application->applied_by = $request->appliedby;
        $application->job_id = $request->jobid;
        $application->applicant_name = $request->name;
        $application->applicant_age = $request->age;
        $application->applicant_contact = $request->phone;
        $application->applicant_experience = $request->experience;
        $application->applicant_availability = $request->availability;
        $application->save();
        return redirect('job-application');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function show(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobApplicationRequest  $request
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobApplicationRequest $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
