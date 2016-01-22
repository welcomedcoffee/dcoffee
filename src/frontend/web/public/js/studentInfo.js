/**
 * @学生基本资料页面
 * @CodeBy:js
 * @Date:2015/11/14
 */
GLOBAL.pagebase.add({


    imgBtnCick: function (reg, btn, type) {
        var btnid = btn,interval;  
        new AjaxUpload(btnid, {
            action: reg + '/picture_' + type,
            data: {},
            responseType: 'json',
            name: 'file',
            onChange: function (file, extension) {
            },
            onSubmit: function (file, extension) {
                if (!(extension && /^(jpeg|JPEG|jpg|JPG|png|PNG|gif|GIF|WMV|wmv)$/.test(extension))) {
                    alert("您上传的文件格式不对，请重新选择！");
                    return false;
                }
            },
            onComplete: function (file, response) {
                var data = $.parseJSON(response.data);
                console.log(data);
                $('#' + btnid).attr('src', data.imageUrl);
                if (response.success) {
                    $('#' + btnid).attr('src', data.imageUrl);
                }

            }
        });
    },



    /**
     * @头像信息
     * 
     */
    loadingHeadPIC: function (reg) {
        GLOBAL.pagebase.imgBtnCick(reg, 'pic_top', 'xstx');
      
        var _userInfo = GLOBAL.cookie("CustomerMember") ? eval('('
                + GLOBAL.cookie('CustomerMember') + ')') : {};
        var _userid = _userInfo.userId;
        var _dataSoure = GLOBAL.pagebase.checkStudentInfo(reg, _userid);
        
        if (_dataSoure.data.length > 0) {
        	   if(_dataSoure.data[0].headPic==null||_dataSoure.data[0].headPic=='null')
               {
        		   _dataSoure.data[0].headPic= GLOBAL.pagebase.UrlReg + '/images/touxiang.jpg';
               }
               else
               {
            	   _dataSoure.data[0].headPic=_dataSoure.data[0].headPic;
               }
            $('#pic_top').attr('src',_dataSoure.data[0].headPic);
        
        }
      
       

    },

    headPicBtnClick:function(reg){
    	  var _userInfo = GLOBAL.cookie("CustomerMember") ? eval('('
                  + GLOBAL.cookie('CustomerMember') + ')') : {};
          var _userid = _userInfo.userId;
    	   var _serviceURL = reg + '/edit/headpic';
           var _dataHandle = GLOBAL.dataStore.dataHandle;
           var _parame = {
               'userId': _userid,
               'headpic': $('#pic_top').attr('src')
           };
           _dataHandle.postData({
               url: _serviceURL,
               parame: _parame,
               async: false,
               success: function (data) {
                   alert('头像保存成功！！！');
               },
               error: function (data) {
                   alert('温馨提示：' + data + '!');

               }
           });
    },






    /**
	 * @省加载
	 * @returns
	 */
    provinceBind: function (reg, arg) {
        var _serviceURL = reg + '/FindAddress';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        var _$ddlprovince = $("#province");
        var _parame = {
            'pid': 0
        };
        _dataHandle.postData({
            url: _serviceURL,
            parame: _parame,
            async: false,
            success: function (data) {
                _$ddlprovince.html('');
                $('#city').html('');
                $('#area').html('');
                var html = '';
                for (var i = 0; i < data.data.length; i++) {
                    if (i == 0) {
                        if (arg._privece1 == data.data[i].addressId) {
                            html += ' <option value="-1">省</option>' + '<option value="' + data.data[i].addressId + '" selected=selected>' + data.data[i].addressName + '</option>';
                        }
                        else {
                            html += ' <option value="-1">省</option>' + '<option value="' + data.data[i].addressId + '">' + data.data[i].addressName + '</option>';
                        }
                    }
                    else {
                        if (arg._privece1 == data.data[i].addressId) {
                            html += '<option value="' + data.data[i].addressId + '" selected=selected>' + data.data[i].addressName + '</option>';
                        }
                        else {
                            html += '<option value="' + data.data[i].addressId + '">' + data.data[i].addressName + '</option>';
                        }
                    }
                }
                _$ddlprovince.html(html);
                if (arg._privece1 != 0) {
                    GLOBAL.pagebase.cityBind(reg, arg._privece1, arg);

                }

                _$ddlprovince.change(function () {
                    $('#oneCity').hide();
                    $('#oneCity').attr('code', '');
                    $('#oneCity').val("");
                    $('#area').show();
                    arg._city = '';
                    arg._are = '';
                    GLOBAL.pagebase.cityBind(reg, $(this).find("option:selected").val(), arg);
                });

            },
            error: function (data) {
                alert('温馨提示：' + data + '!');

            }
        });
    },


    /**
	 * @市加载
	 * @returns
	 */
    cityBind: function (reg, pid, arg) {
        /* ;*/
        var _serviceURL = reg + '/FindAddress';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        var _$ddlcity = $("#city");
        var _parame = { 'pid': pid };
        _dataHandle.postData({
            url: _serviceURL,
            parame: _parame,
            async: false,
            success: function (data) {
                _$ddlcity.html('');
                $('#area').html('');
                var html = '';
                for (var i = 0; i < data.data.length; i++) {
                    if (i == 0) {
                        if (arg._city == data.data[i].addressId) {
                            html += ' <option value="-1" >请先选中省份</option>' + '<option value="' + data.data[i].addressId + '"  selected=selected>' + data.data[i].addressName + '</option>';
                        }
                        else {
                            html += ' <option value="-1" >请先选中省份</option>' + '<option value="' + data.data[i].addressId + '" >' + data.data[i].addressName + '</option>';

                        }
                    }
                    else {
                        if (arg._city == data.data[i].addressId) {
                            html += '<option value="' + data.data[i].addressId + '" selected=selected>' + data.data[i].addressName + '</option>';
                        }
                        else {
                            html += '<option value="' + data.data[i].addressId + '" >' + data.data[i].addressName + '</option>';
                        }
                    }

                }
                _$ddlcity.html(html);
                if (arg._city != '') {
                    GLOBAL.pagebase.areaBind(reg, arg._city, arg);
                }
                _$ddlcity.change(function () {
                    arg._are = '';
                    GLOBAL.pagebase.areaBind(reg, $(this).find("option:selected").val(), arg);
                });
            },
            error: function (data) {
                alert('温馨提示：' + data + '!');

            }
        });
    },


    /**
     * @区加载
     * @returns
     */
    areaBind: function (reg, pid, arg) {
        /* ;*/
        var _serviceURL = reg + '/FindAddress';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        var _$ddlarea = $("#area");
        var _parame = {
            'pid': pid
        };
        _dataHandle.postData({
            url: _serviceURL,
            parame: _parame,
            async: false,
            success: function (data) {
                _$ddlarea.html('');
                var html = '';
                $('#area').show();
                if (data.total == 0) {
                    $('#oneCity').val($('#province option:selected').text());
                    $('#oneCity').attr('code', $('#province option:selected').val());
                    $('#oneCity').show();
                    html += '<option value="' + $('#city option:selected').val() + '  selected=selected>' + $('#city option:selected').text() + '</option>';
                    $('#area').hide();
                }

                for (var i = 0; i < data.data.length; i++) {
                    if (arg._are == data.data[i].addressId) {
                        html += '<option value="' + data.data[i].addressId + '" selected=selected>' + data.data[i].addressName + '</option>';
                    }
                    else {
                        html += '<option value="' + data.data[i].addressId + '">' + data.data[i].addressName + '</option>';
                    }
                }

                _$ddlarea.html(html);
            },
            error: function (data) {
                alert('温馨提示：' + data + '!');

            }
        });
    },

    
    
    //可调整工作
     GetChangeSkill:function(){
        var reg = GLOBAL.pagebase.UrlReg;
        var _serviceURL = reg + '/returnAllSkill';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        var _parame={};
        _dataHandle.postData({
            url: _serviceURL,
            parame: _parame,
            async: false,
            success: function (data) {
            	var datasouce=data.data;
            	var html1='';
            	  for (var i = 0; i < data.data.length; i++) {
                  if(i==10){//wzl123 2015.12.21
                	  html1 += '<input type="checkbox" name="ability1" value="' + data.data[i].skillId + '" style="width: 13px;height: 13px;position:relative;top:2.3px;margin-left:5em" />&nbsp;' + data.data[i].skillname+ '&nbsp;&nbsp' ;
                  }
            		  html1 += '<input type="checkbox" name="ability1" value="' + data.data[i].skillId + '" style="width: 13px;height: 13px;position:relative;top:2.3px;" />&nbsp;' + data.data[i].skillname+ '&nbsp;&nbsp' ;
                  }
                
                  $('#ability').html(html1);
                  
             
            }
         });
        
    }, 
    
    //可调整工作
    GetChangeJob:function(){
        var reg = GLOBAL.pagebase.UrlReg;
        var _serviceURL = reg + '/returnAllChangeJob';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        var _parame={};
        _dataHandle.postData({
            url: _serviceURL,
            parame: _parame,
            async: false,
            success: function (data) {
            	var html2='';
            	var datasouce=data.data;
            	for (var i = 0; i <datasouce.length; i++) {
                   	var content=datasouce[i];
                    html2 += '<input type="checkbox"  name="workState1" value="' + content.changejobId + '" style="width: 13px;height: 13px;margin: 0;" />&nbsp;' + content.changejobName + '&nbsp;&nbsp';
                 }
            	
            	$("#workState").html(html2);
             
            }
         });
        
    }, 
    
    
    
    
    
   
    /**
    *@检查是否存在商户信息
    */
    checkStudentInfo: function (reg, _userID) {
        var _serviceURL = reg + '/show/viewprofile';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        var _parame = {
            'userId': _userID
        };
        var dataSoure;
        _dataHandle.postData({
            url: _serviceURL,
            parame: _parame,
            async: false,
            success: function (data) {

                dataSoure = data;

            },
            error: function (data) {
                alert('温馨提示：' + data + '!');

            }
        });
        return dataSoure;
    },


    /**
    * @加载页面数据
    * @returns
    */
    loadingStudentPageInfo: function (reg) {
        var _userInfo = GLOBAL.cookie("CustomerMember") ? eval('('
                + GLOBAL.cookie('CustomerMember') + ')') : {};
        var _userid = _userInfo.userId;
        $('#sid').val(_userInfo.userId);
        $('#phone').val();
        $('#school').val(_userInfo.schoolName);
        GLOBAL.pagebase.GetChangeJob();
        GLOBAL.pagebase.GetChangeSkill();
          
        var _dataSoure = GLOBAL.pagebase.checkStudentInfo(reg, _userid);
        var _addressArr = {
            _privece1: '',
            _city: '',
            _are: ''
        };

        if (_dataSoure.total != 0) {
            _addressArr._privece1 = _dataSoure.data[0].province;
            _addressArr._city = _dataSoure.data[0].city;
            _addressArr._are = _dataSoure.data[0].area;
        };

        GLOBAL.pagebase.provinceBind(reg, _addressArr);

        if (_dataSoure.data.length > 0) {
            GLOBAL.pagebase.bindStudentInfo(reg, _dataSoure);
        }

        GLOBAL.pagebase.imgBtnCick(reg, 'pic1', 'xszl1');
        GLOBAL.pagebase.imgBtnCick(reg, 'pic2', 'xszl2');
        
        
    
        
    },

    bindBtnSaveClick: function (reg) {
        var _parem = GLOBAL.pagebase.getStudentPageDataInfo(reg);
        GLOBAL.pagebase.studentInfoAdd(reg, _parem);
    },

    /**
    *@绑定页面数据
    */
    bindStudentInfo: function (reg, data) {
        var _userInfo = GLOBAL.cookie("CustomerMember") ? eval('('
                + GLOBAL.cookie('CustomerMember') + ')') : {};

        $('#sid').val(_userInfo.userId);
        $('#school').val(_userInfo.schoolName);
       // $('#phone').val(_userInfo.mobile);//name
        if (data.data.length > 0) {
            var model = data.data[0];
            $('#name').val(model.name);
            $('#nick').val(model.nick);
            $('#idNo').val(model.idNo);
            $('#pic1').attr('src', model.pic1);
            $('#pic2').attr('src', model.pic2);
     

            $('#isagree').find('option').each(function (j, n) {
                 if ($(n).val() == model.isagree) {
                     $(n).attr("selected", true);
                  }
             });


            //            $('#city').find('option').each(function (j, n) {
            //                if ($(n).val() == model.city) {
            //                    $(n).attr("selected", true);
            //                }
            //            });

            //cityName: "北京"
            //            $('#area').find('option').each(function (j, n) {
            //                if ($(n).val() == model.area) {
            //                    $(n).attr("selected", true);
            //                }
            //            });


            // areaName: null


            $('#birth').val(GLOBAL.common.covnertDate(model.birth));
            $('#gender').find('option').each(function (j, n) {
                if ($(n).val() == model.gender) {
                    $(n).attr("selected", true);
                }
            });



            $('#height').val(model.height);
            $('#school').val(model.school);
            $('#major').val(model.major);
            $('#studentId').val(model.studentId);
            $('#inTime').val(GLOBAL.common.covnertDate(model.inTime));
            $('#outTime').val(GLOBAL.common.covnertDate(model.outTime));
            $('#email').val(model.email);
            $('#address').val(model.address);

            var itemData = model.ability.split(',');
            var itemSoure = $('#ability').find('input[type="checkbox"]');
            for (var i = 0; i < itemSoure.length; i++) {
                for (var j = 0; j < itemData.length; j++) {
                    if ($(itemSoure[i]).val() == itemData[j]) {
                        $(itemSoure[i]).attr('checked', true);
                    }

                }
            }
            var item2Data = model.workState.split(',');
            var item2Soure = $('#workState').find('input[type="checkbox"]');
            for (var f = 0; f < item2Data.length; f++) {
                for (var d = 0; d < item2Soure.length; d++) {
                    if ($(item2Soure[f]).val() == item2Data[d]) {
                        $(item2Soure[f]).attr('checked', true);
                    }
                }

            }

            $('#introduction').html(model.introduction);
            $('#workExp').html(model.workExp);


        }
    },


    /**
    *@获取页面数据
    *@return _parem
    */
    getStudentPageDataInfo: function (reg) {
        var abilityModel = $('#ability').find('input[type=checkbox]:checked');
        var abilityStr = '';

        for (var i = 0; i < abilityModel.length; i++) {
            abilityStr += ',' + $(abilityModel[i]).val();
        }
        var workStateModel = $('#workState').find('input[type=checkbox]:checked');
        var workStateStr = '';
        for (var i = 0; i < workStateModel.length; i++) {
            workStateStr += ',' + $(workStateModel[i]).val();
        }
        var _$btnSave = $('#btnSave');
        var _parem = {
            userId: $('#sid').val(),
            name: $('#name').val(),
            nick: $('#nick').val(),
            idNo: $('#idNo').val(),
            pic1: $('#pic1').attr('src'),
            pic2: $('#pic2').attr('src'),
            birth: $('#birth').val(),
            gender: $('#gender option:selected').val(),
            height: $('#height').val(),
            school: $('#school').val(),
            major: $('#major').val(),
            studentId: $('#studentId').val(),
            inTime: $('#inTime').val(),
            outTime: $('#outTime').val(),
           // phone: $('#phone').val(),
            email: $('#email').val(),
            province: $('#province option:selected').val(),
            provinceName: $('#province option:selected').text(),
            city: $('#city option:selected').val() || $('#oneCity').val(),
            cityName: $('#city option:selected').text() || $('#oneCity').attr('code'),
            area: $('#area option:selected').val() || $('#city option:selected').val(),
            areaName: $('#area option:selected').text() || $('#city option:selected').text(),
            address: $('#address').val(),
            ability: abilityStr.substring(1) || 0, //TODO
            workState: workStateStr.substring(1) || 0,
            introduction: $('#introduction').val(),
            workExp: $('#workExp').val(),
            isagree:$('#isagree option:selected').val()

        };
        return _parem;
    },



    /**
     * @资料的增加 ADD
     */
    studentInfoAdd: function (reg, parem) {
        var _serviceURL = reg + '/edit/profile';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        _dataHandle.postData({
            url: _serviceURL,
            parame: parem,
         //   async: false,
            success: function (data) {
                alert('资料提交成功，工作人员会在3个工作日内完成您的资料审核。');
                window.location.href=GLOBAL.pagebase.UrlReg+'/student/studentIndex';
            },
            error: function (data) {
                alert('温馨提示：' + data + '!');

            }
        });

    }





});
