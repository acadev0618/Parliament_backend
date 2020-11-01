@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            <a href="{{ asset('/home') }}" class="dropdown-toggle">
                Get Involved
            </a> -> Contract your Senator
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							Contract Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
										<button class="btn btn-danger deleteContractsModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete Contract</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="contract_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#contract_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            name
                                        </th>
                                        <th>
                                            senator
                                        </th>
                                        <th>
                                            email
                                        </th>
                                        <th>
                                            mobile
                                        </th>
                                        <th>
                                            subject
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
                                    @foreach($data ?? '' as $contract_list)
                                    <tr class="odd gradeX getRedirectKey">
                                        <td>
                                            <input type="checkbox" class="form-control checkboxes" data-id="{{ $contract_list->id }}"/>
                                        </td>
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td>
                                            {{ $contract_list->name }}
                                        </td>
                                        <td>
                                            {{ $contract_list->senator }}
                                        </td>
                                        <td>
                                            {{ $contract_list->email }}
                                        </td>
                                        <td>
                                            {{ $contract_list->mobile }}
                                        </td>
                                        <td>
                                            {{ $contract_list->subject }}
                                        </td>
                                        <td>
                                            @if (strlen($contract_list->description) > 100)
                                                {{ substr($contract_list->description, 0, 100) }}...
                                            @else
                                                {{ $contract_list->description }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="previewContractModal" data-id="{{ $contract_list->id }}" data-name="{{ $contract_list->name }}" data-senator="{{ $contract_list->senator }}" data-email="{{ $contract_list->email }}" data-mobile="{{ $contract_list->mobile }}" data-subject="{{ $contract_list->subject }}" data-description="{{ $contract_list->description }}" data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                                            <a class="editContractModal" data-id="{{ $contract_list->id }}" data-name="{{ $contract_list->name }}" data-senator="{{ $contract_list->senator }}" data-email="{{ $contract_list->email }}" data-mobile="{{ $contract_list->mobile }}" data-subject="{{ $contract_list->subject }}" data-description="{{ $contract_list->description }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deleteContractModal" data-id="{{ $contract_list->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
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

<div id="previewContractModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Preview The Contract</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal">
            <div class="for-group">
                <p class="mini-title">Primary Details</p>
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
                <label class="label_des col-sm-2" for="title">Senator:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewSenator" readonly autofocus>
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
                <label class="label_des col-sm-2" for="title">Subject:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewSubject" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Description:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="10" id="previewDescription" readonly autofocus></textarea>
                    {{-- <input type="text" class="form-control" id="previewDescription" name="description" readonly autofocus> --}}
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

<div id="deleteContractModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete The Contract</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this Contract?</p>
    </div>
    <div class="modal-footer">
        <form class="form-horizontal" role="from" method="post" action="{{ asset('/get-involved/deleteContract') }}">
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

<div id="deleteContractsModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete Contracts Selected</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these Contracts Selected?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer"> 
    <form class="form-horizontal" role="form" method="post" action="{{ asset('/get-involved/multiDeleteContract') }}">
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

<div id="editContractModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Edit The Contract</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/get-involved/updateContract') }}">
        @csrf
            <div class="for-group">
                <p class="mini-title">Primary Details</p>
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
                <label class="label_des col-sm-2" for="title">Senator:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editSenator" name="senator" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Email:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editEmail" name="email" required>
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
                <label class="label_des col-sm-2" for="title">Subject:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editSubject" name="subject" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Description:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="10" id="editDescription" name="description" required></textarea>
                    {{-- <input type="text" class="form-control" id="editDescription" name="description" required> --}}
                </div>
            </div>

            <div class="modal-footer">
                <input type="text" id="editContract_id" name="id" hidden />
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
        <p>Please select contract.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
        </button>
    </div>
</div>
@endsection
