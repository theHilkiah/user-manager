@extends('users::layouts.master')

@section('content')
    <div class="">
      <h1 class="h3">Access & Permissions <button class="btn btn-info btn-sm float-right" type="submit" data-toggle="modal" data-target="#addNew">Add New</button></h1>
      <hr>
      <div id="addNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="addNewLabel">Add New Permission</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @include("users::access.create")
            </div>
            <div class="modal-footer">
              ...
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive">
        <table class="table data-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Label</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Permissions as $access)
               <tr>
                   <td>{{ $access->label }}</td>
                   <td class="text-right">
                       <a href="/admin/access/{{ $access->id }}/edit" class="badge badge-info py-1 px-2">edit</a>
                   </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@stop
