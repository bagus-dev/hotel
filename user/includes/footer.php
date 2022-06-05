    <div class="copy">
        <p>&copy; 2017 REGAL RAYA. All Rights Reserved | Design By <a href="index">REGAL RAYA</a></p>
    </div>
    
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script>
        function checkphone(){
            var phone = document.getElementById("phone").value;
            var phoneText = document.getElementById("phone");
            var phoneSpan = document.getElementById("phoneSpan");

            if(phone.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "checkdata",
                    data: "user_phone="+phone,
                    success: function (response){
                        $("#phoneSpan").html(response);
                        if(response=="<i class='fa fa-check'></i> Phone Number can be used."){
                            phoneSpan.innerHTML = "";
                            phoneText.style.border = "2px solid green";
                            return true;
                        }
                        else{
                            phoneText.style.border = "2px solid red";
                            return false;
                        }
                    }
                });
            }
            else{
                $("#phoneSpan").html("");
                return false;
            }
        }

        function checkall(){
            var phonehtml = document.getElementById("phoneSpan").innerHTML;

            if(phonehtml == ""){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    <script>
        function checkpass(){
            var password = document.getElementById("password").value;
            var passwordText = document.getElementById("password");
            var passwordSpan = document.getElementById("passwordSpan");

            if(password.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "checkpassword",
                    data: "user_password="+password,
                    success: function(response){
                        $("#passwordSpan").html(response);
                        if(response=="OK"){
                            passwordSpan.innerHTML = "";
                            passwordText.style.border = "2px solid green";
                            return true;
                        }
                        else{
                            passwordText.style.border = "2px solid red";
                            return false;
                        }
                    }
                });
            }
            else{
                $("#passwordSpan").html("");
                return false;
            }
        }

        function checknew(){
            var passNew = document.getElementById("new_password").value;
            var passNewText = document.getElementById("new_password");
            var passNewSpan = document.getElementById("new_passwordSpan");

            var confirm = document.getElementById("confirm").value;

            if(passNew.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "checkpassword",
                    data: "new_password="+passNew,
                    success: function(response){
                        $("#new_passwordSpan").html(response);
                        if(response=="OK"){
                            passNewSpan.innerHTML = "";
                            passNewText.style.border = "2px solid green";
                            return true;
                        }
                        else{
                            passNewText.style.border = "2px solid red";
                            return false;
                        }
                    }
                });
            }
            else{
                $("#new_passwordSpan").html("");
                return false;
            }
        }

        function checkconfirm(){
            var confirm = document.getElementById("confirm").value;
            var confirmText = document.getElementById("confirm");
            var confirmSpan = document.getElementById("confirmSpan");

            var newPass = document.getElementById("new_password").value;

            if(confirm.trim() !== ""){
                $.ajax({
                    type: "POST",
                    url: "checkpassword",
                    data: "confirm="+confirm, 
                    success: function(response){
                        $("#confirmSpan").html(response);
                        if(response=="OK"){
                            confirmSpan.innerHTML = "";
                            confirmText.style.border = "2px solid green";
                            return true;
                        }
                        else{
                            confirmText.style.border = "2px solid red";
                            return false;
                        }
                    }
                });
            }
            else{
                $("#confirmSpan").html("");
                return false;
            }
        }

        function checkall(){
            var password = document.getElementById("passwordSpan").innerHTML;
            var newPassword = document.getElementById("new_passwordSpan").innerHTML;
            var confirm = document.getElementById("confirmSpan").innerHTML;

            if((password && newPassword && confirm) == ""){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/jquery-ui.js"></script>
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
    <script src="js/main.js"></script>
    <div class="arr-w3ls">
        <a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	<script src="js/bootbox.min.js"></script>
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <script src="datatable/jquery.dataTables.js"></script>
    <script src="datatable/datatables.js"></script>
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
    <script>
        $(document).ready(function (){
            $("#table-datatable").DataTable();
        });
    </script>
</body>
</html>