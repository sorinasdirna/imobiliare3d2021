$(document).ready(function(){
	/// check current password is correct or not
	$("#pwd_current").keyup(function () {
		var pwd_current=$("#pwd_current").val();
		$.ajax({
            type:'get',
            url:'/admin/check-pwd',
            data:{pwd_current:pwd_current},
            success:function(resp){
                if(resp=="false"){
                    $("#chkPwd").html("<span style='color: red; font-weight: bold;'>Parola curenta este incorecta</span>");
                }else if(resp=="true"){
                    $("#chkPwd").html("<span style='color: green;font-weight: bold;'>Parola curenta este corecta</span>");
                }
            },error:function(){
                alert("Error Ajax");
            }
        });
	});
	////// Check Category name is exist or not
	$("#name").keyup(function () {
		var category_name=$("#name").val();
		$.ajax({
			type:'get',
			url:'/admin/check_category_name',
			data:{name:category_name},
			success:function (resp) {
				/*if(resp=="false"){
					$("#chCategory_name").html("<span style='color: green;'>Categoria este OK</span>");
				}else if(resp=="true"){
                    $("#chCategory_name").html("<span style='color: red;'>Categorie deja existenta.</span>");
				}*/
				if(resp=="true"){
                    $("#chCategory_name").html("<span style='color: red;'>Categorie deja existenta.</span>");
				}
            },error:function () {
				alert("Error Ajax");
            }
		});
	});
	////// Check code is exist or not
	$("#p_code").keyup(function () {
		var product_code=$("#p_code").val();
		$.ajax({
			type:'get',
			url:'/admin/check_product_code',
			data:{p_code:product_code},
			success:function (response) {
				if(response=="true"){
                    $("#chProduct_code").html("<span style='color: red;'>Cod intern deja existent.</span>");
				}
            },error:function () {
				alert("Error Ajax");
            }
		});
    });
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			name:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
            pwd_current:{
                required: true,
                minlength:6,
                maxlength:20
            },
            pwd_new:{
				required: true,
				minlength:6,
				maxlength:20
			},
            pwdnew_confirm:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#pwd_new"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});
