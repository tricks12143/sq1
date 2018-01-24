$( document ).ready(function() {

	/**Ticket function**/
	getticket();
	gettotalhrticket();
	gettotalinticket();
	getlogticket();

    $('#sq1-ticket-form').submit(function(e){
    	e.preventDefault();
    	$.ajax({
            type:"GET",
            url: './createticket',
            data:$('#sq1-ticket-form').serialize(), // it will serialize the form data
            success:function(data){

                $('#sq1-ticket-form')[0].reset();
                $("div.ticket-holder").html(data);
            }
        });
    });

    function getticket(){

    	$.ajax({
	    	type:"GET",
	        url: './getticket',
	        success:function(data){
	            $("div.ticket-holder").html(data);
	        }
	    });
    }

    function gettotalhrticket(){

    	$.ajax({
	    	type:"GET",
	        url: './gettotalhrticket',
	        success:function(data){
	            $("div.total-hours").html(data);
	        }
	    });
    }

    function gettotalinticket(){

    	$.ajax({
	    	type:"GET",
	        url: './gettotalinticket',
	        success:function(data){
	            $("div.grand-total").html(data);
	        }
	    });
    }

    function getlogticket(){
    	$.ajax({
	    	type:"GET",
	        url: './getlogticket',
	        success:function(data){
	            $("div.get-ticket-log").html(data);
	        }
	    });
    }
    /**end**/

    /**Blog function**/
	$('#blogtable').DataTable();
	getblogs();
	getthumbblogs();

	function readURL(input) {

	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#blog_preview').attr('src', e.target.result);
	    }

	    reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#blog_img").change(function() {
	  readURL(this);
	});

	$('#re-img').on('click', function(){
		$("#blog_img").val('');
		$('#blog_preview').attr('src', "");
	});

	function getblogs(){
		$.ajax({
	    	type:"GET",
	        url: './getblogs',
	        success:function(data){
	            $("tbody.blogs-post-cotainer").html(data);
	        }
	    });
	}

	function getthumbblogs(){
		$.ajax({
	    	type:"GET",
	        url: './getthumbblogs',
	        success:function(data){
	            $(".blog-thumbs-container").html(data);
	        }
	    });
	}

	/*
	$('#requestblogform').submit(function(e){
		e.preventDefault();
		$.ajax({
            type:"POST",
            url: './insertblog',
            data:[$('#requestblogform').serialize()], // it will serialize the form data
            success:function(data){

            	$("div.alert-container").html(data);

                $('#srequestblogform')[0].reset();
            }
        });
	});*/
});