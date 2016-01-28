//获取凭证
function getSign()
{
	var result = $.ajax({
		url: '/index.php?r=student/card',
		async: false,
		dataType: 'json',
	
	}).responseText;
	return eval ("(" + result + ")")
}


//上传身份证正面
$(function () {
	var bar = $('#card-front .bar');
	var percent = $('#card-front .percent');
	var progress = $("#card-front .progress");
	var btn = $("#card-front .btn span");
	var frontImg = $('#front-img');

	$("#front-upload").wrap("<form id='front-form' action='action.php' method='post' enctype='multipart/form-data'></form>");
    $("#front-upload").change(function(){
		//构造凭证参数
		var sign = getSign();
		
		$("#front-form").prepend("<input type='hidden' name='key' value='" + sign.dir + "'><input type='hidden' name='policy' value='" + sign.policy + "'><input type='hidden' name='OSSAccessKeyId' value='" + sign.accessid + "'><input type='hidden' name='success_action_status' value='200'><input type='hidden' name='callback' value='" + sign.callback + "'><input type='hidden' name='signature' value='" + sign.signature + "'>");
		$("#front-form").attr({'action': sign.host})

		$("#front-form").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
				progress.show();
        		var percentVal = '0%';
        		bar.width(percentVal);
        		percent.html(percentVal);
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		var percentVal = percentComplete + '%';
        		bar.width(percentVal);
        		percent.html(percentVal);
    		},
			success: function(data) {
				//删除之前构造的隐藏域
				$('#card-front input[type=hidden]').remove();
				//添加上传后保存路径信息
				var fileInfo = '<input type="hidden" value="' + sign.dir + '" />';
				$("#card-front").prepend(fileInfo);
				var img = sign.bindUrl + sign.dir + '?' + new Date().getTime();
				frontImg.attr({'src':img});
			},
			error:function(xhr){
				alert('上传失败！');
				bar.width('0')
			}
		});
	});
});

//上传身份证反面
$(function () {
	var bar = $('#card-backend .bar');
	var percent = $('#card-backend .percent');
	var progress = $("#card-backend .progress");
	var btn = $("#card-backend .btn span");
	var frontImg = $('#backend-img');

	$("#backend-upload").wrap("<form id='backend-form' action='action.php' method='post' enctype='multipart/form-data'></form>");
    $("#backend-upload").change(function(){
		//构造凭证参数
		var sign = getSign();
		
		$("#backend-form").prepend("<input type='hidden' name='key' value='" + sign.dir + "'><input type='hidden' name='policy' value='" + sign.policy + "'><input type='hidden' name='OSSAccessKeyId' value='" + sign.accessid + "'><input type='hidden' name='success_action_status' value='200'><input type='hidden' name='callback' value='" + sign.callback + "'><input type='hidden' name='signature' value='" + sign.signature + "'>");
		$("#backend-form").attr({'action': sign.host})

		$("#backend-form").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
				progress.show();
        		var percentVal = '0%';
        		bar.width(percentVal);
        		percent.html(percentVal);
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		var percentVal = percentComplete + '%';
        		bar.width(percentVal);
        		percent.html(percentVal);
    		},
			success: function(data) {
				//删除之前构造的隐藏域
				$('#card-backend  input[type=hidden]').remove();
				//添加上传后保存路径信息
				var fileInfo = '<input type="hidden" name="card-backend" value="' + sign.dir + '" />';
				$("#card-backend").prepend(fileInfo);
				var img = sign.bindUrl + sign.dir + '?' + new Date().getTime();
				frontImg.attr({'src':img});
			},
			error:function(xhr){
				alert('上传失败！');
				bar.width('0')
			}
		});
	});
});