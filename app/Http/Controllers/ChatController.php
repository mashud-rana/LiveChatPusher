<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getUser(){
        $users=User::where('id','!=',auth()->user()->id)->get();
        return response()->json(['users'=>$users]);
    }

    public function getMessage($id){
        $checkMessage=Message::where('message_from',auth()->user()->id)->orWhere('message_to',auth()->user()->id)->get();
        $messages='';
        if(count($checkMessage)>0){
            $messages=Message::where('message_from',$id)->orWhere('message_to',$id)->get();
        }
        return response()->json(['messages'=>$messages]);
    }

    public function sendNewMessage(Request $request){
        $request->validate([
            'message'=>'required',
            'to'=>'required'
        ]);
        $message=new Message();
        $message->message_from=auth()->user()->id;
        $message->message_to=$request->to;
        $message->message=$request->message;
        $message->save();
        broadcast(new NewMessage($message))->toOthers();
        return response()->json(['message'=>$message]);
    }
}
