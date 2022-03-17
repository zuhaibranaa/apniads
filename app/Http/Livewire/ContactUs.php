<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactUs extends Component
{
    public function render()
    {
        return view('livewire.contact-us')->extends('layouts.app')->section('content');
    }
}
