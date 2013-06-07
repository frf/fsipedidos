
$(document).ready(function(){
	
	$('input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
      
      $("#basic_validate_produto").validate({
               
		rules:{
			no_produto:{
				required:true
			}
		},
                groups: {
                   documento: "cpf cnpj"
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
	// Form Validation
        $("#basic_validate_cliente").validate({
               
		rules:{
			no_cliente:{
				required:true
			},
			pessoa_tipo:{
				required:true
			},
			date:{
				required:true,
				date: true
			},
			cpf:{
				required:true
			},
			cnpj:{
				required:true
			}
		},
                groups: {
                   documento: "cpf cnpj"
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
        $("#basic_validate_representada").validate({
		rules:{
			r_social:{
				required:true
			},
			no_representada:{
				required:true
			},
			cnpj:{
				required:true
			},
			nu_comissao:{
				required:true
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
			DsSenha:{
				required: true,
				minlength:6,
				maxlength:20
			},
			DsSenha2:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#DsSenha"
			},
			DsEmail:{
				required:true,
                                email:true
			},
			NoColaborador:{
				required:true
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
