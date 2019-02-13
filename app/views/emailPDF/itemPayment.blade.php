<div style="background-image: url({{ URL::asset('images/bg.png'); }});
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;" >

<center><img src="{{ asset('images/head.jpg')}}" style="width: 550px; height: 125px; margin-top: -1%;" alt="" class="img-responsive "></center>

<h1 style="font-size: 23px;"><center><b> Item and Facility Receipt </b></center></h1>
<hr>

<br>
<br>
<br>
<br>
<br>

<h4 align="right" style="padding-top: -9%; font-size: 16px;">Reservation ID: {{$res[0]->ReservationID}}</h4>
<h4 align="left" style="padding-top: -9%; font-size: 16px;">Control No: {{$res[0]->PaymentID}}</h4>
<h4 style="padding-top: -5%; font-size: 16px;">Requestor Name: {{$person}}</h4>

<br>
<div class='col-md-12'>
  <center>
<table>
  <thead>
    <tr>

      <th style="align:center; width:150px">Paid By</th>
      <th style="align:center; width:150px">Paid Amount</th>
      <th style="align:center; width:150px">PaymentType</th>
      <th style="align:center; width:150px">Payment Date</th>

    </tr>
  </thead>
  <tbody>
    @foreach($payment as $re)
    <tr>
      <td align="center">{{$re->PaidBy}}</td>
      <td align="center">{{$re->PaidAmount}}</td>
      <td align="center">{{$re-> PaymentType}}</td>
      <td align="center">{{$re->PaymentDate}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</center>
</div>


<h4 id = "total" style="padding-top: 10%; z-index: 1;">Total Payment: </h4>
<p>Request of  <u> {{$person}}  </u> with Reservation No:   <u> {{$res[0]->ReservationID}}   </u>      paid the total amount of    <u>  {{$total}}.00 peso/s</u></p>



<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){

    
  });
</script>

</div>