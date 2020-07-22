@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            BudgetInformation
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							BudgetInformation Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
										<button href="#addBudgetInformationModal" class="btn btn-primary" data-toggle="modal"><i class="fa fa-plus-circle"></i> <span>  Add BudgetInformation</span></button>
										<button class="btn btn-danger deleteMultiBudgetInformationModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete BudgetInformation</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="budgetInformation_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#budgetInformation_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            title
                                        </th>
                                        <th>
                                            file path
                                        </th>
                                        <th style="width: 6%;">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count((array)$data ?? '') == 0)
                                    @else
                                    @foreach($data ?? '' as $gazettedActs)
                                    <tr class="odd gradeX getRedirectKey">
                                        <td>
                                            <input type="checkbox" class="form-control checkboxes" data-id="{{ $gazettedActs->id }}"/>
                                        </td>
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td id="election">
                                            {{ $gazettedActs->title }}
                                        </td>
                                        <td>
                                            {{ $gazettedActs->file_path }}
                                        </td>
                                        <td>
                                            {{-- <a class="previewAboutUsModal" data-id="{{ $gazettedActs->id }}" data-title="{{ $gazettedActs->title }}" data-file_path="{{ $gazettedActs->file_path }}" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a> --}}
                                            <a class="editBudgetInformationModal" data-id="{{ $gazettedActs->id }}" data-title="{{ $gazettedActs->title }}" data-file_path="{{ $gazettedActs->file_path }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deleteBudgetInformationModal" data-id="{{ $gazettedActs->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
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

<div id="addBudgetInformationModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Add New BudgetInformation</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/createBudgetInformation') }}" enctype="multipart/form-data">
        @csrf
            <div class="for-group">
                <p class="mini-title">Primary Details</p>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Title:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="title" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">File:</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" name="file_path" accept="application/pdf" required>
                </div>
            </div>
            <div class="modal-footer">
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

<div id="deleteBudgetInformationModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete The BudgetInformation</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this BudgetInformation?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer">
        <form class="form-horizontal" role="from" method="post" action="{{ asset('/deleteBudgetInformation') }}">
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

<div id="deleteMultiBudgetInformationModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete BudgetInformation Selected</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these BudgetInformation Selected?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer"> 
    <form class="form-horizontal" role="form" method="post" action="{{ asset('/multiDeleteBudgetInformation') }}">
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

<div id="editBudgetInformationModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Edit The BudgetInformation</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/updateBudgetInformation') }}" enctype="multipart/form-data">
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
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">File:</label>
                <div class="col-sm-9">
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="file_path" accept="application/pdf">
                    </div>
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
        <p>Please select CommitteesReports.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
        </button>
    </div>
</div>
@endsection
