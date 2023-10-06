@extends('Maternal.layout')
@section('content')
    <div id="consultation" class="container card shadow-lg bg-body-tertiary rounded mt-4">
        <form class="row" method="POST" action="{{ route('consultations.store') }}">
            @csrf
            <h2 style="text-align: center" class="mb-4 mt-3">CREATE CONSULTATION</h2>
            <input type="hidden" name="type" value="childs">
            <input type="hidden" name="childs_id" value="{{ $childs->id }}">
            <div class="row mb-4 mt-4">
                <div class="col-1"></div>
                <div class="col-2">
                    <label class="form-label mt-2">Date</label>
                </div>
                <div class="col-1">
                    <label class="form-label" style="font-size: 24px;">:</label>
                </div>
                <div class="col-7">
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row mb-4 mt-4">
                <div class="col-1"></div>
                <div class="col-2">
                    <label class="form-label mt-2">Doctor</label>
                </div>
                <div class="col-1">
                    <label class="form-label" style="font-size: 24px;">:</label>
                </div>
                <div class="col-7">
                    <select name="doctors_id" class="form-control form-select form-select-sm">
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->firstname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row mt-3">
                <div class="col-5"></div>
                <div class="col-2">
                    <button class="btn btn-outline-success btn-sm d-flex justify-content-center" type="submit">CREATE</button>
                </div>
                <div class="col-5"></div>
            </div>
        </form>
    </div>
@endsection
