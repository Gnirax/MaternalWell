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
                'home_address' => $request->home_address,
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
                'home_address' => $request->home_address,
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
                'home_address' => $request->home_address,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'password' => $request->password
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

    public function update(MyValidation $request, Maternal_users $id)
    {
        // $request->validated();
        // $mothers = Mothers::where('users_id', $id->id)->first();
        // $before = Maternal_users::where('maternal_users.id', $id->id)->first();

        // if ($before->role == $request->role) {
        //     if ($request->role != 'Patient') {
        //         $id->update([
        //             'firstname' => $request->firstname,
        //             'middlename' => $request->middlename,
        //             'surname' => $request->surname,
        //             'birthdate' => $request->birthdate,
        //             'sex' => $request->sex,
        //             'region' => $request->region,
        //             'address' => $request->home_address,
        //             'username' => $request->username,
        //             'email' => $request->email,
        //             'phone_number' => $request->phone_number,
        //             'role' => $request->role,
        //             'password' => $request->password
        //         ]);
        //     } else {
        //         $id->update([
        //             'firstname' => $request->firstname,
        //             'middlename' => $request->middlename,
        //             'surname' => $request->surname,
        //             'birthdate' => $request->birthdate,
        //             'sex' => $request->sex,
        //             'region' => $request->region,
        //             'address' => $request->home_address,
        //             'username' => $request->username,
        //             'email' => $request->email,
        //             'phone_number' => $request->phone_number,
        //             'role' => $request->role,
        //             'password' => $request->password
        //         ]);

        //         $mothers->update([
        //             'firstname' => $request->firstname,
        //             'middlename' => $request->middlename,
        //             'surname' => $request->surname,
        //             'birthdate' => $request->birthdate,
        //             'sex' => $request->sex,
        //             'region' => $request->region,
        //             'address' => $request->home_address,
        //             'username' => $request->username,
        //             'email' => $request->email,
        //             'phone_number' => $request->phone_number,
        //         ]);
        //     }
        // } else {
        //     if ($before->role == 'Doctor' && $request->role == 'Nurse') {
        //         if ($request->role != 'Patient') {
        //             $id->update([
        //                 'firstname' => $request->firstname,
        //                 'middlename' => $request->middlename,
        //                 'surname' => $request->surname,
        //                 'birthdate' => $request->birthdate,
        //                 'sex' => $request->sex,
        //                 'region' => $request->region,
        //                 'address' => $request->home_address,
        //                 'username' => $request->username,
        //                 'email' => $request->email,
        //                 'phone_number' => $request->phone_number,
        //                 'role' => $request->role,
        //                 'password' => $request->password
        //             ]);
        //         } else {
        //             $id->update([
        //                 'firstname' => $request->firstname,
        //                 'middlename' => $request->middlename,
        //                 'surname' => $request->surname,
        //                 'birthdate' => $request->birthdate,
        //                 'sex' => $request->sex,
        //                 'region' => $request->region,
        //                 'address' => $request->home_address,
        //                 'username' => $request->username,
        //                 'email' => $request->email,
        //                 'phone_number' => $request->phone_number,
        //                 'role' => $request->role,
        //                 'password' => $request->password
        //             ]);

        //             $mothers->update([
        //                 'firstname' => $request->firstname,
        //                 'middlename' => $request->middlename,
        //                 'surname' => $request->surname,
        //                 'birthdate' => $request->birthdate,
        //                 'sex' => $request->sex,
        //                 'region' => $request->region,
        //                 'address' => $request->home_address,
        //                 'username' => $request->username,
        //                 'email' => $request->email,
        //                 'phone_number' => $request->phone_number,
        //             ]);
        //         }
        //         Nurses::create([
        //             'users_id' => $request->id
        //         ]);
        //         Doctors::where('users_id', $before->id)->delete();
        //     } else if ($before->role == 'Nurse' && $request->role == 'Doctor') {
        //         if ($request->role != 'Patient') {
        //             $id->update([
        //                 'firstname' => $request->firstname,
        //                 'middlename' => $request->middlename,
        //                 'surname' => $request->surname,
        //                 'birthdate' => $request->birthdate,
        //                 'sex' => $request->sex,
        //                 'region' => $request->region,
        //                 'address' => $request->home_address,
        //                 'username' => $request->username,
        //                 'email' => $request->email,
        //                 'phone_number' => $request->phone_number,
        //                 'role' => $request->role,
        //                 'password' => $request->password
        //             ]);
        //         } else {
        //             $id->update([
        //                 'firstname' => $request->firstname,
        //                 'middlename' => $request->middlename,
        //                 'surname' => $request->surname,
        //                 'birthdate' => $request->birthdate,
        //                 'sex' => $request->sex,
        //                 'region' => $request->region,
        //                 'address' => $request->home_address,
        //                 'username' => $request->username,
        //                 'email' => $request->email,
        //                 'phone_number' => $request->phone_number,
        //                 'role' => $request->role,
        //                 'password' => $request->password
        //             ]);

        //             $mothers->update([
        //                 'firstname' => $request->firstname,
        //                 'middlename' => $request->middlename,
        //                 'surname' => $request->surname,
        //                 'birthdate' => $request->birthdate,
        //                 'sex' => $request->sex,
        //                 'region' => $request->region,
        //                 'address' => $request->home_address,
        //                 'username' => $request->username,
        //                 'email' => $request->email,
        //                 'phone_number' => $request->phone_number,
        //             ]);
        //         }

        //         Doctors::create([
        //             'users_id' => $request->id
        //         ]);
        //         Nurses::where('users_id', $before->id)->delete();
        //     }
        // }

        // Validate the request data
        $request->validated();

        // Fetch the user and mother records
        $user = $id;
        $mothers = Mothers::where('users_id', $id->id)->first();

        // Check if the user's role is changing
        if ($user->role != $request->role) {
            // Handle role change
            if ($user->role == 'Doctor' && $request->role == 'Nurse') {
                // Update the user's information
                $user->update([
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'surname' => $request->surname,
                    'birthdate' => $request->birthdate,
                    'sex' => $request->sex,
                    'region' => $request->region,
                    'address' => $request->home_address,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'role' => $request->role,
                    'password' => $request->password
                ]);
                // Create a new nurse record
                Nurses::create(['users_id' => $user->id]);
                // Delete the old doctor record
                Doctors::where('users_id', $user->id)->delete();
            } elseif ($user->role == 'Nurse' && $request->role == 'Doctor') {
                // Update the user's information
                $user->update([
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'surname' => $request->surname,
                    'birthdate' => $request->birthdate,
                    'sex' => $request->sex,
                    'region' => $request->region,
                    'address' => $request->home_address,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'role' => $request->role,
                    'password' => $request->password
                ]);
                // Create a new doctor record
                Doctors::create(['users_id' => $user->id]);
                // Delete the old nurse record
                Nurses::where('users_id', $user->id)->delete();
            } elseif ($user->role == 'Admin' && $request->role == 'Nurse') {
                $user->update([
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'surname' => $request->surname,
                    'birthdate' => $request->birthdate,
                    'sex' => $request->sex,
                    'region' => $request->region,
                    'address' => $request->home_address,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'role' => $request->role,
                    'password' => $request->password
                ]);
                Nurses::create(['users_id' => $user->id]);
            } elseif ($user->role == 'Admin' && $request->role == 'Doctor') {
                $user->update([
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'surname' => $request->surname,
                    'birthdate' => $request->birthdate,
                    'sex' => $request->sex,
                    'region' => $request->region,
                    'address' => $request->home_address,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'role' => $request->role,
                    'password' => $request->password
                ]);
                Doctors::create(['users_id' => $user->id]);
            }
        } else {
            // Role is not changing, update the user's information

            // Update the mothers record if the role it is 'Patient'
            if ($request->role == 'Patient') {
                $user->update([
                    'firstname' => $request->firstname,
                    'middlename' => $request->middlename,
                    'surname' => $request->surname,
                    'birthdate' => $request->birthdate,
                    'sex' => $request->sex,
                    'region' => $request->region,
                    'address' => $request->home_address,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'role' => $request->role,
                    'password' => $request->password
                ]);

                $mothers->update([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'surname' => $request->surname,
                'birthdate' => $request->birthdate,
                'sex' => $request->sex,
                'region' => $request->region,
                'address' => $request->home_address,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);
            }
        }

        // Redirect to the 'index' rout                                         e
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

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.index');
    }
}
