<div class="form-group" id="six" hidden="" >
    <div class="row">
       
         <div style="background-color: lightblue; font-size: 15px">
            <center> <label>Find Query for Facilities</label> </center>
          </div>

          <div class="col-md-3" style="margin-left: 100px">
          <br>
           <label>Select Facility</label>
            <table class="table table-bordered table-striped" id="tableFacName">
          <thead>
             <tr>
                <th></th>
              </tr>
          </thead>
            <tbody>
              <tr><td><input type="checkbox" name="select-all" id="checkAllFac"/>Select All</td></tr>
              @foreach ($fName as $fName)
              <tr>
                <td><input type="checkbox" name="FacName" value="{{$fName->FacilityID}}">{{$fName -> FacilityName}}</td></tr>
                @endforeach
            </tbody>
          </table>
          </div>
         
          <div class="col-md-3" style="margin-left: 0px">
         <label>Select Item Status</label>
            <table class="table table-bordered table-striped" id="tableFacStatus">
          <thead>
             <tr>
                <th></th>
              </tr>
          </thead>
            <tbody>
              <tr><td><input type="checkbox" name="select-all" id="FacCheckAllStatus"/>Select All</td></tr>
              <tr><td><input type="checkbox" name="FacStatus" value="Good">Good</td></tr>
              <tr><td><input type="checkbox" name="FacStatus" value="Broken">Broken</td></tr>
              <tr><td><input type="checkbox" name="FacStatus" value="Under Maintenance">Under Maintenance</td></tr>
            </tbody>
            </table>
        </div>
          
          
        <div class="col-md-3"><br>
         <label>Sort by</label>
            <select class="form-control" style="width: 175px" id="FacSortBy">
              <option value="1" checked>Facility Name</option>
              <option value="2">Facility Status</option>
            </select>
        </div>
          
          <div class="col-md-3"><br>
            <label>Order by</label>
              <div class="radio" >
                 <label><input type="radio" class="radiobtn" name="Facradiorder" id="Facorderby" value="asc" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                 <label><input type="radio" class="radiobtn" name="Facradiorder" id="Facorderbydesc" value="desc">Descending</label>
              </div>
          </div>

      </div><br>
          <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnFac">Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
</div>


<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">


  $("#checkAllFac").click(function(){
    $("input[name='FacName']").not(this).prop('checked', this.checked);
  });

  $("#FacCheckAllStatus").click(function(){
    $("input[name='FacStatus']").not(this).prop('checked', this.checked);
  });


  $('#btnFac').click(function(){
    var FacID = [];
      $.each($("input[name='FacName']:checked"), function(){            
          FacID.push($(this).val());
          
      });

      var FacStatus = [];
      $.each($("input[name='FacStatus']:checked"), function(){            
         FacStatus.push($(this).val());
         
      });

      if ($('#FacSortBy').val()=='1')
        var FacSortBy= 'FacilityName';
      if ($('#FacSortBy').val()=='2')
        var FacSortBy= 'status';
     
      if($("input[name=Facradiorder]:checked").val() == "asc")
         var FacorderBy= 'asc';
       else
        var FacorderBy= 'desc';
     
    $('#tabledata').empty();
    $('#tabledata').append('<thead><tr><th>Facility ID</th><th>Facility Name</th><th>Description</th><th>Facility Condition</th><th>Status</th></tr></thead>');

    $.ajax({
        type: 'POST',
        url: 'FacQuery',
        data: {FacID: FacID,
              FacStatus: FacStatus,
             FacSortBy: FacSortBy,
              FacorderBy: FacorderBy},
        dataType: 'JSON',
        success: function(data){
          $.each(data.fac, function(key1, val1)
          {
            $('#tabledata').append('<tbody align="center"><tr><td>'+val1.FacilityID+'</td><td>'+val1.FacilityName+'</td><td>'+val1.Description+'</td><td>'+val1.FCondition+'</td><td>'+val1.status+'</td></tr></tbody>');
          });
        },error: function(request, error){ }
            }).error(function(ts){
              alert(ts.responseText);
            });  
  });
</script>