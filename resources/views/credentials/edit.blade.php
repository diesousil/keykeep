@extends('layouts.master')

@section('title', 'list')

@section('content')

  {{Form::open(['action'=>'CredentialController@save'])}}
    {{ Form::token() }}
    <input type="hidden" name="id" value="{{ $credentialToEdit->id }}">
    <div class="form-group">
      <label for="inputName">Title</label>
      <input type="text" id="inputName" class="form-control" name="title" value="{{ $credentialToEdit->title }}">
    </div>
    <div class="form-group">
      <label for="inputDescription">Description</label>
      <textarea id="inputDescription" class="form-control" rows="4" name="description">{{ $credentialToEdit->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="inputurl">URL</label>
      <input type="text" id="inputName" class="form-control" name="Url" value="{{$credentialToEdit->url }}">
      <label for="inputurl">Login</label>
      <input type="email" id="inputName" class="form-control" name="Login" value="{{$credentialToEdit->login }}">
      <label for="inputurl">Password</label>
      <input type="password" id="inputName" class="form-control" name="Password" value="{{$credentialToEdit->password }}">
      <label for="inputurl">Observations</label>
      <textarea id="inputDescription" class="form-control" rows="4" name="observations">{{ $credentialToEdit->observations }}</textarea>
      
    </div>
    <div class="row">
      <div class="col-sm-6">
        
        <div class="form-group">
          <label>Group</label>
          <select class="form-control" name="group_id">
            <option value="0"> - Base Group -</option>
            @foreach ($groups as $groupItem)
                <option value="{{ $groupItem->id }}" 
                  @if($groupItem->id == $credentialToEdit->group_id )
                  selected
                  @endif 
                  > {{ $groupItem->name }}</option>
              
            @endforeach
          </select>
        </div>
      </div>
      
    </div>
    <input type="submit" value="Save" class="btn btn-success float-right" style="float: right;margin-left:10px">
    <a href="#" class="btn btn-secondary"  style="float: right;">Cancel</a>
    
  {{ Form::close() }}
  
@stop