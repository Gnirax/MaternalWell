@extends('Maternal.layout')
@section('content')
    <div id="treatment" class="container card shadow-lg bg-body-tertiary rounded">
        <form method="POST" action="{{ route('treatment.store') }}">
            @csrf
            <h3 style="text-align: center;">TREATMENT FORM</h3>
            {{-- Some more info --}}
            <div>
                <input type="hidden" name="consultations_id" value="{{ $consultations->id }}">
                <input type="hidden" name="type" value="childs">
                <input type="hidden" name="childs_id" value="{{ $consultations->childs_id }}">
            </div>
            <div class="tab">
                <div class="row">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <label class="form-label">OBSERVATIONS:</label>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <textarea name="observations" class="form-control"></textarea>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                        <label class="form-label">HYPOTHESIS:</label>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                        <textarea class="form-control" name="hypothesis"></textarea>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                        <label class="form-label">DIAGNOSTIC TESTS:</label>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                        <textarea class="form-control" name="diagnostic_tests"></textarea>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                        <label class="form-label">DIAGNOSTIC RESULTS:</label>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                        <textarea class="form-control" name="diagnostics_results"></textarea>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                        <label class="form-label">DIAGNOSIS:</label>
                    </div>
                    <div class="col-4"></div>
                    </div>
                    <div class="row">
                       <div class="col-1"></div>
                       <div class="col-10">
                       <textarea class="form-control" name="diagnosis"></textarea>
                       </div>
                       <div class="col-1"></div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                        <label class="form-label">MEDICATIONS:</label>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                       <div class="col-1"></div>
                       <div class="col-10">
                       <textarea class="form-control" name="medications"></textarea>
                       </div>
                       <div class="col-1"></div>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="row">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <label class="form-label">TREATMENT PLAN</label>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <textarea class="form-control" name="treatment_plan"></textarea>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3" style="overflow: auto;">
                    <div class="col-3">
                        <div class="d-flex justify-content-start">
                            <button id="prev" class="btn btn-outline-primary" onclick="nP(-1)">Previous</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex justify-content-end">
                            <button id="next" class="btn btn-outline-primary" onclick="nP(1)">Next</button>
                        </div>
                    </div>
            </div>
        </form>
    </div>
@endsection
