@extends('Maternal.layout')
@section('content')
    <div id="child_index" class="container card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form method="POST" action="{{ route('childs.store') }}">
            @csrf
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
                <div class="col-4">
                    <input class="form-control" type="text" name="firstname" placeholder="First Name">
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="middlename" placeholder="Middle Name">
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="surname" placeholder="Surname">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="form-label">Birthdate:</label>
                    <input class="form-control" type="date" name="birthdate">
                </div>
                <div class="col-4">
                    <label class="form-label">Sex:</label>
                    <select name="sex" class="form-control form-select form-select-sm">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label">Mother:</label>
                    @foreach ($mothers as $mother)
                        <select name="mothers_id" class="form-control form-select form-select-sm">
                            <option value="{{ $mother->id }}">{{ $mother->firstname }} {{ $mother->surname }}</option>
                        </select>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <label class="form-label">Address:</label>
                <div class="col-6">
                    <input class="form-control" type="text" name="region" placeholder="Region">
                </div>
                <div class="col-6">
                    <input class="form-control" type="text" name="address" placeholder="District/Street/House No.">
                </div>
            </div>
            <div class="row">
                <label class="form-label">Contacts:</label>
                <div class="col-6">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input class="form-control" type="tel" name="phone_number" placeholder="Phone number">
                    </div>
                </div>

            </div>
            <div class="row">
                <label class="form-label">Emergency Contact Information:</label>
                <div class="col-4">
                    <input class="form-control" type="text" name="emergency_contact_name"
                        placeholder="Emergency Contact name">
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="relationship_with_patient"
                        placeholder="Relationship with patient">
                </div>
                <div class="col-4">
                    <input class="form-control" type="tel" name="emergency_contact_number"
                        placeholder="Emergency Contact number">
                </div>
            </div>
            <div class="row">
                <label class="form-label mt-2">Medical history:</label>
                <div class="row">
                    <div class="col-6">
                        <input class="form-control" type="text" name="allergies" placeholder="Allergies">
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" name="chronic_medical_condition"
                            placeholder="Any chronic medical condition">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input class="form-control mt-2" type="text" name="current_medication"
                            placeholder="Any current medications..">
                    </div>
                    <div class="col-6">
                        <input class="form-control mt-2" type="text" name="previous_surgeries"
                            placeholder="Previous Surgeries">
                    </div>
                </div>
                <div class="row">
                    <input class="form-control mt-2" type="text" name="family_history_of_medical_condition"
                        placeholder="Family history of medical conditions">
                </div>
            </div>
            <div class="row">
                <label class="form-label mt-2">Insurance Information:</label>
                <div class="row">
                    <div class="col-6">
                        <input class="form-control mt-2" type="text" name="insurance_provider"
                            placeholder="Insurance provider">
                    </div>
                    <div class="col-6">
                        <input class="form-control mt-2" type="tel" name="insurance_phone_number"
                            placeholder="Insurance phone number">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <input class="form-control mt-2" type="text" name="member_number"
                            placeholder="Member number">
                    </div>
                    <div class="col-4">
                        <input class="form-control mt-2" type="text" name="group_number" placeholder="Group number">
                    </div>
                    <div class="col-4">
                        <input class="form-control mt-2" type="text" name="preferred_language"
                            placeholder="preferred language">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5"></div>
                <div class="col-2">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-success mt-2 btn-sm mb-3" type="submit">REGISTER</button>
                    </div>
                </div>
                <div class="col-5"></div>
            </div>
        </form>
    </div>
@endsection
