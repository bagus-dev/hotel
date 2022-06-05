    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
	    $(window).load(function(){
			$('.flexslider').flexslider({
			    animation: "slide",
				start: function(slider){
					$('body').removeClass('loading');
				}
			});
		});
	</script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
		});
	</script>
    <link rel="stylesheet" href="css/swipebox.css">
	<script src="js/jquery.swipebox.min.js"></script> 
	<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
	</script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){		
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <script src="js/responsiveslides.min.js"></script>
    <script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
				auto: true,
				pager:true,
				nav:false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
					
		});
	</script>
    <script src="js/main.js"></script>
    <script src="js/easy-responsive-tabs.js"></script>
    <script>
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
    </script>
    <script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
    <div class="arr-w3ls">
        <a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	<script src="js/bootbox.min.js"></script>
	<script>
        var picture = "<?php echo $_SESSION["photo"]; ?>";
        $(document).on("click", ".confirm", function(e){
            e.preventDefault();
            bootbox.confirm({
                title: "<i class='fa fa-sign-out'></i> Logout",
                message: "<center><img src='http://localhost/tugas_hotel/images/user/"+picture+"' class='img-fluid rounded-circle w-50'><br><h3><strong>Logout Now?</strong></h3></center>",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Yes'
                    }
                },
                callback: function (result){
                    if(result == true){
                        window.location.href = "http://localhost/tugas_hotel/logout";
                    }
                }
            });
        });
    </script>
</body>
</html>