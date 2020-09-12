@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            <a class="dropdown-toggle">
                Online Forum
            </a> -> Thread
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							Thread Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
										<button href="#addThreadModal" class="btn btn-primary addThreadModal" data-toggle="modal"><i class="fa fa-plus-circle"></i> <span>  Add Thread</span></button>
										<button class="btn btn-danger deleteSubscriptionsModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete Thread</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="forum_thread_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#forum_thread_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Contents
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Subcategory
                                        </th>
                                        <th>
                                            Type
                                        </th>
                                        <th>
                                            Created User
                                        </th>
                                        <th>
                                            Created Date
                                        </th>
                                        <th>
                                            Last Reply Date
                                        </th>
                                        <th>
                                            View
                                        </th>
                                        <th>
                                            Reply
                                        </th>
                                        <th>
                                            Complain
                                        </th>
                                        <th>
                                            Complain User
                                        </th>
                                        <th>
                                            Up Vote
                                        </th>
                                        <th>
                                            Down Vote
                                        </th>
                                        <th>
                                            Active Status
                                        </th>
                                        <th style="width: 6%;">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count((array)$data ?? '') == 0)
                                    @else
                                    @foreach($data ?? '' as $thread_list)
                                    <tr class="odd gradeX getRedirectKey">
                                        <td>
                                            <input type="checkbox" class="form-control checkboxes" data-id="{{ $thread_list->id }}"/>
                                        </td>
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td>
                                            {{ $thread_list->title }}
                                        </td>
                                        <td>
                                            @if (strlen($thread_list->contents) > 50)
                                                {{ substr($thread_list->contents, 0, 50) }}...
                                            @else
                                                {{ $thread_list->contents }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $thread_list->category }}
                                        </td>
                                        <td>
                                            {{ $thread_list->sub_category }}
                                        </td>
                                        <td>
                                            {{ $thread_list->type }}
                                        </td>
                                        <td>
                                            {{ $thread_list->username }}
                                        </td>
                                        <td>
                                            {{ $thread_list->created_date }}
                                        </td>
                                        <td>
                                            {{ $thread_list->latest_reply_date }}
                                        </td>
                                        <td>
                                            {{ $thread_list->view }}
                                        </td>
                                        <td>
                                            {{ $thread_list->reply }}
                                        </td>
                                        <td>
                                            {{ $thread_list->complain }}
                                        </td>
                                        <td>
                                            {{ $thread_list->complain_user }}
                                        </td>
                                        <td>
                                            {{ $thread_list->up_vote }}
                                        </td>
                                        <td>
                                            {{ $thread_list->down_vote }}
                                        </td>
                                        <td>
                                            @if ($thread_list->is_active == 0)
                                            Unactive
                                            @else
                                            Active
                                            @endif
                                        </td>
                                        <td>
                                            <a class="previewThreadModal" data-id="{{ $thread_list->id }}" data-title="{{ $thread_list->title }}" data-contents="{{ $thread_list->contents }}" data-category="{{ $thread_list->category }}" data-subcategory="{{ $thread_list->sub_category }}" data-type="{{ $thread_list->type }}" data-username="{{ $thread_list->username }}" data-createddate="{{ $thread_list->created_date }}" data-latest_replydate="{{ $thread_list->latest_reply_date }}" data-view="{{ $thread_list->view }}" data-reply="{{ $thread_list->reply }}" data-complain="{{ $thread_list->complain }}" data-complainuser="{{ $thread_list->complain_user }}" data-upvote="{{ $thread_list->up_vote }}" data-downvote="{{ $thread_list->down_vote }}" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                                            <a class="editSubscriptionModal" data-id="{{ $thread_list->id }}" data-title="{{ $thread_list->title }}" data-contents="{{ $thread_list->contents }}" data-category="{{ $thread_list->category }}" data-subcategory="{{ $thread_list->sub_category }}" data-type="{{ $thread_list->type }}" data-username="{{ $thread_list->username }}" data-createddate="{{ $thread_list->created_date }}" data-latest_replydate="{{ $thread_list->latest_reply_date }}" data-view="{{ $thread_list->view }}" data-reply="{{ $thread_list->reply }}" data-complain="{{ $thread_list->complain }}" data-complainuser="{{ $thread_list->complain_user }}" data-upvote="{{ $thread_list->up_vote }}" data-downvote="{{ $thread_list->down_vote }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deleteSubscriptionModal" data-id="{{ $thread_list->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
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

<div id="addThreadModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Add New Thread</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/forum/createThread') }}" enctype="multipart/form-data">
        @csrf
            <div class="for-group">
                <p class="mini-title">Primary Details</p>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Title:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="title" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Contents:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="contents" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Category:</label>
                <div class="col-sm-5">
                    <select class="form-control" id="add_category" name="category" required>
                        <option></option>
                        @if(count((array)$categories ?? '') == 0)
                        @else
                        @foreach($categories ?? '' as $category)
                        @if ($category->parent_id == 0)
                            <option value="{{$category->id}}">{{$category->title}}</opiton>
                        @endif
                        @endforeach
                        @endif
					</select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Subcategory:</label>
                <div class="col-sm-5">
                    <select class="form-control" name="subcategory" id="add_subcategory">
					</select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Type:</label>
                <div class="col-sm-5">
                    <select class="form-control" id="add_type" name="type" required>
                        @if(count((array)$types ?? '') == 0)
                        @else
                        @foreach($types ?? '' as $type)
                            <option value="{{$type->id}}">{{$type->title}}</opiton>
                        @endforeach
                        @endif
					</select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-6" for="title">Created User:</label>
                <div class="col-sm-5">
                    <select class="form-control" id="add_created_user" name="created_user" required>
                        <option></option>
                        @if(count((array)$users ?? '') == 0)
                        @else
                        @foreach($users ?? '' as $user)
                            <option value="{{$user->id}}">{{$user->username}}</opiton>
                        @endforeach
                        @endif
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

<div id="previewThreadModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Preview The Thread</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal">
            <div class="for-group">
                <p class="mini-title">Primary Details</p>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Title:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewTitle" name="title" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Contents:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="6" id="previewContents" name="contents" readonly autofocus></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Category:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewCategory" readonly autofocus>
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
