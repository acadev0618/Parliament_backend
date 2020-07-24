@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            <a href="{{ asset('/parliament') }}" class="dropdown-toggle">
                Parliament List
            </a> -> ParliamentMembers
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							ParliamentMembers Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
                                        <button href="#addParliamentModal" class="btn btn-primary" data-toggle="modal"><i class="fa fa-plus-circle"></i> <span>  Add ParliamentMember</span></button>
                                        <button class="btn btn-danger deleteParliamentMembersModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete ParliamentMember</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="parliamentMembers_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#parliamentMembers_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            name
                                        </th>
                                        <th>
                                            constituency
                                        </th>
                                        <th>
                                            type
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
                                            {{ $parliamentMembers_list->constituency }}
                                        </td>
                                        <td>
                                            {{ $parliamentMembers_list->type }}
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
                                            @if (strlen($parliamentMembers_list->description) > 60)
                                                {{ substr($parliamentMembers_list->description, 0, 60) }}...
                                            @else
                                                {{ $parliamentMembers_list->description }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="previewParliamentModal" data-name="{{ $parliamentMembers_list->name }}" data-constituency="{{ $parliamentMembers_list->constituency }}" data-type="{{ $parliamentMembers_list->type }}" data-image="{{ $parliamentMembers_list->image }}" data-mobile="{{ $parliamentMembers_list->mobile }}" data-email="{{ $parliamentMembers_list->email }}" data-description="{{ $parliamentMembers_list->description }}" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                                            <a class="editParliamentMemberModal" data-id="{{ $parliamentMembers_list->id }}" data-name="{{ $parliamentMembers_list->name }}" data-constituency="{{ $parliamentMembers_list->constituency }}" data-type="{{ $parliamentMembers_list->type }}" data-image="{{ $parliamentMembers_list->image }}" data-mobile="{{ $parliamentMembers_list->mobile }}" data-email="{{ $parliamentMembers_list->email }}" data-description="{{ $parliamentMembers_list->description }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deleteParliamentMemberModal" data-id="{{ $parliamentMembers_list->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
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

<div id="addParliamentModal" class="modal fade" tabindex="-1" data-width="520">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Add New Parliament Member</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/createParliamentMember') }}" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Constituency:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="constituency" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Type:</label>
                <div class="col-sm-8">
                    <select class="form-control" name="type">
                        <option value="INDEPENDENT">INDEPENDENT</opiton>
                        <option value="SLPP">SLPP</opiton>
                        <option value="C4C">C4C</opiton>
                        <option value="APC">APC</opiton>
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
                    {{-- <input type="text" class="form-control" name="description"> --}}
                    <textarea class="form-control" name="description"></textarea>
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

<div id="previewParliamentModal" class="modal fade" tabindex="-1" data-width="600">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Preview The Parliament</h4>
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
					<label class="label_des col-sm-12" for="title">Constituency:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_constituency" required readonly>
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
					<label class="label_des col-sm-3" for="title">Type:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="prev_type" readonly>
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
                    {{-- <input type="text" class="form-control" id="prev_description" required readonly> --}}
                    <textarea class="form-control" rows="10" id="prev_description" required readonly></textarea>
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

<div id="editParliamentMemberModal" class="modal fade" tabindex="-1" data-width="520">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Edit The Parliament Member</h4>
    </div>
    <div class="modal-body">
		<form class="form-horizontal" role="form" method="post" action="{{ asset('/updateParliamentMember') }}" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="edit_name">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Constituency:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="constituency" id="edit_constituency">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Type:</label>
                <div class="col-sm-8">
                    <select class="form-control" name="type" id="edit_type">
                        <option value="INDEPENDENT">INDEPENDENT</opiton>
                        <option value="SLPP">SLPP</opiton>
                        <option value="C4C">C4C</opiton>
                        <option value="APC">APC</opiton>
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
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Description:</label>
                <div class="col-sm-8">
                    {{-- <input type="text" class="form-control" name="description" id="edit_description"> --}}
                    <textarea class="form-control" rows="10" name="description" id="edit_description"></textarea>
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

<div id="deleteParliamentMemberModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Delete The Parliament Member</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this Parliament Member?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer">
		<form class="form-horizontal" role="form" method="post" action="{{ asset('/deleteParliamentMember') }}">
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

<div id="deleteParliamentMembersModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete Parliament Members</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these Parliament Members?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer"> 
    <form class="form-horizontal" role="form" method="post" action="{{ asset('/multiDeleteParliamentMembers') }}">
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
