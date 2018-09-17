jQuery(document).ready(function($){
  
      // jQuery Finder
      $("#cpsearchqna").keyup(function(){
        var _cpsearch = $("#cpsearchqna").val();
            if( _cpsearch != '' ){
                $.post(
                CPfinder.ajaxurl,
                { 
                    action   : 'createplugin_atf_finder',
                    cpsearch : _cpsearch
                },
                function( response ){
                     $("#cpresultqna").html(response);
                     $(".cp_main").width('26%');
                     $( ".cp_main" ).removeClass( "cploading" );
                     $( ".cp_main" ).addClass( "cploaded" );
                });
            }else{
                $("#cpresultqna").html("");
                $(".cp_main").width('11%');
                $( ".cp_main" ).removeClass( "cploaded" );
            }
    	return false;
      });
  
     // jQuery Loading  
     $("#cpsearchqna").keyup(function(){
        var _ctsearch = $("#cpsearchqna").val();
            if( _ctsearch != '' ){
                $( ".cp_main" ).addClass( "cploading" );
            }
    	return false;
      });
  
    // jQuery Loading 
    $( "#cp-loaded-content" ).click(function() {
        $( ".cp_main" ).toggleClass( "cpactive" );
    });

    // jQuery on escape
    $(document).ready(function() {
        $('#cpsearchqna').keyup(function(e){
            if(e.keyCode == 27) {
                $(this).val('');
            }
        });
    });
 
});