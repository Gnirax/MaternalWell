 @extends('Maternal.layout')
@section('content')
<div class="container-fluid shadow-lg p-3 mb-5 bg-body-tertiary rounded mb-2">
    <div class="card mb-2">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="row">
                    <img class="card-img">
                    <div class="col-10">
                        <a class="nav-link" href="{{ route('consultations.create.child',  $childs->id )}}">New Consultation</a>
                        <a class="nav-link" href="#">Medical History</a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            <div class="col-md-8" id="info">
                <form>
                    @csrf
                    <h2 style="text-align: center">{{ $childs->firstname}}'s Profile</h2>
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
                                <input class="form-control" type="text" name="firstname" placeholder="First Name" value="{{ $childs->firstname}}" readonly>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="middlename" placeholder="Middle Name" value="{{ $childs->middlename}}" readonly>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="surname" placeholder="Surname" value="{{ $childs->surname}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Birthdate:</label>
                            <input class="form-control" type="date" name="birthdate" value="{{ $childs->birthdate}}" readonly>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Sex:</label>
                            <select name="sex" class="form-control form-select form-select-sm" value="{{ $childs->sex}}" readonly>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Mother:</label>
                                <select name="mothers_id" class="form-control form-select form-select-sm" readonly>
                                    @foreach ($mothers as $mother)
                                    <option value="{{ $mother->id }}" @selected($mother->id == $childs->mothers_id) readonly>{{ $mother->firstname }} {{ $mother->surname }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <label class="form-label">Address:</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="region" placeholder="Region" value="{{ $childs->region}}" readonly>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="address"
                                        placeholder="District/Street/House No." value="{{ $childs->address}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <label class="form-label">Contacts:</label>
                                <div class="col-6">
                                    <input class="form-control" type="email" name="email" placeholder="Email" value="{{ $childs->email}}" readonly>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control" type="tel" name="phone_number" placeholder="Phone number" value="{{ $childs->phone_number}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label">Emergency Contact Information:</label>
                        <div class="col-4">
                            <input class="form-control" type="text" name="emergency_contact_name"
                                placeholder="Emergency Contact name" value="{{ $childs->emergency_contact_name}}" readonly>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="text" name="relationship_with_patient"
                                placeholder="Relationship with patient" value="{{ $childs->relationship_with_patient}}" readonly>
                        </div>
                        <div class="col-4">
                            <input class="form-control" type="tel" name="emergency_contact_number"
                                placeholder="Emergency Contact number" value="{{ $childs->emergency_contact_number}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label mt-2">Medical history:</label>
                        <div class="row">
                            <div class="col-6">
                                <input class="form-control" type="text" name="allergies" placeholder="Allergies" value="{{ $childs->allergies}}" readonly>
                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="chronic_medical_condition"
                                    placeholder="Any chronic medical condition" value="{{ $childs->chronic_medical_condition}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input class="form-control mt-2" type="text" name="current_medication"
                                    placeholder="Any current medications.." value="{{ $childs->current_medication}}" readonly>
                            </div>
                            <div class="col-6">
                                <input class="form-control mt-2" type="text" name="previous_surgeries"
                                    placeholder="Previous Surgeries" value="{{ $childs->previous_surgeries}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control mt-2" type="text" name="family_history_of_medical_condition"
                                    placeholder="Family history of medical conditions" value="{{ $childs->family_history_of_medical_conditions}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label mt-2">Insurance Information:</label>
                        <div class="row">
                            <div class="col-6">
                                <input class="form-control mt-2" type="text" name="insurance_provider"
                                    placeholder="Insurance provider" value="{{ $childs->insurance_provider}}" readonly>
                            </div>
                            <div class="col-6">
                                <input class="form-control mt-2" type="tel" name="insurance_phone_number"
                                    placeholder="Insurance phone number" value="{{ $childs->insurance_phone_number}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <input class="form-control mt-2" type="text" name="member_number"
                                    placeholder="Member number" value="{{ $childs->member_number}}" readonly>
                            </div>
                            <div class="col-4">
                                <input class="form-control mt-2" type="text" name="group_number" placeholder="Group number" value="{{ $childs->group_number}}" readonly>
                            </div>
                            <div class="col-4">
                                <input class="form-control mt-2" type="text" name="preferred_language"
                                    placeholder="preferred language" value="{{ $childs->preferred_language}}" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
