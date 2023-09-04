<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyValidation;
use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index(){
        $doctors = Doctors::all();
        return view('Maternal.admin.doctors.index', compact('doctors'));
    }

    public function create(){
        return view('Maternal.admin.doctors.create');
    }

    public function store(MyValidation $request){
        $request->validated();

        Doctors::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'surname' => $request->surname,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password
        ]);
        return redirect()->route('doctors.index');
    }

    public function show(Doctors $id){
        $doctors = $id;
        return view('Maternal.admin.doctors.show', compact('doctors'));
    }

    public function edit(Doctors $id){
        $doctors = $id;
        return view('Maternal.admin.doctors.edit', compact('doctors'));
    }

    public function update(MyValidation $request, Doctors $id){
        $request->validated();
        $id->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'surname' => $request->surname,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password
        ]);
        return redirect()->route('doctors.index');
    }

    public function delete(Doctors $id){
        $id->delete();
        return redirect()->route('doctors.index');
    }
}
