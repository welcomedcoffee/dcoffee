<?php
/**
 * Created by PhpStorm.
 * User: 王明东
 * Date: 2016/1/21
 * Time: 21:11
 */
    use yii\helpers\Url;
    $this->title = "兼职评论";
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="public/css/comm.css" />
    <link rel="stylesheet" href="public/css/shop.css" />
    <link rel="stylesheet" href="public/css/sty.css" />
    <link rel="stylesheet" type="text/css" href="public/css/kkpager_orange.css" />
    <link rel="stylesheet" type="text/css" href="public/css/start.css" />
</head>
<body>
<!--head-->
<!--head end-->
<!--t_nav-->
<div class="t_min t_tit">当前位置：<a href="/">首页</a> > 我的趣淘学</div>
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
                <div class="pinglun">
                        <span class="no" id="waitCommentBtn" style="cursor: pointer">
                            待评论
                        </span>
                        <span  id="yesCommentBtn" style="cursor: pointer">
                            已评论
                        </span>
                </div>
                <div class="kuang">
                    <span class="info">兼职信息</span>
                    <span class="type">评价状态</span>
                </div>
                <div class="daipinglun">
                    <ul id="commentdivDemo" class="daipinglun">
                        <li>加载中...</li>
                    </ul>


                    <script type="text/template" id="commentTemplate">
                        <li>
                            <img src="{parttimePic}" />
                                <span style="position:relative;top:-55px;">
                                    <font class="name"> {name}</font> <br />
                                    <font style="position:relative;left:-20px">{studentName}</font> <br />
                                    <font style="position:relative;left:70px">兼职时间：{workEndTime}</font>
                                </span>
                            <div class="comentforOne" style="cursor:pointer" atr="{userId}" job='{jobId}' keyid={applyId} types='{type}'>
                                <e class="btnCommentLink" clk='0'>
                                    <a href="javascript:GLOBAL.pagebase.commentBtnClick(this,{types})"  style="color:#fff">点击评论</a>
                                </e>
                            </div>
                        </li>
                    </script>

                    <script type="text/template" id="studentFrmComment">
                        <div class="idDiv" atr='{commentorId}' bid="{toCommentorId}" jid="{orderId}">
                            <img src="images/touxiang.png" style="width:50px;height:50px;position:relative;left:-3em;margin-top:24px;" />
                                <span style="float:left;position:relative;left:6em;top:0.8em">
                                    <e>{commentor}</e>
                                    <br />{content}
                                </span>
                            <span class="score"> {score} </span><br />
                            <sapn style="position:relative;left:6em;top:-1.8em"> {commentTime}</span>
                        </div>
                    </script>
                    <div style="display:none" id="studentFrm" style="margin-top:50px">
                        <img src="/images/changlan.png" class="changlan" />
                        <div id="frmdiv">

                        </div>
                        <div class="quiz">
                            <h3>我要评论</h3>
                            <div class="quiz_content">
                                <div class="goods-comm">
                                    <div class="goods-comm-stars">
                                        <span class="star_l">满意度：</span>
                                        <div id="rate-comm-1" class="rate-comm">

                                        </div>
                                    </div>
                                </div>
                                <div class="l_text">
                                    <label class="m_flo">内  容：</label>
                                    <textarea name="textContent" id="txtContent" class="text"></textarea>
                                    <span class="tr">字数限制为5-200个</span>
                                </div>
                                <input class="btm" type="button" value="我要评论" id="btnCommoneTosystem" />
                            </div>
                        </div>
                    </div>

                </div>


                <div id="kkpager" ></div>


            </div>
        </div>
    </div>
</div>

<style type="text/css">
    p{cursor:pointer}

</style>

</body>
</html>