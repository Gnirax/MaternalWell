@extends('Maternal.layout')
@section('content')
<div id="child_index" class="container card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
    <form method="POST" action="{{ route('childs.update',$childs->id) }}">
        @csrf
        @method('PUT')
        <h2 style="text-align: center">CHILD-PATIENT REGISTRATION FORM</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <label class="form-label">Full name:</label>
            <div class="row">
                <div class="col-4">
                    <input class="form-control" type="text" name="firstname" placeholder="First Name" value="{{ $childs->firstname}}">
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="middlename" placeholder="Middle Name" value="{{ $childs->middlename}}">
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="surname" placeholder="Surname" value="{{ $childs->surname}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label class="form-label">Birthdate:</label>
                <input class="form-control" type="date" name="birthdate" value="{{ $childs->birthdate}}">
            </div>
            <div class="col-4">
                <label class="form-label">Sex:</label>
                <select name="sex" class="form-control form-select form-select-sm" value="{{ $childs->sex}}">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-4">
                <label class="form-label">Mother:</label>
                    <select name="mothers_id" class="form-control form-select form-select-sm">
                        @foreach ($mothers as $mother)
                        <option value="{{ $mother->id }}" @selected($mother->id == $childs->mothers_id)>{{ $mother->firstname }} {{ $mother->surname }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <label class="form-label">Address:</label>
                    <div class="col-6">
                        <input class="form-control" type="text" name="region" placeholder="Region" value="{{ $childs->region}}">
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" name="address"
                            placeholder="District/Street/House No." value="{{ $childs->address}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <label class="form-label">Contacts:</label>
                    <div class="col-6">
                        <input class="form-control" type="email" name="email" placeholder="Email" value="{{ $childs->email}}">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input class="form-control" type="tel" name="phone_number" placeholder="Phone number" value="{{ $childs->phone_number}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <label class="form-label">Emergency Contact Information:</label>
            <div class="col-4">
                <input class="form-control" type="text" name="emergency_contact_name"
                    placeholder="Emergency Contact name" value="{{ $childs->emergency_contact_name}}">
            </div>
            <div class="col-4">
                <input class="form-control" type="text" name="relationship_with_patient"
                    placeholder="Relationship with patient" value="{{ $childs->relationship_with_patient}}">
            </div>
            <div class="col-4">
                <input class="form-control" type="tel" name="emergency_contact_number"
                    placeholder="Emergency Contact number" value="{{ $childs->emergency_contact_number}}">
            </div>
        </div>
        <div class="row">
            <label class="form-label mt-2">Medical history:</label>
            <div class="row">
                <div class="col-6">
                    <input class="form-control" type="text" name="allergies" placeholder="Allergies" value="{{ $childs->allergies}}">
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" name="chronic_medical_condition"
                        placeholder="Any chronic medical condition" value="{{ $childs->chronic_medical_condition}}">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <input class="form-control mt-2" type="text" name="current_medication"
                        placeholder="Any current medications.." value="{{ $childs->current_medication}}">
                </div>
                <div class="col-6">
                    <input class="form-control mt-2" type="text" name="previous_surgeries"
                        placeholder="Previous Surgeries" value="{{ $childs->previous_surgeries}}">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input class="form-control mt-2" type="text" name="family_history_of_medical_condition"
                        placeholder="Family history of medical conditions" value="{{ $childs->family_history_of_medical_conditions}}">
                </div>
            </div>
        </div>
        <div class="row">
            <label class="form-label mt-2">Insurance Information:</label>
            <div class="row">
                <div class="col-6">
                    <input class="form-control mt-2" type="text" name="insurance_provider"
                        placeholder="Insurance provider" value="{{ $childs->insurance_provider}}">
                </div>
                <div class="col-6">
                    <input class="form-control mt-2" type="tel" name="insurance_phone_number"
                        placeholder="Insurance phone number" value="{{ $childs->insurance_phone_number}}">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <input class="form-control mt-2" type="text" name="member_number"
                        placeholder="Member number" value="{{ $childs->member_number}}">
                </div>
                <div class="col-4">
                    <input class="form-control mt-2" type="text" name="group_number" placeholder="Group number" value="{{ $childs->group_number}}">
                </div>
                <div class="col-4">
                    <input class="form-control mt-2" type="text" name="preferred_language"
                        placeholder="preferred language" value="{{ $childs->preferred_language}}">
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <button class="btn btn-outline-success mt-2 btn-sm mb-3" type="submit">UPDATE</button>
        </div>
    </form>
</div>
@endsection
