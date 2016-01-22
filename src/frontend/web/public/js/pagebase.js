/**
 * @页面基类
 * @User: js
 * @Date: 15-11-12
 * @Desc: 控制整个站点加载效果，以及访问权限问题
 */
GLOBAL.namespace('pagebase', function () {


    var _this = this;
    var _href=new URL().getUrl();
    
    var _loctionUrl = $('.head').attr('atr');
    _this._userInfo = GLOBAL.cookie("CustomerMember") ? eval('('
            + GLOBAL.cookie('CustomerMember') + ')') : {};
            
    var _userInfo = GLOBAL.cookie("CustomerMember") ? eval('('
            + GLOBAL.cookie('CustomerMember') + ')') : {};

    //导航下标位置
    var _urlIndex = new URL().get('url');
    var bg_list = $('.nav_click').find('li');
    for (var i = 0; i < bg_list.length; i++) {
        var _md = $(bg_list[i]);
        _md.removeClass();
        if (_md.attr('atr').indexOf(_urlIndex) > -1) {
            _md.addClass('bg');
        }
    }

    var _userInfoForMapID = GLOBAL.cookie("addressIP");
    var _userInfoForMap = GLOBAL.cookie("addressName");
    if (_userInfoForMapID != '' && _userInfoForMapID != undefined) {
        //存放位置
        $('b[class="cityTitle f_l ml_10"]').attr('atr', _userInfoForMapID);
        $('b[class="cityTitle f_l ml_10"]').html(_userInfoForMap);
    }
    


    /**
    *配置路径
    */
    _this.UrlReg = '';

    
 $('.tip_box').find('img').bind('click',function(){
	 $('.qpzz').hide();
 });
  
  
    
    /**
     * @后台头部信息处理
     * @userType 1学生 2商户
     */
    _this.headFramePage = function (_urlbit) {
        var args = {
            name: '',
            phone: '',
            email: '',
            money: ''
        };
        if (_userInfo.userType == 1) {
            if (_userInfo.businessName != null && _userInfo.businessName != 'null') {
                args.name = _userInfo.businessName;
            }
            else {
                args.name = _userInfo.mobile;
            }
        }
        else {
            args.name = _userInfo.businessName;
        }

        args.phone = _userInfo.mobile;
        var moneylist=GLOBAL.pagebase.anmountInfo();
        args.money = moneylist.value;
        
        
        if (_userInfo.headPic == null || _userInfo.headPic == 'null') {
            args.headPic = GLOBAL.pagebase.UrlReg + '/images/us.jpg';
        }
        else {
            args.headPic = _userInfo.headPic;
        }

        var tophtml = '<ul>'
        + '<li class="img"> <img src="' + args.headPic + '" width="100" height="100"></li>'
        + '<li class="wi1">'
        + '   <h1>' + args.name + '</h1>'
        + '   <p>手机号：' + args.phone + '</p>';

        tophtml += '</li>';
        if (_userInfo.userType == 2) {
            tophtml += '<li class="wi2">预收余额：' + args.money + '</li>';
        }
        else {
            tophtml +='<li class="wi2 wid" >淘学金余额<span class="item"><img src="../images/wenhao.png" style="height: 18px;position: relative;top:-4px;margin-left:5px"/><div class="tooltip_description" style="display:none" >淘学金是趣淘学平台的虚拟货币,在趣淘学网站上,学生会员可以用淘学金在指定商家消费,也可以通过兼职获取淘学金.</div></span>：' + args.money + '</li><li class="wi2 wid">结算日：每月25日</li>';
       
        }
        tophtml += '<li class="wi3">';
        if (_userInfo.userType == 2) {
            tophtml += '   <a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantQuota"><span class="bg1">额度申请</span></a>';
            tophtml += '<a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantParttimeList"><span class="bg2">兼职结算</span></a>';
            tophtml += ' <a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantParttimeList"><span class="bg3">兼职审核</span></a>';
        }
        else {
        	if(moneylist.status==1)
        		{
        		 tophtml += ' <a   href="###"  ><span class="bg1"  >账户已通过</span></a>';
        		}
        	else
        		{
            tophtml += ' <a   href="###"  ><span class="bg1"  id="btnApplyAccount" >申请账户</span></a>';
        		}
        }
        tophtml += '</li>';
        tophtml += '</ul> <div class="clear"></div>';
        var lefthtmlStu = '<a href="' + GLOBAL.pagebase.UrlReg + '/student/studentIndex" atr="home"><h1> 我的趣淘学  </h1></a>'
        + '   <ul>'
          + '       <li><a href="' + GLOBAL.pagebase.UrlReg + '/student/studentOrder"  atr="order">我的订单</a></li>'
          + '       <li><a href="' + GLOBAL.pagebase.UrlReg + '/student/studentParttimeList" atr="list">我的兼职</a></li>'
          + '       <li><a href="' + GLOBAL.pagebase.UrlReg + '/student/studentComment" atr="comment">我的评论</a></li>'
          + '       <h2>个人设置</h2>'
          + '       <li><a href="' + GLOBAL.pagebase.UrlReg + '/student/studentInfo" atr="base">基本资料</a></li>'
          + '       <li><a href="' + GLOBAL.pagebase.UrlReg + '/student/studentSafe" atr="safe">账户安全</a></li>'
          + '       <li> <a href="' + GLOBAL.pagebase.UrlReg + '/student/studentBalance" atr="account">账户余额</a></li>'
          + '   </ul>';
        var lefthtmlBus = '  <a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantIndex" atr="home"><h1>我的门店  </h1></a>'
        + ' <ul>'
        + '     <li><a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantOrder"  atr="order">我的订单</a></li>'
        + '     <li><a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantComment" atr="comment" >我的评论</a></li>'
        + '     <h2>我的兼职</h2>'
        + '     <li><a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantPublish"  atr="publish">发布兼职</a></li>'
        + '     <li><a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantParttimeList" atr="list">兼职列表</a></li>'

        + '     <h2>企业设置</h2>'
        + '     <li><a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantInfo" atr="base" >基本资料</a></li>'
        + '     <li><a href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantSafe" atr="safe">账户安全</a></li>'
        + '     <li> <a  href="' + GLOBAL.pagebase.UrlReg + '/merchant/merchantBalance"  atr="account">账户余额</a></li>'
       + ' </ul>';

        var _$topmenus = $('#topmenus');
        var _$leftmenus = $('#leftmenus');
        _$topmenus.html(tophtml);
        if (_userInfo.userType == 1) {
            _$leftmenus.html(lefthtmlStu);
        }
        else {
            _$leftmenus.html(lefthtmlBus);
        }

        _$leftmenus.find('a[atr="' + _urlbit + '"]').addClass('co');

        $('span[class="item"]').tooltip();//气泡
        
     $('#btnApplyAccount').bind('click',function(){
    	 var _applyAccount= GLOBAL.cookie('applyAccount');
  	           if(_applyAccount != 1)
  	           {
  	   		 GLOBAL.cookie('applyAccount', 1, ''), {expires: 7,path: '/'};
  	   	 GLOBAL.pagebase.alertBoxHtml();
  	   			   GLOBAL.pagebase.alertBox();
  	           }
  	           else{
  	        	   alert('您已经申请过了,系统正在受理中!!!');
  	           }
     });
    };


    GLOBAL.pagebase.alertBox = function () {
        $('#applayAccount').show();
    };

    GLOBAL.cookie('applyAccount', 0, ''), {
        expires: 7,
        path: '/'
    };
    GLOBAL.pagebase.alertBoxHtml = function () {
        var arg = {
            title: "申请账户",
            btnsureText: "确定",
            btnCancelText: "取消",
            content: "申请个人淘学金账户"
        };
        var html = '   <div id="applayAccount" class="qpzz" style="display:none;" >'
        + '          <div class="tip_box">'
        + '   <h3>' + arg.title + '</h3>'
        + '   <img src="../img/cross27.png"  style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;"/>'
        + '    <div class="con_t">'
        + '   <p id="titleBox">' + arg.content + '</p>'
        + '    </div>'
        + '    <br /><br />'
        + '    <div style="float: right; margin-right: 20px;">'
        + '      <input type="button" name="" id="studetailname" value="' + arg.btnsureText + '" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;"/>&nbsp;&nbsp;	'
        + '    <input type="button" name="" id="backname" value="' + arg.btnCancelText + '" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;"/>'
        + '    </div>'
        + '   </div>'
        + '    </div>';
        $("body").append(html);

        $('#studetailname').bind('click', function () {
            GLOBAL.pagebase.applayAccountFun();
        });

        $('#backname').bind('click', function () {
            $('#applayAccount').hide();
        });
    },


    _this.applayAccountFun = function () {
        var _serviceURL = GLOBAL.pagebase.UrlReg + '/getAccountApply';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        console.log("123");
        var _parame = {
            'userId': _userInfo.userId,
            'mobile': _userInfo.mobile || _userInfo.userId
        };
        console.log(_serviceURL);
        _dataHandle.postData({
            url: _serviceURL,
            parame: _parame,
            async: false,
            
            success: function (data) {
            	console.log(data);
                alert('申请成功!!');
                $('div[id="applayAccount"]').hide();
            },
            error: function (data) {
                alert('温馨提示：' + data + '!');
                $('div[id="applayAccount"]').hide();
            }
        });
    };




    /**
    *@淘学金余额算法
    */
    _this.anmountInfo = function () {
        var _serviceURL = GLOBAL.pagebase.UrlReg + '/Account';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        var _parame = {
            'userId': _userInfo.userId
        };
        var money={};
        money.value='';
        money.status='';
        if (_userInfo.userType == 2) {
        	 money.value = new Number(0).format();
        }
        else {
        	 money.value = new Number(1000).format();
        }
        _dataHandle.postData({
            url: _serviceURL,
            parame: _parame,
            async: false,
            success: function (data) {
                if (data.data.length > 0) {
                    if (_userInfo.userType == 1) {
                    	   money.value = new Number(data.data[0].balance + data.data[0].quota).format();
                    	   money.status=data.data[0].status;
                    }
                    else {
                    	 money.value = new Number(data.data[0].balance).format();
                    }
                }


            },
            error: function (data) {
                alert('温馨提示：' + data + '!');
            }
        });
        return money;
    };


  
    
    $('input[name="btnSearch"]').bind('click', function () {
        var _href = $($('div[class="t_le so"]').find('select')[0]).find("option:selected").val();
        var keyWord = $('input[name="inputContent"]').val();
        if (_href == 0) {
            window.location.href = _loctionUrl + '/EnterpriseInfoList?url=yzsj&keyWord=' + encodeURIComponent(keyWord);
        }
        else {
            window.location.href = _loctionUrl + '/ParttimeList?url=jzjh&keyWord=' + encodeURIComponent(keyWord);
        }
    });







    /**
     * @退出清除Cookie
     */
    _this.btnEscClick = function (_this) {
        var _href = GLOBAL.pagebase.UrlReg;
        GLOBAL.cookie('CustomerMember', '', {
            expires: -1,
            path: '/'
        });
        location.href = _href + '/main/toLogin';
    };


    /**
     * @子类扩展方法
     */
    _this.add = function (args) {
        if (!args)
            return;
        for (var o in args) {
            _this[o] = args[o];
        }
        return _this;
    };

    /**
     * @扩展倒计时方法
     */
    _this.countDownfn = function (dom, count, callback) {
        var _count = count;
        var _defaults = {
            timeUp: function () {

            },
            timeText: 's可重新发送'
        };
        var _opts = $.extend(_defaults, callback);
        var _$timeDiv = $(dom);
        var timeOut = function () {
            _$timeDiv.html(_count + '' + _opts.timeText);
            _count--;
            if (_count >= 0) {

                setTimeout(timeOut, 1000);
            } else {
                _opts.timeUp();
            }
        };
        timeOut();
    };


    _this.City = function () {
        var _serviceURL = GLOBAL.pagebase.UrlReg + '/returnCityName';
        var _dataHandle = GLOBAL.dataStore.dataHandle;
        var _parame = {
        };
        _dataHandle.postData({
            url: _serviceURL,
            parame: _parame,
            async: false,
            success: function (data) {
                $('#listCity').html("");
                if (data.data.length > 0) {
                    for (var i = 0; i < data.data.length; i++) {
                        var _model = data.data[i];
                        $('div[id=listCity]').append('<a class="city_links" href="#"  atr=' + _model.cityid + ' icode='+ _model.cityname + '>' + _model.cityname + '</a>');
                    }
                }
                $('div[id=listCity]').find('a').bind('click', function () {
                	$(this).css('color','##ff5400');
                
                	   $('div[class="t_le"]').find('b[class="cityTitle f_l ml_10"]').html($(this).attr('icode'));
                       $('div[class="t_le"]').find('b[class="cityTitle f_l ml_10"]').attr($(this).attr('atr'));
           
                       
                       document.getElementById('city_nav').className='city_nav';
                       document.getElementById('city_link').className='city_link';
                       
                    GLOBAL.cookie('addressIP',  $(this).attr('atr'), ''), {
                        expires: 7,
                        path: '/'
                    };
                    GLOBAL.cookie('addressName', $(this).html(), ''), {
                        expires: 7,
                        path: '/'
                    };

                    if (_href.indexOf('EnterpriseInfoList') > -1) {
                        GLOBAL.pagebase.getAreaCategory('' + GLOBAL.pagebase.UrlReg + '');
                        GLOBAL.pagebase.getBusiness('' + GLOBAL.pagebase.UrlReg + '', 1);

                    }
                    if (_href.indexOf('ParttimeList') > -1) {
                        GLOBAL.pagebase.getAreaCategory('' + GLOBAL.pagebase.UrlReg + '');
                        GLOBAL.pagebase.getWork('' + GLOBAL.pagebase.UrlReg + '', 1);
                    }
                });
            }
        });
    };


    _this.GetTop = function () {
        var myHomeData;
        var usertype=_userInfo.userType=='1'?'我的趣淘学':'我的门店';
        if (_userInfo.userId != null && _userInfo.userId != 'null' && _userInfo.userId != '') {
            myHomeData = _userInfo;


            if (myHomeData.businessName == 'undefined' || myHomeData.businessName == undefined || myHomeData.businessName == 'null'|| myHomeData.businessName == null|| myHomeData.businessName == "") { myHomeData.businessName = myHomeData.mobile; }

            myHomeData.regInfo = '<span id="regCont"><b>' + myHomeData.businessName + '</b></span>';
            
            myHomeData.myhome = '<span class="mtx"> <a href="/userMain">'+usertype+'</a></span>';
            myHomeData.myEsc = ' <span> <a href="javascript:;" id="btnEsc">退出</a></span>';
        }
        else {
            myHomeData = {};
            myHomeData.regInfo = '<span id="regCont">'
                + '<a href="/main/regUser" id="divAbtn"  >注册</a> '
                + '</span>'
                + '<span id="regCont">   '
                + '<a href="/main/toLogin" class="a1" id="btnALogin">登录</a>'
                + ' </span>';
            myHomeData.myhome = '<span class="mtx"> <a href="/main/toLogin" >我的趣淘学</a></span>';
            myHomeData.myEsc = '';
        }

        //$('#topInfo').html($("#topInfoTemp").html().replaceData(myHomeData));


        $('#btnEsc').bind('click', function () {
            GLOBAL.pagebase.btnEscClick();
        });
    };


    ///////////////////////////拓展方法/////////////////////////////////////////////

    /**
     * @扩展String类的控制页面模板的对象替换方法
     */
    String.prototype.replaceData = function (data) {
        return this.replace(/(\{(.*?)\})/g, function (a, b, c) {
            return data[c];
        });
    };



});
