(function() {

    
    $(document).ready(function() {

        $("#aside-open").click(function() {
            $("#sidebar").addClass("active");

            $(this).hide("fast");
            $("#aside-close").delay(250).show("slow");
        });

        $("#aside-close").click(function() {
            $("#sidebar").removeClass("active");
            
            $(this).hide("fast");
            $("#aside-open").delay(250).show("slow");
        });

    });

}) ();