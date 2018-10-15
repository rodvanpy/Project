<!DOCTYPE html>
<?php include("sesion.php");?>

	<link rel='stylesheet' type='text/css' href='../css/jquery-ui.css' />
	<link rel='stylesheet' type='text/css' href='../css/ui-jqgrid.css' />
	<link rel='stylesheet' type='text/css' href='../css/ace-ie.min.css' />
	<link rel='stylesheet' type='text/css' href='../css/ace-skins.min.css' />
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.css">

	<script src="../js/jquery-3.3.1.min.js"></script>

	<script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/i18n/grid.locale-en.js'></script>
  <script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery.jqGrid.js'></script>

	<script>

	$(document).ready(function () {

		$(window).on('resize.jqGrid', function() {

            $("#list_records").jqGrid('setGridWidth', $(".content").width());


    }),

		$("#list_records").jqGrid({
			url: "roleGridData.php",
			datatype: "json",
			mtype: "GET",
			colNames: ["Id", "Nombre", "Descripcion"],
			colModel: [
				{ name: "id_rol",align:"right"},
				{ name: "nombre", editable:true},
				{ name: "descripcion", editable:true}
			],
			pager: "#perpage",
			rowNum: 10,
			rowList: [10,20],
			sortname: "id_rol",
			sortorder: "asc",
			height: 700,
			width: ($(".scroll").width() - 1000),
      hidegrid: false,
      rownumbers: true,
			//height: null,
			//width: null,
			//autowidth:true,
			//shrinkToFit: false,
			viewrecords: true,
			gridview: true,
			caption: ""
		});
		$(window).triggerHandler('resize.jqGrid');
		//navButtons
			$("#list_records").jqGrid('navGrid',"#perpage",
					{ 	//navbar options
						edit: true,
						editicon : 'fa fa-heart',
						add: true,
						addicon : 'ace-icon fa fa-plus-circle purple',
						del: true,
						delicon : 'ace-icon fa fa-trash-o red',
						search: false,
						searchicon : 'ace-icon fa fa-search orange',
						refresh: true,
						refreshicon : 'ace-icon fa fa-refresh green',
						view: true,
						viewicon : 'ace-icon fa fa-search-plus grey',
					},
					{
						//edit record form
						//closeAfterEdit: true,
						//width: 700,
						recreateForm: true,
						beforeShowForm : function(e) {
							var form = $(e[0]);
							form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
							//style_edit_form(form);
						}
					},
					{
						//new record form
						//width: 700,
						closeAfterAdd: true,
						recreateForm: true,
						viewPagerButtons: false,
						beforeShowForm : function(e) {
							var form = $(e[0]);
							form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
							.wrapInner('<div class="widget-header" />')
							//style_edit_form(form);
						}
					},
					{
						//delete record form
						recreateForm: true,
						beforeShowForm : function(e) {
							var form = $(e[0]);
							if(form.data('styled')) return false;
							form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
							form.data('styled', true);
						},
						onClick : function(e) {
							alert(1);
						}
					},
					{
						//view record form
						recreateForm: true,
						beforeShowForm: function(e){
							var form = $(e[0]);
							form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
						}
					}
				);

				function style_edit_form(form) {
					//enable datepicker on "sdate" field and switches for "stock" field
					//form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})

					form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
							   //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
							  //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');


					//update buttons classes
					var buttons = form.next().find('.EditButton .fm-button');
					buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
					buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
					buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')

					buttons = form.next().find('.navButton a');
					buttons.find('.ui-icon').hide();
					buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
					buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
				}
	});
	</script>
	<section class="content">
    <div class="row">
        <div class="col-xs-12">

						<table id="list_records" style="width: 100%;"><tr><td></td></tr></table>
						<div id="perpage"></div>

        </div>
    </div>

</section>
