@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            <a href="{{ asset('/parliament') }}" class="dropdown-toggle">
                Parliament List
            </a> -> ParliamentSpeaker
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							ParliamentSpeaker Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
                                        <button href="#addParliamentSpeakerModal" class="btn btn-primary" data-toggle="modal"><i class="fa fa-plus-circle"></i> <span>  Add ParliamentSpeaker</span></button>
                                        <button class="btn btn-danger deleteMultiParliamentSpeakerModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete ParliamentSpeaker</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="parliamentSpeaker_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#parliamentSpeaker_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            name
                                        </th>
                                        <th>
                                            early life
                                        </th>
                                        <th>
                                            education
                                        </th>
                                        <th>
                                            career
                                        </th>
                                        <th>
                                            opposition to president
                                        </th>
                                        <th>
                                            presidential campaign
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
                                    @foreach($data ?? '' as $parliamentSpeaker)
                                    <tr class="odd gradeX getRedirectKey">
                                        <td>
                                            <input type="checkbox" class="form-control checkboxes" data-id="{{ $parliamentSpeaker->id }}"/>
                                        </td>
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td id="election">
                                            {{ $parliamentSpeaker->name }}
                                        </td>
                                        <td>
                                            {{ $parliamentSpeaker->early_life }}
                                        </td>
                                        <td>
                                            {{ $parliamentSpeaker->education }}
                                        </td>
                                        <td>
                                            {{ $parliamentSpeaker->career }}
                                        </td>
                                        <td>
                                            {{ $parliamentSpeaker->opposition_to_president }}
                                        </td>
                                        <td>
                                            {{ $parliamentSpeaker->presidential_campaign }}
                                        </td>
                                        <td>
                                            <img src="{{ $parliamentSpeaker->image }}" width="60" height="60">
                                        </td>
                                        <td>
                                            {{ $parliamentSpeaker->mobile }}
                                        </td>
                                        <td>
                                            {{ $parliamentSpeaker->email }}
                                        </td>
                                        <td>
                                            {{ $parliamentSpeaker->description }}
                                        </td>
                                        <td>
                                            <a class="previewParliamentSpeakerModal" data-name="{{ $parliamentSpeaker->name }}" data-earlylife="{{ $parliamentSpeaker->early_life }}" data-education="{{ $parliamentSpeaker->education }}" data-career="{{ $parliamentSpeaker->career }}" data-oppositiontopresident="{{ $parliamentSpeaker->opposition_to_president }}" data-presidentialcampaign="{{ $parliamentSpeaker->presidential_campaign }}" data-image="{{ $parliamentSpeaker->image }}" data-mobile="{{ $parliamentSpeaker->mobile }}" data-email="{{ $parliamentSpeaker->email }}" data-description="{{ $parliamentSpeaker->description }}" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                                            <a class="editParliamentSpeakerModal" data-id="{{ $parliamentSpeaker->id }}" data-name="{{ $parliamentSpeaker->name }}" data-earlylife="{{ $parliamentSpeaker->early_life }}" data-education="{{ $parliamentSpeaker->education }}" data-career="{{ $parliamentSpeaker->career }}" data-oppositiontopresident="{{ $parliamentSpeaker->opposition_to_president }}" data-presidentialcampaign="{{ $parliamentSpeaker->presidential_campaign }}" data-image="{{ $parliamentSpeaker->image }}" data-mobile="{{ $parliamentSpeaker->mobile }}" data-email="{{ $parliamentSpeaker->email }}" data-description="{{ $parliamentSpeaker->description }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deleteParliamentSpeakerModal" data-id="{{ $parliamentSpeaker->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
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

<div id="addParliamentSpeakerModal" class="modal fade" tabindex="-1" data-width="520">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Add New ParliamentSpeaker</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/createParliamentSpeaker') }}" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Early Life:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="early_life" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Education:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="education" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Career:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="career" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Opposition To President:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="opposition_to_president" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Presidential Campaign:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="presidential_campaign" required>
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

<div id="previewParliamentSpeakerModal" class="modal fade" tabindex="-1" data-width="600">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Preview The ParliamentSpeaker</h4>
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
					<label class="label_des col-sm-12" for="title">Early Life:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_early_life" required readonly>
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
					<label class="label_des col-sm-12" for="title">Career:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_career" required readonly>
                </div>
            </div>
            <div class="form-group">
				<div class="col-sm-4">
					<label class="label_des col-sm-12" for="title">Opposition To President:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_opposition_to_president" required readonly>
                </div>
            </div>
            <div class="form-group">
				<div class="col-sm-4">
					<label class="label_des col-sm-12" for="title">Presidential Campaign:</label>
				</div>
				<div class="col-sm-8">
                    <input type="text" class="form-control" id="prev_presidential_campaign" required readonly>
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

<div id="editParliamentSpeakerModal" class="modal fade" tabindex="-1" data-width="520">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Edit The ParliamentSpeaker</h4>
    </div>
    <div class="modal-body">
		<form class="form-horizontal" role="form" method="post" action="{{ asset('/updateParliamentSpeaker') }}" enctype="multipart/form-data">
			@csrf
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="edit_name">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Early Life:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="early_life" id="edit_early_life">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Education:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="education" id="edit_education">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Career:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="career" id="edit_career">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Opposition To President:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="opposition_to_president" id="edit_opposition_to_president">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Presidential Campaign:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="presidential_campaign" id="edit_presidential_campaign">
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

<div id="deleteParliamentSpeakerModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Delete The ParliamentSpeaker</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this ParliamentSpeaker?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer">
		<form class="form-horizontal" role="form" method="post" action="{{ asset('/deleteParliamentSpeaker') }}">
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

<div id="deleteMultiParliamentSpeakerModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete ParliamentSpeaker</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these ParliamentSpeaker?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer"> 
    <form class="form-horizontal" role="form" method="post" action="{{ asset('/multiDeleteParliamentSpeaker') }}">
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
        <p>Please select ParliamentSpeaker.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
        </button>
    </div>
</div>
@endsection
