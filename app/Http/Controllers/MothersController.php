<?php

namespace App\Http\Controllers;

use App\Models\Childs;
use App\Models\Maternal_users;
use App\Models\Mothers;
use App\Models\Treatments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MothersController extends Controller
{
    public function index()
    {
        $mothers = Mothers::all();
        return view('Maternal.patient.mother.index', compact('mothers'));
    }

    public function create()
    {
        return view('Maternal.patient.mother.create');
    }

    public function store(Request $request)
    {

        $maternal_users = Maternal_users::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'surname' => $request->surname,
            'birthdate' => $request->birthdate,
            'region' => $request->region,
            'home_address' => $request->home_address,
            'email' => $request->email,
            'phone_number' => $request->phone_number
        ]);

        Mothers::create([
            'users_id' => $maternal_users->id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'surname' => $request->surname,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex,
            'nationality' => $request->nationality,
            'marital_status' => $request->marital_status,
            'region' => $request->region,
            'home_address' => $request->home_address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'husbands_name' => $request->husbands_name,
            'husbands_email' => $request->husbands_email,
            'husbands_phone_number' => $request->husbands_phone_number,
            'husbands_nationality' => $request->husbands_nationality,
            'husbands_region' => $request->husbands_region,
            'husbands_home_address' => $request->husbands_home_address,
            'emergency_contact_name' => $request->emergency_contact_name,
            'relationship_with_patient' => $request->relationship_with_patient,
            'emergency_contact_number' => $request->emergency_contact_number,
            'emergency_contact_home_address' => $request->emergency_contact_home_address,
            'number_of_previous_pregnancies' => $request->number_of_previous_pregnancies,
            'number_of_previous_live_births' => $request->number_of_previous_live_births,
            'number_of_previous_miscarriages' => $request->number_of_previous_miscarriages,
            'allergies' => $request->allergies,
            'chronic_medical_condition' => $request->chronic_medical_condition,
            'current_medication' => $request->current_medication,
            'previous_surgeries' => $request->previous_surgeries,
            'family_history_of_medical_conditions' => $request->family_history_of_medical_conditions,
            'insurance_provider' => $request->insurance_provider,
            'member_number' => $request->member_number,
            'group_number' => $request->group_number,
            'insurance_phone_number' => $request->insurance_phone_number,
            'preferred_language' => $request->preferred_language
        ]);
        return redirect()->route('mothers.index');
    }

    public function show(Mothers $id)
    {
        $mothers = $id;
        return view('maternal.patient.mother.show', compact('mothers'));
    }

    public function edit(Mothers $id)
    {
        $mothers = $id;
        return view('maternal.patient.mother.edit', compact('mothers'));
    }

    public function update(Request $request, Mothers $id)
    {
        // dd($request->all());
        $id->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'surname' => $request->surname,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex,
            'nationality' => $request->nationality,
            'marital_status' => $request->marital_status,
            'region' => $request->region,
            'home_address' => $request->home_address,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'husbands_name' => $request->husbands_name,
            'husbands_email' => $request->husbands_email,
            'husbands_phone_number' => $request->husbands_phone_number,
            'husbands_nationality' => $request->husbands_nationality,
            'husbands_region' => $request->husbands_region,
            'husbands_home_address' => $request->husbands_home_address,
            'emergency_contact_name' => $request->emergency_contact_name,
            'relationship_with_patient' => $request->relationship_with_patient,
            'emergency_contact_number' => $request->emergency_contact_number,
            'emergency_contact_home_address' => $request->emergency_contact_home_address,
            'number_of_previous_pregnancies' => $request->number_of_previous_pregnancies,
            'number_of_previous_live_births' => $request->number_of_previous_live_births,
            'number_of_previous_miscarriages' => $request->number_of_previous_miscarriages,
            'allergies' => $request->allergies,
            'chronic_medical_condition' => $request->chronic_medical_condition,
            'current_medication' => $request->current_medication,
            'previous_surgeries' => $request->previous_surgeries,
            'family_history_of_medical_conditions' => $request->family_history_of_medical_conditions,
            'insurance_provider' => $request->insurance_provider,
            'member_number' => $request->member_number,
            'group_number' => $request->group_number,
            'insurance_phone_number' => $request->insurance_phone_number,
            'preferred_language' => $request->preferred_language
        ]);
        return redirect()->route('mothers.index');
    }

    public function delete(Mothers $id)
    {
        $id->delete();
        return redirect()->route('mothers.index');
    }

    public function history($mothers_id)
    {
        $treatments = Treatments::findOrFail($mothers_id);

        return view('Maternal.treatment.mothers.history', compact('treatments'));
    }

    public function consultation_index()
    {
        $treatments = Treatments::all();
        $mothers_user_id = Auth::user()->id;
        $mothers = Mothers::where('users_id', $mothers_user_id)->first();

        $now = Carbon::now();
        $week = $now->copy()->subDay(7);
        $recentconsultations = DB::table('consultations')
            ->where('mothers_id', $mothers->id)
            ->where('date', '>=', $week)
            ->orderBy('starting_time', 'desc')
            ->get();
        $pastconsultations = DB::table('consultations')
            ->where('mothers_id', $mothers->id)
            ->where('date', '<', $week)
            ->orderBy('starting_time', 'desc')
            ->get();
        return view(
            'Maternal.Patient-user.consultation.index',
            compact(
                'mothers',
                'recentconsultations',
                'pastconsultations',
                'treatments'
            )
        );
    }

    public function see_treatments($id)
    {
        $treatments = Treatments::where('consultations_id', $id)->first();

        return view('Maternal.Patient-user.consultation.show', compact('treatments'));
    }

    public function medication_index()
    {
        $mothers_user_id = Auth::user()->id;
        $mothers = Mothers::where('users_id', $mothers_user_id)
            ->join('consultations', 'consultations.mothers_id', 'mothers.id')
            ->join('treatments', 'treatments.mothers_id', 'mothers.id')
            ->select('consultations.*', 'treatments.*')
            ->first();
        return view('Maternal.Patient-user.medication.index', compact('mothers'));
    }

    public function progress_index()
    {
        $mothers_user_id = Auth::user()->id;
        $mothers = Mothers::where('users_id', $mothers_user_id)
            ->join('consultations', 'consultations.mothers_id', 'mothers.id')
            ->join('treatments', 'treatments.mothers_id', 'mothers.id')
            ->select('consultations.*', 'treatments.*')
            ->first();
        return view('Maternal.Patient-user.progress.index', compact('mothers'));
    }

    public function children_index()
    {
        $mothers_user_id = Auth::user()->id;
        $mothers_id = Mothers::where('users_id', $mothers_user_id)->value('mothers.id');
        $childs = Childs::where('mothers_id', $mothers_id)->get();
        $mothers = Mothers::where('users_id', $mothers_user_id)
            // ->join('consultations', 'consultations.mothers_id', 'mothers.id')
            // ->join('treatments', 'treatments.mothers_id', 'mothers.id')
            // ->select('consultations.*', 'treatments.*')
            ->get();
        // dd($childs);
        return view('Maternal.Patient-user.children.index', compact('mothers', 'childs'));
    }
}
