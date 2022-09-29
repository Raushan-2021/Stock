
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Online e-Services</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Apply Online</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
	
	<div class=" demo">


		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<i class="more-less glyphicon glyphicon-plus"></i>
							Employee's Details
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Employee Name</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Employee Designation</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Employee Code </label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Employee E-mail</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>



							<div class="col-md-6">
								<div class="form-group">
									<label>Employee Date of Joining</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Employee Date of Superannuation</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							<i class="more-less glyphicon glyphicon-plus"></i>
							Apply for Hospitality
						</a>
					</h4>
				</div>

				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Select Expenditure Source (Fund)</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Select Prior Approval</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Meeting Subject </label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Meeting Date</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Meeting Time</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Meeting Place</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Entitlement Amount</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Balance Amount</label>
									<input  type="text" class="form-control" readonly/>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							<i class="more-less glyphicon glyphicon-plus"></i>
							Refreshment Requirement(s) From NIC-Hospitality
						</a>
					</h4>
				</div>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				<div class="panel-body">
					<input type="hidden" name="request_user_id" value="1">
					<input type="hidden" name="approved_user_id" value="1">
					<div class="p-4 card">
						<table id="myTable" class="order-list table table-bordered" >
						<thead>
							<tr>
								<th scope="col" class="mx-5">Bill no.</th>
								<th scope="col" class="mx-5">Bill date.</th>
								<th scope="col" class="mx-5">Item</th>
								<th scope="col" class="mx-5">Quantity</th>
								<th scope="col" class="mx-5">Amount</th>
								<th scope="col" class="mx-5">Action</th>

							</tr>
						</thead>
						<tbody>
							<tr class="dynamicRow">
								<td><input type="text" name="bill_date[]" id="bill_date" class="form-control ml-1" readonly value="<?php echo rand(100000, 999999)."-".date('m-Y'); ?>" /></td>
								<td><input type="text" name="bill_no[]" id="bill_no" class="form-control ml-1" readonly value="<?=date('d-m-Y');?>" /></td>
								
								<td>
									<select id="item_1" class="form-control variable_priority unique required" name="item[]" onchange="onchangeSelect(this); setStationaryLimit(this);" required>
										<option value="" selected>Item Choose...</option>
										@if ($stationary)
										@foreach ($stationary as $stationary)
										<option value="{{$stationary->id}}" data-quantity_issued="{{ Ucfirst($stationary->quantity_issued)}}">{{ Ucfirst($stationary->item)}}</option>
										@endforeach
										@endif
									</select>
								</td>
								<td>
									<input type="number" name="quantity_issued[]" id="quantity_issued_1" class="form-control text-bold ml-1" required />
								</td>
								<td>
									<input type="number" name="amount[]" id="amount_1" class="form-control ml-1"  required readonly=""/>
									<!--<input type="number" name="quantity[]" id="quantity_1" class="form-control ml-1" onchange="return onchangeValidate (this)" required/>-->
								</td>
							
								<td> <input type="button" id="addrow" value="Add Row" class="btn btn-info ml-2"/> </td>
							</tr>
						</tbody>
					</table>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Quantity(in kg/no.)</label>
								<input  type="text" class="form-control" readonly/>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label>Total Amount</label>
								<input  type="text" class="form-control" readonly/>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>


	</div>
	<!-- /.card-body -->
	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</section>

<!-- Main content -->





