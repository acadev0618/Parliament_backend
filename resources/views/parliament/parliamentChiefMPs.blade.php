@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            <a href="{{ asset('/parliament') }}" class="dropdown-toggle">
                Parliament List
            </a> -> ParliamentChiefMPs
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							ParliamentChiefMPs Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
                                        <button href="#addParliamentChiefModal" class="btn btn-primary" data-toggle="modal"><i class="fa fa-plus-circle"></i> <span>  Add ParliamentChiefMPs</span></button>
                                        <button class="btn btn-danger deleteMultiParliamentChiefModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete ParliamentChiefMPs</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="parliamentChiefMPs_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#parliamentChiefMPs_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            name
                                        </th>
                                        <th>
                                            district
                                        </th>
                                        <th>
                                            directory
                                        </th>
                                        <th style="width: 6%;">
                                            avatar
                                        </th>
                                        <th>
                                            mobile
                                        </th>
                                        <th>
                                            email
                                        </th>
                                        <th>
                                            description
                                        </th>
                                        <th style="width: 6%;">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count((array)$data ?? '') == 0)
                                    @else
                                    @foreach($data ?? '' as $parliamentMembers_list)
                                    <tr class="odd gradeX getRedirectKey">
                                        <td>
                                            <input type="checkbox" class="form-control checkboxes" data-id="{{ $parliamentMembers_list->id }}"/>
                                        </td>
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td id="election">
                                            {{ $parliamentMembers_list->name }}
                                        </td>
                                        <td>
                                            {{ $parliamentMembers_list->district }}
                                        </td>
                                        <td>
                                            {{ $parliamentMembers_list->directory }}
                                        </td>
                                        <td>
                                            <img src="{{ $parliamentMembers_list->image }}" width="60" height="60">
                                        </td>
                                        <td>
                                            {{ $parliamentMembers_list->mobile }}
                                        </td>
                                        <td>
                                            {{ $parliamentMembers_list->email }}
                                        </td>
                                        <td>
                                            {{ $parliamentMembers_list->description }}
                                        </td>
                                        <td>
                                            <a class="previewParliamentChiefModal" data-name="{{ $parliamentMembers_list->name }}" data-district="{{ $parliamentMembers_list->district }}" data-directory="{{ $parliamentMembers_list->directory }}" data-image="{{ $parliamentMembers_list->image }}" data-mobile="{{ $parliamentMembers_list->mobile }}" data-email="{{ $parliamentMembers_list->email }}" data-description="{{ $parliamentMembers_list->description }}" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                                            <a class="editParliamentChiefModal" data-id="{{ $parliamentMembers_list->id }}" data-name="{{ $parliamentMembers_list->name }}" data-district="{{ $parliamentMembers_list->district }}" data-directory="{{ $parliamentMembers_list->directory }}" data-image="{{ $parliamentMembers_list->image }}" data-mobile="{{ $parliamentMembers_list->mobile }}" data-email="{{ $parliamentMembers_list->email }}" data-description="{{ $parliamentMembers_list->description }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deleteParliamentChiefModal" data-id="{{ $parliamentMembers_list->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="addParliamentChiefModal" class="modal fade" tabindex="-1" data-width="520">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Add New ParliamentChief Member</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/createParliamentChiefMPs') }}" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">District:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="district" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Directory:</label>
                <div class="col-sm-8">
                    <select class="form-control" name="directory">
                        <option value="South">South</opiton>
                        <option value="North">North</opiton>
                        <option value="Eastern">Eastern</opiton>
                        <option value="West">West</opiton>
                        <option value="NorthWest">NorthWest</opiton>
					</select>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Photo:</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Mobile:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="mobile">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Email:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Description:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="description">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success addInvoice">
                    <span id="" class='glyphicon glyphicon-check'></span> Add
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </form>
    </div>
</div>

<div id="previewParliamentChiefModal" class="modal fade" tabindex="-1" data-width="600">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Preview The ParliamentChief</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-4">
					<label class="label_des col-sm-12" for="title">Name:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_name" required readonly>
                </div>
            </div>
            <div class="form-group">
				<div class="col-sm-4">
					<label class="label_des col-sm-12" for="title">District:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_district" required readonly>
                </div>
            </div>
            <div class="form-group">
				<div class="col-sm-6">
					<label class="label_des col-sm-8" for="title">Photo:</label>
					<div class="col-sm-4">
						<img id="prev_photo" style="width: 60px;">
					</div>
				</div>
				<div class="col-sm-6">
					<label class="label_des col-sm-3" for="title">Directory:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="prev_directory" readonly>
					</div>
				</div>
            </div>
            <div class="form-group">
				<div class="col-sm-6">
					<label class="label_des col-sm-3" for="title">Mobile:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="prev_mobile" readonly>
					</div>
                </div>
                <div class="col-sm-6">
					<label class="label_des col-sm-3" for="title">Email:</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" id="prev_email" readonly>
					</div>
				</div>
            </div>
            <div class="form-group">
				<div class="col-sm-4">
					<label class="label_des col-sm-12" for="title">Description:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_description" required readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </form>
    </div>
</div>

<div id="editParliamentChiefModal" class="modal fade" tabindex="-1" data-width="520">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Edit The ParliamentChief Member</h4>
    </div>
    <div class="modal-body">
		<form class="form-horizontal" role="form" method="post" action="{{ asset('/updateParliamentChiefMPs') }}" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="edit_name">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">District:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="district" id="edit_district">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Directory:</label>
                <div class="col-sm-8">
                    <select class="form-control" name="directory" id="edit_directory">
                        <option value="South">South</opiton>
                        <option value="North">North</opiton>
                        <option value="Eastern">Eastern</opiton>
                        <option value="West">West</opiton>
                        <option value="NorthWest">NorthWest</opiton>
					</select>
                </div>
            </div>
            <div class="form-group">
               <label class="label_des col-sm-4" for="title">Photo:</label>
               <div class="col-sm-8">
                  <input type="file" class="form-control" name="photo" id="edit_photo" value="sdfsfd.txt" accept="image/png, image/jpeg, image/jpg">
               </div>
            </div>
            <div class="form-group">
               <label class="label_des col-sm-4" for="title">Photo Delete:</label>
               <div class="col-sm-8" style="margin-top: 6px;">
                  <input type="checkbox" class="form-control del_photo" name="del_photo" id="del_photo"></input>
               </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Mobile:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="mobile" id="edit_mobile">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Email:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" id="edit_email">
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" name="id" id="id" hidden/>
				<input type="text" name="edit_del_photo" id="edit_del_photo" value="false" hidden/>
                <button type="submit" class="btn btn-success addInvoice">
                    <span id="" class='glyphicon glyphicon-check'></span> Save
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </form>
    </div>
</div>

<div id="deleteParliamentChiefModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Delete The ParliamentChief Member</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this ParliamentChief Member?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer">
		<form class="form-horizontal" role="form" method="post" action="{{ asset('/deleteParliamentChiefMPs') }}">
        @csrf 
			<input type="text" class="id" name="id" hidden />

			<button type="submit" class="btn btn-danger delete">
				<i class="fa fa-trash-o"></i> Delete
			</button>
			<button type="button" class="btn btn-warning" data-dismiss="modal">
				<span class='glyphicon glyphicon-remove'></span> Close
			</button>
		</form>
    </div>
</div>

<div id="deleteMultiParliamentChiefModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete ParliamentChief Members</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these ParliamentChief Members?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer"> 
    <form class="form-horizontal" role="form" method="post" action="{{ asset('/multiDeleteParliamentChiefMPs') }}">
		@csrf            
			<input type="text" class="ids" name="ids" hidden />
            <button type="submit" class="btn btn-danger deleteballots">
                <i class="fa fa-trash-o"></i> Delete
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class='glyphicon glyphicon-remove'></span> Close
            </button>
        </form>
    </div>
</div>

<div id="confirmModal" class="modal fade" tabindex="-1" data-width="320">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Confirm</h4>
    </div>
    <div class="modal-body">					
        <p>Please select Parilament Members.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
        </button>
    </div>
</div>
@endsection
