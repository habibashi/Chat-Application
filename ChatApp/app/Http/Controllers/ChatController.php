<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function groups() {
        // $companies = Company::where('id', Auth::user()->company_id)->get();
        
        $companies = Company::all();
        return view('chat.group', compact('companies'));
    }

    public function people() {
        // $users = User::query()
        //     ->where('company_id', '=',  )
        //     ->when(request('search'), function($query) {
        //         $query->where('name', 'LIKE', '%' . request('search') . '%')
        //          ->orWhere('email', 'LIKE', '%' . request('search') . '%');
        //     })
        //     ->paginate();
        // return view('chat.people', compact('users'));

        $users = User::all()->where('company_id', Auth::user()->company_id)->except(Auth::id());
                // ->get();

        return view('chat.people', compact('users'));
    }
}
