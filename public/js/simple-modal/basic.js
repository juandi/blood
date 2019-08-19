/*
 * SimpleModal Basic Modal Dialog
 * http://simplemodal.com
 *
 * Copyright (c) 2013 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 */

jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#basic-modal .basic').click(function (e) {
		$('#basic-modal-content').modal();

		return false;
	});


	$('.link').click(function(){
        var src = $(this).data("href");
        alert(src);
        $.modal('<iframe src="' + src + '" height="450" width="830" style="border:0">', {
            closeHTML:"",
            containerCss:{
                backgroundColor:"#fff",
                borderColor:"#fff",
                height:450,
                padding:0,
                width:830
            },
            overlayClose:true
        });
    });

});