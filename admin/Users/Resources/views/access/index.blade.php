@extends('users::layouts.master')

@section('content')
    <div class="text-center">
        <button type="submit" data-toggle="collapse" data-target="#add-new-group">Add New</button>
        <div class="card collapse" id="add-new-group">
            <div class="card-body">
                @include("users::groups.create")
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table data-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Permissions as $access)
               <tr>
                   <td>{{ $access->label }}</td>
                   <td>
                       <a href="/admin/access/{{ $access->id }}/edit" class="btn btn-sm btn-outline-info">edit</a>
                   </td>
            </tr>  
            @endforeach
        </tbody>
        </table>
    </div>
@stop
