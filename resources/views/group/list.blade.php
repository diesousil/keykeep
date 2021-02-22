@section('title', 'Your Groups')
@extends('layouts.master')

@section('content')
 
    <div id="jsGrid1">
      <div class="jsgrid-grid-header jsgrid-header-scrollbar">
          <table class="jsgrid-table">
              <tr class="jsgrid-header-row">
                  <th class="jsgrid-header-cell jsgrid-align-left jsgrid-header-sortable wd40">Name</th>
                  <th class="jsgrid-header-cell jsgrid-header-sortable wd40">Description</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable wd20">Commands</th>
              </tr>
          
          </table>
      </div>
      <div class="jsgrid-grid-body">
          <table class="jsgrid-table">
              <tbody>
                @foreach ($groups as $groupItem)                  
                    <tr class="jsgrid-row">
                        <td class="jsgrid-cell jsgrid-align-left wd40">{{ $groupItem->name }}</td>
                        <td class="jsgrid-cell jsgrid-align-left wd40">{{ $groupItem->description }}</td>
                        <td class="jsgrid-cell jsgrid-align-center wd20">
                          <a href="{{ action("GroupController@edit",['id'=> $groupItem->id]) }}"  ><i class="fas fa-pen"></i></a>
                          <a href="{{ action("GroupController@delete",['id'=> $groupItem->id]) }}" style="margin-left: 5px;" onclick='return confirm("Are you sure you want to delete this group? (WARNING!!! Subgroups and credentials will be DEFINETLY lost)");' ><i class="fas fa-trash"></i></a> 
                            
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>

    </div>
  </div>
  <script>
    $(function () {
      $("#jsGrid1").jsGrid({
          height: "100%",
          width: "100%",
  
          sorting: true,
          paging: true,
  
          data: db.clients,
  
          fields: [
              { name: "Name", type: "text", width: 150 },
              { name: "Age", type: "number", width: 50 },
              { name: "Address", type: "text", width: 200 },
              { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
              { name: "Married", type: "checkbox", title: "Is Married" }
          ]
      });
    });
  </script>
</body>
</html>

@stop