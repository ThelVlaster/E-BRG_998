
<!--*************DOCUMENTS*************************************-->
                      <div class="form-group" id="four" hidden="" >
                          <div class="row">
                             
                               <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
                                  <center> <label>Find Query for Documents</label> </center>
                                </div>

                               <div class="col-md-3" style="margin-left: 100px">
                                <br>
                                 <label>Select Document Name</label>
                                  <table class="table table-bordered table-striped" id="TableDocName">
                                <thead>
                                   <tr>
                                      <th></th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    <tr><td><input type="checkbox" name="select-all" id="checkAllDoc"/>Select All</td></tr>
                                    @foreach ($DName as $DName)
                                    <tr>
                                      <td><input type="checkbox" name="DocName" value="{{$DName->DocumentID}}">{{$DName -> DocumentName}}</td></tr>
                                      @endforeach
                                  </tbody>
                                </table>
                                </div>

                                <div class="col-md-3" style="margin-left: 0px">
                                  <label>Select Document Status</label>
                                  <table class="table table-bordered table-striped" id="tableDocStatus">
                                    <thead>
                                       <tr>
                                          <th></th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <tr><td><input type="checkbox" name="select-all" id="DocStatus"/>Select All</td></tr>
                                        <tr><td><input type="checkbox" name="DocStat" value="Active">Active</td></tr>
                                        <tr><td><input type="checkbox" name="DocStat" value="Inactive">Inactive</td></tr>
                                      </tbody>
                                  </table>
                              </div>
                                

                                <div class="col-md-3">
                                 <br>
                                 <label>Sort by</label>
                                   <select class="form-control" style="width: 175px"
                                        id = "DocSort">
                                      <option value="1" checked>Document Name</option>
                                      <option value="2">Status</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-5">
                                 <br>
                                 <label>Order by</label>
                                     <div class="radio" >
                                   
                                   <label><input type="radio" class="radiobtn" name="radioDoc" id="asc" value="yes" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                                   <label><input type="radio" class="radiobtn" name="radioDoc" id="desc" value="no" >Descending</label>
                                    </div>
                               </div>
                      </div><br>
                           <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnDoc">          Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
                      </div>
                      <!-- Regular Documents -->


 <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">


  $("#checkAllDoc").click(function(){
    $("input[name='DocName']").not(this).prop('checked', this.checked);
  });

  $("#DocStatus").click(function(){
    $("input[name='DocStat']").not(this).prop('checked', this.checked);
  });


  $('#btnDoc').click(function(){
    var DocID = [];
    var DocStat = [];

    $.each($("input[name='DocName']:checked"), function(){            
        DocID.push($(this).val());
    });

    $.each($("input[name='DocStat']:checked"), function(){            
        DocStat.push($(this).val());
    });

    if ($('#DocSort').val()=='1')
      var Docsortby= 'DocumentName';
    if ($('#DocSort').val()=='2')
      var Docsortby= 'DocStatus';
    
    if($("input[name=radioDoc]:checked").val() == "asc")
       var docorder= 'asc';
     else
      var docorder= 'desc';

  $('#tabledata').empty();
  $('#tabledata').append('<thead><tr><th>Document ID</th><th>Document Name</th><th>Document Status</th></tr></thead>');

    $.ajax({
        type: 'POST',
        url: 'DocumentQuery',
        data: {
              DocID: DocID,
              DocStat: DocStat,
              Docsortby: Docsortby,
              docorder: docorder,
            },
        dataType: 'JSON',
        success: function(data){
          $.each(data.documents, function(key, val)
          {
            $('#tabledata').append('<tbody align="center"><tr><td>'+val.DocumentID+'</td><td>'+val.DocumentName+'</td><td>'+val.DocStatus+'</td></tr></tbody>');
          });
        },error: function(request, error){

              }
            }).error(function(ts){
              alert(ts.responseText);
            });  
   });
</script>