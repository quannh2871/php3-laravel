@extends('admin.layouts.index')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date of birth</th>
            <th>Role</th>
            <th>Avatar</th>
            <th class="text-right">
                <a href="{{ route('admin.users.create') }}">
                    <span class="material-icons">
                        add_circle_outline
                    </span>
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 1
        @endphp

        @foreach($users as $user)
        <tr>
            <td class="text-center">{{ $i++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->date_of_birth->format('d/m/Y') }}</td>
            <td>{{ $user->role == 1 ? 'User' : 'Admin' }}</td>
            <td>
                <img src="{{ $user->avatar }}" alt="" class="img-thumbnail" width="150">
            </td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-success">
                    <i class="material-icons">edit</i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger">
                    <i class="material-icons">close</i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
