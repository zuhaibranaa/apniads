<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = Chat::all()->where('from_user',auth()->user()->id);
        $chats2 = Chat::all()->where('to_user',auth()->user()->id);
        $allchats = array($chats)+array($chats2);
        $allchats = $allchats[0];
        $names = [];
        foreach ($allchats as $chat => $value) {
            array_push()
        }
        return view('livewire.chats')->with('chats',$allchats);
        // return $allchats[0][0];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatRequest $request)
    {
        $chat = new Chat();
        $chat->from_user = $request->from_user;
        $chat->to_user = $request->to_user;
        $chat->content = $request->messge;
        $chat->image = $request->attachment;
        if($request->hasFile('attachment')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path().'/attachments/', $filename);
            $chat->image = $filename;
        }
        $chat->save();
        return redirect('chat');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatRequest  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
