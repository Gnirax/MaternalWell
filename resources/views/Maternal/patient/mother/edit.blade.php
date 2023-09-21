@extends('Maternal.layout')
@section('content')
    <div id="mother_index" class="container card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form method="POST" action="{{ route('mothers.update', $mothers->id) }}">
            @csrf
            @method('PUT')
            <h2 style="text-align: center">MOTHER-PATIENT UPDATE FORM</h2>
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
                            <div class="row mb-2">
                                <label class="form-label">Address:</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="region" placeholder="Region"
                                        value="{{ $mothers->region }}">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="address"
                                        placeholder="District/Street/House No." value="{{ $mothers->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Birthdate:</label>
                            <input class="form-control" type="date" name="birthdate" value="{{ $mothers->birthdate }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="form-label">Contacts:</label>
                        <div class="col-6">
                            <input class="form-control" type="email" name="email" placeholder="Email"
                                value="{{ $mothers->email }}">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" type="tel" name="phone_number" placeholder="Phone number"
                                    value="{{ $mothers->phone_number }}">
                            </div>
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
                        <div class="col-4">
                            <input class="form-control" type="text" name="emergency_contact_name"
                            placeholder="Emergency Contact name" value="{{ $mothers->emergency_contact_name }}">
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="relationship_with_patient"
                            placeholder="Relationship with patient" value="{{ $mothers->relationship_with_patient }}">
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="tel" name="emergency_contact_number"
                            placeholder="Emergency Contact number" value="{{ $mothers->emergency_contact_number }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Pregnancy Details:</h5>
                        </label>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label">Estimated due date:</label>
                            <input class="form-control" type="date" name="estimated_due_date"
                            value="{{ $mothers->estimated_due_date }}">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Last Menstrual period:</label>
                            <input class="form-control" type="date" name="last_menstrual_period"
                            value="{{ $mothers->last_menstrual_period }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label class="form-label mt-3">Number of previous pregnancies:</label>
                            <input id="number" type="number" name="number_of_previous_pregnancies"
                            value="{{ $mothers->number_of_previous_pregnancies }}">
                        </div>
                        <div class="col-4">
                            <label class="form-label mt-3">Number of previous live births:</label>
                            <input id="number" type="number" name="number_of_previous_live_births"
                            value="{{ $mothers->number_of_previous_live_births }}">
                        </div>
                        <div class="col-4">
                            <label class="form-label mt-3">Number of previous miscarriages:</label>
                            <input id="number" type="number" name="number_of_previous_miscarriages"
                            value="{{ $mothers->number_of_previous_miscarriages }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Medical history:</h5>
                        </label>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <input class="form-control mt-2" type="text" name="allergies" placeholder="Allergies"
                            value="{{ $mothers->allergies }}">
                        </div>
                        <div class="col-6">
                            <input class="form-control mt-2" type="text" name="chronic_medical_condition"
                            placeholder="Any chronic medical condition"
                            value="{{ $mothers->chronic_medical_condition }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <input class="form-control mt-2" type="text" name="current_medication"
                            placeholder="Any current medications.." value="{{ $mothers->current_medication }}">
                        </div>
                        <div class="col-6">
                            <input class="form-control mt-2" type="text" name="previous_surgeries"
                            placeholder="Previous Surgeries" value="{{ $mothers->previous_surgeries }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <input class="form-control mt-2" type="text" name="family_history_of_medical_condition"
                            placeholder="Family history of medical conditions"
                            value="{{ $mothers->family_history_of_medical_conditions }}">
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="form-label">
                            <h5>Insurance Information:</h5>
                        </label>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <input class="form-control mt-2" type="text" name="insurance_provider"
                            placeholder="Insurance provider" value="{{ $mothers->insurance_provider }}">
                        </div>
                        <div class="col-6">
                            <input class="form-control mt-2" type="tel" name="insurance_phone_number"
                            placeholder="Insurance phone number" value="{{ $mothers->insurance_phone_number }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <input class="form-control mt-2 mb-2" type="text" name="member_number"
                            placeholder="Member number" value="{{ $mothers->member_number }}">
                        </div>
                        <div class="col-4">
                            <input class="form-control mt-2 mb-2" type="text" name="group_number"
                            placeholder="Group number" value="{{ $mothers->group_number }}">
                        </div>
                        <div class="col-4">
                            <input class="form-control mt-2 mb-2" type="text" name="preferred_language"
                            placeholder="preferred language" value="{{ $mothers->preferred_language }}">
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
