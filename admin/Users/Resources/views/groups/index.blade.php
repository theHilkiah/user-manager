@extends('users::layouts.master')

@section('content')
    <div class="">
        <h1 class="h3">Account User Groups <button class="btn btn-info btn-sm float-right" type="submit" data-toggle="modal" data-target="#addNew">Add New</button></h1>
        <hr>
        <div id="addNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="addNewLabel">Add New Group</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @include("users::groups.create")
              </div>
              <div class="modal-footer">
                ...
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="card collapse" id="add-new-group">
            <div class="card-body">
                @include("users::groups.create")
            </div>
        </div> --}}
    </div>
    <div class="table-responsive">
        <table class="table data-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Users</th>
                <th scope="col">Permissions</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Groups as $group)
               <tr>
                   <td>{{ $group->label }}</td>
                   <td>{{ $group->users->count() }}</td>
                   <td>{{ implode(",", $group->permissions) }}</td>
                   <td>
                       <a href="/admin/groups/{{ $group->id }}/edit" class="badge badge-primary">edit</a>
                   </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@stop
