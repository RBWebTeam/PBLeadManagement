<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="row">
  <div class="col-sm-12">
  	<center><h3>User View</h3></center>
  </div>
</div>

<div class="row">
  <div class="col-sm-8">
  </div>

  <div class="col-sm-3">
	<input class="form-control" id="myInput" type="text" placeholder="Search..">
	<br>
  </div>
</div>

<div class="col-sm-1">
</div>

<div class="col-sm-10">
<div style="max-height:420px;overflow:auto;">
<table class="table table-bordered scroll" id="data">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Mobile No.</th>
      <th scope="col">Email Id</th>
      <th scope="col">City</th>
    </tr>
  </thead>
  <tbody id="myTable">
  @foreach($data as $val)
    <tr>
      <td><a class="btn" onClick="leadDetails('{{$val->PkUserId}}');" data-toggle="modal" data-target="#myModal">{{ $val->Name }}</a></td>
      <td>{{ $val->MobileNo }}</td>
      <td>{{ $val->EmailId }}</td>
      <td>{{ $val->City }}</td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
</div>

<div class="col-sm-1">
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script type="text/javascript">
  function leadDetails(id)
  {
    console.log(id);
    $.ajax({
      url:"{{url('lead-details')}}",
      type:'post',
      data:{"id":id,"_token":"{{csrf_token()}}" },
      success: function(data)
      {
        console.log(data);
        for(var i = 0; i < data.length; i++) {
        $('#table_id tbody').append("<tr><td>" + data[i].Name + "</td><td>" + data[i].MobileNo + "</td><td>" + data[i].Email + "</td><td>" + data[i].Status + "</td><td>" + data[i].Product + "</td><td>" + data[i].LoanAmount + "</td><td>" + data[i].MonthlyIncome + "</td><td>" + data[i].Remark + "</td></tr>");
      }
      }
    });
  }
</script>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="myFunction();">&times;</button>
          <center><h4 class="modal-title">User Lead</h4></center>
        </div>
        <div class="modal-body">
        <div style="max-height:360px;overflow:auto;">
          <table class="table table-bordered scroll" id="table_id">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Mobile No.</th>
                <th scope="col">Email Id</th>
                <th scope="col">Status</th>
                <th scope="col">Product</th>
                <th scope="col">Loan Amount</th>
                <th scope="col">Monthly Income</th>
                <th scope="col">Remark</th>
              </tr>
            </thead>
            <tbody id="myTable">
               
            </tbody>
          </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="myFunction();">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
function myFunction() {
    location.reload();
}
</script>

</body>
</html>