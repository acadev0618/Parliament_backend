@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            <a href="{{ asset('/home') }}" class="dropdown-toggle">
                Get Involved
            </a> -> Visit Parliament
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							Visitor Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
										<button class="btn btn-danger deleteVisitorsModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete Visitor Contract</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="visitor_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#visitor_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            institution
                                        </th>
                                        <th>
                                            name
                                        </th>
                                        <th>
                                            visit reason
                                        </th>
                                        <th>
                                            visit date
                                        </th>
                                        <th>
                                            number of visitor
                                        </th>
                                        <th>
                                            email
                                        </th>
                                        <th>
                                            mobile
                                        </th>
                                        <th>
                                            comments
                                        </th>
                                        <th style="width: 6%;">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count((array)$data ?? '') == 0)
                                    @else
                                    @foreach($data ?? '' as $visitor_list)
                                    <tr class="odd gradeX getRedirectKey">
                                        <td>
                                            <input type="checkbox" class="form-control checkboxes" data-id="{{ $visitor_list->id }}"/>
                                        </td>
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td>
                                            {{ $visitor_list->institution }}
                                        </td>
                                        <td>
                                            {{ $visitor_list->name }}
                                        </td>
                                        <td>
                                            {{ $visitor_list->visit_reason }}
                                        </td>
                                        <td>
                                            {{ $visitor_list->visit_date }}
                                        </td>
                                        <td>
                                            {{ $visitor_list->visitor_num }}
                                        </td>
                                        <td>
                                            {{ $visitor_list->email }}
                                        </td>
                                        <td>
                                            {{ $visitor_list->mobile }}
                                        </td>
                                        <td>
                                            @if (strlen($visitor_list->comments) > 100)
                                                {{ substr($visitor_list->comments, 0, 100) }}...
                                            @else
                                                {{ $visitor_list->comments }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="previewVisitorModal" data-id="{{ $visitor_list->id }}" data-institution="{{ $visitor_list->institution }}" data-name="{{ $visitor_list->name }}" data-visitreason="{{ $visitor_list->visit_reason }}" data-visitdate="{{ $visitor_list->visit_date }}" data-visitornum="{{ $visitor_list->visitor_num }}" data-email="{{ $visitor_list->email }}" data-mobile="{{ $visitor_list->mobile }}" data-comments="{{ $visitor_list->comments }}"  data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                                            <a class="editVisitorModal" data-id="{{ $visitor_list->id }}" data-institution="{{ $visitor_list->institution }}" data-name="{{ $visitor_list->name }}" data-visitreason="{{ $visitor_list->visit_reason }}" data-visitdate="{{ $visitor_list->visit_date }}" data-visitornum="{{ $visitor_list->visitor_num }}" data-email="{{ $visitor_list->email }}" data-mobile="{{ $visitor_list->mobile }}" data-comments="{{ $visitor_list->comments }}"  data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deleteVisitorModal" data-id="{{ $visitor_list->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
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

<div id="previewVisitorModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Preview The Visitor Contract</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal">
            <div class="for-group">
                <p class="mini-title">Primary Details</p>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Institution:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewInstitution" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewName" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Visit Reason:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewVisitReason" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Visit Date:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewVisitDate" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Number of Visitor:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewVisitorNum" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Email:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewEmail" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Mobile:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewMobile" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Comments:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="8" id="previewComments" readonly autofocus></textarea>
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

<div id="deleteVisitorModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete The Visitor Contract</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this Visitor Contract?</p>
    </div>
    <div class="modal-footer">
        <form class="form-horizontal" role="from" method="post" action="{{ asset('/get-involved/deleteVisitor') }}">
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

<div id="deleteVisitorsModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete Visitor Contracts Selected</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these Visitor Contracts Selected?</p>
    </div>
    <div class="modal-footer"> 
    <form class="form-horizontal" role="form" method="post" action="{{ asset('/get-involved/multiDeleteVisitor') }}">
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

<div id="editVisitorModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Edit The Visitor Contract</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/get-involved/updateVisitor') }}">
        @csrf
            <div class="for-group">
                <p class="mini-title">Primary Details</p>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Institution:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editInstitution" name="institution" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editName" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Visit Reason:</label>
                <div class="col-sm-9">
                    <select class="form-control" name="visit_reason" id="editVisitReason">
                        <option value="Educational visit">Educational visit</opiton>
                        <option value="Other">Other</opiton>
					</select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Visit Date:</label>
                <div class="col-sm-9">
                    <input type="datetime" class="form-control" id="editVisitDate" name="visit_date" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Number of Visitor:</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="editVisitNum" name="visitor_num" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="editEmail" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Mobile:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editMobile" name="mobile" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Comments:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="10" id="editComments" name="comments" required></textarea>
                    {{-- <input type="text" class="form-control" id="editDescription" name="description" required> --}}
                </div>
            </div>

            <div class="modal-footer">
                <input type="text" id="editVisitor_id" name="id" hidden />
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
        <p>Please select visitor contract.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
        </button>
    </div>
</div>
@endsection
