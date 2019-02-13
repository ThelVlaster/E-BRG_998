
                $(document).ready(function(){
                  $('#btnUpdate').click(function(){
                    alert("lol");
                  });

                  $('#btnSubmit').click(function(e){
                    e.preventDefault();
                    var posName = $('#txtOPosition').val();
                    var posNum = $('#txtOPNumber').val();

                    $.ajax({
                      type: 'POST',
                      url: 'addOfficialPosition',
                      data: {posName: posName, 
                              posNum: posNum},
                      dataType: 'JSON',
                      success: function(data){
                        /*$('tbody').html("");
                        $.each(data.position, function(key, val){
                          $('tbody').append('<tr> ' + 
                                              '<td>' + val.intOffPosID + '</td>' +
                                              '<td>' + val.strOffPosition + '</td>' +
                                              '<td>' + val.intOffPosNum + '</td>' +
                                              '<td><button class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#edit" value = "'+ val.intOffPosID +'" onclick = "modalEdit(this)"><i class="fa fa-pencil"></i></button> <button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#delete"><i class="fa fa-remove"></i></button></td>' +

                                              '<td><input type = "hidden" value = "'+ val.intOffPosID +'" id = "hiddenID_'+ val.intOffPosID +'"> <input type = "hidden" value = "' + val.strOffPosition + '" id = "hiddenPos_' + val.intOffPosID + '"> <input type = "hidden" value = "' + val.intOffPosNum + '" id = "hiddenPosNum_' + val.intOffPosID + '"></td>' + 
                                            '</tr>');
                        });*/
                        $('body').load("officialPosition");
                      }
                    });
                  });
                });



                function modalEdit(x){
                  var hID = "hiddenID_" + x.value;
                  var id = document.getElementById(hID).value;
                  document.getElementById('txt1').value = id;
                }