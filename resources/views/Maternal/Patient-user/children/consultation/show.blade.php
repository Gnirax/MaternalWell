@extends('Maternal.layout')
@section('content')
    <div id="mySidenav" class="sidenav">
        <a id="a" data-toggle="tab" href="#observations"><i class="fas fa-eye"></i>OBSERVATIONS</a>
    <a id="b" data-toggle="tab" href="#hypothesis"><i class="fas fa-lightbulb"></i>HYPOTHESIS</a>
    <a id="c" data-toggle="tab" href="#diagnostic_tests"><i class="fas fa-flask"></i>DIAGNOSTIC TESTS</a>
    <a id="d" data-toggle="tab" href="#diagnostic_results"><i class="fas fa-chart-line"></i>DIAGNOSTIC RESULTS</a>
    <a id="e" data-toggle="tab" href="#diagnosis"><i class="fas fa-stethoscope"></i>DIAGNOSIS</a>
    <a id="f" data-toggle="tab" href="#medications"><i class="fas fa-medkit"></i>MEDICATIONS</a>
    <a id="g" data-toggle="tab" href="#treatment_plan"><i class="fas fa-list-ul"></i>TREATMENT PLAN</a>
    </div>
    <div id="treatment" class="container card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <form>
            @csrf
            <div class="tab-content">
                <div id="observations" class="tab-pane fade">
                    <div class="form-group">
                        <label class="form-label">OBSERVATIONS:</label>
                        <textarea name="observations" class="form-control" readonly>{{ $treatments->observations }}</textarea>
                    </div>
                </div>
                <div id="hypothesis" class="tab-pane fade">
                    <div class="form-group">
                        <label class="form-label">HYPOTHESIS:</label>
                        <textarea class="form-control" name="hypothesis" readonly>{{ $treatments->hypothesis }}</textarea>
                    </div>
                </div>
                <div id="diagnostic_tests" class="tab-pane fade">
                    <div class="form-group">
                        <label class="form-label">DIAGNOSTIC TESTS:</label>
                        <textarea class="form-control" name="diagnostic_tests" readonly>{{ $treatments->diagnostic_tests }}</textarea>
                    </div>
                </div>
                <div id="diagnostic_results" class="tab-pane fade">
                    <div class="form-group">
                        <label class="form-label">DIAGNOSTIC RESULTS:</label>
                        <textarea class="form-control" name="diagnostics_results" readonly>{{ $treatments->diagnostics_results }}</textarea>
                    </div>
                </div>
                <div id="diagnosis" class="tab-pane fade">
                    <div class="form-group">
                        <label class="form-label">DIAGNOSIS:</label>
                        <textarea class="form-control" name="diagnosis" readonly>{{ $treatments->diagnosis }}</textarea>
                    </div>
                </div>
                <div id="medications" class="tab-pane fade">
                    <div class="form-group">
                        <label class="form-label">MEDICATIONS:</label>
                        <textarea class="form-control" name="medications" readonly>{{ $treatments->medications }}</textarea>
                    </div>
                </div>
                <div id="treatment_plan" class="tab-pane fade">
                    <div class="form-group">
                        <label class="form-label">TREATMENT PLAN</label>
                        <textarea class="form-control" name="treatment_plan" readonly>{{ $treatments->treatment_plan }}</textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
