<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyValidation;
use App\Models\Childs;
use App\Models\Mothers;
use App\Models\Treatments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildsController extends Controller
{
    public function index(){
        $childs = Childs::all();
        return view('Maternal.patient.child.index', compact('childs'));
    }

    public function create(){
        $mothers = Mothers::all();
        return view('Maternal.patient.child.create', compact('mothers'));
    }

    public function store(MyValidation $request){
        $request->validated();
        Childs::create([
            'firstname'=> $request->firstname,
            'middlename'=> $request->middlename,
            'surname'=> $request->surname,
            'mothers_id'=>$request->mothers_id,
            'birthdate'=> $request->birthdate,
            'sex'=> $request->sex,
            'region'=> $request->region,
            'address'=> $request->address,
            'email'=> $request->email,
            'phone_number'=> $request->phone_number,
            'emergency_contact_name'=> $request->emergency_contact_name,
            'relationship_with_patient'=> $request->relationship_with_patient,
            'emergency_contact_number'=> $request->emergency_contact_number,
            'allergies'=> $request->allergies,
            'chronic_medical_condition'=> $request->chronic_medical_condition,
            'current_medication'=> $request->current_medication,
            'previous_surgeries'=> $request->previous_surgeries,
            'family_history_of_medical_conditions'=> $request->family_history_of_medical_conditions,
            'insurance_provider'=> $request->insurance_provider,
            'member_number'=> $request->member_number,
            'group_number'=> $request->group_number,
            'insurance_phone_number'=> $request->insurance_phone_number,
            'preferred_language'=> $request->preferred_language
        ]);
        return redirect()->route('childs.index');
    }

    public function show(Childs $id){
        $childs = $id;
        $mothers = Mothers::all();
        return view('Maternal.patient.child.show', compact('childs','mothers'));
    }

    public function edit(Childs $id){
        $childs = $id;
        $mothers = Mothers::all();
        return view('Maternal.patient.child.edit', compact('childs', 'mothers'));
    }

    public function update(MyValidation $request, Childs $id){
        $request->validated();
        $id->update([
            'firstname'=> $request->firstname,
            'middlename'=> $request->middlename,
            'surname'=> $request->surname,
            'birthdate'=> $request->birthdate,
            'sex'=> $request->sex,
            'region'=> $request->region,
            'address'=> $request->address,
            'email'=> $request->email,
            'phone_number'=> $request->phone_number,
            'emergency_contact_name'=> $request->emergency_contact_name,
            'relationship_with_patient'=> $request->relationship_with_patient,
            'emergency_contact_number'=> $request->emergency_contact_number,
            'allergies'=> $request->allergies,
            'chronic_medical_condition'=> $request->chronic_medical_condition,
            'current_medication'=> $request->current_medication,
            'previous_surgeries'=> $request->previous_surgeries,
            'family_history_of_medical_conditions'=> $request->family_history_of_medical_conditions,
            'insurance_provider'=> $request->insurance_provider,
            'member_number'=> $request->member_number,
            'group_number'=> $request->group_number,
            'insurance_phone_number'=> $request->insurance_phone_number,
            'preferred_language'=> $request->preferred_language
        ]);
        return redirect()->route('childs.index');
    }

    public function delete(Childs $id){
        $id->delete();
        return redirect()->route('childs.index');
    }

    public function history($childs_id){
        $treatments = Treatments::findOrFail($childs_id);

        return view('Maternal.treatment.childs.history', compact('treatments'));
    }

    public function consultation_index()
    {
        $treatments = Treatments::all();
        $mothers_user_id = Auth::user()->id;
        $mothers = Mothers::where('users_id', $mothers_user_id)->first();
        $childs = Childs::where('mothers_id',$mothers->id);

        $now = Carbon::now();
        $week = $now->copy()->subDay(7);
        $recentconsultations = DB::table('consultations')
            ->where('childs_id', $childs->id)
            ->where('date', '>=', $week)
            ->orderBy('starting_time','desc')
            ->get();
        $pastconsultations = DB::table('consultations')
            ->where('childs_id', $childs->id)
            ->where('date', '<', $week)
            ->orderBy('starting_time','desc')
            ->get();
        return view('Maternal.Patient-user.children.consultation.index',
        compact('childs'
        , 'recentconsultations'
        , 'pastconsultations'
        ,'treatments'));
    }

    public function see_treatments($id){
        $treatments = Treatments::where('consultations_id', $id )->first();

        return view('Maternal.Patient-user.consultation.show', compact('treatments'));
    }
}
