@extends('Maternal.layout')
@section('content')
    <div id="consultation" class="container card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form class="row" method="POST" action="{{ route('consultations.store') }}">
            @csrf
            <h2 style="text-align: center">CREATE CONSULTATION</h2>
            <div class="row">
                <div class="col-12">
                    <label class="form-label">Date:</label>
                    <input type="date" class="form-control" name="date">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="hidden" name="type" value="childs">
                    <input type="hidden" name="childs_id" value="{{ $childs->id }}">
                    <label class="form-label">Doctor:</label>
                    <select name="doctors_id" class="form-control form-select form-select-sm">
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->firstname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Starts:</label><br>
                    <input type="time" class="form-control" name="starting_time" placeholder="Starting time">
                </div>
                <div class="col-6">
                    <label class="form-label">Ends:</label><br>
                    <input type="time" class="form-control" name="ending_time" placeholder="Ending time">
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <button class="btn btn-outline-success btn-sm mb-3" type="submit">SAVE</button>
            </div>
        </form>
    </div>
@endsection
