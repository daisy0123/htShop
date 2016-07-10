$(function() {
	$("#phone").click(function() {
		$("#rphone").show();
		$("#remail").hide();
	});
	$("#email").click(function() {
		$("#remail").show();
		$("#rphone").hide();
	});
	$("form :input[type=text],form :input[type=password]").blur(function() {
		var $parent = $(this).parent();
		$parent.find('.formtips').remove();
		if ($(this).is('#tele')) {
			if (this.value == "" || this.value.length < 11) {
				var errorMsg = '请输入有效的 11位数字！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			} else {
				var okMsg = '输入正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			}
		}
		if ($(this).is('#uname')) {
			if (this.value == "" || this.value.length < 3) {
				var errorMsg = '请输入正确的用户名(用户名要超过3位数)！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			} else {
				var okMsg = '输入正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			}
		}
		if ($(this).is('#ename')) {
			if (this.value == "" || this.value.length < 3) {
				var errorMsg = '请输入正确的用户名(用户名要超过3位数)！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			} else {
				var okMsg = '输入正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			}
		}
		if ($(this).is('#em')) {
			if (this.value == "" || (this.value != "" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value))) {
				var errorMsg = '请输入正确的邮箱地址！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			} else {
				var okMsg = '输入正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			}
		}
		if ($(this).is('#epsd')) {
			if (this.value == "") {
				var errorMsg = '密码不能为空！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			} else {
				var okMsg = '输入正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			}
		}
		if ($(this).is('#econfirm')) {
			var num = $('#epsd').val();
			if (this.value == num && this.value != "") {
				var okMsg = '密码正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			} else {
				var errorMsg = '两次输入密码不同！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			}
		}
		if ($(this).is('#rpsd')) {
			if (this.value == "") {
				var errorMsg = '密码不能为空！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			} else {
				var okMsg = '输入正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			}
		}
		if ($(this).is('#uaddress')) {
			if (this.value == "") {
				var errorMsg = '地址不能为空！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			} else {
				var okMsg = '输入正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			}
		}
		if ($(this).is('#eaddress')) {
			if (this.value == "") {
				var errorMsg = '地址不能为空！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			} else {
				var okMsg = '输入正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			}
		}
		if ($(this).is('#rconfirm')) {
			var num = $('#rpsd').val();
			if (this.value == num && this.value != "") {
				var okMsg = '密码正确！';
				$parent.append('<span class="formtips onSuccess">' + okMsg + '</span>');
			} else {
				var errorMsg = '两次输入密码不同！';
				$parent.append('<span class="formtips onError">' + errorMsg + '</span>');
			}
		}
	}).keyup(function() {
		$(this).triggerHandler('blur');
	}).focus(function() {
		$(this).triggerHandler('blur');
	});
	$(".sub").click(function() {
		$("form.pform :input").trigger('blur');
		var numError = $('form.pform .onError').length;

		if (numError) {
			alert('你没有填写完信息！');
			return false;
		}

	});
	$(".rsub").click(function() {
		$("form.eform :input").trigger('blur');
		var numError = $('form.eform .onError').length;

		if (numError) {
			alert('你没有填写完信息！');
			return false;
		}

	});
	
	/**/
	$("[class=check]:checkbox").click(function() {
		var flag = true;
		var ogmoney = 0;
		var ocount=0;
		$('[class=check]:checkbox').each(function() {
			if (!this.checked) {
				flag = false;
			} else {
				var oprice = $(this).parent().siblings('.tmoney').children('b').text();
				if (this.checked) {
					ogmoney =ogmoney + Number(oprice);
					ocount++;
				}
			}
		});
		$(".mtotal").val(ogmoney);
			$("#li11").children('b').text(ocount);
		$("#secheck").prop('checked', flag);
	});
	$("#secheck").click(function() {
		var omoney = 0;
		var count=0;
		if (this.checked) {
			$('[class=check]:checkbox').prop('checked', true);

			$('[class=check]:checkbox').each(function() {
				var ogprice = $(this).parent().siblings('.tmoney').children('b').text();
				omoney = omoney + Number(ogprice);
				count++;
			});
		} else {
			$('[class=check]:checkbox').prop('checked', false);
		}
		$(".mtotal").val(omoney);
		$("#li11").children('b').text(count);
	});

	/**/
	var value=$('.count').val();
    var count=1;
$('.oper').click(function(){
	if($(this).is('#less')){
		if(count){
			count--;
		}
	}
	if($(this).is('#more')){
		count++;
	}
	value=count;
	$('.count').val(value);
});


});
