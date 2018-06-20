@extends('users::layouts.master')

@section('content')
  <h1 class="h3">Account Users <button class="btn btn-info btn-sm float-right" type="submit" data-toggle="modal" data-target="#addNew">Add New</button></h1>
  <hr>
  <div id="addNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="addNewLabel">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @include("auth.forms.signup", ['admin' => 'yes'])
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
    <div class="table-responsive">
        <table class="table data-table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Phone #</th>
                <th scope="col">Group</th>
                <th scope="col">Active</th>
                <th scope="col">Verified</th>
                <th scope="col">Status</th>
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
                   <td>{{ $user->group->label ?? 'ungrouped' }}</td>
                   <td>{!! $user->active? '&#10003;': '&times;' !!}</td>
                   <td>{!! $user->verified? '&#10003;': '&times;' !!}</td>
                   <td>{!! ['Pending', 'Approved', 'Suspended'][$user->status] !!}</td>
                   <td>
                       <a href="/admin/users/{{ $user->id }}/edit" class="badge badge-primary">edit</a>
                   </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@stop
