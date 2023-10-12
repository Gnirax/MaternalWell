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

        $consultations->map(function ($consultation) {
            if ($consultation->mothers_id != null) {
                $consultation->associated = Mothers::where('id', $consultation->mothers_id)->value('firstname') . " " . Mothers::where('id', $consultation->mothers_id)->value('surname');
            } elseif ($consultation->childs_id != null) {
                $consultation->associated = Childs::where('id', $consultation->childs_id)->value('firstname') . " " . Childs::where('id', $consultation->childs_id)->value('surname');
            } else {
                $consultation->associated = 'unknown';
            }
        });

        $pastconsultations = $consultations->filter(function ($consultation) use ($now) {
            return $consultation->date < $now->toDateString();
        })->sortByDesc('starting_time');

        $todayconsultations = $consultations->filter(function ($consultation) use ($now) {
            return $consultation->date == $now->toDateString();
        })->sortBy('starting_time');

        $appointments = $consultations->filter(function ($consultation) use ($now) {
            return $consultation->date > $now->toDateString();
        })->sortBy('starting_time');

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
        $doctors = Maternal_users::where('role', 'Doctor')->get();
        $mothers = Mothers::where('id', $mothers_id)->first();
        return view('Maternal.consultation.mothers.create', compact('mothers', 'doctors'));
    }

    public function childs_create($childs_id)
    {
        $doctors = Maternal_users::where('role', 'Doctor')->get();
        $childs = Childs::where('id', $childs_id)->first();
        return view('Maternal.consultation.childs.create', compact('childs', 'doctors'));
    }

    public function store(MyValidation $request)
    {
        $now = Carbon::now();
        $today = $now->toDateString();

        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'doctors_id' => 'required'
        ]);

        if ($request->date == $today) {
            $dateToCheck = $today;
        } elseif ($request->date > $today) {
            $dateToCheck = $request->date;
        }

        $no_of_consultations = Consultations::where('date', '=', $dateToCheck)->count();
        $ticket_number = $no_of_consultations + 1;
        $doctor_id = Doctors::where('users_id', $request->doctors_id)->value('id');

        $users_id = Auth::user()->id;
        if (Auth::user()->role == "Nurse") {
            $created_by = Nurses::where('users_id', $users_id)->value('id');
            $request->validated();

            if ($request->input('type') == 'mothers') {
                Consultations::create([
                    'created_by' => $created_by,
                    'mothers_id' => $request->mothers_id,
                    'doctors_id' => $doctor_id,
                    'date' => $request->date,
                    'ticket_number' => $ticket_number
                ]);
            } elseif ($request->input('type') == 'childs') {
                Consultations::create([
                    'created_by' => $created_by,
                    'childs_id' => $request->childs_id,
                    'doctors_id' => $doctor_id,
                    'date' => $request->date,
                    'ticket_number' => $ticket_number
                ]);
            }

            return redirect()->route('consultations.index');
        } elseif (Auth::user()->role == "Admin") {
            $created_by = Auth::user()->id;
            $request->validated();

            if ($request->input('type') == 'mothers') {
                Consultations::create([
                    'created_by' => $created_by,
                    'mothers_id' => $request->mothers_id,
                    'doctors_id' => $doctor_id,
                    'date' => $request->date,
                    'ticket_number' => $ticket_number
                ]);
            } elseif ($request->input('type') == 'childs') {
                Consultations::create([
                    'created_by' => $created_by,
                    'childs_id' => $request->childs_id,
                    'doctors_id' => $doctor_id,
                    'date' => $request->date,
                    'ticket_number' => $ticket_number
                ]);
            }

            return redirect()->route('consultations.index');
        } else {
            return "Not qualified";
        }
    }

    public function show(Consultations $id)
    {
        if ($id->mothers_id != null) {
            $consultations = $id;
            $mothers = Mothers::where('mothers.id', $consultations->mothers_id)->first();
            return view('Maternal.consultation.mothers.show', compact('consultations', 'mothers'));
        } elseif ($id->childs_id != null) {
            $consultations = $id;
            $childs = Childs::where('childs.id', $consultations->childs_id)->first();
            return view('Maternal.consultation.childs.show', compact('consultations', 'childs'));
        } else {
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
        if ($consultations->mothers_id != null) {
            $doctors = Doctors::where('doctors.id', $consultations->doctors_id)
                ->join('maternal_users', 'maternal_users.id', 'doctors.users_id', 'doctors')
                ->select('maternal_users.firstname', 'maternal_users.surname')
                ->first();
            $mothers = Mothers::where('mothers.id', $consultations->mothers_id)->first();
            return view('Maternal.consultation.mothers.edit', compact('consultations', 'mothers', 'doctors'));
        } else if ($consultations->childs_id != null) {
            $doctors = Doctors::where('doctors.id', $consultations->doctors_id)
                ->join('maternal_users', 'maternal_users.id', 'doctors.users_id', 'doctors')
                ->select('maternal_users.firstname', 'maternal_users.surname')
                ->first();
            $childs = Childs::where('childs.id', $consultations->childs_id)->first();
            return view('Maternal.consultation.childs.edit', compact('consultations', 'childs', 'doctors'));
        }
    }

    public function update(MyValidation $request, Consultations $id)
    {
        $BMI = number_format(($request->weight) / (($request->height) ^ 2), 3);
        $pressure = $request->systolic . '/' . $request->diastolic;
        $request->validated();

        if (Auth::user()->role == "Nurse") {
            $users_id = Auth::user()->id;
            $nurses_id = Nurses::where('users_id', $users_id)->value('id');
            $id->update([
                'nurses_id' => $nurses_id,
                'weight' => $request->weight,
                'height' => $request->height,
                'pressure' => $pressure,
                'BMI' => $BMI
            ]);
        } else if (Auth::user()->role == 'Admin') {
            $id->update([

                'weight' => $request->weight,
                'height' => $request->height,
                'pressure' => $pressure,
                'BMI' => $BMI
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
