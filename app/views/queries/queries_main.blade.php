@extends('layouts.master')

@section('content')
    <section class="content-header">
   
      <h1>
        Queries
      </h1>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
        <li class="active">Queries</li>
      </ol>
    </section>


     <!-- Main content -->
    <section class="content">

      <div class="row">
         <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-file"></i>&nbsp;&nbsp;Constraints</h3>
                  <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
  
          <form role="form" method = POST name = "queries_main">
          <div class="box-body">

              <div class="form-group">
                 <div class="row">
                         
                     <div class="col-md-12">
                            <!-- <label style="margin-left: 400px">Search</label> -->
                         <center>
                          <select class="form-control" style="width: 300px" id = "drop">
                               <option selected="" disabled="">Find Query for</option>
                                      <option value="1"> Household </option>
                                      <option value="2"> Resident </option>
                                      <option value="3"> Official </option>
                                      <option value="4"> Document </option>
                                      <option value="5"> Business </option>
                                      <option value="6"> Facility </option>
                                      <option value="7"> Item </option>
                             </select>
                            </center>
                            </div>
                  </div>
               </div>

          <div class="col-md-12">
            <div class="well">

          @include('queries.queries_household')
          @include('queries.queries_resident')
          @include('queries.queries_document')
          @include('queries.queries_official')
          @include('queries.queries_business')
          @include('queries.queries_facility')
          @include('queries.queries_item')                      
            
            </div><!--well-->
          </div><!-- /.col -->
       

            </div><!-- box-body -->
                
          </form>
                    
        </div><!--box-info-->


      </div><!--row-->

      <div class="col-md-12">
        <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-list"></i>&nbsp;&nbsp;Data</h3>
                  <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
  
          <div class="box-body">
              <div  style="overflow:auto">
              <table id="tabledata" class="table table-bordered table-striped" style="font-size:13px">
              </table> 
              </div>  
          </div><!-- box-body -->                
        </div><!--box-info-->
      </div>

    </div>


 <script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">

$(document).ready(function(){

  window.age;
  window.height;
  window.weight;
  window.wage="1";
  window.ItemTypeID = [];
  $("input[type='checkbox']").attr('checked', 'checked');
  age='1';
  height='1';
  weight='1';

  $.each($("input[name='ItemName']:checked"),function(){            
    ItemTypeID.push($(this).val());
  });

  $('#drop').change(function() {
        $('#tabledata').empty();
    if($('#drop').val() == 1) {
        $("#seven").hide();
        $("#six").hide();
        $("#five").hide();
        $("#four").hide();
        $("#three").hide();
        $("#two").hide();
        $("#one").show();
    }
    else if($('#drop').val() == 2) {
        $("#seven").hide();
        $("#six").hide();
        $("#five").hide();
        $("#four").hide();
        $("#three").hide();
        $("#two").show();
        $("#one").hide();
     }
    else if($('#drop').val() == 3) {
        $("#seven").hide();
        $("#six").hide();
        $("#five").hide();
        $("#four").hide();
        $("#three").show();
        $("#two").hide();
        $("#one").hide();
    }
    else if($('#drop').val() == 4){
        $("#seven").hide();
        $("#six").hide();
        $("#five").hide();
        $("#four").show();
        $("#three").hide();
        $("#two").hide();
        $("#one").hide();
    }
    else if($('#drop').val() == 5){
         $("#seven").hide();
        $("#six").hide();
        $("#five").show();
        $("#four").hide();
        $("#three").hide();
        $("#two").hide();
        $("#one").hide();
    }
    else if($('#drop').val() == 6){
        $("#seven").hide();
        $("#six").show();
        $("#five").hide();
        $("#four").hide();
        $("#three").hide();
        $("#two").hide();
        $("#one").hide();
        
    }
    else if($('#drop').val() == 7){
        $("#seven").show();
        $("#six").hide();
        $("#five").hide();
        $("#four").hide();
        $("#three").hide();
        $("#two").hide();
        $("#one").hide();
        
    }
   
  });
//drop

}); //document
</script>

	</section>

@endsection