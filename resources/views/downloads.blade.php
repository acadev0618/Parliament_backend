@extends('layouts.app')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title">
		Downloads List
		</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							Downloads Table
						</div>
					</div>
					<div class="portlet-body">
                        <div id="change_table">
                            <table class="table table-striped table-bordered table-hover" id="downloads_table">
                                <thead>
                                    <tr>
                                        <th class="table-no">
                                            No
                                        </th>
                                        <th>
                                            title
                                        </th>
                                        <th>
                                            subtitle
                                        </th>
                                        <th style="width: 6%;">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count((array)$data) == 0)
                                    @else
                                    @foreach($data as $download_list)
                                    <tr class="odd gradeX getRedirectKey" data-key="{{ $download_list->key }}">
                                        <td>
                                        {{ $loop->index+1 }}
                                        </td>
                                        <td id="election">
                                            {{ $download_list->title }}
                                        </td>
                                        <td>
                                            {{ $download_list->subtitle }}
                                        </td>
                                        <td>
                                            <a class="editdownloadListModal" data-id="{{ $download_list->id }}" data-title="{{ $download_list->title }}" data-subtitle="{{ $download_list->subtitle }}" data-toggle="modal"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
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

<div id="editdownloadListModal" class="modal fade" tabindex="-1" data-width="620">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title text-center">Edit The DownloadList</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/updateDownloadsList') }}">
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
                <label class="label_des col-sm-2" for="title">Subtitle:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="editSubtitle" name="subtitle" required>
                </div>
            </div>

            <div class="modal-footer">
                <input type="text" id="editDownloadList_id" name="id" hidden />
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
