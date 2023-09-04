@extends('Maternal.layout')
@section('content')
<div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
    <div class="d-flex justify-content-start">
        <a href="{{ route('patient.create')}}">Add patient &rarr;</a>
    </div>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>FIRSTNAME</th>
                <th>MIDDLENAME</th>
                <th>SURNAME</th>
                <th>BIRTHDATE</th>
                <th>SEX</th>
                <th>PATIENT TYPE</th>
                <th>REGION</th>
                <th>ADDRESS</th>
                <th>EMAIL</th>
                <th>PHONE NUMBER</th>
                <th>EMERGENCY CONTACT NAME</th>
                <th>RELATIONSHIP WITH PATIENT</th>
                <th>EMERGENCY CONTACT NUMBER</th>
                <th>ESTIMATED DUE DATE</th>
                <th>LAST MENSTRUAL PERIOD</th>
                <th>NO. OF PREVIOUS PREGNANCIES</th>
                <th>NO. OF PREVIOUS LIVE BIRTHS</th>
                <th>NO. OF PREVIOUS MISCARRIAGES</th>
                <th>ALLERGIES</th>
                <th>CHRONIC MEDICAL CONDITION</th>
                <th>CURRENT MEDICATIONS</th>
                <th>NO. OF PREVIOUS SURGERIES</th>
                <th>FAMILY HISTORY OF MEDICAL CONDITION</th>
                <th>INSURANCE PROVIDER</th>
                <th>MEMBER NUMBER</th>
                <th>GROUP NUMBER</th>
                <th>INSURANCE PHONE NUMBER</th>
                <th>PREFERRED LANGUAGE</th>
                <th colspan="3">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @forelse($patients as $patient)
            <tr>
                <td>{{$patient->firstname}}</td>
                <td>{{$patient->middlename}}</td>
                <td>{{$patient->surname}}</td>
                <td>{{$patient->birthdate}}</td>
                <td>{{$patient->sex}}</td>
                <td>{{$patient->region}}</td>
                <td>{{$patient->address}}</td>
                <td>{{$patient->email}}</td>
                <td>{{$patient->phone_number}}</td>
                <td>{{$patient->emergency_contact_name}}</td>
                <td>{{$patient->relationship_with_patient}}</td>
                <td>{{$patient->emergency_contact_number}}</td>
                <td>{{$patient->estimated_due_date}}</td>
                <td>{{$patient->last_menstrual_period}}</td>
                <td>{{$patient->number_of_previous_pregnancies}}</td>
                <td>{{$patient->number_of_previous_live_births}}</td>
                <td>{{$patient->number_of_previous_miscarriages}}</td>
                <td>{{$patient->allergies}}</td>
                <td>{{$patient->chronic_medical_condition}}</td>
                <td>{{$patient->current_medication}}</td>
                <td>{{$patient->previous_surgeries}}</td>
                <td>{{$patient->family_history_of_medical_conditions}}</td>
                <td>{{$patient->insurance_provider}}</td>
                <td>{{$patient->member_number}}</td>
                <td>{{$patient->group_number}}</td>
                <td>{{$patient->insurance_phone_number}}</td>
                <td>{{$patient->preferred_language}}</td>
                <td><a href="{{ route('delete', $patient)}}">Delete</a></td>
                <td><a href="{{ route('show', $patient)}}">Show</a></td>
                <td><a href="{{ route('edit', $patient)}}">Edit</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="31">no records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
