<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }
 
    // create New User 
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'gender' => ['required'],
            'job_title' => ['required'],
            'started_working_on' => ['required'],
            'role' => ['required']
        ]);

        // Create user
        $user = User::create([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'password' => bcrypt($formFields['password']),
            'gender' => $formFields['gender'],
            'job_title' => $formFields['job_title'],
            'started_working_on' => $formFields['started_working_on'],
            'role' => $formFields['role']
        ]);
    
        // Login
        auth()->login($user);    

        return redirect('/');
    }


    // Create Accounts
    public function createAccount(Request $request) {
        // dd($request);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'gender' => ['required'],
            'job_title' => ['required'],
            'started_working_on' => ['required'],
            'role' => ['required'],
            'company_id' => ['required'],
        ]);

        // Create user
        User::create([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'password' => bcrypt($formFields['password']),
            'gender' => $formFields['gender'],
            'job_title' => $formFields['job_title'],
            'started_working_on' => $formFields['started_working_on'],
            'role' => $formFields['role'],
            'company_id' => $formFields['company_id'],
        ]);

        return redirect('/');
    }

    // Logout Use
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Login User
    public function login() {
        return view('users.login');
    }

    // Authenticate user
    public function authenticate(Request $request) {
        // dd($request);
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // $active = User::find($formFields['email'])->join('companies', 'users.id', '=', 'companies.company_id')
        //             ->select('users.role', 'companies.active');
        $active = DB::table('users')
                ->join('companies', 'users.company_id', '=', 'companies.id')
                ->select('users.role', 'companies.active')
                ->where('users.email', '=', $formFields['email'])
                ->first();

        if ($active->role == 'employee' && $active->active == '0'){
            return back()->withErrors(['email' => 'Your Company is Deactivated'])->onlyInput('email');
        }

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function editProfile(Request $request) {
        // dd(request());
        $id = Auth::user()->id;
        $editData = User::find($id);
        $editData->name = $request->name;
        $editData->email = $request->email;
        $editData->gender = $request['gender'];
        $editData->job_title = $request->job;

        if (Hash::check($request['currPass'], $editData->password)){
            // return abort(404);
        }

        $formFields = $request->validate([
            'newPass' => ['required', 'string', 'confirmed', 'min:8'],
        ]);

        $editData->password = bcrypt($formFields['password']);


        if ($request->file('photo')) {
            $file = $request->file('photo');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/images'), $filename);
            $editData['photo'] = $filename;
        }
        $editData->save();
        return redirect('/profile');
    }

}
