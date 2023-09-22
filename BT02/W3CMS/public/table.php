<div class="container-xl" style="margin-left: 55px;">
	<div class="table-responsive">
		<div class="table-wrapper" style="max-width: 1000px;"> <!-- Đặt kích thước tối đa cho table-wrapper -->
			<div class="table-title">
				<div class="row d-flex justify-content-between">
					<div class="col-sm-6">
						<h2><b style="color:#FF6A59">User</b></h2>
					</div>
					<div class="col-sm-10">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span>Add User</span><i class="fa-solid fa-plus"></i></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: none; color: #FF6A59; border: 1px solid #FF6A59;">
							<span>Delete</span></a>
						<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title text-black" id="staticBackdropLabel">Modal title</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body text-black">
										Are you sure?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Understood</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover" style="max-width: 100%;"> <!-- Đặt kích thước tối đa cho bảng -->
				<thead style="font-size: 13px;">
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Groups</th>
						<th>Mobile</th>
						<th>Date of Birth</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class="body" style="font-size: 13px">
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td><strong>thomashardy@mail.com</strong></td>
						<td>Male</td>
						<td>
							<span class="label label-primary">Manager</span>
						</td>
						<td>1715552222</td>
						<td>220-02-1998</td>
						<td><i class="fa fa-circle text-success me-1"></i></td>
						<td class="icon d-flex gap-1" style="border-radius:0%">
							<a href="#editEmployeeModal" class="shield" data-toggle="modal"><i class="fa-solid fa-shield-halved" style="  font-size: 15px;color:#fff"></i></a>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fa-solid fa-pen" style="  font-size: 15px;color:#fff"></i>
								<a href="#editEmployeeModal" class="delete" data-toggle="modal"><i class="fa-solid fa-trash" style="  font-size: 15px;color:#fff"></i>
								</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td><strong>thomashardy@mail.com</strong></td>
						<td>Male</td>
						<td>
							<span class="label label-primary">Manager</span>
						</td>
						<td>1715552222</td>
						<td>220-02-1998</td>
						<td><i class="fa fa-circle text-success me-1"></i></td>
						<td class="icon d-flex gap-1" style="border-radius:0%">
							<a href="#editEmployeeModal" class="shield" data-toggle="modal"><i class="fa-solid fa-shield-halved" style="  font-size: 15px;color:#fff"></i></a>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fa-solid fa-pen" style="  font-size: 15px;color:#fff"></i>
								<a href="#editEmployeeModal" class="delete" data-toggle="modal"><i class="fa-solid fa-trash" style="  font-size: 15px;color:#fff"></i>
								</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td><strong>thomashardy@mail.com</strong></td>
						<td>Male</td>
						<td>
							<span class="label label-primary">Manager</span>
						</td>
						<td>1715552222</td>
						<td>220-02-1998</td>
						<td><i class="fa fa-circle text-success me-1"></i></td>
						<td class="icon d-flex gap-1" style="border-radius:0%">
							<a href="#editEmployeeModal" class="shield" data-toggle="modal"><i class="fa-solid fa-shield-halved" style="  font-size: 15px;color:#fff"></i></a>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fa-solid fa-pen" style="  font-size: 15px;color:#fff"></i>
								<a href="#editEmployeeModal" class="delete" data-toggle="modal"><i class="fa-solid fa-trash" style="  font-size: 15px;color:#fff"></i>
								</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td><strong>thomashardy@mail.com</strong></td>
						<td>Male</td>
						<td>
							<span class="label label-primary">Manager</span>
						</td>
						<td>1715552222</td>
						<td>220-02-1998</td>
						<td><i class="fa fa-circle text-success me-1"></i></td>
						<td class="icon d-flex gap-1" style="border-radius:0%">
							<a href="#editEmployeeModal" class="shield" data-toggle="modal"><i class="fa-solid fa-shield-halved" style="  font-size: 15px;color:#fff"></i></a>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fa-solid fa-pen" style="  font-size: 15px;color:#fff"></i>
								<a href="#editEmployeeModal" class="delete" data-toggle="modal"><i class="fa-solid fa-trash" style="  font-size: 15px;color:#fff"></i>
								</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td><strong>thomashardy@mail.com</strong></td>
						<td>Male</td>
						<td>
							<span class="label label-primary">Manager</span>
						</td>
						<td>1715552222</td>
						<td>220-02-1998</td>
						<td><i class="fa fa-circle text-success me-1"></i></td>
						<td class="icon d-flex gap-1" style="border-radius:0%">
							<a href="#editEmployeeModal" class="shield" data-toggle="modal"><i class="fa-solid fa-shield-halved" style="  font-size: 15px;color:#fff"></i></a>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fa-solid fa-pen" style="  font-size: 15px;color:#fff"></i>
								<a href="#editEmployeeModal" class="delete" data-toggle="modal"><i class="fa-solid fa-trash" style="  font-size: 15px;color:#fff"></i>
								</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td><strong>thomashardy@mail.com</strong></td>
						<td>Male</td>
						<td>
							<span class="label label-primary">Manager</span>
						</td>
						<td>1715552222</td>
						<td>220-02-1998</td>
						<td><i class="fa fa-circle text-success me-1"></i></td>
						<td class="icon d-flex gap-1" style="border-radius:0%">
							<a href="#editEmployeeModal" class="shield" data-toggle="modal"><i class="fa-solid fa-shield-halved" style="  font-size: 15px;color:#fff"></i></a>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fa-solid fa-pen" style="  font-size: 15px;color:#fff"></i>
								<a href="#editEmployeeModal" class="delete" data-toggle="modal"><i class="fa-solid fa-trash" style="  font-size: 15px;color:#fff"></i>
								</a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Page <b>1</b> of <b>5.</b></div>
				<ul class="pagination">
					<li class="page-item disabled"><i class="fa-solid fa-chevron-left"></i></li>
					<li class="page-item active"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><i class="fa-solid fa-chevron-right"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>