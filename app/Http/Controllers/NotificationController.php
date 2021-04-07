<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function subscribe(Request $request)
    {
        // Save token from database
        $user = User::findOrFail(auth()->user()->id);
        $user->onesignal_token = $request->token;
        $user->save();
        return response()->json($request->token);
    }

    public function unsubscribe(Request $request)
    {
        // Remove token from database
        $user = User::findOrFail(auth()->user()->id);
        $user->onesignal_token = null;
        $user->save();
        return response()->json($request->token);
    }
}
