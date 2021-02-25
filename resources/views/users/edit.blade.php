@section('title', 'Create a User')
@extends('layouts.master')

@section('content')
  {{Form::open(['action'=>'UserController@save'])}}
    {{ Form::token() }}
    <input type="hidden" name="id" value="{{ $userToEdit->id }}">
      <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" id="inputName" class="form-control" name="name" value="{{ $userToEdit->name }}">
      </div>

      <div class="form-group">
        <label for="inputName">Email</label>
        <input type="email" id="inputName" class="form-control" name="email" value="{{ $userToEdit->email }}">
      </div>

      <div class="form-group">
        <label>Role</label>
        <select class="form-control" name="role_id">
          <option value="0"> - Select user's role -</option>
          @foreach ($rolesList as $roleItem)
            <option value="{{ $roleItem->id }}" 
              @if($roleItem->id == $userToEdit->role_id)
              selected
              @endif
              > {{ $roleItem->name }}</option>
          @endforeach
        </select>
      </div>
                
      <input type="submit" value="Save" class="btn btn-success float-right" style="float: right;margin-left:10px">
      <a href="#" class="btn btn-secondary"  style="float: right;">Cancel</a>
                
  {{ Form::close() }}
@stop