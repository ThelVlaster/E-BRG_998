
<div class="form-group" id="three" hidden="" >
  <div class="row">
      <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
        <center> <label>Find Query for Officials</label> </center>
      </div>
        <div class="col-md-3"><br>
          <label>Select Official Position</label>
            <table class="table table-bordered table-striped">
                <thead>
                  <tr><th></th></tr>
                </thead>
                  <tbody>
                    <tr><td><input type="checkbox" name="select-all" id="OfficialPosition">Select All</td></tr>
                    @foreach($oName as $oName)
                      <tr><td><input type="checkbox" name="position" value="{{$oName->OfficialPosition}}">{{$oName->OfficialPosition}}</td></tr>
                    @endforeach
                  </tbody>
            </table>
        </div>

        <div class="col-md-3">
           <br>
           <label>Sort by</label>
             <select class="form-control" style="width: 175px" id = "dropOfficialSort">
                <option value="1" checked>Official Position Name</option>
                <option value="2">Number of Official</option>
                <option value="3">House Status</option>
              </select>
        </div>

        <div class="col-md-3">
            <br>
            <label>Order by</label>
               <div class="radio" >
             
              <label><input type="radio" class="radiobtn" name="Offorder" id="Offorder" value="1" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
             <label><input type="radio" class="radiobtn" name="Offorder" id="Offorder" value="2">Descending</label>
               </div>
        </div>

        <div class="col-md-3"><br>
          <label>Status</label>
            <table class="table table-bordered table-striped">
                <thead>
                  <tr><th></th></tr>
                </thead>
                  <tbody>
                    <tr><td><input type="checkbox" name="select-all" id="OfficialStatus">Select All</td></tr>
                    <tr><td><input type="checkbox" name="Offtatus" value="Active">Active</td></tr>
                    <tr><td><input type="checkbox" name="Offstatus" value="Inactive">Inactive</td></tr>
                  </tbody>
            </table>
        </div> 

  </div><br>
          <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnofficial">Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
</div>
<!-- Officials -->




<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">

$("#OfficialPosition").click(function(){
$("input[name='position']").not(this).prop('checked', this.checked);
});

$("#OfficialStatus").click(function(){
$("input[name='Offtatus']").not(this).prop('checked', this.checked);
});

$('#btnofficial').click(function()
{
var OfficialPos = [];
var OfficialStatus= [];

$.each($("input[name='position']:checked"), function()
{            
OfficialPos.push($(this).val()); 
});

$.each($("input[name='Offtatus']:checked"), function()
{            
OfficialStatus.push($(this).val()); 
});

if ($('#dropOfficialSort').val()=='1')
var OffSortBy= 'OfficialPosition';
if ($('#dropOfficialSort').val()=='2')
var OffSortBy= 'OfficialPositionCount';
if ($('#dropOfficialSort').val()=='3')
var OffSortBy= 'status';

if($("input[name=Offorder]:checked").val() == "1")
var OfforderBy='asc';
else
var OfforderBy='desc';

$('#tabledata').empty();

$('#tabledata').append('<thead><tr><th>Official ID</th><th>Position Name</th><th>Position Number</th><th>Position Status</th></tr></thead>');

$.ajax({
type: 'POST',
url: 'OfficialQuery',
data: {
  offSort: OffSortBy,
  offStatus: OfficialStatus,
  offPos: OfficialPos,
   OffOrder: OfforderBy,
},
dataType: 'JSON',
success: function(data){
$.each(data.off, function(key5, val5)
{ 
$('#tabledata').append('<tbody align="center"><tr><td>'+val5.OfficialPositionID+'</td><td>'+val5.OfficialPosition+'</td><td>'+val5.OfficialPositionCount+'</td><td>'+val5.status+'</td></tr></tbody>');
});
},error: function(request, error){ }
}).error(function(ts){
alert(ts.responseText);
});  

});
</script>