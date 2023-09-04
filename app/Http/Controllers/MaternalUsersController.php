<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyValidation;
use App\Models\Doctors;
use App\Models\Maternal_users;
use App\Models\Mothers;
use App\Models\Nurses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class MaternalUsersController extends Controller
{
    public function index()
    {
        $users = Maternal_users::all();
        return view('Maternal.admin.index', compact('users'));
    }

    public function create()
    {
        return view('Maternal.admin.create');
    }

    public function store(MyValidation $request)
    {
        $request->validated();

        if ($request->input('role') == 'Nurse') {
            $users = Maternal_users::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'surname' => $request->surname,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'region' => $request->region,
                'address' => $request->address,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'password' => $request->password
            ]);

            Nurses::create([
                'users_id' => $users->id,
            ]);
        } elseif ($request->input('role') == 'Doctor') {
            $users = Maternal_users::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'surname' => $request->surname,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'region' => $request->region,
                'address' => $request->address,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'password' => $request->password
            ]);

            Doctors::create([
                'users_id' => $users->id,
            ]);
        } else {
            $users = Maternal_users::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'surname' => $request->surname,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'region' => $request->region,
                'address' => $request->address,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'password' => $request->password
            ]);

            Mothers::create([
                'users_id' => $users->id,
            ]);
        }
        return redirect()->route('index');
    }

    public function show(Maternal_users $id)
    {
        $users = $id;
        return view('Maternal.admin.show', compact('users'));
    }

    public function edit(Maternal_users $id)
    {
        $users = $id;
        return view('Maternal.admin.edit', compact('users'));
    }

    public function update(Request $request, Maternal_users $id)
    {
        $id->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'surname' => $request->surname,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex,
            'region' => $request->region,
            'address' => $request->address,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'password' => $request->password
        ]);
        return redirect()->route('index');
    }

    public function delete(Maternal_users $id)
    {
        $id->delete();
        return redirect()->route('index');
    }

    public function login_index()
    {
        return view('Maternal.login');
    }

    public function home()
    {
        return view('Maternal.dashboard');
    }

    public function login_user(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Maternal_users::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            return back()->with('not found', "You haven't registered or invalid data");
        }
    }
    public function welcome()
    {
        return view('Maternal.login');
    }

    public function register_index()
    {
        return view('Maternal.register');
    }

    public function register_users(MyValidation $request)
    {
        $request->validated();

        if ($request->input('role') == 'Nurse') {
            $users = Maternal_users::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'surname' => $request->surname,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'region' => $request->region,
                'address' => $request->address,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'password' => $request->password
            ]);

            Nurses::create([
                'users_id' => $users->id,
            ]);
        } elseif ($request->input('role') == 'Doctor') {
            $users = Maternal_users::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'surname' => $request->surname,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'region' => $request->region,
                'address' => $request->address,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'password' => $request->password
            ]);

            Doctors::create([
                'users_id' => $users->id,
            ]);
        } elseif ($request->input('role') == 'Admin'){
            $users = Maternal_users::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'surname' => $request->surname,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'region' => $request->region,
                'address' => $request->address,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'password' => $request->password
            ]);
        }
        return redirect()->route('login.index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.index');
    }
}
