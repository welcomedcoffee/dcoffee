<?php
/**
 * Created by PhpStorm.
 * User: 王明东
 * Date: 2016/1/21
 * Time: 20:57
 */
    use yii\helpers\Url;
    $this->title = "兼职列表";
?>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="public/css/common.css" />
    <link rel="stylesheet" type="text/css" href="public/css/kkpager_orange.css" />
    <link rel="stylesheet" href="public/css/shop.css" />
    <link rel="stylesheet" href="public/css/sty.css" />
    <link rel="stylesheet" href="public/css/comm.css" />
    <link rel="stylesheet" href="public/css/new.css" />
    <link rel="stylesheet" type="text/css" href="public/css/shopparttimejobdetail.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>
<!--head-->
<!--head end-->
<!--t_nav-->
<div class="t_min t_tit">当前位置：<a href="/">首页</a> > 我的门店</div>
<!--我的趣淘学-->
<div class="t_min">
    <div class="mt_ri_1">
        <div class="mt_rt" id="topmenus">
            <ul>
                <li class="img">
                    <img src="%E6%88%91%E7%9A%84%E9%97%A8%E5%BA%97_files/us.jpg" height="100" width="100">
                </li>
                <li class="wi1">
                    <h1>2311231请问</h1>
                    <p>手机号：13782519376</p>
                </li>
                <li class="wi2">预收余额：0.00</li>
                <li class="wi3">
                    <a href="http://www.qutaoxue.net/merchant/merchantQuota">
                        <span class="bg1">额度申请</span>
                    </a>
                    <a href="http://www.qutaoxue.net/merchant/merchantParttimeList">
                        <span class="bg2">兼职结算</span>
                    </a>
                    <a href="http://www.qutaoxue.net/merchant/merchantParttimeList">
                        <span class="bg3">兼职审核</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mt_le t_le" id="leftmenus">
        <ul>
            <h2>我的兼职</h2>
            <li>
                <a href="<?= Url::to(['mystore/part'])?>" atr="publish">发布兼职</a>
            </li>
            <li>
                <a href="<?= Url::to(['mystore/partlist'])?>" atr="list">兼职列表</a>
            </li>
            <li>
                <a href="<?= Url::to(['mystore/partcomment'])?>" atr="publish">兼职评论</a>
            </li>
            <h2>企业设置</h2>
            <li>
                <a href="http://www.qutaoxue.net/merchant/merchantInfo" atr="base">基本资料</a>
            </li>
            <li>
                <a href="http://www.qutaoxue.net/merchant/merchantSafe" atr="safe">账户安全</a>
            </li>
            <li>
                <a href="http://www.qutaoxue.net/merchant/merchantBalance" atr="account">账户余额</a>
            </li>
        </ul>
    </div>
    <div class="mt_ri t_ri">

        <div class="mt_rli">
            <div class="right">
                <div class="top">
                    <span>兼职列表</span>
                </div>
                <table class="date" cellpadding="0" cellspacing="0">
                    <thead style="background: #E5E5E4;">
                    <tr>
                        <th>序号</th>
                        <th>兼职名称 </th>
                        <th>行业类型 </th>
                        <th>工作时间</th>
                        <th>工资待遇</th>
                        <th>报名人数</th>
                        <th>通过人数 </th>
                        <th>状态 </th>
                        <th>操作 </th>
                    </tr>
                    </thead>
                    <tbody id="parttimedate"></tbody>
                </table>
                <script type="text/template" id="parttimedateTemplate">
                    <tr class="tr">
                        <td>{number}</td>
                        <td><a href='javascript:void(0)' onclick='GLOBAL.pagebase.searchStudentInfo({jobId})'>{name}</a></td>
                        <td>{workTypeName}</td>
                        <td>
                            {workBegin}
                            </br>到{workEnd}
                        </td>
                        <td>{salary}{salaryTypeName}</td>
                        <td>{total}</td>
                        <td>{applyCount}</td>
                        <td>{status}</td>
                        <td class="pay" style="cursor: pointer;color: red;" >{options} </td>
                    </tr>
                </script>
                <div id="kkpager"></div>
            </div>
        </div>
    </div>
</div>

<div class="qpzz" id="qpzz" style="display:none">
    <div class="tip_box height700">
        <h3 ><span class="" id="">兼职详情</span></h3>
        <img src="/images/u162.png" class="u119 close" />
        <div class="con_t padtop0" id="studentInfoContent">

        </div>

        <script type="text/template" id="studenInfoTemplate">
            <div class="shoppttimejbdetailtext" >
                <label><m class="letterspacing2">职</m>位</label><span id="">{name}</span>
            </div>
            <div class="shoppttimejbdetailtext bgcolore4e5e4">
                <label><m class="letterspacing2">类</m>型</label><span id="">{workTypeName}</span>
            </div>
            <div class="shoppttimejbdetailtext">
                <label>商家名称</label><span id="">{enterpriseName}</span>
            </div>
            <div class="shoppttimejbdetailtext bgcolore4e5e4">
                <label><m class="letterspacing2">地</m>址</label><span id="">{address}</span>
            </div>

            <div class="shoppttimejbdetailtext">
                <label>工作日期</label><span id="">{workBegin}至{workEnd}</span>
            </div>
            <div class="shoppttimejbdetailtext bgcolore4e5e4">

                <label>工作时段</label><span id="">{workTimeHourBegin}至{workTimeHourEnd}</span>
            </div>

            <div class="shoppttimejbdetailtext ">
                <label>招聘人数</label><span id="">{total}人</span>
            </div>
            <div class="shoppttimejbdetailtext bgcolore4e5e4">
                <label>报名人数</label><span id="">{applyCount}人</span>
            </div>
            <div class="shoppttimejbdetailtext ">
                <label>通过人数</label><span class="color1ea43d">{deductType}人</span>
            </div>
            <div class="shoppttimejbdetailtext bgcolore4e5e4">
                <label><m class="letterspacing2">薪</m>资</label><span class="colore61c18">{salary}{salaryTypeName}</span>
            </div>
            <div class="shoppttimejbdetailtext ">
                <label>结算方式</label><span id="">{settlementType}</span>
            </div>
            <div class="shoppttimejbdetailtext bgcolore4e5e4">
                <label><m class="letterspacing2">提</m>成</label><span class="color1ea43d">{isDeduct}</span>
            </div>
            <div class="shoppttimejbdetailtext ">
                <label><m class="letterspacing05">联系</m>人</label><span id="">{contact}</span>
            </div>
            <div class="shoppttimejbdetailtext bgcolore4e5e4">
                <label>联系方式</label><span id="">{contactTel}</span>
            </div>
            <div class="shoppttimejbdetailtext ">
                <label><m class="letterspacing2">状</m>态</label><span id="">{status}</span>
            </div>
            <input type="button" value="删除" class="martop30 wid100 bord" id="btnDelte" onclick="GLOBAL.pagebase.delteJobInfo({jobId})" />
        </script>

    </div>
</div>


<style type="text/css">
    p{cursor:pointer}

</style>

</body>

</html>