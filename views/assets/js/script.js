$(document).ready(function(){

/* ===========================================
    SIDEBAR
    =========================================== */
    $("#sidebar").mCustomScrollbar({
             theme: "minimal"
        });

    $('#dismiss, .overlay').on('click', function () {
        // hide sidebar
        $('#sidebar').removeClass('active');
        // hide overlay
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('.overlay').toggleClass('active');
    });

/* ===========================================
    TIMELINE
    =========================================== */

    if ( $('#timeline-list-elem-wrapper').length > 0 ) {

        var timelineTriggered = false;

        var timelineOffset = parseInt($('#timeline-list-elem-wrapper').offset().top) - ($('#timeline-list-elem-wrapper').height() * 1.3);


        $(window).scroll(function(){

            if( $(window).scrollTop() >= timelineOffset && timelineTriggered == false ){
                timelineTriggered = true;

                $('#timeline-list-elem').addClass('timeline-list');
                $('#timeline-list-elem').show();

            }
        });

    }


/* ===========================================
    DOG IMAGE FILE UPLOAD BUTTON
    =========================================== */

    var inputs = document.querySelectorAll( '.inputfile' );
    Array.prototype.forEach.call( inputs, function( input )
    {
    	var label = input.nextElementSibling,
    		labelVal = label.innerHTML;

    	input.addEventListener( 'change', function( e )
    	{
    		var fileName = '';
    		if( this.files && this.files.length > 1 )
    			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
    		else
    			fileName = e.target.value.split( '\\' ).pop();

    		if( fileName )
    			label.querySelector( 'span' ).innerHTML = fileName;
    		else
    			label.innerHTML = labelVal;
    	});
    });

/* ===========================================
    PLUS / MINUS ICONS
    =========================================== */

    $('#password-reset-btn').click(function(){

    });


/* ===========================================
    DELETE DOG POST
    =========================================== */
    $('.delete-btn').click(function(){
        if( !confirm('Are you sure you want to delete this?') ){
            return false;
        }
    });



}); // END DOCUMENT READY

/* ===========================================
    REPLACE PLACEHOLDER DOG IMG WITH PREVIEW
    =========================================== */

    function previewFile(){

        var preview = document.getElementById('dog-img-preview');
        var file = document.getElementById('file-with-preview').files[0];

        var reader = new FileReader();

        reader.onloadend = function(){
            preview.src = reader.result;
        }

        if(file) {
            reader.readAsDataURL(file);
        }else{
            preview.src = "";
        }

    }

/* ===========================================
    REPLACE PROFILE IMG WITH PREVIEW
    =========================================== */

    function previewProfileFile(){

        var preview = document.getElementById('breeder-img');
        var file = document.getElementById('file-with-preview').files[0];

        var reader = new FileReader();

        reader.onloadend = function(){
            preview.src = reader.result;
        }

        if(file) {
            reader.readAsDataURL(file);
        }else{
            preview.src = "";
        }

    }


    /* ===========================================
        TEXTAREA CHARACTER COUNTER
        =========================================== */
        function countChar(val) {
            var len = val.value.length;
            if (len >= 500) {
                val.value = val.value.substring(0, 500);
            }else{
                $('#charNum').text(500 - len);
            }
        };
