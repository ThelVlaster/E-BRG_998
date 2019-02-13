<h1>Document Update</h1>


<br>
<h3>These are the current state of your documents</h3>
<br>
<h5>Document Request ID: {{$summary[0]->RequestID}}</h5>
<h5>Requestor: {{$summary[0]->Requestor}}</h5>
<h5>Requested For: {{$summary[0]-> FirstName}} {{$summary[0]-> LastName}} </h5>

<br>


<table>
  <thead>
    <tr>
      <th style="padding: 10px 10px 10px 10px">Document/s</th>
      <th style="padding: 10px 10px 10px 10px">Status</th>

    </tr>
  </thead>
  <tbody>
    @foreach($summary as $summary)
    <tr>
      <td style="padding: 10px 10px 10px 10px">{{$summary -> DocumentName}}</td>
      <td style="padding: 10px 10px 10px 10px">{{$summary -> DocReqStatus}}</td>

    </tr>
    @endforeach
  </tbody>
</table>
