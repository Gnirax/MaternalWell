@extends('Maternal.layout')
@section('content')
    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <h2 style="text-align: center">MOTHER'S TABLE</h2>
        <div class="d-flex justify-content-start">
            <a href="{{ route('mothers.create') }}">Add patient &rarr;</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>FIRSTNAME</th>
                    <th>SURNAME</th>
                    <th>REGION</th>
                    <th>ADDRESS</th>
                    <th>PHONE NUMBER</th>
                    <th colspan="3">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mothers as $mother)
                    <tr>
                        <td>{{ $mother->firstname }}</td>
                        <td>{{ $mother->surname }}</td>
                        <td>{{ $mother->region }}</td>
                        <td>{{ $mother->address }}</td>
                        <td>{{ $mother->phone_number }}</td>
                        <td><a href="{{ route('mothers.show', $mother->id)}}"><i class="fas fa-user-circle"></a></td>
                            <td><a href="{{ route('mothers.edit', $mother->id)}}"><i class="fas fa-pencil-alt"></a></td>
                            <form method="POST" action="{{ route('mothers.delete', $mother->id)}}">
                                @csrf
                                @method('DELETE')
                                <td><a id="del" href="{{ route('mothers.delete', $mother->id)}}"><i class="fas fa-trash-alt"></a></td>
                            </form>
                    </tr>
                @empty
                    <tr>
                        <td colspan="31">no records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
