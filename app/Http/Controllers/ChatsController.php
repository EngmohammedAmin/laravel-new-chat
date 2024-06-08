<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //Add the below functions
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
        // $messages = Message::with('user')->paginate(5);

        // return $messages;
    }

    public function sendMessage(Request $request)
    {
        try {
            // return ['status' => 'Message Sent!'];
            $user = Auth::user();
            $message = $user->messages()->create([
                'message' => $request->input('message'),
                'user_id' => $user->id,
            ]);
            broadcast(new MessageSent($user, $message))->toOthers();

            // return ['status' => 'Message Sent!'];
            return response()->json(['message' => 'Message sent']);
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
