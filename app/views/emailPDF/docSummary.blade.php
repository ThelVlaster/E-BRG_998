<div style="background-image: url({{ URL::asset('images/bg.png'); }});
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;" >

<center><img src="{{ asset('images/head.jpg')}}" style="width: 550px; height: 125px; margin-top: -1%;" alt="" class="img-responsive "></center>

<h1 style="font-size: 23px;"><center><b> Payments Summary </b></center></h1>
<hr>



<br>
<h4 align="right" style="padding-top: -7%; font-size: 16px;">Document Request ID: {{$summary[0]->RequestID}}</h4>
<h4 style="padding-top: -9%; font-size: 16px;">Requestor: {{$summary[0]->Requestor}}</h4>
<h4 style="padding-top: -4%; font-size: 16px;">Requested For: {{$summary[0]-> FirstName}} {{$summary[0]-> LastName}} </h4>

<br><br>


<table>
  <thead>
    <tr>
      <th style="padding: 10px 140px 10px 100px">Document/s</th>
      <th style="padding: 10px 100px 10px 10px">Payment</th>
      <th style="padding: 10px 10px 10px 10px">Purpose</th>

    </tr>
  </thead>
  <tbody>
    @foreach($summary as $summary)
    <tr>
      <td style="padding: 10px 10px 10px 100px">{{$summary -> DocumentName}}</td>
      <td style="padding: 10px 10px 10px 10px">{{$summary -> DocumentFee}}</td>
      <td style="padding: 10px 10px 10px 10px">{{$summary -> DocReqPurpose}}</td>

    </tr>
    @endforeach
  </tbody>
</table>

<h4 id = "total" style="padding-top: 10%; margin-left: 20%; z-index: 1;">Total Payment:</h4>




<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){

  });
</script>

</div>