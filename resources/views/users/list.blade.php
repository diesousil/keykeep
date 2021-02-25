@section('title', 'Application Users')
@extends('layouts.master')

@section('content')
 
    <div id="jsGrid1">
      <div class="jsgrid-grid-header jsgrid-header-scrollbar">
          <table class="jsgrid-table">
              <tr class="jsgrid-header-row">
                <th class="jsgrid-header-cell jsgrid-align-left jsgrid-header-sortable wd20">Code</th>
                <th class="jsgrid-header-cell jsgrid-align-left jsgrid-header-sortable wd60">Name</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable wd20">Commands</th>
              </tr>
          
          </table>
      </div>
      <div class="jsgrid-grid-body">
          <table class="jsgrid-table">
              <tbody>
                @foreach ($usersList as $userItem)                  
                    <tr class="jsgrid-row">
                        <td class="jsgrid-cell jsgrid-align-left wd20">{{ $userItem->id }}</td>
                        <td class="jsgrid-cell jsgrid-align-left wd60">{{ $userItem->name }}</td>
                        <td class="jsgrid-cell jsgrid-align-center wd20">
                          <a href="{{ action("UserController@edit",['id'=> $userItem->id]) }}"  ><i class="fas fa-pen"></i></a>
                          @if($userItem->id != 1)                        
                          <a href="{{ action("UserController@delete",['id'=> $userItem->id]) }}" style="margin-left: 5px;" onclick='return confirm("Are you sure you want to delete this user? (WARNING!!! Groups, subgroups and credentials providen by this user will be DEFINETLY lost)");' ><i class="fas fa-trash"></i></a> 
                          @endif
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>

    </div>
@stop