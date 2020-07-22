@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
		Standing Order List
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							Standing Order Table
						</div>
					</div>
					<div class="portlet-body">
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="standingOrder_table">
                                <thead>
                                    <tr>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            title
                                        </th>
                                        <th>
                                            contents
                                        </th>
                                        <th>
                                            key
                                        </th>
                                        <th style="width: 6%;">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count((array)$data) == 0)
                                    @else
                                    @foreach($data as $standingorder)
                                    <tr class="odd gradeX getRedirectKey">
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td>
                                            {{ $standingorder->title }}
                                        </td>
                                        <td>
                                            {{ $standingorder->contents }}
                                        </td>
                                        <td>
                                            {{ $standingorder->key }}
                                        </td>
                                        <td>
                                            <a class="editStandingOrderModal" data-id="{{ $standingorder->id }}" data-title="{{ $standingorder->title }}" data-contents="{{ $standingorder->contents }}" data-key="{{ $standingorder->key }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
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

<div id="editStandingOrderModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Edit The Standing Order</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/updateStandingOrder') }}">
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
                <label class="label_des col-sm-2" for="title">Contents:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editContents" name="contents" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-1"></div>
                <label class="label_des col-sm-2" for="title">Key:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editKey" name="key" required>
                </div>
            </div>

            <div class="modal-footer">
                <input type="text" id="editStandingOrder_id" name="id" hidden />
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
@endsection
