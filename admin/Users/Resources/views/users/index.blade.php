@extends('users::layouts.master')

@section('content')
    <div class="table-responsive">
        <table class="table data-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone #</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Users as $user)
               <tr>
                   <td>{{ $user->fname }}</td>
                   <td>{{ $user->lname }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->phone }}</td>
                   <td>
                       <a href="/admin/users/{{ $user->id }}/edit" class="badge badge-primary">edit</a>
                   </td>
            </tr>  
            @endforeach
        </tbody>
        </table>
    </div>
@stop
