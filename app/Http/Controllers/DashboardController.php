<?php

namespace App\Http\Controllers;

use App\Events\PostStatusUpdated;
use App\Models\Post;
use App\Notifications\PostStatusUpdated as NotificationsPostStatusUpdated;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->oldest()->get();
        return view('dashboard', compact('posts'));
    }

    public function updateStatus($id, $status)
    {
        $post = Post::findOrFail($id);
        $post->status = $status;
        $post->save();
        event(new PostStatusUpdated($post));
        $user = User::findOrFail($post->user_id);
        $user->notify(new NotificationsPostStatusUpdated($post));
        return redirect()->back();
    }
}
