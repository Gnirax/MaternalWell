@extends('Maternal.layout')
@section('content')
    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th>MOTHERS_ID</th>
                    <th>OBSERVATIONS</th>
                    <th>HYPOTHESIS</th>
                    <th>DIAGNOSTIC TESTS</th>
                    <th>DIAGNOSTIC RESULTS</th>
                    <th>DIAGNOSIS</th>
                    <th>MEDICATIONS</th>
                    <th colspan="3">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($treatments as $treatment)
                    <tr>
                        <td>{{ $treatment->mothers_id }}</td>
                        <td>{{ $treatment->observations }}</td>
                        <td>{{ $treatment->hypothesis }}</td>
                        <td>{{ $treatment->diagnostic_results }}</td>
                        <td>{{ $treatment->diagnosis }}</td>
                        <td>{{ $treatment->medications }}</td>
                        <td>{{ $treatment->treatment_plan }}</td>
                        <td><a href="{{ route('treatment.show', $treatment->id) }}"><i class="fas fa-user-circle"></a></td>
                        <td><a href="{{ route('treatment.edit', $treatment->id) }}"><i class="fas fa-pencil-alt"></a></td>
                        <form method="POST" action="{{ route('mothers.delete', $treatment->id) }}">
                            @csrf
                            @method('DELETE')
                            <td><a href="{{ route('treatment.delete', $treatment->id) }}"><i class="fas fa-trash-alt"></a></td>
                        </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="14">no records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
