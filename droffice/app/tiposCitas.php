<!DOCTYPE html>
<?php include("sesion.php");?>

	<link rel='stylesheet' type='text/css' href='../css/jquery-ui.css' />
	<link rel='stylesheet' type='text/css' href='../css/ui-jqgrid.css' />
	<link rel='stylesheet' type='text/css' href='../css/ace-ie.min.css' />
	<link rel='stylesheet' type='text/css' href='../css/ace-skins.min.css' />
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.css">

	<script src="../js/jquery-3.3.1.min.js"></script>

	<script type='text/javascript' src="../js/grid.locale-en.js"></script>
	<script type='text/javascript' src="../js/jquery.jqGrid.min.js"></script>


	<script>

	$(document).ready(function () {

		var grid_selector = "#grid-table";
		var pager_selector = "#grid-pager";

		//resize to fit page size
    $(window).on('resize.jqGrid', function () {+
			console.log($(".content-wrapper").height());
				setTimeout(function () {
        	$(grid_selector).jqGrid('setGridWidth', $(".content").width()-3);
					$(grid_selector).jqGrid('setGridHeight', $(".content").height());
				}, 0);


    });

		$(grid_selector).jqGrid({
			url: "dao_tiposCitas.php",
			datatype: "json",
			mtype: "GET",
			colNames: ["Id", "Tipo Cita"],
			colModel: [
				{ name: "id_tipo_cita",align:"right"},
				{ name: "descripcion", editable:true}
			],
			pager: pager_selector,
			rowNum: 10,
			rowList: [10,20],
			sortname: "id_tipo_cita",
			sortorder: "asc",
			height: $(".content-wrapper").height(),
			width: ($(".scroll-content").width()),
      hidegrid: false,
      rownumbers: true,
			//height: null,
			//width: null,
			//autowidth:true,
			//shrinkToFit: false,
			viewrecords: true,
			gridview: true,
			editurl: "dao_tiposCitas.php",
			caption:'<span style="font-size:15px">Lista de Tipos Citas</span>'
		});
		$(window).triggerHandler('resize.jqGrid');
		//navButtons
			$(grid_selector).jqGrid('navGrid',pager_selector,
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
						},
						errorTextFormat: function (response) {
								console.log(response);
						    return '<span class="ui-icon ui-icon-alert" ' +
						                 'style="float:left; margin-right:.3em;"></span>' +
						                response.responseText;
						},
						afterSubmit: function (response) {


								var data = $.parseJSON($.parseJSON(response.responseText));
								console.log(data.mensaje);
						    var myInfo = '<div class="ui-state-highlight ui-corner-all">'+
						                 '<span class="ui-icon ui-icon-info" ' +
						                     'style="float: left; margin-right: .3em;"></span>' +
						                 data.mensaje +
						                 '</div>',
						        $infoTr = $("#TblGrid_" + $.jgrid.jqID(this.id) + ">tbody>tr.tinfo"),
						        $infoTd = $infoTr.children("td.topinfo");

								$infoTd.html(myInfo);
						    $infoTr.show();

						    // display status message to 3 sec only
						    setTimeout(function () {
						        $infoTr.slideUp("slow");
						    }, 5000);

						    return [true, "", ""]; // response should be interpreted as successful
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
	<section class="content" style="width: 100%; height:90vh">
    <div class="row">
        <div class="col-xs-12">

						<table id="grid-table" style="width: 100%;"><tr><td></td></tr></table>
						<div id="grid-pager"></div>

        </div>
    </div>

</section>
