@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
            <a href="{{ asset('/home') }}" class="dropdown-toggle">
                Get Involved
            </a> -> Petition your senator
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							Petition Table
						</div>
					</div>
					<div class="portlet-body">
                        <div class="table-toolbar">
							<div class="row">
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<div class="btn-group ballot-actions">
										<button class="btn btn-danger deletePetitionsModal" data-toggle="modal" style="margin-left: 10px;"><i class="fa fa-minus-circle"></i> <span>  Delete Petition</span></button>
									</div>
								</div>
							</div>
						</div>
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="petition_table">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="form-control group-checkable" data-set="#petition_table .checkboxes"/>
                                        </th>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            name
                                        </th>
                                        <th>
                                            bill/act
                                        </th>
                                        <th>
                                            email
                                        </th>
                                        <th>
                                            subject
                                        </th>
                                        <th>
                                            description
                                        </th>
                                        <th>
                                            petition
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
                                            {{ $contract_list->bill_act }}
                                        </td>
                                        <td>
                                            {{ $contract_list->email }}
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
                                            @if ($contract_list->petition != null)
                                                <a href="{{ $contract_list->petition }}" download>
                                                    <i class="fa fa-download"></i>
                                                </a>    
                                            @endif                                            
                                        </td>
                                        <td>
                                            <a class="previewPetitionModal" data-id="{{ $contract_list->id }}" data-name="{{ $contract_list->name }}" data-billact="{{ $contract_list->bill_act }}" data-email="{{ $contract_list->email }}" data-subject="{{ $contract_list->subject }}" data-description="{{ $contract_list->description }}" data-petition="{{ $contract_list->petition }}"  data-toggle="modal"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                                            <a class="editPetitionModal" data-id="{{ $contract_list->id }}" data-name="{{ $contract_list->name }}" data-billact="{{ $contract_list->bill_act }}" data-email="{{ $contract_list->email }}" data-subject="{{ $contract_list->subject }}" data-description="{{ $contract_list->description }}" data-petition="{{ $contract_list->petition }}"  data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                            <a class="deletePetitionModal" data-id="{{ $contract_list->id }}" data-toggle="modal"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
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

<div id="previewPetitionModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Preview The Petition</h4>
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
                <label class="label_des col-sm-2" for="title">Bill/Act:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="previewBillAct" readonly autofocus>
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

<div id="deletePetitionModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete The Petition</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this Petition?</p>
    </div>
    <div class="modal-footer">
        <form class="form-horizontal" role="from" method="post" action="{{ asset('/get-involved/deletePetition') }}">
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

<div id="deletePetitionsModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Delete Petitions Selected</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these Petitions Selected?</p>
        {{-- <p class="text-warning"><small>This action cannot be undone.</small></p> --}}
    </div>
    <div class="modal-footer"> 
    <form class="form-horizontal" role="form" method="post" action="{{ asset('/get-involved/multiDeletePetition') }}">
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

<div id="editPetitionModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Edit The Petition</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/get-involved/updatePetition') }}" enctype="multipart/form-data">
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
                <label class="label_des col-sm-2" for="title">Bill/Act:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editBillAct" name="bill_act" required>
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
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Upload Petition:</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" name="petition" id="editPetition" value="sdfsfd.txt" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Petition Delete:</label>
                <div class="col-sm-8" style="margin-top: 6px;">
                   <input type="checkbox" class="form-control del_petition" name="del_petition" id="del_petition"></input>
                </div>
             </div>

            <div class="modal-footer">
                <input type="text" id="editPetition_id" name="id" hidden />
                <input type="text" name="edit_del_petition" id="edit_del_petition" value="false" hidden/>
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
        <p>Please select petition.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Close
        </button>
    </div>
</div>
@endsection
