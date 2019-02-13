
                      <div class="form-group" id="one" hidden="">
                          <div class="row">
                                <div class="col-md-12" style="background-color: lightblue; font-size: 15px">
                                  <center> <label>Find Query for Household</label> </center>
                                </div>
                              
                              <div class="col-md-3"><br>
                                  <label>House Street</label>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                          <tr><th></th></tr>
                                        </thead>
                                          <tbody>
                                            <tr><td><input type="checkbox" name="select-all" id="HouseStreet">Select All</td></tr>
                                            @foreach($street as $st)
                                              <tr><td><input type="checkbox" name="street" value="{{$st->StreetID}}">{{$st->StreetName}}</td></tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                              </div>

                              <div class="col-md-3"><br>
                                  <label>House Type</label>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                          <tr><th></th></tr>
                                        </thead>
                                          <tbody>
                                            <tr><td><input type="checkbox" name="select-all" id="HouseType">Select All</td></tr>
                                            @foreach($HouseT as $Hame)
                                              <tr><td><input type="checkbox" name="Htype" value="{{$Hame->HouseType}}">{{$Hame->HouseType}}</td></tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                              </div>

                              <div class="col-md-3">
                                 <br>
                                 <label>Sort by</label>
                                   <select class="form-control" style="width: 175px" id = "dropHouseSort">
                                      <option value="1" checked>Owner's Name</option>
                                      <option value="2">House Type</option>
                                      <option value="3">House Street</option>
                                      <option value="4">House Status</option>
                                    </select>
                              </div>

                              <div class="col-md-3">
                                  <br>
                                  <label>Order by</label>
                                     <div class="radio" >
                                   
                                    <label><input type="radio" class="radiobtn" name="Horder" id="HouseOrder" value="1" checked>Ascending</label>&nbsp;&nbsp;&nbsp;
                                   <label><input type="radio" class="radiobtn" name="Horder" id="HouseOrder" value="2">Descending</label>
                                     </div>
                              </div>

                              <div class="col-md-3"><br>
                                <label>Status</label>
                                  <table class="table table-bordered table-striped">
                                      <thead>
                                        <tr><th></th></tr>
                                      </thead>
                                        <tbody>
                                          <tr><td><input type="checkbox" name="select-all" id="HouseStatus">Select All</td></tr>
                                          <tr><td><input type="checkbox" name="Hstatus" value="Active">Active</td></tr>
                                          <tr><td><input type="checkbox" name="Hstatus" value="Inactive">Inactive</td></tr>
                                        </tbody>
                                  </table>
                              </div> 

                        </div><br>
                                <center><div><button type="button" class="btn btn-default btn-flat fa fa-refresh" id="btnHouse">Refresh</button> &nbsp;&nbsp;&nbsp;&nbsp;</button> </div>
                      </div>
                      <!-- Household -->

 <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">

//*******************************Household**********************************************************************//

      $("#HouseStreet").click(function(){
            $("input[name='street']").not(this).prop('checked', this.checked);
          });

      $("#HouseType").click(function(){
            $("input[name='Htype']").not(this).prop('checked', this.checked);
          });

      $("#HouseStatus").click(function(){
            $("input[name='Hstatus']").not(this).prop('checked', this.checked);
          });

      $('#btnHouse').click(function()
      {
        var HouseSt = [];
        var HouseTy = [];
        var HouseStatus= [];

            $.each($("input[name='street']:checked"), function()
            {            
                HouseSt.push($(this).val()); 
            });

            $.each($("input[name='Htype']:checked"), function()
            {            
                HouseTy.push($(this).val()); 
            });

            $.each($("input[name='Hstatus']:checked"), function()
            {            
                HouseStatus.push($(this).val()); 
            });


            if ($('#dropHouseSort').val()=='1')
              var HouseSortBy= 'HLastName';
            if ($('#dropHouseSort').val()=='2')
              var HouseSortBy= 'HouseType';
            if ($('#dropHouseSort').val()=='3')
              var HouseSortBy= 'HouseStreet';
            if ($('#dropHouseSort').val()=='4')
              var HouseSortBy= 'status';
           
            if($("input[name=Horder]:checked").val() == "1")
               var HouseorderBy='asc';
             else
              var HouseorderBy='desc';

            $('#tabledata').empty();
            
            $('#tabledata').append('<thead><tr><th>House ID</th><th>Owner Name</th><th>House Address</th><th>House Type</th><th>Status</th></tr></thead>');

            $.ajax({
                type: 'POST',
                url: 'HouseQuery',
                data: {
                        street: HouseSt,
                        type: HouseTy,
                        status: HouseStatus,
                        Hsort: HouseSortBy,
                        Horder: HouseorderBy,
                      },
                dataType: 'JSON',
                success: function(data){
                  $.each(data.house, function(key4, val4)
                  { 
                    $('#tabledata').append('<tbody align="center"><tr><td>'+val4.HouseID+'</td><td>'+val4.HLastName+' '+val4.HFirstName+'</td><td>'+val4.HouseAddNo+' '+val4.HouseStreet+' zone '+val4.HouseZone+'</td><td>'+val4.HouseType+'</td><td>'+val4.status+'</td></tr></tbody>');
                  });
                },error: function(request, error){ }
                    }).error(function(ts){
                      alert(ts.responseText);
                    });  

      });
</script>