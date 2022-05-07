<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ad;
use App\Models\job;

class Index extends Component
{
    public function render()
    {
        $ads = Ad::orderBy('id','DESC')->where('status','=','1')->get();
        $jobs = job::orderBy('id','DESC')->get();
        return view('livewire.index')->extends('layouts.app')->section('content')->with('ads',$ads)->with('jobs',$jobs);
    }
}
