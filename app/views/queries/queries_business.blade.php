
<div class="form-group" id="five" hidden="" >
<div class="row">
 
   <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
      <center> <label>Find Query for Business</label> </center>
    </div>

    <div class="col-md-3" style="margin-left: 85px">
    <br>
     <label>Select Business Type</label>
       <table class="table table-bordered table-striped" id="BusTableName">
    <thead>
       <tr>
          <th></th>
        </tr>
    </thead>
      <tbody>
        <tr><td><input type="checkbox" name="select-all" id="checkAllBus"/>Select All</td></tr>
        @foreach ($bName as $bName)
        <tr>
          <td><input type="checkbox" name="BusName" value="{{$bName->BusinessTypeID}}">{{$bName -> BusinessType}}</td></tr>
          @endforeach
      </tbody>
    </table>
    </div>


   <div style="margin-left: 0px"  class="col-md-3">
   <br>
   <label>Sort by</label>
     <select class="form-control" style="width: 175px" id="BusSortBy">
        <option value="1" checked>Business Type Name</option>
      <!--   <option value="2">Facility Status</option> -->
      </select>
  </div>
    
    <div class="col-md-5">
      <br>
      <label>Order by</label>
         <div class="radio" >
       
       <label><input type="radio" class="radiobtn" name="BusOrder" value="asc" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
       <label><input type="radio" class="radiobtn" name="BusOrder" value="desc" >Descending</label>
         </div>
    </div>

</div><br>
<center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnBus">          Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
</div>
<!-- Business Documents -->


<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">

    $("#checkAllBus").click(function(){
      $("input[name='BusName']").not(this).prop('checked', this.checked);
      });

    $('#btnBus').click(function()
    {

        var BusID = [];
        $.each($("input[name='BusName']:checked"), function(){            
        BusID.push($(this).val());

        });

      if ($('#BusSortBy').val()=='1')
        var BusSortBy= 'BusinessType';

      if($("input[name=BusOrder]:checked").val() == "asc")
        var BusorderBy= 'asc';
      else
        var BusorderBy= 'desc';

      $('#tabledata').empty();
      $('#tabledata').append('<thead><tr><th>Business ID</th><th>Business Type Name</th></tr></thead>');

      $.ajax({
          type: 'POST',
          url: 'BusQuery',
          data: {BusID: BusID,
          BusSortBy: BusSortBy,
          BusorderBy: BusorderBy},
          dataType: 'JSON',
          success: function(data){
          $.each(data.bus, function(key2, val2)
          { 
            $('#tabledata').append('<tbody align="center"><tr><td>'+val2.BusinessTypeID+'</td><td>'+val2.BusinessType+'</td></tr></tbody>');
          });

          },error: function(request, error){ }
          }).error(function(ts){
          alert(ts.responseText);
          });  
    });
    </script>