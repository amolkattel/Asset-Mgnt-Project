$(function(){
	if($.isFunction($.fn.chosen))
	{
		$('.chosen-input').chosen();
	}
	if($.isFunction($.fn.inputmask))
	{
		$(".datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
		$(".ssnmask").inputmask("999-99-9999",{placeholder:"xxx-xx-xxxx"});
	}

	$('a.confirm.btn').on('click', function(e){
		e.preventDefault();
		var $delButton = $(this);
		var delTitle = $(this).data('title') || "Are you sure?";
		var delText = $(this).data('text') || "You will not be able to recover this item!";
		var delButtonText = $(this).data('deltext') || 'Yes, delete it!';
		swal({
			title: delTitle,
			text: delText,
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: delButtonText,
			closeOnConfirm: false
		},
		function(){
			location.href = $delButton.attr("href");
		});
	});
});