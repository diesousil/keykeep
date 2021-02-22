@section('title', 'Create a Credential')
@extends('layouts.master')



@section('content')

{{Form::open(['action'=>'CredentialController@save'])}}
  {{ Form::token() }}

  <div class="form-group">
    <label for="inputTitle">Title</label>
    <input type="text" id="inputTitle" class="form-control" name="title">
  </div>

  <div class="form-group">
    <label for="inputDescription">Description</label>
    <textarea id="inputDescription" class="form-control" rows="4" name="description"></textarea>
  </div>

  <div class="form-group">
    <label for="inputurl">URL</label>
    <input type="text" id="inputName" class="form-control" name="url">
  </div>
  
  <div class="form-group">
    <label for="inputLogin">Login</label>
    <input type="text" id="inputLogin" class="form-control" name="login">
  </div>
  
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password">
  </div>
  
  <div class="form-group">
    <label for="inputurl">Observations</label>
    <textarea id="inputObservations" class="form-control" rows="4" name="observations"></textarea>
  </div>

  <div class="form-group">
    <label>Group</label>
    <select class="form-control" name="group_id">
      <option value="0"> - Select the Group -</option>
      @foreach ($groups as $group)
        <option value="{{ $group->id }}"> {{ $group->name }}</option>
      @endforeach
    </select>
  </div>
  <input type="submit" value="Save" class="btn btn-success float-right">
  <a href="#" class="btn btn-secondary" >Cancel</a>
  
  {{ Form::close() }}
@stop