@extends('Maternal.layout')
@section('content')
<div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
    <h2 style="text-align: center">CHILDREN'S TABLE</h2>
    <div class="d-flex justify-content-start">
        <a href="{{ route('childs.create')}}">Add patient &rarr;</a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>FIRSTNAME</th>
                <th>SURNAME</th>
                <th>BIRTHDATE</th>
                <th>SEX</th>
                <th>REGION</th>
                <th>ADDRESS</th>
                <th>PHONE NUMBER</th>
                <th colspan="3">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @forelse($childs as $child)
            <tr>
                <td>{{$child->firstname}}</td>
                <td>{{$child->surname}}</td>
                <td>{{$child->birthdate}}</td>
                <td>{{$child->sex}}</td>
                <td>{{$child->region}}</td>
                <td>{{$child->address}}</td>
                <td>{{$child->phone_number}}</td>
                <td><a href="{{ route('childs.show', $child->id)}}"><i class="fas fa-user-circle"></a></td>
                <td><a href="{{ route('childs.edit', $child->id)}}"><i class="fas fa-pencil-alt"></a></td>
                <form method="POST" action="{{ route('childs.delete', $child->id)}}">
                    @csrf
                    @method('DELETE')
                    <td><a id="del" href="{{ route('childs.delete', $child->id)}}"><i class="fas fa-trash-alt"></a></td>
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
