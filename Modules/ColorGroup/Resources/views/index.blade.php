@extends('layouts.master')

@section('content')
    <div id="main" role="main">

        <!-- RIBBON -->
        <div id="ribbon">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li>{{ trans('colorgroup::lang.dashboard') }}</li>
                <li>{{ trans('colorgroup::lang.color_group') }}</li>
            </ol>
            <!-- end breadcrumb -->

            <!-- You can also add more buttons to the
            ribbon for further usability

            Example below:

            <span class="ribbon-button-alignment pull-right">
            <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
            <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
            <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
            </span> -->
        </div>
        <!-- END RIBBON -->

        <!-- MAIN CONTENT -->
        <div id="content">
            <div class="row">
                <div class="col-xs-7 col-sm-5 col-lg-8">
                    <h1 class="page-title txt-color-blueDark">
                        <i class="fa fa-table fa-fw "></i>
                        {{ trans('colorgroup::lang.color_group') }}
                    </h1>
                </div>
                <div class="col-xs-5 col-sm-7 col-lg-4 padding-10">
                    <a href="#" ajax_target="{{ route('colorgroup.create') }}" class="btn btn-success pull-right remote_modal">
                        <i class="fa fa-plus"></i> {{trans('colorgroup::lang.color_group')}}
                    </a>
                </div>
            </div>
            
            <!-- widget grid -->
            <section id="widget-grid" class="">
                <!-- row -->
                <div class="row">
                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false"

                             data-widget-colorbutton="false"
                             data-widget-togglebutton="false"
                             data-widget-deletebutton="false"
                             data-widget-fullscreenbutton="false"
                             data-widget-custombutton="false"
                             data-widget-collapsed="false"
                             data-widget-sortable="false"
                        >
                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2>{{ trans('colorgroup::lang.color_group') }}</h2>
                                
                            </header>
                            <!-- widget div-->
                            <div>
                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->
                                </div>
                                <!-- end widget edit box -->
                                <!-- widget content -->
                                <div class="widget-body no-padding">
                                <table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%" style="margin-top:0 !important;">
                                <thead>
                                    <tr>
                                        <th class="hasinput" >
                                            <input type="text" class="form-control"   placeholder="{{ trans('colorgroup::lang.filter_id') }}" />
                                        </th>
                                        <th class="hasinput" >
                                            <input type="text" class="form-control"    placeholder="{{ trans('colorgroup::lang.filter_title') }}" />
                                        </th>
                                        <th class="hasinput smart-form"  >
                                            <label class="select">
                                                <select >
                                                    <option value="">{{ trans('colorgroup::lang.filter_status') }}</option>
                                                    <option value="0">{{trans('colorgroup::lang.disable')}}</option>
                                                    <option value="1">{{trans('colorgroup::lang.active')}}</option>
                                                    
                                                </select>
                                                <i></i>
                                            </label>
                                        </th>
                                        
                                        <th style="max-width:13%">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th  data-hide="phone"> {{trans('colorgroup::lang.id')}}</th>
                                        <th   data-class="expand" >{{trans('colorgroup::lang.title')}}</th>
                                        <th data-hide="phone,tablet">{{trans('colorgroup::lang.status')}}</th>
                                        <th style="width:80px;">{{trans('colorgroup::lang.action')}}</th>
                                    </tr>
                                    
                                </thead>
                            </table>
                                </div>
                                <!-- end widget content -->
                            </div>
                            <!-- end widget div -->
                        </div>
                        <!-- end widget -->
                    </article>
                    <!-- WIDGET END -->
                </div>
                <!-- end row -->
            </section>
            <!-- end widget grid -->
        </div>
        <!-- END MAIN CONTENT -->
    </div>

@endsection

@section('custom_plugin')
    <!-- PAGE RELATED PLUGIN(S) -->
    <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>>

@endsection

@section('custom_script')
<script>
    var otable;
    $(document).ready(function () {
        
        pagenumbner = (localStorage.getItem('List')) ? localStorage.getItem('List') : 0;
        /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;
        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };
        /* COLUMN FILTER  */
        
        otable = $('#datatable_fixed_column').DataTable({
            "ajax": {
                url: 'parameters/colorgroup/table',
                type: 'POST',
                data: function (d) {
                    d.page = pagenumbner + 1;
                }
            },
            "pageLength": 15,
            'displayStart': pagenumbner * 15,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            "order": [[1, 'desc']],
            "sDom": "" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_fixed_column) {
                    responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_datatable_fixed_column.respond();
                $("[rel=tooltip]").tooltip();
            }
        });
        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on('keyup', function (e) {
            if (e.keyCode == 13) {
                otable.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            }
        });
        $("#datatable_fixed_column thead th select").on('change', function (e) {
            otable.column($(this).parent().parent().index() + ':visible')
            .search(this.value)
            .draw();
        });
        $('.datepicker').on('change', function () {
            otable.column($(this).parent().index() + ':visible')
            .search(this.value)
            .draw();
        });
        $('#datatable_fixed_column').on('page.dt', function () {
            localStorage.setItem('List', otable.page.info().page);
        });
        
    });
    
</script>
   
    <script>
            $(document).on('submit', '.remove-resource', function (e){
                e.preventDefault();
                var form = $(this);
                $.SmartMessageBox({
                    title : '<i class="fa fa-trash"></i> {{ trans('lang.confirm_removing') }}',
                    content : '{{ trans('lang.confirm_remove').' '.trans('lang.user') }}?',
                    buttons : '[{{ trans('lang.cancel') }}][{{ trans('OK') }}]'
                }, function(btn) {
                    if (btn === '{{ trans('OK') }}') {
                        $.ajax({
                            type: form.attr('method'),
                            url: form.attr('action'),
                            data: form.serialize(),
                            beforeSend: function(){
                                form.find('button').each(function(){
                                    $(this).data('actual-content', $(this).html());
                                    $(this).html('<i class="fa fa-refresh fa-spin"></i>');
                                    $(this).prop('disabled', true);
                                });
                            },
                            success: function(response){
                                otable.ajax.reload(function(){
                                    $.smallBox({
                                        title : '{{ trans('lang.success') }}',
                                        content : '<i class="fa fa-check"></i> <i>' + response + '</i>',
                                        color : '#659265',
                                        iconSmall : 'fa fa-check fa-2x fadeInRight animated',
                                        timeout : 4000
                                    });
                                    form.find('button').each(function(){
                                        $(this).prop('disabled', false);
                                        $(this).html($(this).data('actual-content'));
                                        $(this).removeData('actual-content');
                                    });
                                });
                            },
                            error: function(response){
                                $.smallBox({
                                    title : '{{ trans('lang.error') }}',
                                    content : '<i class="fa fa-times"></i> <i>' + response.responseText + '</i>',
                                    color : '#C46A69',
                                    iconSmall : 'fa fa-times fa-2x fadeInRight animated',
                                    timeout : 4000
                                });
                                form.find('button').each(function(){
                                    $(this).prop('disabled', false);
                                    $(this).html($(this).data('actual-content'));
                                    $(this).removeData('actual-content');
                                });
                            }
                        });
                    }
                });
            });
    
    
    $(document).on('click','.new_color',function(){
        console.log('aaa');
        var clone = $(".groupcolor").first().clone().appendTo( "#color_update" );
        clone.find("input[type='text']").val("");
        $('.color-pick').colorpicker();
        $i = 0
        $(".countcolor").each(function(i_idx, i_elem) {
            var $elem = $(i_elem);
            $elem.find("input").each(function(idx, cont) {    
                var $input = $(cont);    
                $input.attr({
                    'id': function(_, id) {
                        return id + $i;
                    },
                    'name': function(_, id) {
                        return id.replace('[0]', '['+ $i +']');
                    }
                });
            });
            
            $i++;
        });
    });
    
    $(document).on('click', '.delete_color', function() {
        var n = $( "div.groupcolor" ).length;
        if(n - 1  >= 1 ){
            $(this).parents('.groupcolor').remove();
        }
        
    });
    //added this line because the datepicke won't work in modal Create or Edit
    var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
@endsection

