<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only([
            'create',
            'store',
            'edit',
            'update',
            'destroy'
        ]);
    }
    public function search(Request $req)
    {
        $ads = Ad::all()->where('title');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all()->where('status',1);
        return view('livewire.all-ads')->with('ads',$ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.create-listing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad = new Ad();
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->brand = $request->brand;
        $ad->model = $request->model;
        $ad->health = $request->health;
        $ad->condition = $request->condition;
        if (auth()->user()->is_admin) {
            $ad->status = 1;
        }else{
            $ad->status = 0;
        }
        $ad->location = $request->location;
        $ad->specifications = $request->specifications;
        $ad->price = $request->price;
        if($request->hasFile('images'))
         {
            foreach($request->file('images') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $data[] = $name;
            }
         }
        $ad->images = json_encode($data);
        if(!$request->has('is_negotiable')){
            $ad->is_negotiable = 0;
        }else{
            $ad->is_negotiable = $request->is_negotiable;
        }
        $ad->seller_id = auth()->user()->id;
        $ad->category_id = $request->category_id;
        $ad->save();
        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        $comments = Comment::all()
        ->where('is_ad','=',1)
        ->where('listing_id','=',$ad['id']);
        return view('livewire.single-ad')->with('ad', $ad)->with('comments',$comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('livewire.edit-listing')->with('type','ad')->with('ad',$ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Ad $ad)
    {
        if (auth()->user()->is_admin) {
            $ad->status = 1;
        }else if(auth()->user()->is_admin && $ad['seller_id'] == auth()->user()->id){
            $ad->title = $request->title;
            $ad->description = $request->description;
            $ad->brand = $request->brand;
            $ad->model = $request->model;
            $ad->health = $request->health;
            $ad->condition = $request->condition;
            $ad->location = $request->location;
            $ad->specifications = $request->specifications;
            $ad->price = $request->price;
            if($request->hasFile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $name=$image->getClientOriginalName();
                    $image->move(public_path().'/images/', $name);
                    $data[] = $name;
                }
            }
            $ad->images = json_encode($data);
            if(!$request->has('is_negotiable')){
                $ad->is_negotiable = 0;
            }else{
                $ad->is_negotiable = $request->is_negotiable;
            }
        }
        $ad->save();
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->back();
    }
}
