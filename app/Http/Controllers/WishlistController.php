<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use App\Http\Requests\StorewishlistRequest;
use App\Http\Requests\UpdatewishlistRequest;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist = wishlist::all()->where('user_id','=',auth()->user()->id);
        return view('livewire.dashboard-wishlist')
        ->with('item',$wishlist);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorewishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewishlistRequest $request)
    {
        $exist = wishlist::all()->where('item_id','=',$request['item_id']);
        try {
            $exist[0];
            return redirect('wishlist');
        } catch (\Throwable $th) {
            $wishlist = new wishlist();
            $wishlist['user_id'] = auth()->user()->id;
            $wishlist['item_id'] = $request['item_id'];
            $wishlist->save();
            return redirect('wishlist');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->back();
    }
}
