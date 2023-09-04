@extends('Maternal.layout')
@section('content')
    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h2 style="text-align: center">MOTHERS TREATMENT TABLE</h2>
        <ul class="nav nav-tabs d-flex justify-content-center">
            <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#pasts">PAST TREATMENTS</a></li>
            <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#todays">TODAY'S TREATMENTS</a></li>
            <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#finished">FINISHED TREATMENTS</a></li>
            <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#ongoing">ONGOING TREATMENTS</a></li>
        </ul>
        <div class="tab-content">
            <div id="pasts" class="tab-pane fade">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>PATIENT</th>
                            <th>OBSERVATIONS</th>
                            <th>DIAGNOSIS</th>
                            <th>MEDICATIONS</th>
                            <th colspan="3">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pasttreatments as $pasttreatment)
                            <tr>
                                @if ($pasttreatment->childs_id == null)
                                    <td>{{ $pasttreatment->mothers_id }}</td>
                                    <td>{{ $pasttreatment->observations }}</td>
                                    <td>{{ $pasttreatment->diagnosis }}</td>
                                    <td>{{ $pasttreatment->medications }}</td>
                                    <td><a href="{{ route('treatment.show', $pasttreatment->id) }}"><i
                                                class="fas fa-user-circle"></a></td>
                                    <td><a href="{{ route('treatment.edit', $pasttreatment->id) }}"><i
                                                class="fas fa-pencil-alt"></a></td>
                                    <form method="POST" action="{{ route('treatment.delete', $pasttreatment->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <td><a href="{{ route('treatment.delete', $pasttreatment->id) }}"><i
                                                    class="fas fa-trash-alt"></a></td>
                                    </form>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">no records found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div id="todays" class="tab-pane fade">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>PATIENT</th>
                            <th>OBSERVATIONS</th>
                            <th>DIAGNOSIS</th>
                            <th>MEDICATIONS</th>
                            <th colspan="3">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($todaytreatments as $todaytreatment)
                            <tr>
                                @if ($todaytreatment->childs_id == null)
                                    <td>{{ $todaytreatment->mothers_id }}</td>
                                    <td>{{ $todaytreatment->observations }}</td>
                                    <td>{{ $todaytreatment->diagnosis }}</td>
                                    <td>{{ $todaytreatment->medications }}</td>
                                    <td><a href="{{ route('treatment.show', $todaytreatment->id) }}"><i
                                                class="fas fa-user-circle"></a></td>
                                    <td><a href="{{ route('treatment.edit', $todaytreatment->id) }}"><i
                                                class="fas fa-pencil-alt"></a></td>
                                    <form method="POST" action="{{ route('treatment.delete', $todaytreatment->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <td><a href="{{ route('treatment.delete', $todaytreatment->id) }}"><i
                                                    class="fas fa-trash-alt"></a></td>
                                    </form>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">no records found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div id="finished" class="tab-pane fade">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>PATIENT</th>
                            <th>OBSERVATIONS</th>
                            <th>DIAGNOSIS</th>
                            <th>MEDICATIONS</th>
                            <th colspan="3">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($finishedtreatments as $finishedtreatment)
                            <tr>
                                @if ($finishedtreatment->childs_id == null)
                                <td>{{ $finishedtreatment->mothers_id }}</td>
                                <td>{{ $finishedtreatment->observations }}</td>
                                <td>{{ $finishedtreatment->diagnosis }}</td>
                                <td>{{ $finishedtreatment->medications }}</td>
                                <td><a href="{{ route('treatment.show', $finishedtreatment->id) }}"><i
                                            class="fas fa-user-circle"></a></td>
                                <td><a href="{{ route('treatment.edit', $finishedtreatment->id) }}"><i
                                            class="fas fa-pencil-alt"></a></td>
                                <form method="POST" action="{{ route('treatment.delete', $finishedtreatment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <td><a href="{{ route('treatment.delete', $finishedtreatment->id) }}"><i
                                                class="fas fa-trash-alt"></a></td>
                                </form>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">no records found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div id="ongoing" class="tab-pane fade">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>PATIENT</th>
                            <th>OBSERVATIONS</th>
                            <th>DIAGNOSIS</th>
                            <th>MEDICATIONS</th>
                            <th colspan="3">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ongoingtreatments as $ongoingtreatment)
                            <tr>
                                @if ($ongoingtreatment->childs_id)
                                <td>{{ $ongoingtreatment->mothers_id }}</td>
                                <td>{{ $ongoingtreatment->observations }}</td>
                                <td>{{ $ongoingtreatment->diagnosis }}</td>
                                <td>{{ $ongoingtreatment->medications }}</td>
                                <td><a href="{{ route('treatment.show', $ongoingtreatment->id) }}"><i
                                            class="fas fa-user-circle"></a></td>
                                <td><a href="{{ route('treatment.edit', $ongoingtreatment->id) }}"><i
                                            class="fas fa-pencil-alt"></a></td>
                                <form method="POST" action="{{ route('treatment.delete', $ongoingtreatment->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <td><a href="{{ route('treatment.delete', $ongoingtreatment->id) }}"><i
                                                class="fas fa-trash-alt"></a></td>
                                </form>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">no records found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
