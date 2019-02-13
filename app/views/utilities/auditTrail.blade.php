@extends('layouts.master')

@section('content')
 <section class="content-header">
   
      <h1>
        Audit Trail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Utilities</li>
        <li class="active">Audit Trail</li>
      </ol>
  </section>

     <!-- Main content -->
  <section class="content">
    <div class="row"> 
      <div class="col-md-12">

      <div class="box box-warning">
        <div class="box-body box-profile">

          <div style="margin-top: 15px">
            <button type="submit" id="btnAllLogs" style="margin-left: 950px" class="btn btn-primary ">View All Logs</button>
          </div>
        <br>
        
            <div class="col-md-12 form-inline " style="margin-left: 80px; margin-bottom: 35px">
             
              <label style="margin-left: 0px">Select Position</label>
                <select type="text"style="width: 200px; margin-right: 15px" class="form-control" id="dropPos" name="dropPos" >

                </select>

              <label>Select Module</label>
                <select type="text" style="width: 200px; margin-right: 15px " class="form-control" id="dropMod" name="dropMod" >

                </select>

              <label>Select Range</label>
                <select type="text" style="width: 200px" class="form-control" id="dropRange" name="dropRange" >

                </select>
             
              </div>
            
        <table id="example1" class="table table-bordered table-striped">
        <thead>
           <tr>

               <th>ID</th>
               <th>Official</th>
               <th>Action</th>
               <th>Module</th>
               <th>New Value</th>
               <th>Old Value</th>
               <th>Date  Time</th>
            
          </tr>
          </thead>

           <tbody>
                        @foreach($audit as $audit)
                          <tr>

                            <td>{{ $audit->AuditID }}</td>
                            <td>{{ $audit->LastName }}, {{ $audit->FirstName }} {{ $audit->MidName }}</td>
                            <td>{{ $audit->Action }}</td>
                            <td>{{ $audit->Type }}</td>
                            <td>{{ $audit->NewValue }}</td>
                            <td>{{ $audit->OldValue }}</td>
                            <td>{{ $audit->Date }}</td>
                          </tr>
                        @endforeach
                      </tbody>

        </table>

        </div>
      </div>
      
      </div>
   </div>
 <script type="text/javascript" src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(function(){
            
            $('#example1').DataTable({
                 "order": [[ 6, "desc" ]]
            });
});//document

          </script>

  </section>

@endsection