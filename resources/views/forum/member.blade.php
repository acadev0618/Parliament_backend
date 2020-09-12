@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            <a class="dropdown-toggle">
                Online Forum
            </a> -> Members
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							Members Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
										<button class="btn btn-primary addMemberModal" data-toggle="modal"><i class="fa fa-plus-circle"></i> <span>  Add Member</span></button>
										<button class="btn btn-danger deleteSubscriptionsModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete Members</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="forum_members_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#forum_members_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            First Name
                                        </th>
                                        <th>
                                            Last Name
                                        </th>
                                        <th>
                                            User Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Password
                                        </th>
                                        <th>
                                            Created Date
                                        </th>
                                        <th>
                                            Last visit date
                                        </th>
                                        <th>
                                            Login Status
                                        </th>
                                        <th>
                                            Photo
                                        </th>
                                        <th>
                                            Mobile
                                        </th>
                                        <th>
                                            Birthday
                                        </th>
                                        <th>
                                            Gender
                                        </th>
                                        <th>
                                            Subscription
                                        </th>
                                        <th>
                                            Accept Messages From Members
                                        </th>
                                        <th>
                                            Allow Status
                                        </th>
                                        <th>
                                            Verification Status
                                        </th>
                                        <th style="width: 6%;">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count((array)$data ?? '') == 0)
                                    @else
                                    @foreach($data ?? '' as $member_list)
                                    <tr class="odd gradeX getRedirectKey">
                                        <td>
                                            <input type="checkbox" class="form-control checkboxes" data-id="{{ $member_list->id }}"/>
                                        </td>
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td>
                                            {{ $member_list->first_name }}
                                        </td>
                                        <td>
                                            {{ $member_list->last_name }}
                                        </td>
                                        <td>
                                            {{ $member_list->username }}
                                        </td>
                                        <td>
                                            {{ $member_list->email }}
                                        </td>
                                        <td>
                                            {{ $member_list->password }}
                                        </td>
                                        <td>
                                            {{ $member_list->created_date }}
                                        </td>
                                        <td>
                                            {{ $member_list->last_visit_date }}
                                        </td>
                                        <td>
                                            @if ($member_list->is_login == 0)
                                                Offline
                                            @else
                                                Online
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ $member_list->photo }}" width="40" height="40">
                                        </td>
                                        <td>
                                            {{ $member_list->phone }}
                                        </td>
                                        <td>
                                            {{ $member_list->birthday }}
                                        </td>
                                        <td>
                                            @if ($member_list->gender == 0)
                                                Male
                                            @else
                                                Female
                                            @endif
                                        </td>
                                        <td>
                                            {{ $member_list->title }}
                                        </td>
                                        <td>
                                            @if ($member_list->msg_accept == 0)
                                                No
                                            @else
                                                Yes
                                            @endif
                                        </td>
                                        <td>
                                            @if ($member_list->key == 0)
                                                Member
                                            @endif
                                            @if ($member_list->key == 1)
                                                Admin
                                            @endif
                                            @if ($member_list->key == 2)
                                                Moderator
                                            @endif
                                        </td>
                                        <td>
                                            @if ($member_list->verification == 0)
                                                No
                                            @else
                                                Yes
                                            @endif
                                        </td>
                                        <td>
                                            <a class="previewAboutUsModal" data-id="{{ $member_list->id }}" data-firstname="{{ $member_list->first_name }}" data-lastname="{{ $member_list->last_name }}" data-email="{{ $member_list->email }}" data-password="{{ $member_list->password }}" data-createddate="{{ $member_list->created_date }}" data-lastvisitdate="{{ $member_list->last_visit_date }}" data-islogin="{{ $member_list->is_login }}" data-photo="{{ $member_list->photo }}" data-phone="{{ $member_list->phone }}" data-birthday="{{ $member_list->birthday }}" data-gender="{{ $member_list->gender }}" data-subscription="{{ $member_list->subscription }}" data-msgaccept="{{ $member_list->msg_accept }}" data-key="{{ $member_list->key }}" data-verification="{{ $member_list->verification }}" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                                            <a class="editSubscriptionModal" data-id="{{ $member_list->id }}" data-firstname="{{ $member_list->first_name }}" data-lastname="{{ $member_list->last_name }}" data-email="{{ $member_list->email }}" data-password="{{ $member_list->password }}" data-createddate="{{ $member_list->created_date }}" data-lastvisitdate="{{ $member_list->last_visit_date }}" data-islogin="{{ $member_list->is_login }}" data-photo="{{ $member_list->photo }}" data-phone="{{ $member_list->phone }}" data-birthday="{{ $member_list->birthday }}" data-gender="{{ $member_list->gender }}" data-subscription="{{ $member_list->subscription }}" data-msgaccept="{{ $member_list->msg_accept }}" data-key="{{ $member_list->key }}" data-verification="{{ $member_list->verification }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deleteSubscriptionModal" data-id="{{ $member_list->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
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

<div id="addMemberModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Add New Member</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/forum/createMembers') }}" enctype="multipart/form-data">
        @csrf
            <div class="for-group">
                <p class="mini-title">Primary Details</p>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">First Name:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="first_name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Last Name:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="last_name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">User Name:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="username" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Email:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Password:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Photo:</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" name="photo" accept="image/png, image/jpeg, image/jpg">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Phone:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Birthday:</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="birthday">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Gender:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="gender">
                        <option value="0">Male</opiton>
                        <option value="1">Female</opiton>
					</select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Subscription:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="subscription" id="add_subscription">
					</select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Accept Messages from members:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="msg_accept">
                        <option value="0">No</opiton>
                        <option value="1">Yes</opiton>
					</select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Allow Status:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="key">
                        <option value="0">Member</opiton>
                        <option value="1">Admin</opiton>
                        <option value="2">Moderator</opiton>
					</select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Verification Status:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="verification">
                        <option value="0">No</opiton>
                        <option value="1">Yes</opiton>
					</select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="datetime" id="current_date" name="created_date" hidden>
                <button type="submit" class="btn btn-success">
                    <span id="" class='glyphicon glyphicon-check'></span> Add
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </form>
    </div>
</div>

<div id="deleteSubscriptionModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete The Subscription</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this Subscription?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer">
        <form class="form-horizontal" role="from" method="post" action="{{ asset('/forum/deleteSubscription') }}">
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

<div id="deleteSubscriptionsModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete Subscription Selected</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these Subscription Selected?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer"> 
    <form class="form-horizontal" role="form" method="post" action="{{ asset('/forum/multiDeleteSubscription') }}">
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

<div id="editSubscriptionModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Edit The Subscription</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/forum/updateSubscription') }}">
        @csrf
            <div class="for-group">
                <p class="mini-title">Primary Details</p>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Title:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editTitle" name="title" required>
                </div>
            </div>

            <div class="modal-footer">
                <input type="text" id="edit_id" name="id" hidden />
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

<div id="confirmModal" class="modal fade" tabindex="-1" data-width="320">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Confirm</h4>
    </div>
    <div class="modal-body">					
        <p>Please select Subscription.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
        </button>
    </div>
</div>
@endsection
