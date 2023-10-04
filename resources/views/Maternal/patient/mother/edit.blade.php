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
    <div id="mother_index" class="container card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form method="POST" action="{{ route('mothers.update', $mothers->id) }}">
            @csrf
            @method('PUT')
            <h3 style="text-align: center">MOTHER-PATIENT UPDATE FORM</h3>
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
                                value="{{ $mothers->firstname }}">
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="middlename" placeholder="Middle Name"
                                value="{{ $mothers->middlename }}">
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="surname" placeholder="Surname"
                                value="{{ $mothers->surname }}">
                            <input type="hidden" name="sex" value="Female">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Birthdate:</label>
                            <input class="form-control" type="date" name="birthdate" value="{{ $mothers->birthdate }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Nationality:</label>
                            <input class="form-control" type="text" name="nationality"
                                value="{{ $mothers->nationality }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Marital status:</label>
                            <select name="marital_status" id="marital" value="{{ $mothers->marital_status }}"
                                class="form-control form-select form-select-sm">
                                @if ($mothers->marital_status == 'Married')
                                    <option value="Married" selected>Married</option>
                                    <option value="Single">Single</option>
                                @else
                                    <option value="Married">Married</option>
                                    <option value="Single" selected>Single</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="form-label">Region:</label>
                                    <input class="form-control" type="text" name="region" placeholder="Region"
                                        value="{{ $mothers->region }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Home address:</label>
                                    <input class="form-control" type="text" name="home_address"
                                        placeholder="District/Street/House No." value="{{ $mothers->home_address }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Email:</label>
                            <input class="form-control" type="email" name="email" placeholder="Email"
                                value="{{ $mothers->email }}">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Phone Number:</label>
                                <input class="form-control" type="tel" name="phone_number" placeholder="Phone number"
                                    value="{{ $mothers->phone_number }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row" id="husbandinfo" style="display: none">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Husband's Information:</h5>
                        </label>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label class="form-label">Name:</label>
                            <input class="form-control" type="text" name="husbands_name"
                                placeholder="e.g Natsu Dragneel Heartfilia" value="{{ $mothers->husbands_name }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Nationality:</label>
                            <input class="form-control" type="text" name="husbands_nationality"
                                value="{{ $mothers->husbands_nationality }}" placeholder="e.g Tanzanian">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label class="form-label">Region:</label>
                            <input class="form-control" type="text" name="husbands_region"
                                placeholder="e.g Dar es Salaam" value="{{ $mothers->husbands_region }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Home address:</label>
                            <input class="form-control" type="text" name="husbands_home_address"
                                placeholder="District/Street/House no." value="{{ $mothers->husbands_home_address }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Email:</label>
                            <input class="form-control" type="text" name="husbands_email"
                                placeholder="someone@something.com" value="{{ $mothers->husbands_email }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Phone Number:</label>
                            <input class="form-control" type="tel" name="husbands_phone_number"
                                placeholder="+255755757575" value="{{ $mothers->husbands_phone_number }}">
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
                                value="{{ $mothers->emergency_contact_name }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Relationship:</label>
                            <input class="form-control" type="text" name="relationship_with_patient"
                                placeholder="Father,Sister and ..." value="{{ $mothers->relationship_with_patient }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Phone Number:</label>
                            <input class="form-control" type="tel" name="emergency_contact_number"
                                placeholder="+255757575757" value="{{ $mothers->emergency_contact_number }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Home address</label>
                            <input class="form-control" type="text" name="emergency_contact_home_address"
                                placeholder="Emergency Contact number"
                                value="{{ $mothers->emergency_contact_home_address }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Pregnancy History:</h5>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Estimated Due Date:</label>
                            <input class="form-control" type="date" name="estimated_due_date"
                                value="{{ $pregnancy->estimated_due_date }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label ">Last Menstrual Period:</label>
                            <input class="form-control" type="date" name="last_menstrual_period"
                                value="{{ $pregnancy->last_menstrual_period }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Previous pregnancies:</label>
                            <input class="form-control" id="number" type="number"
                                name="number_of_previous_pregnancies"
                                value="{{ $mothers->number_of_previous_pregnancies }}">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Previous live births:</label>
                            <input class="form-control" id="number" type="number"
                                name="number_of_previous_live_births"
                                value="{{ $mothers->number_of_previous_live_births }}">
                        </div>
                        <div class="col-4">
                            <label class="form-label ">Previous miscarriages:</label>
                            <input class="form-control" id="number" type="number"
                                name="number_of_previous_miscarriages"
                                value="{{ $mothers->number_of_previous_miscarriages }}">
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
                                    placeholder="like Sulphur and the like.." value="{{ $mothers->allergies }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Chronic Medical condiition:</label>
                                <input class="form-control" type="text" name="chronic_medical_condition"
                                    placeholder="Any chronic medical condition"
                                    value="{{ $mothers->chronic_medical_condition }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Current Medication:</label>
                                <input class="form-control" type="text" name="current_medication"
                                    placeholder="Any current medications.." value="{{ $mothers->current_medication }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Previous surgeries</label>
                                <input class="form-control" type="number" name="previous_surgeries"
                                    value="{{ $mothers->previous_surgeries }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Family history of medical conditions:</label>
                            <input class="form-control" type="text" name="family_history_of_medical_conditions"
                                placeholder="like Diabetes and the like"
                                value="{{ $mothers->family_history_of_medical_conditions }}">
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
                                placeholder="Strategies,Jubilee,...." value="{{ $mothers->insurance_provider }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Insurance phone number:</label>
                            <input class="form-control mt-2" type="tel" name="insurance_phone_number"
                                placeholder="+25506060606" value="{{ $mothers->insurance_phone_number }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Member number:</label>
                            <input class="form-control mt-2" type="text" name="member_number" placeholder="22-222-22"
                                value="{{ $mothers->member_number }}">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Group number:</label>
                            <input class="form-control mt-2" type="text" name="group_number" placeholder="33-33-33"
                                value="{{ $mothers->group_number }}">
                        </div>
                        <div class="col-4">
                            <label class="form-label">Preferred language:</label>
                            <input class="form-control mt-2" type="text" name="preferred_language"
                                placeholder="English,Germany,...." value="{{ $mothers->preferred_language }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3" style="overflow: auto;">
                <div class="col-3">
                    <div class="d-flex justify-content-start">
                        <button id="prev" class="btn btn-outline-primary" onclick="nextPrev(-1)">Previous</button>
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
                        <button id="next" class="btn btn-outline-primary" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
