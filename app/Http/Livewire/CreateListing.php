<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateListing extends Component
{
    public function render()
    {
        return view('livewire.create-listing')->extends('layouts.app')->section('content');
    }
}
