<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;

class ChatController extends Controller
{
    public function groups() {
        $companies = Company::all();
        return view('chat.group', compact('companies'));
    }

    public function people() {
        $users = User::query()
            ->when(request('search'), function($query) {
                $query->where('name', 'LIKE', '%' . request('search') . '%')
                 ->orWhere('email', 'LIKE', '%' . request('search') . '%');
            })
            ->paginate();

        return view('chat.people', compact('users'));
    }
}
