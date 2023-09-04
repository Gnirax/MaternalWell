<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyValidation;
use App\Models\Nurses;
use Illuminate\Http\Request;

class NursesController extends Controller
{
    public function index(){
        $nurses = Nurses::all();
        return view('Maternal.admin.nurses.index', compact('nurses'));
    }

    public function create(){
        return view('Maternal.admin.nurses.create');
    }

    public function store(MyValidation $request){
        $request->validated();

        Nurses::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'surname' => $request->surname,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password
        ]);
        return redirect()->route('nurses.index');
    }

    public function show(Nurses $id){
        $nurses = $id;
        return view('Maternal.admin.nurses.show', compact('nurses'));
    }

    public function edit(Nurses $id){
        $nurses = $id;
        return view('Maternal.admin.nurses.edit', compact('nurses'));
    }

    public function update(MyValidation $request, Nurses $id){
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
        return redirect()->route('nurses.index');
    }

    public function delete(Nurses $id){
        $id->delete();
        return redirect()->route('nurses.index');
    }
}
