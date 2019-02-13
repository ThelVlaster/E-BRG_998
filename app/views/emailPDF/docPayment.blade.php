<div style="background-image: url({{ URL::asset('images/bg.png'); }});
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;" >

<center><img src="{{ asset('images/head.jpg')}}" style="width: 550px; height: 125px; margin-top: -1%;" alt="" class="img-responsive "></center>

<h1 style="font-size: 23px;"><center><b> Document Receipt </b></center></h1>
<hr>

<br>
<br>
<br>
<br>
<br>

<h4 align="right" style="padding-top: -9%; font-size: 16px;">Document Request ID: {{$request[0]->RequestID}}</h4>
<h4 style="padding-top: -9%; font-size: 16px;">Control No: {{$payment[0]->PaymentID}}</h4>

<br>
<div class='col-md-12'>
<table>
  <thead>
    <tr>
      <th style="padding: 5px 140px 5px 100px">Document/s</th>
      <th style="padding: 5px 100px 5px 10px">Payment</th>

    </tr>
  </thead>
  <tbody>
    @foreach($request as $request)
    <tr>
      <td style="padding: 5px 10px 5px 100px">{{$request -> DocumentName}}</td>
      <td style="padding: 5px 10px 5px 10px">{{$request -> DocumentFee}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


<h4 id = "total" style="padding-top: 10%; margin-left: 20%; z-index: 1;">Total Payment:</h4>



<p>Cash received from <u>{{$payment[0]->PaidBy}}</u> the amount of <u>{{$payment[0]->PaidAmount}} peso/s</u></p>




<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    
  });
</script>

</div>