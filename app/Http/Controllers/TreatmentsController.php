<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyValidation;
use App\Models\Childs;
use App\Models\Consultations;
use App\Models\Doctors;
use App\Models\Mothers;
use App\Models\Treatments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TreatmentsController extends Controller
{
    public function mothers_index()
    {
        $treatments = Treatments::all();

        $now = Carbon::now();
        $pasttreatments = Treatments::where('created_at', '<', $now)
            ->orderBy('created_at', 'desc')->get();
        $todaytreatments = Treatments::whereDate('created_at', $now->toDateString())
            ->orderBy('created_at', 'desc')->get();
        $ongoingtreatments = Treatments::whereNull('observations')
            ->orWhereNull('hypothesis')
            ->orWhereNull('diagnostic_tests')
            ->orWhereNull('diagnostics_results')
            ->orWhereNull('diagnosis')
            ->orWhereNull('medications')
            ->orWhereNull('treatment_plan')
            ->orderBy('updated_at', 'desc')->get();
        $finishedtreatments = Treatments::whereNotNull('observations')
            ->orWhereNotNull('hypothesis')
            ->orWhereNotNull('diagnostic_tests')
            ->orWhereNotNull('diagnostics_results')
            ->orWhereNotNull('diagnosis')
            ->orWhereNotNull('medications')
            ->orWhereNotNull('treatment_plan')
            ->orderBy('updated_at', 'desc')->get();

        return view('Maternal.treatment.mothers.index',
        compact( 'pasttreatments',
        'todaytreatments',
        'ongoingtreatments',
        'finishedtreatments'));
    }

    public function childs_index()
    {
        $treatments = Treatments::all();

        $now = Carbon::now();

        $pasttreatments = Treatments::where('created_at', '<', $now)
            ->orderBy('created_at', 'desc')->get();
        $todaytreatments = Treatments::where('created_at', $now->toDateString())
            ->orderBy('created_at', 'desc')->get();
        $ongoingtreatments = Treatments::whereNull('observations')
            ->orWhereNull('hypothesis')
            ->orWhereNull('diagnostic_tests')
            ->orWhereNull('diagnostics_results')
            ->orWhereNull('diagnosis')
            ->orWhereNull('medications')
            ->orWhereNull('treatment_plan')
            ->orderBy('updated_at', 'desc')->get();
        $finishedtreatments = Treatments::whereNotNull('observations')
            ->orWhereNotNull('hypothesis')
            ->orWhereNotNull('diagnostic_tests')
            ->orWhereNotNull('diagnostics_results')
            ->orWhereNotNull('diagnosis')
            ->orWhereNotNull('medications')
            ->orWhereNotNull('treatment_plan')
            ->orderBy('updated_at', 'desc')->get();

        return view('Maternal.treatment.childs.index',
        compact( 'pasttreatments',
        'todaytreatments',
        'ongoingtreatments',
        'finishedtreatments'));


    }

    public function mothers_create($mothers_id)
    {
        $consultations = Consultations::where('mothers_id', $mothers_id)->first();
        return view('Maternal.treatment.mothers.create', compact('consultations'));
    }

    public function childs_create($childs_id)
    {
        $consultations = Consultations::where('childs_id', $childs_id)->first();
        return view('Maternal.treatment.childs.create', compact('consultations'));
    }

    public function store(MyValidation $request)
    {
        $users_id = Auth::user()->id;
        $doctors_id = Doctors::where('users_id', $users_id)->value('id');

        $request->validated();

        if ($request->input('type') == 'mothers') {
            Treatments::create([
                'consultations_id' => $request->consultations_id,
                'doctors_id' => $doctors_id,
                'mothers_id' => $request->mothers_id,
                'observations' => $request->observations,
                'hypothesis' => $request->hypothesis,
                'diagnostic_tests' => $request->diagnostic_tests,
                'diagnostics_results' => $request->diagnostics_results,
                'diagnosis' => $request->diagnosis,
                'medications' => $request->medications,
                'treatment_plan' => $request->treatment_plan,
            ]);

            return redirect()->route('treatment.index.mothers');
        } elseif ($request->input('type') == 'childs') {
            Treatments::create([
                'consultations_id' => $request->consultations_id,
                'childs_id' => $request->childs_id,
                'doctors_id' => $doctors_id,
                'observations' => $request->observations,
                'hypothesis' => $request->hypothesis,
                'diagnostic_tests' => $request->diagnostic_tests,
                'diagnostics_results' => $request->diagnostics_results,
                'diagnosis' => $request->diagnosis,
                'medications' => $request->medications,
                'treatment_plan' => $request->treatment_plan,
            ]);

            return redirect()->route('treatment.index.childs');
        }
    }

    public function show($id){
        $treatments = Treatments::where('treatments.id', $id )->first();

        if($treatments->mothers_id != null){
            return view('Maternal.treatment.mothers.show', compact('treatments'));
        } elseif ($treatments->childs_id != null){
            return view('Maternal.treatment.childs.show', compact('treatments'));
        } else {
            return "No record";
        }
    }

    public function edit(Treatments $id)
    {
        $treatments = $id;
        return view('Maternal.treatment.edit', compact('treatments'));
    }

    public function update(Request $request, Treatments $id)
    {
        $users_id = Auth::user()->id;
        $doctors_id = Doctors::where('users_id', $users_id)->value('id');

        $request->validated();

        if ($request->input('type') == 'mothers') {
            $id->update([
                'mothers_id' => $request->mothers_id,
                'doctors_id' => $request->doctor_id,
                'observations' => $request->observations,
                'hypothesis' => $request->hypothesis,
                'diagnostic_tests' => $request->diagnostic_tests,
                'diagnostic_results' => $request->diagnostics_results,
                'diagnosis' => $request->diagnosis,
                'medications' => $request->medications,
                'treatment_plan' => $request->treatment_plan,
            ]);
        } elseif ($request->input('type') == 'childs') {
            $id->update([
                'childs_id' => $request->childs_id,
                'doctors_id' => $request->doctor_id,
                'observations' => $request->observations,
                'hypothesis' => $request->hypothesis,
                'diagnostic_tests' => $request->diagnostic_tests,
                'diagnostic_results' => $request->diagnostics_results,
                'diagnosis' => $request->diagnosis,
                'medications' => $request->medications,
                'treatment_plan' => $request->treatment_plan,
            ]);
        }
        return redirect()->view('Maternal.treatment.index');
    }

    public function delete(Treatments $id)
    {
        $id->delete();
        return redirect()->view('Maternal.treatment.index');
    }
}
