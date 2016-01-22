<?php
use yii\helpers\Html;
use yii\helpers\Url;
    $this->title = "我的门店";
?>

<link rel="stylesheet" href="/public/css/comm.css">
<link rel="stylesheet" href="/public/css/shop.css">
<link rel="stylesheet" href="/public/css/sty.css">

<div class="t_min t_tit">当前位置：<a href="http://www.qutaoxue.net/">首页</a> &gt; 我的趣淘学</div>
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
            <div class="clear"></div>
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
                <div class="myjob">
                    <span>我的兼职:</span>
                </div>
                <table class="date" cellpadding="0" cellspacing="0" width="960px">
                    <thead>
                    <tr style="background: #E5E5E4; border: 0;">
                        <th class="id">序号</th>
                        <th class="id">兼职职位</th>
                        <th class="type">行业类型</th>
                        <th class="type">工作地点</th>
                        <th class="money">工资待遇</th>
                        <th class="action">操作</th>
                    </tr>
                    </thead>
                    <tbody id="divjobDiv"></tbody>没有数据！
                </table>
                <script type="text/template" id="buinessjobTemplate">
                    <tr class="tr">
                        <td>{jobId}</td>
                        <td>{name}</td>
                        <td>{workTypeName}</td>
                        <td>{province} {city}</td>
                        <td>{salary}/天</td>
                        <td>
                            <a href="/merchant/merchantParttimeList">查看详情</a>
                        </td>
                    </tr>
                </script>
                <div class="solid"></div>
                <div class="order">
                    <span>我的订单:</span>
                </div>
                <table class="two" style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="960px">
                    <thead>
                    <tr style="background: #E5E5E4; border: 0;">
                        <th class="th">序号</th>
                        <th class="th">订单号</th>
                        <th class="th">交易时间</th>
                        <th class="th">用户</th>
                        <th class="th">消费总额</th>
                        <th class="th">优惠金额</th>
                        <th class="th">实付金额</th>
                        <th class="th" style="width:133px">操作</th>
                    </tr>
                    </thead>
                    <tbody id="OrderDiv"></tbody>没有数据！
                </table>
                <script type="text/template" id="OrderTemplate">
                    <tr class="tr">
                        <td>{orderId}</td>
                        <td>{orderNo}</td>
                        <td>{orderTime}</td>
                        <td><div class="shopname" title="{userName}">{userName}</div></td>
                        <td>{totalAmt}元</td>
                        <td>{favouredAmt}元</td>
                        <td>{realAmt}元</td>
                        <td>已完成</td>
                    </tr>
                </script>
            </div>
        </div>
    </div>
</div>



<style type="text/css">
    p{cursor:pointer}

</style>

<div class="qpzz" style="display: none;">
    <div class="tip_box">
        <h3>温馨提示</h3>
        <img src="%E6%88%91%E7%9A%84%E9%97%A8%E5%BA%97_files/cross27.png" style="width:25px;height:25px;float: right;position: relative;top:-35px;left:-5px;">
        <div class="con_t">
            <p id="titleBox"></p>

        </div>
        <br><br>
        <div style="float: right; margin-right: 20px;">
            <input name="" id="studetail" value="完善资料" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" type="button">&nbsp;&nbsp;
            <input name="" id="index" value="确定" style="width: 70px; height: 30px;border-radius:4px;background-color:#0089cf;color: white;" type="button">
        </div>
    </div>
</div>