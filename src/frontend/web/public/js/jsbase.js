/**
 * @jsbase 通用的JS框架基类
 * @User: js
 * @Date: 15-11-11
 * @Vserion:1.0
 */

/*
 * @全局命名基类名称
 */
if (typeof GLOBAL == 'undefined') {
    GLOBAL = {};
}

/*
 * @创建唯一命名空间子类名
 * @str 子类名称
 * @callFn 创建成功后执行的回调方法
 */
GLOBAL.namespace = function (str, callFn) {
    var arr = str.split('.'),
        o = GLOBAL;
    for (var i = (arr[0] == 'GLOBAL') ? 1 : 0; i < arr.length; i++) {
        o[arr[i]] = o[arr[i]] || {};
        o = o[arr[i]];
    }
    var curObj = eval('GLOBAL.' + str);
    if (typeof callFn == 'function') {
        callFn.call(curObj);
    }
};

/*
 * @Cookie存储
 */
GLOBAL.cookie = function (key, value, options) {
    if (arguments.length > 1 && String(value) !== "[object Object]") {
        options = $.extend({}, options);

        if (value === null || value === undefined) {
            options.expires = -1;
        }

        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days);
        }

        value = String(value);

        return (document.cookie = [
            encodeURIComponent(key), '=',
            options.raw ? value : encodeURIComponent(value),
            options.expires ? '; expires=' + options.expires.toUTCString() : '',
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : ''
        ].join(''));
    }
    options = value || {};
    var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
    return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
}
/*
 * @异步加载Javascript或CSS
 * @path string 可以是一条字符串路径，也可以是路径数组
 * @domainSrc string 路径前域名，比如 http://www.net.cn
 * @callFn function 回调函数，当加载完JS后执行处理 */
GLOBAL.load = function (path, domain, callFn) {
    var _node,
        _head = document.getElementsByTagName('head')[0],
        _srcIsArray = path instanceof Array,
        _srcLength = _srcIsArray ? path.length : 0,
        _srcIndex = 0,
        _curLoadCount = 0;
    domain = domain ? domain : '';

    /*
     * @监听页面中现有的script or link
     * @src 地址路径*/
    var nodeIsExits = function (src) {
        var _nodeName = src.match(/[a-z0-9A-Z-_]*.js$/) ? 'script' : 'link',
            _nodeList = document.getElementsByTagName(_nodeName),
            _exits = false;
        for (var i = 0, _count = _nodeList.length; i < _count; i++) {
            (function (index) {
                var _node = _nodeList[index],
                    _path = _node.getAttribute('src') || _node.getAttribute('href');
                if (_path && src.toLowerCase() === _path.toLowerCase()) {
                    //暂时这么写吧！！。。后期更新.....
                    _node.parentNode.removeChild(_node);
                    _exits = true;
                }
            })(i);
            if (_exits)
                break;
        }
        return _exits;
    }

    /*
     * @向页面中插入JS
     * @src string JS路径 */
    var insertNode = function (src) {
        nodeIsExits(src);
        _node = src.match(/\.js$/) ? document.createElement('script') : document.createElement('link');
        var _ie = navigator.userAgent.indexOf('MSIE') > -1;
        if (_ie) {
            _node.onreadystatechange = function () {
                if (_node.readyState && _node.readyState == 'loaded' || _node.readyState == 'complete') {
                    _srcIndex++;
                    _curLoadCount++;
                    if (_srcIsArray && _srcIndex <= (_srcLength - 1)) {
                        insertNode(path[_srcIndex]);
                    }
                }
            }
        } else {
            _node.onload = function () {
                _srcIndex++;
                _curLoadCount++;
                if (_srcIsArray && _srcIndex <= (_srcLength - 1)) {
                    insertNode(path[_srcIndex]);
                }
            }
        }
        if (_node.nodeName.toLowerCase() === 'script') {
            _node.setAttribute('type', 'text/javascript');
            _node.setAttribute('language', 'javascript');
            var _r = '?r=' + Math.random();
            if (src.indexOf('http://') > -1) {
                _node.setAttribute('src', src + _r);
            } else {
                _node.setAttribute('src', domain + src + _r);
            }
        } else {
            _node.setAttribute('type', 'text/css');
            _node.setAttribute('rel', 'stylesheet');
            if (src.indexOf('http://') > -1) {
                _node.setAttribute('href', src + _r);
            } else {
                _node.setAttribute('href', domain + src + _r);
            }
        }	
        _head.appendChild(_node);
    },
    /*
     * @JS加载监听器*/
        loadListener = setInterval(function () {
            if (typeof callFn != 'function') {
                clearInterval(loadListener);
                return;
            }
            if ((_srcIsArray && _curLoadCount === _srcLength) || (!_srcIsArray && _curLoadCount === 1)) {
                clearInterval(loadListener);
                callFn();
            }
        }, 1);

    if (_srcIsArray && _srcLength > 0) {
        insertNode(path[_srcIndex]);
    } else {
        insertNode(path);
    }
};



/*
 * @通用方法
 */
GLOBAL.common = {
    /**
     * @将/Date(1332919782070)/格式转换为日期格式 
     * @dateNumber  1332919782070 (时间的毫秒值)
     */
    covnertDate: function (time,type) {
    	   if (time != null) {
    		    var datetime = new Date();
    		    datetime.setTime(time);
    		    var year = datetime.getFullYear();
    		    var month = datetime.getMonth() + 1 < 10 ? "0" + (datetime.getMonth() + 1) : datetime.getMonth() + 1;
    		    var date = datetime.getDate() < 10 ? "0" + datetime.getDate() : datetime.getDate();
    		    var hour = datetime.getHours()< 10 ? "0" + datetime.getHours() : datetime.getHours();
    		    var minute = datetime.getMinutes()< 10 ? "0" + datetime.getMinutes() : datetime.getMinutes();
    		    var second = datetime.getSeconds()< 10 ? "0" + datetime.getSeconds() : datetime.getSeconds();
    		  
    		    if(type=='0')
    		    	{
    		     return year + "-" + month + "-" + date+' ' +hour+':'+minute+":"+second;	
    		    	}
    		    else
    		    	{
    		    	  return year + "-" + month + "-" + date;	
    		    	}
    		    }

    	    return "";
    },
    
   

    /**
     * @计算两个日期天数差的函数，通用
     */
    DateDiff:function(sDate1, sDate2){  //sDate1和sDate2是yyyy-MM-dd格式
    	 
        var aDate, oDate1, oDate2, iDays;
        aDate = sDate1.split("-");
        oDate1 = new Date(aDate[1] + '-' + aDate[2] + '-' + aDate[0]);  //转换为yyyy-MM-dd格式
        aDate = sDate2.split("-");
        oDate2 = new Date(aDate[1] + '-' + aDate[2] + '-' + aDate[0]);
        iDays = parseInt(Math.abs(oDate1 - oDate2) / 1000 / 60 / 60 / 24); //把相差的毫秒数转换为天数
     
        return iDays;  //返回相差天数
    },
    
    
    /**
     * @根据指定的一个日期和相差的天数，获取另外一个日期
     * @param dateParameter
     * @param num 指定天数
     * @returns 日期
     */
     addByTransDate:function(dateParameter, num) {
        var translateDate = "", dateString = "", monthString = "", dayString = "";
        translateDate = dateParameter.replace("-", "/").replace("-", "/"); ;
     
        var newDate = new Date(translateDate);
        newDate = newDate.valueOf();
        newDate = newDate + num * 24 * 60 * 60 * 1000;  //备注 如果是往前计算日期则为减号 否则为加号
        newDate = new Date(newDate);
     
        //如果月份长度少于2，则前加 0 补位   
        if ((newDate.getMonth() + 1).toString().length == 1) {
            monthString = 0 + "" + (newDate.getMonth() + 1).toString();
        } else {
            monthString = (newDate.getMonth() + 1).toString();
        }
     
        //如果天数长度少于2，则前加 0 补位   
        if (newDate.getDate().toString().length == 1) {
     
            dayString = 0 + "" + newDate.getDate().toString();
        } else {
     
            dayString = newDate.getDate().toString();
        }
     
        dateString = newDate.getFullYear() + "-" + monthString + "-" + dayString;
      
        return dateString;
     
    },
    
    
    
    /*
     * @客户终端验证
     */
    browserVersion: (function () {
        var u = navigator.userAgent, app = navigator.appVersion;
        return {
            trident: u.indexOf('Trident') > -1, //IE内核                
            presto: u.indexOf('Presto') > -1, //opera内核                
            webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核                
            gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核                
            mobile: !!u.match(/AppleWebKit.*Mobile.*/) || !!u.match(/AppleWebKit/), //是否为移动终端                
            ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端                
            android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器                
            iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器                
            iPad: u.indexOf('iPad') > -1, //是否iPad                
            webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部            
        };
    })(),

    /* 
     * @将对象转换为对象字符串 
     * @obj JSON对象,只能为一级对象，不可多级
     */
    objectToString: function (obj) {
        var _objStr = '{';
        for (var o in obj) {
            //if(/^\d$/.test(obj[o])){
            //    _objStr += o + ':' + obj[o] + ',';
            //}else{
            //    _objStr += o + ':"' + obj[o] + '",';
            //}
            _objStr += o + ':"' + obj[o] + '",';
        }
        return _objStr.substring(0, _objStr.length - 1) + '}';
    }
}


/*******************************原生类扩展start*************************************/

/*
 * @字符串JSON的快速替换处理
 * @data Json对象，只能为一级对象，不可多级
 */
String.prototype.replaceData = function (data) {
    return this.replace(/(\{(.*?)\})/g, function () {
        return data[arguments[2]];
    });
}

/*
 * @截取字符串 
 * @length  截取长度
 * @charStr 后缀符号
 */
String.prototype.cutString = function (length, charStr) {
    return this.length > length ? this.substring(0, length) + charStr : this;
};

/* 
 * @金额格式化 输出 保留两位小数 
 */
Number.prototype.format = function () {
    var num = this.toString().replace(/\$|\,/g, '');
    if (isNaN(num))
        num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    if (cents < 10)
        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
        num = num.substring(0, num.length - (4 * i + 3)) + ',' +
        num.substring(num.length - (4 * i + 3));
    return (((sign) ? '' : '-') + num + '.' + cents);
};

/*
 * @时间格式化
 * @formatter 格式类型，如yyyy-MM-dd或yyyy-MM-dd hh:mm:ss
 */
Date.prototype.format = function (formatter) {
    if (!formatter || formatter == "") {
        formatter = "yyyy-MM-dd";
    }
    var year = this.getFullYear().toString();
    var month = (this.getMonth() + 1).toString();
    var day = this.getDate().toString();
    var yearMarker = formatter.replace(/[^y|Y]/g, '');

    var hours = this.getHours().toString(),
        mins = this.getMinutes().toString(),
        seconds = this.getSeconds().toString();

    if (yearMarker.length == 2) {
        year = year.substring(2, 4);
    }
    var monthMarker = formatter.replace(/[^M]/g, '');
    if (monthMarker.length > 1) {
        if (month.length == 1) {
            month = "0" + month;
        }
    }
    var dayMarker = formatter.replace(/[^d]/g, '');
    if (dayMarker.length > 1) {
        if (day.length == 1) {
            day = "0" + day;
        }
    }
    var hoursMarker = formatter.replace(/[^h|H]/g, '');
    if (hoursMarker.length > 1) {
        if (hours.length == 1) {
            hours = "0" + hours;
        }
    }
    var minsMarker = formatter.replace(/[^m]/g, '');
    if (minsMarker.length > 1) {
        if (mins.length == 1) {
            mins = "0" + mins;
        }
    }
    var secondsMarker = formatter.replace(/[^s|S]/g, '');
    if (secondsMarker.length > 1) {
        if (seconds.length == 1) {
            seconds = "0" + seconds;
        }
    }
    var value = formatter;
    if (yearMarker.length > 1) {
        value = value.replace(yearMarker, year);
    }
    if (monthMarker.length > 1) {
        value = value.replace(monthMarker, month);
    }
    if (dayMarker.length > 1) {
        value = value.replace(dayMarker, day);
    }
    if (hoursMarker.length > 1) {
        value = value.replace(hoursMarker, hours);
    }
    if (minsMarker.length > 1) {
        value = value.replace(minsMarker, mins);
    }
    if (secondsMarker.length > 1) {
        value = value.replace(secondsMarker, seconds);
    }
    return value;
}

/*******************************原生类扩展end*************************************/