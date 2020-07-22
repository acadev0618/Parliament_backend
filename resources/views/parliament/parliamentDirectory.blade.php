@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            <a href="{{ asset('/parliament') }}" class="dropdown-toggle">
                Parliament List
            </a> -> ParliamentDirectory
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							ParliamentDirectory Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
                                        <button href="#addParliamentDirectoryModal" class="btn btn-primary" data-toggle="modal"><i class="fa fa-plus-circle"></i> <span>  Add ParliamentDirectory</span></button>
                                        <button class="btn btn-danger deleteMultiParliamentDirectoryModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete ParliamentDirectory</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="parliamentDirectory_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#parliamentDirectory_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            name
                                        </th>
                                        <th>
                                            education
                                        </th>
                                        <th>
                                            experience
                                        </th>
                                        <th>
                                            skills and trainings
                                        </th>
                                        <th>
                                            activities and community service
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
                                    @foreach($data ?? '' as $parliamentDirectory)
                                    <tr class="odd gradeX getRedirectKey">
                                        <td>
                                            <input type="checkbox" class="form-control checkboxes" data-id="{{ $parliamentDirectory->id }}"/>
                                        </td>
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td id="election">
                                            {{ $parliamentDirectory->name }}
                                        </td>
                                        <td>
                                            {{ $parliamentDirectory->education }}
                                        </td>
                                        <td>
                                            {{ $parliamentDirectory->experience }}
                                        </td>
                                        <td>
                                            {{ $parliamentDirectory->skills_trainings }}
                                        </td>
                                        <td>
                                            {{ $parliamentDirectory->activities_community_service }}
                                        </td>
                                        <td>
                                            <img src="{{ $parliamentDirectory->image }}" width="60" height="60">
                                        </td>
                                        <td>
                                            {{ $parliamentDirectory->mobile }}
                                        </td>
                                        <td>
                                            {{ $parliamentDirectory->email }}
                                        </td>
                                        <td>
                                            {{ $parliamentDirectory->description }}
                                        </td>
                                        <td>
                                            <a class="previewParliamentDirectoryModal" data-name="{{ $parliamentDirectory->name }}" data-education="{{ $parliamentDirectory->education }}" data-experience="{{ $parliamentDirectory->experience }}" data-skillstrainings="{{ $parliamentDirectory->skills_trainings }}" data-activitiescommunityservice="{{ $parliamentDirectory->activities_community_service }}" data-image="{{ $parliamentDirectory->image }}" data-mobile="{{ $parliamentDirectory->mobile }}" data-email="{{ $parliamentDirectory->email }}" data-description="{{ $parliamentDirectory->description }}" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                                            <a class="editParliamentDirectoryModal" data-id="{{ $parliamentDirectory->id }}" data-name="{{ $parliamentDirectory->name }}" data-education="{{ $parliamentDirectory->education }}" data-experience="{{ $parliamentDirectory->experience }}" data-skillstrainings="{{ $parliamentDirectory->skills_trainings }}" data-activitiescommunityservice="{{ $parliamentDirectory->activities_community_service }}" data-image="{{ $parliamentDirectory->image }}" data-mobile="{{ $parliamentDirectory->mobile }}" data-email="{{ $parliamentDirectory->email }}" data-description="{{ $parliamentDirectory->description }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deleteParliamentDirectoryModal" data-id="{{ $parliamentDirectory->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
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

<div id="addParliamentDirectoryModal" class="modal fade" tabindex="-1" data-width="520">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Add New ParliamentDirectory</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/createParliamentDirectory') }}" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Education:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="education" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Experience:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="experience" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Skills And Trainings:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="skills_trainings" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Activities And Community Service:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="activities_community_service" required>
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

<div id="previewParliamentDirectoryModal" class="modal fade" tabindex="-1" data-width="600">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Preview The ParliamentDirectory</h4>
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
					<label class="label_des col-sm-12" for="title">Education:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_education" required readonly>
                </div>
            </div>
            <div class="form-group">
				<div class="col-sm-4">
					<label class="label_des col-sm-12" for="title">Experience:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_experience" required readonly>
                </div>
            </div>
            <div class="form-group">
				<div class="col-sm-4">
					<label class="label_des col-sm-12" for="title">Skills And Trainings:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_skills_trainings" required readonly>
                </div>
            </div>
            <div class="form-group">
				<div class="col-sm-4">
					<label class="label_des col-sm-12" for="title">Activities And Community Service:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_activities_community_service" required readonly>
                </div>
            </div>
            <div class="form-group">
				<div class="col-sm-6">
					<label class="label_des col-sm-8" for="title">Photo:</label>
					<div class="col-sm-4">
						<img id="prev_photo" style="width: 60px;">
					</div>
				</div>
				{{-- <div class="col-sm-6">
					<label class="label_des col-sm-3" for="title">Directory:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="prev_directory" readonly>
					</div>
				</div> --}}
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

<div id="editParliamentDirectoryModal" class="modal fade" tabindex="-1" data-width="520">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Edit The ParliamentDirectory</h4>
    </div>
    <div class="modal-body">
		<form class="form-horizontal" role="form" method="post" action="{{ asset('/updateParliamentDirectory') }}" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="edit_name">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Education:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="education" id="edit_education">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Experience:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="experience" id="edit_experience">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Skills And Trainings:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="skills_trainings" id="edit_skills_trainings">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Activities And Community Service:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="activities_community_service" id="edit_activities_community_service">
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

<div id="deleteParliamentDirectoryModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Delete The ParliamentDirectory</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this ParliamentDirectory?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer">
		<form class="form-horizontal" role="form" method="post" action="{{ asset('/deleteParliamentDirectory') }}">
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

<div id="deleteMultiParliamentDirectoryModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete ParliamentDirectory</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these ParliamentDirectory?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer"> 
    <form class="form-horizontal" role="form" method="post" action="{{ asset('/multiDeleteParliamentDirectory') }}">
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
        <p>Please select ParliamentClerk.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
        </button>
    </div>
</div>
@endsection
