<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ad;

class Dashboard extends Component
{
    public function render()
    {
        $ads = Ad::all()->where('seller_id', '=' , auth()->user()->id);
        $count = 0;
        foreach ($ads as $ad) {
            if ($ad['status'] == 0) {
                $count++;
            }
        }
        return view('livewire.dashboard')
        ->extends('layouts.app')
        ->section('content')
        ->with('user', auth()->user())
        ->with('ads', $ads)
        ->with('count', $count);
    }
}
