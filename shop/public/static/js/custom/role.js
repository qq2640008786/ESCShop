/*
 * 	Additional function for tables.html
 *	Written by ThemePixels
 *	http://themepixels.com/
 *
 *	Copyright (c) 2012 ThemePixels (http://themepixels.com)
 *
 *	Built for Amanda Premium Responsive Admin Template
 *  http://themeforest.net/category/site-templates/admin-templates
 */

jQuery(document).ready(function(){

	jQuery('.stdtablecb .checkall').click(function(){
		var parentTable = jQuery(this).parents('table');
		var ch = parentTable.find('tbody input[type=checkbox]');
		if(jQuery(this).is(':checked')) {

			//check all rows in table
			ch.each(function(){
				jQuery(this).attr('checked',true);
				jQuery(this).parent().addClass('checked');	//used for the custom checkbox style
				jQuery(this).parents('tr').addClass('selected');
			});

			//check both table header and footer
			parentTable.find('.checkall').each(function(){ jQuery(this).attr('checked',true); });

		} else {

			//uncheck all rows in table
			ch.each(function(){
				jQuery(this).attr('checked',false);
				jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
				jQuery(this).parents('tr').removeClass('selected');
			});

			//uncheck both table header and footer
			parentTable.find('.checkall').each(function(){ jQuery(this).attr('checked',false); });
		}
	});


	///// PERFORMS CHECK/UNCHECK BOX /////
	jQuery('.stdtablecb tbody input[type=checkbox]').click(function(){
		if(jQuery(this).is(':checked')) {
			jQuery(this).parents('tr').addClass('selected');
		} else {
			jQuery(this).parents('tr').removeClass('selected');
		}
	});

	///// DELETE SELECTED ROW IN A TABLE /////
	jQuery('.deletebutton').click(function(){
		var tb = jQuery(this).attr('title');							// get target id of table
		var id = '';
		var sel = false;												//initialize to false as no selected row
		var ch = jQuery('#'+tb).find('tbody input[type=checkbox]');		//get each checkbox in a table
		//check if there is/are selected row in table
		ch.each(function(k,v){
			if(jQuery(this).is(':checked')) {
				id = $(v).val()+',';
					sel = true;									//set to true if there is/are selected row
					$.ajax({
							type:'get',
							dataType:'json',
							url:'role_delete',
							data:{role_id:id},
							success:function(data){
								if(data.status == 1){
									$('#edit').removeClass('edit');
									$('#edit').addClass('notibar msgsuccess');
									$('#edit').html('<p> '+data.msg +'<script>setTimeout(function(){window.location.reload();},2000)</script></p>');
								}else{
									$('#edit').removeClass('edit');
									$('#edit').addClass('notibar msgalert');
									$('#edit').html('<p> '+data.msg +'<script>setTimeout(function(){window.location.reload();},2000)</script></p>')
								}
							}
					});
				jQuery(this).parents('tr').fadeOut(function(){
					jQuery(this).remove();								//remove row when animation is finished
				});
			}
		});

		if(!sel) {
			$('#edit').removeClass('edit');
			$('#edit').addClass('notibar msgalert');
			$('#edit').html('<p> '+'请选择要删除的种类' +'<script>setTimeout(function(){window.location.reload();},2000)</script></p>')
		}

		return false;
	});


	///// DELETE INDIVIDUAL ROW IN A TABLE /////
	jQuery('.stdtable a.delete').click(function(){
		var c = confirm('确认要删除吗?');
		if(c){
			var	id = $(this).attr('data-id');
			$.ajax({
				type:'get',
				data:{role_id:id},
				dataType:'json',
				url:'role_delete',
				success:function(data){
					if(data.status == 1){
						$('#edit').removeClass('edit');
						$('#edit').addClass('notibar msgsuccess');
						$('#edit').html('<p> '+data.msg +'<script>setTimeout(function(){window.location.reload();},2000)</script></p>')
					}else{
						$('#edit').removeClass('edit');
						$('#edit').addClass('notibar msgalert');
						$('#edit').html('<p> '+data.msg +'<script>setTimeout(function(){window.location.reload();},2000)</script></p>')
					}
				}
			});
				jQuery(this).parents('tr').fadeOut(function(){
				jQuery(this).remove();
			});
		}else{
			$('#edit').removeClass('edit');
			$('#edit').addClass('notibar msgalert');
			$('#edit').html('<p> '+'你点取消了不能删除' +'<script>setTimeout(function(){window.location.reload();},2000)</script></p>')
		}



		return false;
	});

	///// GET DATA FROM THE SERVER AND INJECT IT RIGHT NEXT TO THE ROW SELECTED /////
	jQuery('.stdtable a.toggle').click(function(){

		//this is to hide current open quick view in a table
		jQuery(this).parents('table').find('tr').each(function(){
			jQuery(this).removeClass('hiderow');
			if(jQuery(this).hasClass('togglerow'))
				jQuery(this).remove();
		});

		var parentRow = jQuery(this).parents('tr');
		var numcols = parentRow.find('td').length + 1;				//get the number of columns in a table. Added 1 for new row to be inserted
		var url = jQuery(this).attr('href');

		//this will insert a new row next to this element's row parent
		parentRow.after('<tr class="togglerow"><td colspan="'+numcols+'"><div class="toggledata"></div></td></tr>');

		var toggleData = parentRow.next().find('.toggledata');

		parentRow.next().hide();

		//get data from server
		jQuery.post(url,function(data){
			toggleData.append(data);						//inject data read from server
			parentRow.next().fadeIn();						//show inserted new row
			parentRow.addClass('hiderow');					//hide this row to look like replacing the newly inserted row
			jQuery('input,select').uniform();
		});

		return false;
	});


	///// REMOVE TOGGLED QUICK VIEW WHEN CLICKING SUBMIT/CANCEL BUTTON /////
	jQuery('.toggledata button.cancel, .toggledata button.submit').live('click',function(){
		jQuery(this).parents('.toggledata').animate({height: 0},200, function(){
			jQuery(this).parents('tr').prev().removeClass('hiderow');
			jQuery(this).parents('tr').remove();
		});
		return false;
	});



	jQuery('#dyntable').dataTable({
		"sPaginationType": "full_numbers"
	});

	jQuery('#dyntable2').dataTable({
		"sPaginationType": "full_numbers",
		"aaSortingFixed": [[0,'asc']],
		"fnDrawCallback": function(oSettings) {
            jQuery('input:checkbox,input:radio').uniform();
			//jQuery.uniform.update();
        }
	});


	///// TRANSFORM CHECKBOX AND RADIO BOX USING UNIFORM PLUGIN /////
	jQuery('input:checkbox,input:radio').uniform();


});
