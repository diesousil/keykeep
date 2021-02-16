@extends('layouts.master')

@section('title', 'list')

@section('content')
 
    <div id="jsGrid1">
      <div class="jsgrid-grid-header jsgrid-header-scrollbar">
          <table class="jsgrid-table">
              <tr class="jsgrid-header-row">
                  <th class="jsgrid-header-cell jsgrid-align-left jsgrid-header-sortable">Title</th>
                  <th class="jsgrid-header-cell jsgrid-header-sortable">Observations</th>
                  <th class="jsgrid-header-cell jsgrid-header-sortable">Group Name</th>
                  <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable">Commands</th>
              </tr>
          
          </table>
      </div>
      <div class="jsgrid-grid-body">
          <table class="jsgrid-table">
              <tbody>
                @foreach ($credentialsList as $credentials)                  
                    <tr class="jsgrid-row">
                        <td class="jsgrid-cell jsgrid-align-left">{{ $credentials->title }}</td>
                        <td class="jsgrid-cell jsgrid-align-left">{{ $credentials->observations }}</td>
                        <td class="jsgrid-cell jsgrid-align-left" >{{ $credentials->group_id }}</td>
                        <td class="jsgrid-cell jsgrid-align-center">
                          <a href="http://keykeep.test/credentials/edit?id={{ $credentials->id }}"  ><i class="fas fa-pen"></i></a>
                            <a href="http://keykeep.test/credentials/delete?id={{ $credentials->id }}" style="margin-left: 5px;" onclick='return confirm("Tem certeza de que deseja excluir este grupo?");' ><i class="fas fa-trash"></i></a> 
                            
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