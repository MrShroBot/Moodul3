@extends('partials.layout')

@section('content')
    <div class="container mx-auto">
        <a class="btn btn-secondary" href="{{route('users.deleted')}}">Deleted Users</a>

        {{$users->links()}}
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->email}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            <div class="join">
                                <a class="btn btn-info join-item">View</a>
                                <a href="{{route('users.edit', ['user' => $user])}}" class="btn btn-warning join-item">Edit</a>
                                <input type="submit" class="btn btn-error join-item" value="Delete" form="delete-{{$user->id}}">
                            </div>
                            <form id="delete-{{$user->name}}" action="{{route('users.destroy', ['user' => $user])}}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
