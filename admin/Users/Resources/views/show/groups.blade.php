@extends('users::layouts.master')

@section('content')
    <div class="table-responsive">
        <table class="table data-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Groups as $group)
               <tr>
                   <td>{{ $group->name }}</td>
                   <td>
                       <a href="/admin/groups/{{ $group->id }}/edit" class="badge badge-primary">edit</a>
                   </td>
            </tr>  
            @endforeach
        </tbody>
        </table>
    </div>
@stop
