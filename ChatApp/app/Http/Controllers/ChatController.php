<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function groups() {
        $users = User::query()
            ->when(request('search'), function($query) {
                $query->where('name', 'LIKE', '%' . request('search') . '%')
                 ->orWhere('email', 'LIKE', '%' . request('search') . '%');
            })
            ->paginate();
        return view('chat.group', compact('users'));
    }
}
