@extends('Maternal.layout')
@section('content')
<div class="row" style="margin-left: 10px;margin-right: 5px;">
    <div class="col-10">
        <div class="row">
            <h6 style="text-align: left">Recent &rarr;</h6>
            <div class="container card shadow-lg bg-body-tertiary rounded">
                <table class="table table-hover">
                    <tr>
                        <th>DATE</th>
                        <th>STARTING TIME</th>
                        <th>ENDING TIME</th>
                        <th>ACTION</th>
                    </tr>
                    @forelse ($recentconsultations as $consultation)
                        <tr>
                            <td>{{ $consultation->date }}</td>
                            <td>{{ $consultation->starting_time }}</td>
                            <td>{{ $consultation->ending_time }}</td>
                            @php
                                $matching = $treatments->where('consultations_id', $consultation->id)->first();
                            @endphp
                            <td>
                                @if ($matching)
                                <a href="{{ route('patient.see.treatment', $consultation->id)}}">See treatment</a>
                                @else
                                No treatment
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No consultations</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
        <div class="row">
            <h6 style="text-align: left">Past &rarr;</h6>
            <div class="container card shadow-lg bg-body-tertiary rounded">
                <table class="table table-hover">
                    <tr>
                        <th>DATE</th>
                        <th>STARTING TIME</th>
                        <th>ENDING TIME</th>
                    </tr>
                    @forelse ($pastconsultations as $consultation)
                        <tr>
                            <td>{{ $consultation->date }}</td>
                            <td>{{ $consultation->starting_time }}</td>
                            <td>{{ $consultation->ending_time }}</td>
                            @php
                                $matching = $treatments->where('consultations_id', $consultation->id->first())
                            @endphp
                            <td>
                                @if ($matching)
                                <a class="nav-link" href="#">See treatment</a>
                                @else
                                No treatment
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No consultations</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="container card shadow-lg bg-body-tertiary rounded">
            <div class="row">
                <a class="nav-link" href="{{ route('consultations.create.mother', $mothers->id)}}">New Consultation</a>
            </div>
        </div>
    </div>
</div>
@endsection
