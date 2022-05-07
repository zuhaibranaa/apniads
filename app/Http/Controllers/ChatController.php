<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allchats = DB::select('select * from chats where from_user = ? OR to_user = ?', [auth()->user()->id,auth()->user()->id]);
        $values = [];
        for ($i=0; $i < count($allchats); $i++) {
            array_push($values,(int)$allchats[$i]->from_user);
            array_push($values,(int)$allchats[$i]->to_user);
        }
        $values = collect($values)->unique()->values()->all();
        unset($values[array_search(auth()->user()->id,$values)]);
        $values = array_values($values);
        return view('livewire.chats')
        ->with('chats',$allchats)
        ->with('ids',$values);
        $data = $allchats;
        // return $values;
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
