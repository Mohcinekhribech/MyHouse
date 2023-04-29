<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConversationRequest;
use App\Http\Resources\ConversationsResource;

class ConversationsController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->id);
        if ($user->role == 'client')
            return ConversationsResource::collection(Conversation::where('client_id', $user->id)->get()) ;

        return ConversationsResource::collection(Conversation::where('owner_id', $user->id)->get());
    }
    public function store(StoreConversationRequest $request)
    {
        if(Conversation::where('client_id',$request->client_id)->where('owner_id',$request->owner_id)->count()==0){
            return Conversation::create([
                'client_id' => $request->client_id,
                'owner_id' => $request->owner_id
            ]);
        }
        return 'exist';
    }
}
