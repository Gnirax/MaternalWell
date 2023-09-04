@extends('Maternal.layout2')
@section('content')
    <div class="container card shadow-lg">
                <ul class="nav nav-tabs d-flex justify-content-start">
                    @foreach ($childs as $child)
                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#{{ $child->firstname }}">{{ $child->firstname }}</a></li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($childs as $child)
                    <div id="{{ $child->firstname }}" class="tab-pane fade">
                        <div class="card mb-2">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <div class="row">
                                        <img class="card-img">
                                        <div class="col-10">
                                            <a class="nav-link" href="{{ route('consultations.create.child',  $child->id )}}">New Consultation</a>
                                            <a class="nav-link" href="#">Medical History</a>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                </div>
                                <div class="col-md-8" id="info">
                                    <form>
                                        @csrf
                                        <h2 style="text-align: center">{{ $child->firstname}}'s Profile</h2>
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
                                                    <input class="form-control" type="text" name="firstname" placeholder="First Name" value="{{ $child->firstname}}" readonly>
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="middlename" placeholder="Middle Name" value="{{ $child->middlename}}" readonly>
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control" type="text" name="surname" placeholder="Surname" value="{{ $child->surname}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <label class="form-label">Birthdate:</label>
                                                <input class="form-control" type="date" name="birthdate" value="{{ $child->birthdate}}" readonly>
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label">Sex:</label>
                                                <select name="sex" class="form-control form-select form-select-sm" value="{{ $child->sex}}" readonly>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label">Mother:</label>
                                                    <select name="mothers_id" class="form-control form-select form-select-sm" readonly>
                                                        @foreach ($mothers as $mother)
                                                        <option value="{{ $mother->id }}" @selected($mother->id == $child->mothers_id) readonly>{{ $mother->firstname }} {{ $mother->surname }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="form-label">Address:</label>
                                                    <div class="col-6">
                                                        <input class="form-control" type="text" name="region" placeholder="Region" value="{{ $child->region}}" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <input class="form-control" type="text" name="address"
                                                            placeholder="District/Street/House No." value="{{ $child->address}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="form-label">Contacts:</label>
                                                    <div class="col-6">
                                                        <input class="form-control" type="email" name="email" placeholder="Email" value="{{ $child->email}}" readonly>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <input class="form-control" type="tel" name="phone_number" placeholder="Phone number" value="{{ $child->phone_number}}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="form-label">Emergency Contact Information:</label>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="emergency_contact_name"
                                                    placeholder="Emergency Contact name" value="{{ $child->emergency_contact_name}}" readonly>
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="text" name="relationship_with_patient"
                                                    placeholder="Relationship with patient" value="{{ $child->relationship_with_patient}}" readonly>
                                            </div>
                                            <div class="col-4">
                                                <input class="form-control" type="tel" name="emergency_contact_number"
                                                    placeholder="Emergency Contact number" value="{{ $child->emergency_contact_number}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="form-label mt-2">Medical history:</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="allergies" placeholder="Allergies" value="{{ $child->allergies}}" readonly>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="chronic_medical_condition"
                                                        placeholder="Any chronic medical condition" value="{{ $child->chronic_medical_condition}}" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input class="form-control mt-2" type="text" name="current_medication"
                                                        placeholder="Any current medications.." value="{{ $child->current_medication}}" readonly>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control mt-2" type="text" name="previous_surgeries"
                                                        placeholder="Previous Surgeries" value="{{ $child->previous_surgeries}}" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input class="form-control mt-2" type="text" name="family_history_of_medical_condition"
                                                        placeholder="Family history of medical conditions" value="{{ $child->family_history_of_medical_conditions}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="form-label mt-2">Insurance Information:</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input class="form-control mt-2" type="text" name="insurance_provider"
                                                        placeholder="Insurance provider" value="{{ $child->insurance_provider}}" readonly>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control mt-2" type="tel" name="insurance_phone_number"
                                                        placeholder="Insurance phone number" value="{{ $child->insurance_phone_number}}" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <input class="form-control mt-2" type="text" name="member_number"
                                                        placeholder="Member number" value="{{ $child->member_number}}" readonly>
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control mt-2" type="text" name="group_number" placeholder="Group number" value="{{ $child->group_number}}" readonly>
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control mt-2" type="text" name="preferred_language"
                                                        placeholder="preferred language" value="{{ $child->preferred_language}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
    </div>
@endsection
