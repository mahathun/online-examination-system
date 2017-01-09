
    $(function(){
    $("[data-hide]").on("click", function(){
        $(this).closest("." + $(this).attr("data-hide")).hide();
    });
	});

	function errorshow(){
		
			$("#error").attr("style", "display:block");		
		}
		
		function checkForm(f){
			var username = $("#user").val();
			var password = $("#password").val();
   		 if (username == "" || password==""){
       		 errorshow();
        		 return false;
    		}else{
        		f.submit();
        		return false;
    		}
		}
