$(document).ready(function(){
    var title = $("#frame_id").contents().find("title").html();
    console.log('frame.js: ', title);
    $(document).find("title").html(title);
	$('#page-name').html(title);

	$("#frame_id").contents().find("head").append('<style id="style_sp-config">.highlight_sp-config{transition: outline 1s ease-out;} .highlight_sp-config:hover{outline: 1px solid #222222;} </style>');
	
	$('#save-form').submit(function(event) {
		$("#frame_id").contents().find("head").find('style').remove();
		event.preventDefault();
        console.log("constructor-menu.js: saved");

        let params = (new URL(document.location)).searchParams; 
		console.log(params.get("class"));

		var postForm = {
            'content': $("#frame_id").contents().find("*").html(),
            'url': params.get("class")
        };

        console.log(postForm);
        
        $.ajax({
        	url: 'edit-menu.php',
        	type:"POST",
        	data: postForm,
        	success: function(data) {
        		window.location.href = "/dashboard.php";
        		$('#frame_id')[0].contentWindow.location.reload(true);
                console.log(data);
            },
            error: function(data) {
            	alert('error');
            }
        });
        
    });

	var body = $("#frame_id").contents();
	
   	body.click(function( event ) {
   		console.log('frame.js: clicked');
   		$("#frame_id").css("margin-top", "0px");
    	target = $(event.target);
    	$(".header").hide("fast");
        $(".edit-content").show("fast");
        //$(event.target).addClass('highlight_sp-config');

    	if (target.is( "div" ) && target.css("background-image") != 'none') {
    		console.log('frame.js: target(div background-image)', target);
    		$(".edit-content__edit-text").hide("fast");
        	$(".edit-content__edit-image").show("fast");

        	src = $(event.target).attr('style').split('(');
			url = src[src.length - 1].slice(0,-1);
	    	$(".preview-text").text(url);

	    	// fix when adding multiple projects
	    	$('.preview').attr('src', 'source/' + url);
        	
    	} else if (target.is( "p" )) {
    		
        	console.log('frame.js: target(p):', target);
        	$(".edit-content__edit-image").hide("fast");

			$(".edit-text__input").val(target.html());
        	$(".edit-content__edit-text").show("fast");

        	$('.nav_accept').click(function() {        
		        target.text($(".edit-text__input").val());

		    });
    	} else if (target.is( "div" ) && target.css("background-image") == 'none') {
    		console.log("click div");
    	}
	}).mouseover(function ( event ) {
	    $(event.target).addClass('highlight_sp-config');
	}).mouseout(function ( event ) {
	    $(event.target).removeClass('highlight_sp-config');
	});

	$(':file').on('change', function(){
		console.log("file chosen");

	    var fd = new FormData();
	    var files = $('#file')[0].files;
	    
	    // Check file selected or not
	    if(files.length > 0 ){
	       fd.append('file', files[0]);

	       $.ajax({
	          url: 'upload.php',
	          type: 'post',
	          data: fd,
	          contentType: false,
	          processData: false,
	          success: function( response ) {
	             if(response != 0) {
	                $(".preview").attr("src", response);
					$(".preview-text").text(url);
					var filename = $('input[type=file]').val().split('\\').pop();
					$(".preview-text").text(filename);
					console.log('frame.js: file', filename);
					$('.nav_accept').click(function( event ) {
						console.log('frame.js: target(accept)', target);
				    	$(target).attr('style', 'background: url(assets/img/' + filename + ')'); //  no-repeat; background-size:contain;
				    });
	                
	             } else{
	                alert('File not uploaded');
	             }
	          },
	       });
	    } else {
	       alert("Please select a file.");
	    }
	});
});