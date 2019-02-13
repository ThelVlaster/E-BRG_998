

          <div class="modal fade" id="edit">
            <div class="modal-dialog modal-lg" style="width:1150px">
          
           <!--    <form class="form-horizontal" 
                    role = "form"
                    enctype="multipart/form-data"
                    id = "editForm"                    
                    action = "{{URL::to('updateDocumentDetails')}}"
                    onsubmit = "return false"> -->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Document Details</h4>
                  </div>
                <!-- modal content -->
                  <div class="modal-body">
                
                      <div class="box-body">
                          <div class = "col-md-12">
                          <div class = "row">

                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Name*</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="etxtDocName" 
                                       name="etxtDocName" 
                                       placeholder="Name"
                                       required="required">
                                <div hidden="">
                                 <input type="text" 
                                       class="form-control" 
                                       id="etxtDocID" 
                                       name="etxtDocID">        
                                </div>                        
                              </div>
                            </div>

                           
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Type*</label>
                                <select class="form-control"
                                        id = "etxtClassification"
                                        name = "etxtClassification"
                                        >
                                        <option disabled="" selected="">Select Type</option>
                                        <option value = "1">Regular Document</option>
                                        <option value = "2">Business Document</option>

                                        
                                </select>
                                
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group" id="eavail" hidden>
                                <label for="exampleInputEmail1">Availability</label>
                                <select class="form-control"
                                        id = "etxtAvail"
                                        name = "etxtAvail"
                                        >
                                        <option disabled="" selected="">Select Availability</option>
                                        <option value = "1">Resident only</option>
                                        <option value = "2">All</option>

                                        
                                </select>
                                
                              </div>
                            </div>
                          </div><!--row-->

                          <div class="row">  
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Select Template*</label>
                                <select class="form-control"
                                        id = "etxtTemplate"
                                        name = "etxtTemplate"
                                        >
                                        <option disabled="" selected="">Select Template</option>
                                        @foreach($template as $t)
                                            <option value = "{{ $t -> TemplateID}}"> {{ $t -> TemplateName}} ({{$t -> TemplateSize}} {{$t -> TemplateOrientation}})</option>
                                        @endforeach 
                                </select>
                                
                              </div>
                            </div>


                            



                             <div class="col-md-4">
                              <div class="form-group">
                                <label>Regular Fee*</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="etxtFee"
                                       name="etxtFee"
                                       required="required">
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Duplicate Copy Fee*</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="etxtDupFee"
                                       name="etxtDupFee"
                                       required="required">
                              </div>
                            </div>


                          </div><!--row-->
                      </div><!-- col-md-8 -->
                      

                        <div class="form-group">
                          <button type="button" class="btn btn-success pull-right" id="ebtnCTemp" disabled="">Confirm Template</button>
                          <button type="button" class="btn btn-success pull-right" id="ebtnETemp">Edit Template</button>
                   
                       
                         <div class="row">

                          <div class="col-md-12" id = "editTemplate" name="editTemplate" style="overflow:auto">
                              <div>
                              </div>
                          </div>

                        </div>                     
                      </div>
                    </div><!--box body-->
                  </div><!--modal body-->

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id = "btnUpdate">Save Changes</button>
                  </div>
                </div><!-- /.modal-content -->
              <!-- </form>
 -->            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->



   