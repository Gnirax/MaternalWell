<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyValidation;
use App\Models\Childs;
use App\Models\Consultations;
use App\Models\Doctors;
use App\Models\Maternal_users;
use App\Models\Mothers;
use App\Models\Nurses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsultationsController extends Controller
{
    public function index()
    {
        $consultations = Consultations::all();

        $now = Carbon::now();
        $pastconsultations = Consultations::where('date', '<', $now)->orderBy('starting_time', 'desc')->get();
        $todayconsultations = Consultations::whereDate('date', $now->toDateString())->orderBy('starting_time', 'asc')->get();
        $appointments =Consultations::where('date', '>', $now)->orderBy('starting_time', 'asc')->get();

        foreach ($pastconsultations as $pastconsultation) {
            if($pastconsultation->mothers_id != null){
                $pastconsultation->associated = Mothers::where('id',$pastconsultation->mothers_id)->value('firstname')." ".Mothers::where('id',$pastconsultation->mothers_id)->value('surname');
            } elseif ($pastconsultation->childs_id != null){
                $pastconsultation->associated = Childs::where('id',$pastconsultation->childs_id)->value('firstname')." ".Childs::where('id',$pastconsultation->childs_id)->value('surname');
            } else {
                $pastconsultation->associated = 'unknown';
            }
        }

        foreach ($todayconsultations as $todayconsultation) {
            if($todayconsultation->mothers_id != null){
                $todayconsultation->associated = Mothers::where('id',$todayconsultation->mothers_id)->value('firstname')." ".Mothers::where('id',$todayconsultation->mothers_id)->value('surname');
            } elseif ($todayconsultation->childs_id != null){
                $todayconsultation->associated = Childs::where('id',$todayconsultation->childs_id)->value('firstname')." ".Childs::where('id',$todayconsultation->childs_id)->value('surname');
            } else {
                $todayconsultation->associated = 'unknown';
            }
        }

        foreach ($appointments as $appointment) {
            if($appointment->mothers_id != null){
                $appointment->associated = Mothers::where('id',$appointment->mothers_id)->value('firstname')." ".Mothers::where('id',$appointment->mothers_id)->value('surname');
            } elseif ($appointment->childs_id != null){
                $appointment->associated = Childs::where('id',$appointment->childs_id)->value('firstname')." ".Childs::where('id',$appointment->childs_id)->value('surname');
            } else {
                $appointment->associated = 'unknown';
            }
        }

        return view('Maternal.consultation.index', compact(
            'consultations',
            'pastconsultations',
            'todayconsultations',
            'appointments'
        ));
    }

    protected function checkId($consultation)
    {
        // $id = $consultation->mothers_id ?? $consultation->childs_id;

        // if (Mothers::where('id', $id)->exists()) {
        //     $consultation->associated_id = 'Mother:' . $id;
        // } elseif (Childs::where('id', $id)->exists()) {
        //     $consultation->associated_id = 'Child:' . $id;
        // } else {
        //     $consultation->associated_id = 'unknown:' . $id;
        // }
    }

    public function mothers_create($mothers_id)
    {
        $doctors= Maternal_users::where('role','Doctor')->get();
        $mothers = Mothers::where('id',$mothers_id)->first();
        return view('Maternal.consultation.mothers.create', compact('mothers','doctors'));
    }

    public function childs_create($childs_id)
    {
        $doctors= Maternal_users::where('role','Doctor')->get();
        $childs = Childs::where('id', $childs_id)->first();
        return view('Maternal.consultation.childs.create', compact('childs','doctors'));
    }

    public function store(MyValidation $request)
    {
        $doctor_id= Doctors::where('users_id',$request->input('doctors_id'))->value('id');

        $users_id = Auth::user()->id;
        if (Auth::user()->role == "Nurse") {
            $nurses_id = Nurses::where('users_id', $users_id)->value('id');
            $request->validated();

            if ($request->input('type') == 'mothers') {
                Consultations::create([
                    'nurses_id' => $nurses_id,
                    'mothers_id' => $request->mothers_id,
                    'doctors_id' => $doctor_id,
                    'date' => $request->date,
                    'starting_time' => $request->starting_time,
                    'ending_time' => $request->ending_time
                ]);
            } elseif ($request->input('type') == 'childs') {
                Consultations::create([
                    'nurses_id' => $nurses_id,
                    'childs_id' => $request->childs_id,
                    'doctors_id' => $doctor_id,
                    'date' => $request->date,
                    'starting_time' => $request->starting_time,
                    'ending_time' => $request->ending_time
                ]);
            }

            return redirect()->route('consultations.index');

        } elseif (Auth::user()->role == "Admin") {
            $request->validated();

            if ($request->input('type') == 'mothers') {
                Consultations::create([
                    'mothers_id' => $request->mothers_id,
                    'doctors_id' => $doctor_id,
                    'nurses_id' => 'admin',
                    'date' => $request->date,
                    'starting_time' => $request->starting_time,
                    'ending_time' => $request->ending_time
                ]);
            } elseif ($request->input('type') == 'childs') {
                Consultations::create([
                    'childs_id' => $request->childs_id,
                    'doctors_id' => $doctor_id,
                    'nurses_id' => 'admin',
                    'date' => $request->date,
                    'starting_time' => $request->starting_time,
                    'ending_time' => $request->ending_time
                ]);
            }

            return redirect()->route('consultations.index');

        } else {
            return "Not qualified";
        }

    }

    public function show($id)
    {
        $mothers_consultations = Consultations::where('id',$id)->value('mothers_id');
        $childs_consultations = Consultations::where('id',$id)->value('childs_id');

        if($mothers_consultations != null){
            $consultations = Consultations::where('consultations.id',$id)
            ->join('nurses','nurses.id','=','nurses_id')
            ->join('maternal_users','maternal_users.id','=','users_id')
            ->select('consultations.*','nurses.*','maternal_users.*')
            ->first();
            $mothers = Mothers::where('mothers.id',$consultations->mothers_id)->first();
            $doctors = Doctors::where('doctors.id',$consultations->doctors_id)
            ->join('maternal_users', 'maternal_users.id', '=', 'users_id')
            ->select('doctors.*','maternal_users.*')
            ->first();
            return view('Maternal.consultation.mothers.show', compact('consultations','mothers','doctors'));
        }
        elseif ($childs_consultations != null){
            $consultations = DB::table('consultations')->where('consultations.id',$id)
            ->join('nurses','nurses.id','=','nurses_id')
            ->join('maternal_users','maternal_users.id','=','users_id')
            ->select('consultations.*','nurses.*','maternal_users.*')
            ->first();
            $childs = Childs::where('childs.id',$consultations->childs_id)->first();
            $doctors = Doctors::where('doctors.id',$consultations->doctors_id)
            ->join('maternal_users', 'maternal_users.id', '=', 'users_id')
            ->select('doctors.*','maternal_users.*')
            ->first();
            return view('Maternal.consultation.childs.show', compact('consultations','childs', 'doctors'));
        }
        else{
            return 'unknown';
        }
        // $consultation = Consultations::where('id',$id)->first(['mothers_id','childs_id']);
        // if($consultation->mothers_id){
        //     $consultations = Consultations::where('mothers_id',$consultation->mothers_id)->first();
        //     return view('Maternal.consultation.mothers.show', compact('consultations'));
        // } elseif ($consultation->childs_id){
        //     $consultations = Consultations::where('mothers_id',$consultation->childs_id)->first();
        //     return view('Maternal.consultation.childs.show', compact('consultations'));
        // } else {
        //     return "You don't have access to this page";
        // }

    }
    public function edit(Consultations $id)
    {
        $consultations = $id;
        return view('Maternal.consultation.edit', compact('consultations'));
    }

    public function update(MyValidation $request, Consultations $id)
    {
        $users_id = Auth::user()->id;
        $nurses_id = Nurses::where('users_id', $users_id)->value('id');

        $request->validated();

        if ($request->input('type') == 'mothers') {
            $id->update([
                'nurses_id' => $nurses_id,
                'mothers_id' => $request->mothers_id,
                'doctors_id' => $request->doctors_id,
                'date' => $request->date,
                'starting_time' => $request->starting_time,
                'ending_time' => $request->ending_time
            ]);
        } elseif ($request->input('type') == 'childs') {
            $id->update([
                'nurses_id' => $nurses_id,
                'childs_id' => $request->childs_id,
                'doctors_id' => $request->doctors_id,
                'date' => $request->date,
                'starting_time' => $request->starting_time,
                'ending_time' => $request->ending_time
            ]);
        }
        return redirect()->route('consultations.index');
    }

    public function delete(Consultations $id)
    {
        $id->delete();
        return redirect()->route('consultations.index');
    }
}