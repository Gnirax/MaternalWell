@extends('Maternal.layout')
@section('content')
    <div class="d-flex justify-content-end">
        <a href={{ url()->previous() }}>
            <button class="btn btn-primary" style="width:78px; height: 40px; margin-bottom: 10px;">
                <p style="font-size: 18px;">
                    <i class="fas fa-angle-left"></i>
                    Back
                </p>
            </button>
        </a>
    </div>
    <div id="mother_index">
        <form id="regForm" class="container shadow-lg bg-body-tertiary rounded" action="{{ route('childs.update', $childs->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <h3 style="text-align: center">CHILD-PATIENT UPDATE FORM</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="tab">
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Personnel Details:</h5>
                        </label>
                    </div>
                    <div class="row mb-2">
                        <label class="form-label">Full name:</label>
                        <div class="col-4">
                            <input class="form-control" type="text" name="firstname" placeholder="First Name"
                                value="{{ $childs->firstname }}">
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="middlename" placeholder="Middle Name"
                                value="{{ $childs->middlename }}">
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="surname" placeholder="Surname"
                                value="{{ $childs->surname }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Birthdate:</label>
                            <input class="form-control" type="date" name="birthdate" value="{{ $childs->birthdate }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Sex:</label>
                            <select name="sex" class="form-control form-select form-select-sm" value="{{ $childs->sex }}">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Mother:</label>
                            <input class="form-control" type="text" value="{{ $mothers->firstname }} {{ $mothers->surname }}">
                            <input type="hidden" name="mothers_id" value="{{ $mothers->id }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Nationality:</label>
                            <input class="form-control" type="text" name="nationality"
                                value="{{ $childs->nationality }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Region:</label>
                            <input class="form-control" type="text" name="region" placeholder="Region"
                                value="{{ $childs->region }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Home address:</label>
                            <input class="form-control" type="text" name="home_address"
                                placeholder="District/Street/House No." value="{{ $childs->home_address }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Father's Information:</h5>
                        </label>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label class="form-label">Name:</label>
                            <input class="form-control" type="text" name="fathers_name"
                                placeholder="e.g Natsu Dragneel Heartfilia" value="{{ $childs->fathers_name }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Nationality:</label>
                            <input class="form-control" type="text" name="fathers_nationality"
                                value="{{ $childs->fathers_nationality }}" placeholder="e.g Tanzanian">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label class="form-label">Region:</label>
                            <input class="form-control" type="text" name="fathers_region"
                                placeholder="e.g Dar es Salaam" value="{{ $childs->fathers_region }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Home address:</label>
                            <input class="form-control" type="text" name="fathers_home_address"
                                placeholder="District/Street/House no." value="{{ $childs->fathers_home_address }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Email:</label>
                            <input class="form-control" type="text" name="fathers_email"
                                placeholder="someone@something.com" value="{{ $childs->fathers_email }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Phone Number:</label>
                            <input class="form-control" type="tel" name="fathers_phone_number"
                                placeholder="+255755757575" value="{{ $childs->fathers_phone_number }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Emergency Contact Information:</h5>
                        </label>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Name:</label>
                            <input class="form-control" type="text" name="emergency_contact_name"
                                placeholder="Firstname Middlename Surname"
                                value="{{ $childs->emergency_contact_name }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Relationship:</label>
                            <input class="form-control" type="text" name="relationship_with_patient"
                                placeholder="Father,Sister and ..." value="{{ $childs->relationship_with_patient }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Phone Number:</label>
                            <input class="form-control" type="tel" name="emergency_contact_number"
                                placeholder="+255757575757" value="{{ $childs->emergency_contact_number }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Home address</label>
                            <input class="form-control" type="text" name="emergency_contact_home_address"
                                placeholder="Emergency Contact number"
                                value="{{ $childs->emergency_contact_home_address }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Medical Information:</h5>
                        </label>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Allergies:</label>
                                <input class="form-control" type="text" name="allergies"
                                    placeholder="like Sulphur and the like.." value="{{ $childs->allergies }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Chronic Medical condiition:</label>
                                <input class="form-control" type="text" name="chronic_medical_condition"
                                    placeholder="Any chronic medical condition"
                                    value="{{ $childs->chronic_medical_condition }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Current Medication:</label>
                                <input class="form-control" type="text" name="current_medication"
                                    placeholder="Any current medications.." value="{{ $childs->current_medication }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Previous surgeries</label>
                                <input class="form-control" type="number" name="previous_surgeries"
                                    value="{{ $childs->previous_surgeries }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Family history of medical conditions:</label>
                            <input class="form-control" type="text" name="family_history_of_medical_conditions"
                                placeholder="like Diabetes and the like"
                                value="{{ $childs->family_history_of_medical_conditions }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Insurance Information:</h5>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Insurance provider:</label>
                            <input class="form-control mt-2" type="text" name="insurance_provider"
                                placeholder="Strategies,Jubilee,...." value="{{ $childs->insurance_provider }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Insurance phone number:</label>
                            <input class="form-control mt-2" type="tel" name="insurance_phone_number"
                                placeholder="+25506060606" value="{{ $childs->insurance_phone_number }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Member number:</label>
                            <input class="form-control mt-2" type="text" name="member_number" placeholder="22-222-22"
                                value="{{ $childs->member_number }}">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Group number:</label>
                            <input class="form-control mt-2" type="text" name="group_number" placeholder="33-33-33"
                                value="{{ $childs->group_number }}">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Preferred language:</label>
                            <input class="form-control mt-2" type="text" name="preferred_language"
                                placeholder="English,Germany,...." value="{{ $childs->preferred_language }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3" style="overflow: auto;">
                <div class="col-3">
                    <div class="d-flex justify-content-start">
                        <button id="prev" class="btn btn-outline-primary" onclick="nP(-1)">Previous</button>
                    </div>
                </div>
                <div class="col-6">
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="d-flex justify-content-end">
                        <button id="next" class="btn btn-outline-primary" onclick="nP(1)">Next</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
