@extends('Maternal.layout')
@section('content')
    <div class="container card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form class="row" method="POST" action="{{ route('consultations.update', $consultations->id) }}">
            @csrf
            @method('PUT')
            <h2 style="text-align: center">CREATE CONSULTATION</h2>
            <div class="row">
                <div class="col-12">
                    <label class="form-label">Date:</label>
                    <input class="form-control" tyoe="date" name="date" value="{{ $consultations->date }}">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label class="form-label">Doctor:</label>
                    <input class="form-control" name="doctors_id" type="text" value="{{ $consultations->doctors_id }}">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Starts:</label><br>
                    <input class="form-control" type="time" name="starting_time" placeholder="Starting time"
                        value="{{ $consultations->starting_time }}">
                </div>
                <div class="col-6">
                    <label class="form-label">Ends:</label><br>
                    <input class="form-control" type="time" name="ending_time" placeholder="Ending time"
                        value="{{ $consultations->ending_time }}">
                </div>
            </div>
            <div class="row">
                <button class="btn btn-outline-success btn-sm mb-3" type="submit">UPDATE</button>
            </div>
        </form>
    </div>
@endsection
