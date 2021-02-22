@section('title', 'Your Credentials')
@extends('layouts.master')

@section('content')
 
    <div id="jsGrid1">
      <div class="jsgrid-grid-header jsgrid-header-scrollbar">
          <table class="jsgrid-table">
              <tr class="jsgrid-header-row">
                  <th class="jsgrid-header-cell jsgrid-align-left jsgrid-header-sortable wd20">Title</th>
                  <th class="jsgrid-header-cell jsgrid-header-sortable wd40">Description</th>
                  <th class="jsgrid-header-cell jsgrid-header-sortable wd20">Group Name</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable wd20">Commands</th>
              </tr>
          
          </table>
      </div>
      <div class="jsgrid-grid-body">
          <table class="jsgrid-table">
              <tbody>
                @foreach ($credentialsList as $credentialItem)                  
                    <tr class="jsgrid-row">
                        <td class="jsgrid-cell jsgrid-align-left wd20">{{ $credentialItem->title }}</td>
                        <td class="jsgrid-cell jsgrid-align-left wd40">{{ $credentialItem->description }}</td>
                        <td class="jsgrid-cell jsgrid-align-left wd20" >{{ $credentialItem->group_name }}</td>
                        <td class="jsgrid-cell jsgrid-align-center wd20">
                          <a href="{{ action("CredentialController@edit",['id'=> $credentialItem->id]) }}"  ><i class="fas fa-pen"></i></a>
                          <a href="{{ action("CredentialController@delete",['id'=> $credentialItem->id]) }}" style="margin-left: 5px;" onclick='return confirm("Are you sure you want to delete this credential? (WARNING!!! It will be DEFINETLY lost)");' ><i class="fas fa-trash"></i></a> 
                            
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>

    </div>
  </div>
</body>
</html>

@stop