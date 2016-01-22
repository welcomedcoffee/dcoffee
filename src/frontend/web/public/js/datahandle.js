/**
 * @数据处理库 User: js Date: 15-11-11 Desc: 统一处理ajax数据的处理
 */
GLOBAL.namespace('dataStore.dataHandle', function() {
	this.getData = function(args) {
		$.ajax({
			type : 'GET',
			url : args.url,
			async : args.async != undefined ? args.async : true,
			cache : false,
			data : args.parame != undefined ? args.parame : '',
			success : function(result) {
				while (result.match(/\r/) || result.match(/\n/)) {
					result = result.replace(/\r/, '').replace(/\n/, '');
				}
				if (result.success == 'false') {
					args.success(result.errorMessage);
				} else {
					args.success(eval('(' + result + ')').DATA
							|| eval('(' + result + ')') || result);
				}
			},
			error : function(err, e, a) {
				alert('温馨提示：您的网络不给力啊！一会儿再试试！');
			}
		});
	}

	this.postData = function(args) {
		$.ajax({
			type : 'POST',
			url : args.url,
			async : args.async != undefined ? args.async : true,
			cache : false,
			data : args.parame != undefined ? args.parame : '',
			success : function(result) {
				if (result.success) {
					args.success(result);// 反映出对应的操作
				} else {
					if(result.errorMessage.indexOf('Error updating database')>-1)
					{
						result.errorMessage='输入的内容格式不合法哦!!!';
					}
					args.error(result.errorMessage); // 反映出对应的错误信息
				}

				// {"message":null,"errorCode":"reg.tel.empty",
				// "success":false,"errorMessage":"reg.tel.empty","data":null}
				/*
				 * if (!result.Success) { args.success(result.errorMessage); }
				 * else { args.success(result.data); }
				 */

				;
			},
			error : function(err, e, a) {
				alert('温馨提示：您的网络不给力啊！一会儿再试试！');
			}
		});
	}
});