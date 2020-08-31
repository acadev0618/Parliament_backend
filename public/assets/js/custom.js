var api_url = "ec2-3-90-78-113.compute-1.amazonaws.com:9191/api";
var base_url="";

// var api_url = "http://10.10.10.143:9191/api";
var TableManaged = function () {
    var dashboardTable = function () {

        var table = $('#dashboard_table');

        table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [-1]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });
    }

    var homeTable = function () {

        var table = $('#home_table');
        var oTable = table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [-1]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ],  // set first column as a default sort by asc
            "paging":   false,
            "info":     false 
        });

        $("#home_table tbody tr").click(function (event) {
            $(oTable.fnSettings().aoData).each(function () {
                $(this.nTr).removeClass('row_selected');
            });
            $(event.target.parentNode).addClass('row_selected');
        });

        table.on('click', '.editHomeListModal', function(){
            var id = $(this).data('id');

            var modal = $('#editHomeListModal');
            $('#editTitle').val($(this).data('title'));
            $('#editSubtitle').val($(this).data('subtitle'));
            modal.find('#editHomeList_id').val(id);
            modal.modal('show');
        });

        table.on('dblclick', '.getRedirectKey', function(){
            var key = $(this).data('key');
            console.log('key', key);
            switch (key) {
                case '001':
                    window.location.href = '/aboutUs';
                    break;
                case '002':
                    window.location.href = '/parliamentMembers';
                    break;
                case '003':
                    window.location.href = '/standingOrder';
                    break;
                case '004':
                    window.location.href = '/constitution';
                    break;
                case '005':
                    window.location.href = '/videoStreaming';
                    break;
                case '006':
                    window.location.href = '/gazettedActs';
                    break;
                case '007':
                    window.location.href = '/govtAgreements';
                    break;
                case '008':
                    window.location.href = '/officialReports';
                    break;
                case '009':
                    window.location.href = '/committeesReports';
                    break;
                case '010':
                    window.location.href = '/votes';
                    break;
                case '011':
                    window.location.href = '/researchMaterials';
                    break;
                case '012':
                    window.location.href = '/budgetInformation';
                    break;
                case '013':
                    window.location.href = '/stateOpening';
                    break;
                case '014':
                    window.location.href = '/parliamentCalendar';
                    break;
                default:
                    window.location.href = '/home';
                    break;
            }
        });
    }

    var parliamentTable = function () {

        var table = $('#parliament_table');
        var oTable = table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [-1]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ], // set first column as a default sort by asc
            "paging":   false,
            "info":     false 
        });

        $("#parliament_table tbody tr").click(function (event) {
            $(oTable.fnSettings().aoData).each(function () {
                $(this.nTr).removeClass('row_selected');
            });
            $(event.target.parentNode).addClass('row_selected');
        });

        table.on('click', '.editparliamentListModal', function(){
            var id = $(this).data('id');

            var modal = $('#editparliamentListModal');
            $('#editTitle').val($(this).data('title'));
            $('#editSubtitle').val($(this).data('subtitle'));
            modal.find('#editParliamentList_id').val(id);
            modal.modal('show');
        });

        table.on('dblclick', '.getRedirectKey', function(){
            var key = $(this).data('key');
            console.log('key', key);
            switch (key) {
                case '001':
                    window.location.href = '/aboutUs';
                    break;
                case '002':
                    window.location.href = '/parliamentMembers';
                    break;
                case '014':
                    window.location.href = '/parliamentCalendar';
                    break;
                case '016':
                    window.location.href = '/parliamentChiefMPs';
                    break;
                case '017':
                    window.location.href = '/speakerofParliament';
                    break;
                case '018':
                    window.location.href = '/clerkofParliament';
                    break;
                case '019':
                    window.location.href = '/parliamentDirectory';
                    break;
                default:
                    window.location.href = '/parliament';
                    break;
            }
        });
    }

    var downloadsTable = function () {

        var table = $('#downloads_table');
        var oTable = table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [-1]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ], // set first column as a default sort by asc
            "paging":   false,
            "info":     false 
        });

        $("#downloads_table tbody tr").click(function (event) {
            $(oTable.fnSettings().aoData).each(function () {
                $(this.nTr).removeClass('row_selected');
            });
            $(event.target.parentNode).addClass('row_selected');
        });

        table.on('click', '.editdownloadListModal', function(){
            var id = $(this).data('id');

            var modal = $('#editdownloadListModal');
            $('#editTitle').val($(this).data('title'));
            $('#editSubtitle').val($(this).data('subtitle'));
            modal.find('#editDownloadList_id').val(id);
            modal.modal('show');
        });

        table.on('dblclick', '.getRedirectKey', function(){
            var key = $(this).data('key');
            console.log('key', key);
            switch (key) {
                case '006':
                    window.location.href = '/gazettedActs';
                    break;
                case '007':
                    window.location.href = '/govtAgreements';
                    break;
                case '008':
                    window.location.href = '/officialReports';
                    break;
                case '009':
                    window.location.href = '/committeesReports';
                    break;
                case '011':
                    window.location.href = '/researchMaterials';
                    break;
                default:
                    window.location.href = '/downloads';
                    break;
            }
        });
    }

    var votesTable = function () {

        var table = $('#votes_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.on('click', '.previewVotesModal', function(){

            var modal = $('#previewVotesModal');
            $('#previewTitle').val($(this).data('title'));
            $('#previewTopics').val($(this).data('topics'));
            $('#prev_yes').val($(this).data('yes'));
            $('#prev_no').val($(this).data('no'));
            $('#prev_not_sure').val($(this).data('notsure'));
            modal.modal('show');
        });

        table.on('click', '.deleteVotesModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteVotesModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editVotesModal', function(){
            var id = $(this).data('id');

            var modal = $('#editVotesModal');
            $('#editTitle').val($(this).data('title'));
            $('#editTopics').val($(this).data('topics'));
            $('#editYes').val($(this).data('yes'));
            $('#editNo').val($(this).data('no'));
            $('#editNotSure').val($(this).data('notsure'));
            modal.find('#edit_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiVotesModal', function(){
            var modal = $('#deleteMultiVotesModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var standingorderTable = function () {

        var table = $('#standingOrder_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });
        table.on('click', '.previewstandingorderModal', function(){

            var modal = $('#previewstandingorderModal');
            $('#previewTitle').val($(this).data('title'));
            $('#previewContents').val($(this).data('contents'));
            $('#previewUrl').val($(this).data('url'));
            modal.modal('show');
        });

        table.on('click', '.editStandingOrderModal', function(){
            var id = $(this).data('id');

            var modal = $('#editStandingOrderModal');
            $('#editTitle').val($(this).data('title'));
            $('#editContents').val($(this).data('contents'));
            modal.find('#editStandingOrder_id').val(id);
            modal.modal('show');
        });

        table.on('click', '.deletestandingorderModal', function(){
            var id = $(this).data('id');

            var modal = $('#deletestandingorderModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultistandingorderModal', function(){
            var modal = $('#deleteMultistandingorderModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var constitutionTable = function () {

        var table = $('#constitution_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.on('click', '.previewConstitutionModal', function(){

            var modal = $('#previewConstitutionModal');
            $('#previewTitle').val($(this).data('title'));
            $('#previewContents').val($(this).data('contents'));
            modal.modal('show');
        });

        table.on('click', '.deleteConstitutionModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteConstitutionModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editConstitutionModal', function(){
            var id = $(this).data('id');

            var modal = $('#editConstitutionModal');
            $('#editTitle').val($(this).data('title'));
            $('#editContents').val($(this).data('contents'));
            modal.find('#editConstitution_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteConstitutionsModal', function(){
            var modal = $('#deleteConstitutionsModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var stateOpeningTable = function () {

        var table = $('#stateOpening_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.$('.editStateOpeningModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editStateOpeningModal');

            modal.find('#edit_id').val(id);
            $('#editTitle').val($(this).data('title'));

            modal.modal('show');
        });

        table.$('.deleteStateOpeningModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteStateOpeningModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiStateOpeningModal', function(){
            var modal = $('#deleteMultiStateOpeningModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var budgetInformationTable = function () {

        var table = $('#budgetInformation_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.$('.editBudgetInformationModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editBudgetInformationModal');

            modal.find('#edit_id').val(id);
            $('#editTitle').val($(this).data('title'));

            modal.modal('show');
        });

        table.$('.deleteBudgetInformationModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteBudgetInformationModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiBudgetInformationModal', function(){
            var modal = $('#deleteMultiBudgetInformationModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var videoStreamingTable = function () {

        var table = $('#videoStreaming_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.on('click', '.previewVideoStreamingModal', function(){

            var modal = $('#previewVideoStreamingModal');
            $('#previewTitle').val($(this).data('title'));
            $('#previewDescription').val($(this).data('description'));
            $('#previewUrl').val($(this).data('url'));
            modal.modal('show');
        });

        table.on('click', '.deleteVideoStreamingModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteVideoStreamingModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editVideoStreamingModal', function(){
            var id = $(this).data('id');

            var modal = $('#editVideoStreamingModal');
            $('#editTitle').val($(this).data('title'));
            $('#editDescription').val($(this).data('description'));
            $('#editUrl').val($(this).data('url'));
            modal.find('#edit_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiVideoStreamingModal', function(){
            var modal = $('#deleteMultiVideoStreamingModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var aboutUsTable = function () {

        var table = $('#aboutUs_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.on('click', '.previewAboutUsModal', function(){

            var modal = $('#previewAboutUsModal');
            $('#previewTitle').val($(this).data('title'));
            $('#previewDescription').val($(this).data('description'));
            modal.modal('show');
        });

        table.on('click', '.deleteAboutUsModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteAboutUsModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editaboutUsListModal', function(){
            var id = $(this).data('id');

            var modal = $('#editaboutUsListModal');
            $('#editTitle').val($(this).data('title'));
            $('#editDescription').val($(this).data('description'));
            modal.find('#editAboutUs_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteAboutUssModal', function(){
            var modal = $('#deleteAboutUssModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var parliamentMembersTable = function () {

        var table = $('#parliamentMembers_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addParliamentModal').click(function(){
            var addModal = $('#addParliamentModal');

            addModal.modal('show');
        });

        table.$('.previewParliamentModal').click(function(){
            var modal = $('#previewParliamentModal');

            $('#prev_name').val($(this).data('name'));
            $('#prev_constituency').val($(this).data('constituency'));
            $('#prev_type').val($(this).data('type'));
            modal.find('#prev_photo').attr("src", $(this).data('image'));
            $('#prev_mobile').val($(this).data('mobile'));
            $('#prev_email').val($(this).data('email'));
            $('#prev_description').val($(this).data('description'));

            modal.modal('show');
        });

        $('.del_photo').change(function () {
            var checked = jQuery(this).is(":checked");
            console.log(checked);
            $('#editParliamentMemberModal #edit_del_photo').val(checked);
         });

        table.$('.editParliamentMemberModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editParliamentMemberModal');

            modal.find('#id').val(id);
            $('#edit_name').val($(this).data('name'));
            $('#edit_constituency').val($(this).data('constituency'));
            $('#edit_type').val($(this).data('type'));
            $('#edit_mobile').val($(this).data('mobile'));
            $('#edit_email').val($(this).data('email'));
            $('#edit_description').val($(this).data('description'));

            modal.modal('show');
        });

        table.$('.deleteParliamentMemberModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteParliamentMemberModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteParliamentMembersModal', function(){
            var modal = $('#deleteParliamentMembersModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var parliamentChiefMPsTable = function () {

        var table = $('#parliamentChiefMPs_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addParliamentModal').click(function(){
            var addModal = $('#addParliamentModal');

            addModal.modal('show');
        });

        table.$('.previewParliamentChiefModal').click(function(){
            var modal = $('#previewParliamentChiefModal');

            $('#prev_name').val($(this).data('name'));
            $('#prev_district').val($(this).data('district'));
            $('#prev_directory').val($(this).data('directory'));
            modal.find('#prev_photo').attr("src", $(this).data('image'));
            $('#prev_mobile').val($(this).data('mobile'));
            $('#prev_email').val($(this).data('email'));
            $('#prev_description').val($(this).data('description'));

            modal.modal('show');
        });

        $('.del_photo').change(function () {
            var checked = jQuery(this).is(":checked");
            console.log(checked);
            $('#editParliamentChiefModal #edit_del_photo').val(checked);
         });

        table.$('.editParliamentChiefModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editParliamentChiefModal');

            modal.find('#id').val(id);
            $('#edit_name').val($(this).data('name'));
            $('#edit_district').val($(this).data('district'));
            $('#edit_directory').val($(this).data('directory'));
            $('#edit_mobile').val($(this).data('mobile'));
            $('#edit_email').val($(this).data('email'));
            $('#prev_description').val($(this).data('description'));

            modal.modal('show');
        });

        table.$('.deleteParliamentChiefModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteParliamentChiefModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiParliamentChiefModal', function(){
            var modal = $('#deleteMultiParliamentChiefModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var parliamentSpeakerTable = function () {

        var table = $('#parliamentSpeaker_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addParliamentSpeakerModal').click(function(){
            var addModal = $('#addParliamentSpeakerModal');

            addModal.modal('show');
        });

        table.$('.previewParliamentSpeakerModal').click(function(){
            var modal = $('#previewParliamentSpeakerModal');

            $('#prev_name').val($(this).data('name'));
            $('#prev_early_life').val($(this).data('earlylife'));
            $('#prev_education').val($(this).data('education'));
            $('#prev_career').val($(this).data('career'));
            $('#prev_opposition_to_president').val($(this).data('oppositiontopresident'));
            $('#prev_presidential_campaign').val($(this).data('presidentialcampaign'));
            modal.find('#prev_photo').attr("src", $(this).data('image'));
            $('#prev_mobile').val($(this).data('mobile'));
            $('#prev_email').val($(this).data('email'));
            $('#prev_description').val($(this).data('description'));

            modal.modal('show');
        });

        $('.del_photo').change(function () {
            var checked = jQuery(this).is(":checked");
            console.log(checked);
            $('#editParliamentChiefModal #edit_del_photo').val(checked);
         });

        table.$('.editParliamentSpeakerModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editParliamentSpeakerModal');

            modal.find('#id').val(id);
            $('#edit_name').val($(this).data('name'));
            $('#edit_early_life').val($(this).data('earlylife'));
            $('#edit_education').val($(this).data('education'));
            $('#edit_career').val($(this).data('career'));
            $('#edit_opposition_to_president').val($(this).data('oppositiontopresident'));
            $('#edit_presidential_campaign').val($(this).data('presidentialcampaign'));
            $('#edit_mobile').val($(this).data('mobile'));
            $('#edit_email').val($(this).data('email'));
            $('#prev_description').val($(this).data('description'));

            modal.modal('show');
        });

        table.$('.deleteParliamentSpeakerModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteParliamentSpeakerModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiParliamentSpeakerModal', function(){
            var modal = $('#deleteMultiParliamentSpeakerModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var parliamentClerkTable = function () {

        var table = $('#parliamentClerk_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addParliamentClerkModal').click(function(){
            var addModal = $('#addParliamentClerkModal');

            addModal.modal('show');
        });

        table.$('.previewParliamentClerkModal').click(function(){
            var modal = $('#previewParliamentClerkModal');

            $('#prev_name').val($(this).data('name'));
            $('#prev_education').val($(this).data('education'));
            $('#prev_experience').val($(this).data('experience'));
            $('#prev_skills_trainings').val($(this).data('skillstrainings'));
            $('#prev_activities_community_service').val($(this).data('activitiescommunityservice'));
            modal.find('#prev_photo').attr("src", $(this).data('image'));
            $('#prev_mobile').val($(this).data('mobile'));
            $('#prev_email').val($(this).data('email'));
            $('#prev_description').val($(this).data('description'));

            modal.modal('show');
        });

        $('.del_photo').change(function () {
            var checked = jQuery(this).is(":checked");
            console.log(checked);
            $('#editParliamentChiefModal #edit_del_photo').val(checked);
         });

        table.$('.editParliamentClerkModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editParliamentClerkModal');

            modal.find('#id').val(id);
            $('#edit_name').val($(this).data('name'));
            $('#edit_education').val($(this).data('education'));
            $('#edit_experience').val($(this).data('experience'));
            $('#edit_skills_trainings').val($(this).data('skillstrainings'));
            $('#edit_activities_community_service').val($(this).data('activitiescommunityservice'));
            $('#edit_mobile').val($(this).data('mobile'));
            $('#edit_email').val($(this).data('email'));
            $('#prev_description').val($(this).data('description'));

            modal.modal('show');
        });

        table.$('.deleteParliamentClerkModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteParliamentClerkModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiParliamentClerkModal', function(){
            var modal = $('#deleteMultiParliamentClerkModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var parliamentCalendarTable = function () {

        var table = $('#parliamentCalendar_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.on('click', '.previewParliamentCalendarModal', function(){

            var modal = $('#previewParliamentCalendarModal');
            $('#previewTitle').val($(this).data('title'));
            $('#prev_date').val($(this).data('date'));
            modal.modal('show');
        });

        table.on('click', '.deleteParliamentCalendarModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteParliamentCalendarModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editParliamentCalendarModal', function(){
            var id = $(this).data('id');

            var modal = $('#editParliamentCalendarModal');
            $('#editTitle').val($(this).data('title'));
            $('#edit_date').val($(this).data('date'));
            modal.find('#edit_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiParliamentCalendarModal', function(){
            var modal = $('#deleteMultiParliamentCalendarModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var parliamentDirectoryTable = function () {

        var table = $('#parliamentDirectory_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addParliamentDirectoryModal').click(function(){
            var addModal = $('#addParliamentDirectoryModal');

            addModal.modal('show');
        });

        table.$('.previewParliamentDirectoryModal').click(function(){
            var modal = $('#previewParliamentDirectoryModal');

            $('#prev_name').val($(this).data('name'));
            $('#prev_education').val($(this).data('education'));
            $('#prev_experience').val($(this).data('experience'));
            $('#prev_skills_trainings').val($(this).data('skillstrainings'));
            $('#prev_activities_community_service').val($(this).data('activitiescommunityservice'));
            modal.find('#prev_photo').attr("src", $(this).data('image'));
            $('#prev_mobile').val($(this).data('mobile'));
            $('#prev_email').val($(this).data('email'));
            $('#prev_description').val($(this).data('description'));

            modal.modal('show');
        });

        $('.del_photo').change(function () {
            var checked = jQuery(this).is(":checked");
            console.log(checked);
            $('#editParliamentChiefModal #edit_del_photo').val(checked);
         });

        table.$('.editParliamentDirectoryModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editParliamentDirectoryModal');

            modal.find('#id').val(id);
            $('#edit_name').val($(this).data('name'));
            $('#edit_education').val($(this).data('education'));
            $('#edit_experience').val($(this).data('experience'));
            $('#edit_skills_trainings').val($(this).data('skillstrainings'));
            $('#edit_activities_community_service').val($(this).data('activitiescommunityservice'));
            $('#edit_mobile').val($(this).data('mobile'));
            $('#edit_email').val($(this).data('email'));
            $('#prev_description').val($(this).data('description'));

            modal.modal('show');
        });

        table.$('.deleteParliamentDirectoryModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteParliamentDirectoryModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiParliamentDirectoryModal', function(){
            var modal = $('#deleteMultiParliamentDirectoryModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var gazettedactsTable = function () {

        var table = $('#gazettedActs_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addGazettedActsModal').click(function(){
            var addModal = $('#addGazettedActsModal');

            addModal.modal('show');
        });

        table.$('.editGazettedActsModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editGazettedActsModal');

            modal.find('#editGazettedActs_id').val(id);
            $('#editTitle').val($(this).data('title'));

            modal.modal('show');
        });

        table.$('.deleteGazettedActsModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteGazettedActsModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiGazettedActsModal', function(){
            var modal = $('#deleteMultiGazettedActsModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var govtagreementsTable = function () {

        var table = $('#govtAgreements_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addGovtAgreementsModal').click(function(){
            var addModal = $('#addGovtAgreementsModal');

            addModal.modal('show');
        });

        table.$('.editGovtAgreementsModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editGovtAgreementsModal');

            modal.find('#editGovtAgreements_id').val(id);
            $('#editTitle').val($(this).data('title'));

            modal.modal('show');
        });

        table.$('.deleteGovtAgreementsModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteGovtAgreementsModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiGovtAgreementsModal', function(){
            var modal = $('#deleteMultiGovtAgreementsModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var officialreportsTable = function () {

        var table = $('#officialReports_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addOfficialReportsModal').click(function(){
            var addModal = $('#addOfficialReportsModal');

            addModal.modal('show');
        });

        table.$('.editOfficialReportsModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editOfficialReportsModal');

            modal.find('#editOfficialReports_id').val(id);
            $('#editTitle').val($(this).data('title'));

            modal.modal('show');
        });

        table.$('.deleteOfficialReportsModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteOfficialReportsModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiOfficialReportsModal', function(){
            var modal = $('#deleteMultiOfficialReportsModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var committeesreportsTable = function () {

        var table = $('#committeesReports_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addCommitteesReportsModal').click(function(){
            var addModal = $('#addCommitteesReportsModal');

            addModal.modal('show');
        });

        table.$('.editCommitteesReportsModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editCommitteesReportsModal');

            modal.find('#editCommitteesReports_id').val(id);
            $('#editTitle').val($(this).data('title'));

            modal.modal('show');
        });

        table.$('.deleteCommitteesReportsModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteCommitteesReportsModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiCommitteesReportsModal', function(){
            var modal = $('#deleteMultiCommitteesReportsModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var researchmaterialsTable = function () {

        var table = $('#researchMaterials_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $('.addResearchMaterialsModal').click(function(){
            var addModal = $('#addResearchMaterialsModal');

            addModal.modal('show');
        });

        table.$('.editResearchMaterialsModal').click(function(){
            var id = $(this).data('id');
            var modal = $('#editResearchMaterialsModal');

            modal.find('#editResearchMaterials_id').val(id);
            $('#editTitle').val($(this).data('title'));

            modal.modal('show');
        });

        table.$('.deleteResearchMaterialsModal').click(function(){

            var id = $(this).data('id');

            var modal = $('#deleteResearchMaterialsModal');
            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteMultiResearchMaterialsModal', function(){
            var modal = $('#deleteMultiResearchMaterialsModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    // Online Forum
    var forumcategoryTable = function () {

        var table = $('#forum_category_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.on('click', '.addSubcategoryModal', function(){
            var id = $(this).data('id');

            var modal = $('#addSubcategoryModal');

            modal.find('.parent_id').val(id);
            modal.modal('show');
        });

        table.on('click', '.deleteCategoryModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteCategoryModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editcategoryModal', function(){
            var id = $(this).data('id');

            var modal = $('#editcategoryModal');
            $('#editTitle').val($(this).data('title'));
            modal.find('#edit_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deletecategoriesModal', function(){
            var modal = $('#deletecategoriesModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var forumtypeTable = function () {

        var table = $('#forum_type_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.on('click', '.deleteTypeModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteTypeModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editaTypeModal', function(){
            var id = $(this).data('id');

            var modal = $('#editaTypeModal');
            $('#editTitle').val($(this).data('title'));
            modal.find('#edit_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteTypesModal', function(){
            var modal = $('#deleteTypesModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var forumsubscriptionTable = function () {

        var table = $('#forum_subscription_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        table.on('click', '.deleteSubscriptionModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteSubscriptionModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editSubscriptionModal', function(){
            var id = $(this).data('id');

            var modal = $('#editSubscriptionModal');
            $('#editTitle').val($(this).data('title'));
            modal.find('#edit_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteSubscriptionsModal', function(){
            var modal = $('#deleteSubscriptionsModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var forummembersTable = function () {

        var table = $('#forum_members_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $(document).on('click', '.addMemberModal', function(){
            var modal = $('#addMemberModal');
            console.log('sdfsdfs');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/forum/getSubscription',
                type: 'GET',
                success: function(response) {
                    var result = jQuery.parseJSON(response);
                    var html = "";
                    for(var i=0; i<result.success.length; i++) {
                        html += "<option value='"+ result.success[i]['id'] +"'>"+ result.success[i]['title'] +"</opiton>";
                    }
                    $('#add_subscription').html(html);
                    var currentdate = new Date();
                    var datetime = currentdate.getFullYear() + "-"
                        + (currentdate.getMonth()+1)  + "-" 
                        + currentdate.getDate() + " "  
                        + currentdate.getHours() + ":"  
                        + currentdate.getMinutes() + ":" 
                        + currentdate.getSeconds();
                        console.log(datetime);
                    $('#current_date').val(datetime);
                    modal.modal('show');
                }
            });
            // modal.modal('show');
        });

        table.on('click', '.deleteSubscriptionModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteSubscriptionModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editSubscriptionModal', function(){
            var id = $(this).data('id');

            var modal = $('#editSubscriptionModal');
            $('#editTitle').val($(this).data('title'));
            modal.find('#edit_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteSubscriptionsModal', function(){
            var modal = $('#deleteSubscriptionsModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    var forumthreadTable = function () {

        var table = $('#forum_thread_table');
        table.dataTable({
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        $(document).on('click', '.addMemberModal', function(){
            var modal = $('#addMemberModal');
            console.log('sdfsdfs');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/forum/getSubscription',
                type: 'GET',
                success: function(response) {
                    var result = jQuery.parseJSON(response);
                    var html = "";
                    for(var i=0; i<result.success.length; i++) {
                        html += "<option value='"+ result.success[i]['id'] +"'>"+ result.success[i]['title'] +"</opiton>";
                    }
                    $('#add_subscription').html(html);
                    var currentdate = new Date();
                    var datetime = currentdate.getFullYear() + "-"
                        + (currentdate.getMonth()+1)  + "-" 
                        + currentdate.getDate() + " "  
                        + currentdate.getHours() + ":"  
                        + currentdate.getMinutes() + ":" 
                        + currentdate.getSeconds();
                        console.log(datetime);
                    $('#current_date').val(datetime);
                    modal.modal('show');
                }
            });
            // modal.modal('show');
        });

        table.on('click', '.deleteSubscriptionModal', function(){
            var id = $(this).data('id');

            var modal = $('#deleteSubscriptionModal');

            modal.find('.id').val(id);
            modal.modal('show');
        });

        table.on('click', '.editSubscriptionModal', function(){
            var id = $(this).data('id');

            var modal = $('#editSubscriptionModal');
            $('#editTitle').val($(this).data('title'));
            modal.find('#edit_id').val(id);
            modal.modal('show');
        });

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        table.find('.checkboxes').change(function(){
            var checked = $(this).is(":checked");
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });

        $(document).on('click', '.deleteSubscriptionsModal', function(){
            var modal = $('#deleteSubscriptionsModal');
            var allVals = [];

            table.find(".checkboxes:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <= 0) {
                var confrim = $('#confirmModal');
                confrim.modal('show');
            } else {
                modal.modal('show');
                var ids = allVals.join(",");

                modal.find('.ids').val(ids);
            }
        });
    }

    return {
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            dashboardTable();
            homeTable();
            parliamentTable();
            downloadsTable();
            votesTable();
            standingorderTable();
            constitutionTable();
            stateOpeningTable();
            budgetInformationTable();
            videoStreamingTable();
            aboutUsTable();
            parliamentMembersTable();
            parliamentChiefMPsTable();
            parliamentSpeakerTable();
            parliamentClerkTable();
            parliamentCalendarTable();
            parliamentDirectoryTable();
            gazettedactsTable();
            govtagreementsTable();
            officialreportsTable();
            committeesreportsTable();
            researchmaterialsTable();
            forumcategoryTable();
            forumtypeTable();
            forumsubscriptionTable();
            forummembersTable();
            forumthreadTable();
        }
    };
}();
