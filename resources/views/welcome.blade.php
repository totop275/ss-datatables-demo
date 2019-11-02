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
				<p>Github: <a href="https://github.com/totop275/ss-datatables">ss-datatables</a> | <a href="https://github.com/totop275/ss-datatables-demo">ss-datatables-demo</a></p>
			</div>
			<br>
			<div class="card" >
				<div class="card-header">
					<div class="row" id="filter">
						<div class="col-md-3">
							<label>Pet Type</label>
							<?php $petTypes=['Cat','Dog','Bear','Tiger','Lion','Elephant','Giraffe']; ?>
							<select id="pet_type" class="form-control">
								<option value="*">All Type</option>
								@foreach($petTypes as $type)
								<option value="{{$type}}">{{$type}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-3">
							<label>Owner Gender</label>
							<select id="author_gender" class="form-control">
								<option value="*">All</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="col-md-3">
							<label>Owner Birth Month</label>
							<select id="birth_month" class="form-control">
								<option value="*">All</option>
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						<div class="col-md-3">
							<label>Birth Date</label>
							<div class="row">
								<div  class="col-md-5">
									<select id="birthday_operator" class="form-control">
										<option value="=">Equal</option>
										<option value="<">Before</option>
										<option value=">">After</option>
									</select>
								</div>
								<div class="col-md-7">
									<input type="date" id="birthday_value" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
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
			</div>
			<br>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="{{url('node_modules/jquery/dist/jquery.min.js')}}"></script>
		<script src="{{url('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		<script src="{{url('node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{url('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
		<script type="text/javascript">
			datatable=$('#datatables').dataTable({        
				serverSide: true,
				ajax:{
					url: '{{url('ajax')}}',
					type: 'GET',
					data: function (d){
						d.columns.push({'data':'detail'});
						d.columns.push({
							'data':'pet_type',
							'search':{
								'operator':'=',
								'value':$('#pet_type').val()
							}
						});
						d.columns.push({
							'data':'gender',
							'search':{
								'operator':'=',
								'value':$('#author_gender').val()
							}
						});
						d.columns.push({
							'data':'birth_month',
							'search':{
								'operator':'=',
								'value':$('#birth_month').val()
							}
						});
						if($('#birthday_value').val()){
							d.columns.push({
								'data':'birthday',
								'search':{
									'operator':$('#birthday_operator').val(),
									'value':$('#birthday_value').val()
								}
							});
						}
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
			$(document).ready(function(){
				$('#filter').on('change','input,select',function(){
					datatable.api().ajax.reload();
				})
			})
		</script>
	</body>
</html>