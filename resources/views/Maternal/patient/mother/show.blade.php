@extends('Maternal.layout')
@section('content')
    <div class="container-fluid shadow-lg p-3 mb-5 bg-body-tertiary rounded mb-2">
        <div class="card mb-2">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="row">
                        <img class="card-img" src="{{ asset('img/avatar2.png')}}">
                        <div class="col-10">
                            <a class="nav-link" href="{{ route('consultations.create.mother',  $mothers->id )}}">New Consultation</a>
                            <a class="nav-link" href="#">Medical History</a>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form>
                        @csrf
                        <h2 style="text-align: center">{{ $mothers->firstname}}'s Profile</h2>
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
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Full name:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <input class="form-control" type="text" name="firstname" placeholder="First Name" value="{{ $mothers->firstname}}" readonly>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" name="middlename" placeholder="Middle Name" value="{{ $mothers->middlename}}" readonly>
                                </div>
                                <div class="col-4">
                                    <input class="form-control" type="text" name="surname" placeholder="Surname" value="{{ $mothers->surname}}" readonly>
                                    <input type="hidden" name="sex" value="Female">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <label class="form-label">Address:</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="region" placeholder="Region" value="{{ $mothers->region}}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="address"
                                            placeholder="District/Street/House No." value="{{ $mothers->address}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Birthdate:</label>
                                <input class="form-control" type="date" name="birthdate" value="{{ $mothers->birthdate}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label">Contacts:</label>
                            <div class="col-6">
                                <input class="form-control" type="email" name="email" placeholder="Email" value="{{ $mothers->email}}" readonly>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" type="tel" name="phone_number" placeholder="Phone number" value="{{ $mothers->phone_number}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label">Emergency Contact Information:</label>
                            <div class="col-4">
                                <input class="form-control" type="text" name="emergency_contact_name"
                                    placeholder="Emergency Contact name" value="{{ $mothers->emergency_contact_name}}" readonly>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="relationship_with_patient"
                                    placeholder="Relationship with patient" value="{{ $mothers->relationship_with_patient}}" readonly>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="tel" name="emergency_contact_number"
                                    placeholder="Emergency Contact number" value="{{ $mothers->emergency_contact_number}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Estimated due date:</label>
                                <input class="form-control" type="date" name="estimated_due_date" value="{{ $mothers->estimated_due_date}}" readonly>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last Menstrual period:</label>
                                <input class="form-control" type="date" name="last_menstrual_period" value="{{ $mothers->last_menstrual_period}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label mt-3">Number of previous pregnancies:</label>
                                <input id="number" type="number" name="number_of_previous_pregnancies" value="{{ $mothers->number_of_previous_pregnancies}}" readonly>
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-3">Number of previous live births:</label>
                                <input id="number" type="number" name="number_of_previous_live_births" value="{{ $mothers->number_of_previous_live_births}}" readonly>
                            </div>
                            <div class="col-4">
                                <label class="form-label mt-3">Number of previous miscarriages:</label>
                                <input id="number" type="number" name="number_of_previous_miscarriages" value="{{ $mothers->number_of_previous_miscarriages}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Medical history:</label>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control mt-2" type="text" name="allergies" placeholder="Allergies" value="{{ $mothers->allergies}}" readonly>
                                </div>
                                <div class="col-6">
                                    <input class="form-control mt-2" type="text" name="chronic_medical_condition"
                                        placeholder="Any chronic medical condition" value="{{ $mothers->chronic_medical_condition}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control mt-2" type="text" name="current_medication"
                                        placeholder="Any current medications.." value="{{ $mothers->current_medication}}" readonly>
                                </div>
                                <div class="col-6">
                                    <input class="form-control mt-2" type="text" name="previous_surgeries"
                                        placeholder="Previous Surgeries" value="{{ $mothers->previous_surgeries}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input class="form-control mt-2" type="text" name="family_history_of_medical_condition"
                                        placeholder="Family history of medical conditions" value="{{ $mothers->family_history_of_medical_conditions}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Insurance Information:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control mt-2" type="text" name="insurance_provider"
                                        placeholder="Insurance provider" value="{{ $mothers->insurance_provider}}" readonly>
                                </div>
                                <div class="col-6">
                                    <input class="form-control mt-2" type="tel" name="insurance_phone_number"
                                        placeholder="Insurance phone number" value="{{ $mothers->insurance_phone_number}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <input class="form-control mt-2 mb-2" type="text" name="member_number" placeholder="Member number" value="{{ $mothers->member_number}}" readonly>
                                </div>
                                <div class="col-4">
                                    <input class="form-control mt-2 mb-2" type="text" name="group_number" placeholder="Group number" value="{{ $mothers->group_number}}" readonly>
                                </div>
                                <div class="col-4">
                                    <input class="form-control mt-2 mb-2" type="text" name="preferred_language"
                                        placeholder="preferred language" value="{{ $mothers->preferred_language}}" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
