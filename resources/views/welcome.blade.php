<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{url('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{url('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">

		<title>Datatables Demo</title>
	</head>
	<body>
		<div class="container">
			<br>
			<div class="jumbotron">
				<h1>Datatables demo</h1>
				<p>A demo app for ss-datatables</p>
			</div>
			<br>
			<table id="datatables" class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Gender</th>
						<th>Birthday</th>
						<th>Pet Name</th>
						<th>Pet Type</th>
						<th>Register date</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="{{url('node_modules/jquery/dist/jquery.min.js')}}"></script>
		<script src="{{url('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		<script src="{{url('node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{url('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
		<script type="text/javascript">
			$('#datatables').dataTable({        
				serverSide: true,
				ajax:{
					url: '{{url('ajax')}}',
					type: 'GET',
					data: function (d){
						d.columns.push({'data':'detail'});
					}
				},
				columns:[
					{
						data: 'owner_name'
					},
					{
						data: 'gender'
					},
					{
						data: 'birthday'
					},
					{
						data: 'pet_name'
					},
					{
						data: 'pet_type'
					},
					{
						data: 'created_at'
					},
				]
			});
		</script>
	</body>
</html>