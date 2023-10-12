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
    <div id="consultation_show" class="container card shadow-lg bg-body-tertiary rounded">
        <form class="row" method="POST" action="{{ route('treatment.create.childs', $consultations->id) }}">
            @csrf
            @method('PUT')
            <h2 style="text-align: center" class="mb-4 mt-2">{{ $childs->firstname }}'s CONSULTATION</h2>
            <div class="row mb-4 mt-3">
                <div class="col-1"></div>
                <div class="col-2">
                    <label class="form-label mt-2">Name:</label>
                </div>
                <div class="col-8">
                    <input class="form-control" value="{{ $childs->firstname }} {{ $childs->surname }}" readonly>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row mb-4 mt-3">
                <div class="col-1"></div>
                <div class="col-2">
                    <label class="form-label mt-2">Date:</label>
                </div>
                <div class="col-8">
                    <input type="date" class="form-control" name="date" value="{{ $consultations->date }}" readonly>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row mt-2">
                <div class="col-4"></div>
                <div class="col-4">
                    <button class="btn btn-outline-primary btn-sm d-flex justify-content-center" type="submit">
                        Start Treatment
                        &rarr;
                    </button>
                    {{-- For time to work --}}
                    <input id="timeInput1" name="starting_time" type="hidden" readonly>
                    <script>
                        function updateTime1() {
                            const currentTime = new Date();
                            const hours = currentTime.getHours().toString().padStart(2, '0');
                            const minutes = currentTime.getMinutes().toString().padStart(2, '0');
                            const seconds = currentTime.getSeconds().toString().padStart(2, '0');
                            const formattedTime = `${hours}:${minutes}:${seconds}`;
                            document.getElementById('timeInput1').value = formattedTime;
                        }
                        updateTime1();
                        setInterval(updateTime1, 1000);
                    </script>
                </div>
                <div class="col-4"></div>
            </div>
        </form>
    </div>
@endsection
