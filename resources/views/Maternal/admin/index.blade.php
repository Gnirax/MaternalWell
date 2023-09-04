@extends('Maternal.layout')
@section('content')
    @if (Auth::user()->role == 'Admin')
        <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h2 style="text-align: center">USERS' TABLE</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>FIRSTNAME</th>
                        <th>MIDDLENAME</th>
                        <th>SURNAME</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                        <th>SEX</th>
                        <th>BIRTHDATE</th>
                        <th colspan="3">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->middlename }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->sex }}</td>
                            <td>{{ $user->birthdate }}</td>
                            <td><a href="{{ route('show', $user->id) }}"><i class="fas fa-user-circle"></a></td>
                            <td><a href="{{ route('edit', $user->id) }}"><i class="fas fa-pencil-alt"></a></td>
                            <form action="{{ route('delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td><a href="{{ route('delete', $user->id)}}"><i class="fas fa-trash-alt"></a></td>
                            </form>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11">no records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif
@endsection
