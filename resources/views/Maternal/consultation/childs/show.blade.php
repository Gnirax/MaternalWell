@extends('Maternal.layout')
@section('content')
    <div id="consultation" class="container card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form class="row">
            <h2 style="text-align: center"></h2>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Nurse:</label>
                    <input class="form-control" name="date"
                        value="{{ $consultations->firstname}} {{ $consultations->surname}}"
                        readonly>
                </div>
                <div class="col-6">
                    <label class="form-label">Child:</label>
                    <input class="form-control" name="date" value="{{ $childs->firstname }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label class="form-label">Date:</label>
                    <input class="form-control" name="date" value="{{ $consultations->date }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label class="form-label">Doctor:</label>
                    <input class="form-control" name="doctors_id"
                        value="{{ $doctors->firstname }} {{ $doctors->surname }}"
                        readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Starts:</label><br>
                    <input class="form-control" name="starting_time" placeholder="Starting time"
                        value="{{ $consultations->starting_time }}" readonly>
                </div>
                <div class="col-6">
                    <label class="form-label">Ends:</label><br>
                    <input class="form-control" name="ending_time" placeholder="Ending time"
                        value="{{ $consultations->ending_time }}" readonly>
                </div>
            </div>
            <div class="row justify-content-around">
                <a href="{{ route('childs.history', $consultations->childs_id) }}">See
                    History &rarr;</a>
                @if (Auth::user()->role == 'Doctor' || Auth::user()->role == 'Admin')
                    <a href="{{ route('treatment.create.childs', $consultations->childs_id) }}">Start
                        Treatment
                        &rarr;</a>
                @endif
            </div>
        </form>
    </div>
@endsection
