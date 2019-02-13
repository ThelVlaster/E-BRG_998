
<!--*******************************ITEMSSSS**********************************************************************->
 <!-Items -->
<div class="form-group" id="seven" hidden="" >
  <div class="row">
   <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
      <center> <label>Find Query for Items</label> </center>
    </div>
        <div class="col-md-3" style="margin-left: 0px">
         <label>Select Item Name</label>
         <table class="table table-bordered table-striped" id="tableItemName">
          <thead>
             <tr>
                <th></th>
              </tr>
          </thead>
            <tbody>
              <tr><td><input type="checkbox" name="select-all" id="checkAll"/>Select All</td></tr>
              @foreach ($iName as $iName)
              <tr>
                <td><input type="checkbox" name="ItemName" value="{{$iName->ItemTypeID}}">{{$iName -> ItemName}}</td></tr>
                @endforeach
            </tbody>
          </table>
        </div>


        <div class="col-md-3" style="margin-left: 0px">
         <label>Select Item Status</label>
            <table class="table table-bordered table-striped" id="tableItemStatus">
          <thead>
             <tr>
                <th></th>
              </tr>
          </thead>
            <tbody>
              <tr><td><input type="checkbox" name="select-all" id="checkAllStatus"/>Select All</td></tr>
              <tr><td><input type="checkbox" name="ItemStatus" value="Good">Good</td></tr>
              <tr><td><input type="checkbox" name="ItemStatus" value="Broken">Broken</td></tr>
              <tr><td><input type="checkbox" name="ItemStatus" value="Lost">Lost</td></tr>
              <tr><td><input type="checkbox" name="ItemStatus" value="Under Maintenance">Under Maintenance</td></tr>
            </tbody>
            </table>
        </div>

        <div style="margin-left: 0px"  class="col-md-3">
         <br>
         <label>Sort by</label>
           <select class="form-control" style="width: 175px" id="sortBy">
              <option value="1" checked> Item Name </option>
              <option value="2"> Item Status </option>
            </select>
        </div>
          
          <div class="col-md-3">
            <br>
            <label>Order by</label>
               <div class="radio" >
             
             <label><input type="radio" class="radiobtn" name="radiorder" id="orderby" value="asc" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
             <label><input type="radio" class="radiobtn" name="radiorder" id="orderbydesc" value="desc">Descending</label>
               </div>
          </div>

    </div><br>
     <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnItem">          Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
</div>


 <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">


  $("#checkAll").click(function(){
    $("input[name='ItemName']").not(this).prop('checked', this.checked);
  });

  $("#checkAllStatus").click(function(){
    $("input[name='ItemStatus']").not(this).prop('checked', this.checked);
  });


  $('#btnItem').click(function(){

    var un= [];
    $.each($("input[name='ItemName']:not(:checked)"),function() {
         un.push($(this).val());

    });
    
  if (un.length!=ItemTypeID.length)
    {
      ItemTypeID= [];
        $.each($("input[name='ItemName']:checked"),function(){            
         ItemTypeID.push($(this).val());
        });
    }
  else if (un.length==ItemTypeID.length)
      ItemTypeID=un.slice();

  var ItemStatus = [];
  $.each($("input[name='ItemStatus']:checked"), function(){            
      ItemStatus.push($(this).val());
  });

  if ($('#sortBy').val()=='1')
    var sortBy= 'ItemName';
  if ($('#sortBy').val()=='2')
    var sortBy= 'ItemStatus';
  if($("input[name=radiorder]:checked").val() == "asc")
     var orderBy= 'asc';
   else
    var orderBy= 'desc';

  $('#tabledata').empty();
  $('#tabledata').append('<thead><tr><th>Item ID</th><th>Status</th></tr></thead>');

    $.ajax({
        type: 'POST',
        url: 'ItemQuery',
        data: {
              ItemTypeID: ItemTypeID,
              ItemStatus: ItemStatus,
              SortBy: sortBy,
              OrderBy:orderBy },
        dataType: 'JSON',
        success: function(data){
          $.each(data.ItemNames, function(key, val)
          {
            $('#tabledata').append('<tbody align="center"><tr><td>'+val.ItemName+'-'+val.ItemID+'</td><td>'+val.ItemStatus+'</td></tr></tbody>');
          });
        },error: function(request, error){

              }
            }).error(function(ts){
              alert(ts.responseText);
            });  
   });
</script>