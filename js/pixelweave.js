(function() {

    $(document).ready(function() {

        $("#btn-darkmode").click(function() {
            $(this).toggleClass("active");
            $("body").toggleClass("dark");
        });

        $("a").click(function(event) {
            if($(this).hasClass("actual")) {
                event.preventDefault();
                subirAlCielo();
            } 
            else {
                var href = $(this).attr("href");
    
                if(href.charAt(0) == '#') {
                    event.preventDefault();
                    var height = $("header").outerHeight();
                    
                    $("body, html").animate({
                        scrollTop: $(href).offset().top - height - 10
                    }, 500);
                }
            }
        });

        $("header nav a").click(function() {
            if($(window).width() <= 480) {
                $("#btn-menu").click();
            }
        });

        $("aside a").click(function() {
            if($(window).width() <= 480) {
                $("#aside-close").click();
            }
        })

        $("#btn-menu").click(function() {
            $("header nav").toggleClass("oculto");
        });

        $("#btn-subirAlCielo").click(subirAlCielo);

        // $(".modal-fuera").click(function() {
        //     $(this).addClass("oculto");
        // });

        $(".modal-fuera > div > .exit").click(function() {
            $(".modal-fuera").addClass("oculto");
        });


        $(".btn-modal").click(function() {
            var modal_id = $(this).attr("for");
            // console.log(modal_id);
            $("#"+modal_id+".modal-fuera").removeClass("oculto");
        });

        // $("#btn-modal1").click(function() {
        //     $("#modal1.modal-fuera").removeClass("oculto");
        // });
        // $("#btn-modal2").click(function() {
        //     $("#modal2.modal-fuera").removeClass("oculto");
        // });
        // $("#btn-modal3").click(function() {
        //     $("#modal3.modal-fuera").removeClass("oculto");
        // });

        // $("input[type='checkbox'").click(function() {
        //     $(this).css("transform", "scale(1.5)");
        // });

        // $(window).resize(function() {
        //     if($(window).width() <= 800) {
        //         $("header nav").height(
        //             $(window).height() - $("header").height()
        //         );
        //     }
        // });
    });

    function subirAlCielo() {
        $("body, html").animate({
            scrollTop: 0
        }, 500);  
    }

    function menus(){
        let Desplazamiento_Actual = window.pageYOffset;

        if(Desplazamiento_Actual <= 150){
            $("header").removeClass("nav2");
            $("header nav").css("top", "80px");
            $("#btn-subirAlCielo").hide("slow");
        }else{
            $("header").addClass("nav2");
            $("header nav").css("top", "100px");
            $("#btn-subirAlCielo").show("slow");
        }
    }

    window.addEventListener('load', menus);
    window.addEventListener('scroll', menus);


    

})();