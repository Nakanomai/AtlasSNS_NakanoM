$(function(){
	$('.js-modal-open').on('click',function(){
		$('.js-modal').fadeIn();
		var list_id=$(this).attr('list_id'); //$(this) js-modal-openのこと
		var post=$(this).attr('post');
		console.log(list_id);
		$('.upPost').val(post);
		$('.post_id').val(list_id);
		return false;
	});
	$('.js-modal-close').on('click',function(){
		$('.js-modal').fadeOut();
		return false;
	});
});
