<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ad;

class Index extends Component
{
    public function render()
    {
        $ads = Ad::orderBy('id','DESC')->get();
        return view('livewire.index')->extends('layouts.app')->section('content')->with('ads',$ads);
    }
}
