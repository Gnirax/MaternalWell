@extends('Maternal.layout')
@section('content')
    @if (Auth::user()->role == 'Admin')
        <div class="container shadow-lg bg-body-tertiary rounded">
            <h2 style="text-align: center">USERS' TABLE</h2>
            <div class="d-flex justify-content-start">
                <h6 class="text-center"><a href="{{ route('create') }}">Add user &rarr;</a></h6>
            </div>
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
                            @if (Auth::user()->id != $user->id)
                                <form action="{{ route('delete', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td><a id="del" href="{{ route('delete', $user->id) }}"><i
                                                class="fas fa-trash-alt"></a></td>
                                </form>
                            @endif
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
