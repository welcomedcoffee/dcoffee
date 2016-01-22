$(function(){
/*data*/


$(".ncomeMeterDelete").click(function(){
    $(this).parent().animate({top:-800},300,function(){
           $(".mark").remove();
            $(this).hide().css({top:0,left:0});
          })
})

/*data*/



/*隐藏在线客服*/

$("#doyoo_panel").css({visibility:"hidden"})
setTimeout(function(){
$("#doyoo_panel").hide();
},10)
	

/*隐藏在线客服*/

/*下拉选项*/
$(".user").hover(function(){
   $(this).children("h3").css("background","#14b0fd");
   $(".userMass").css("color","#fff");
   $(".headSculpture span").fadeIn();
  /* $(".userMass i").css("background-position","0px -21px")*/
   $(".userList").show()
},function(){
     $(this).children("h3").css("background","none");
     $(".userMass").css("color","#33a8eb");
     /*$(".userMass i").css("background-position","0px -5px");*/
     $(".headSculpture span").fadeOut();
     $(".userList").hide();
})


//$(".headSculpture span").click(function(){
//     $(".fileImg").click()
//})


$(".companyNewsTitleCont li a").click(function(){
	 $(this).addClass("bottomBodr").parent().siblings().children("a").removeClass("bottomBodr")
})

$(".navigation li a").click(function(){
	 $(this).addClass("bodr").parent().siblings().children("a").removeClass("bodr")
})


/*我的银行卡*/
$(".bankCardCont b").text($(".bankCardCont b").text().replace(/.*(\d{4})/,"**************$1"))
/*我的银行卡*/


/*网银支付*/
$(".tableList td").click(function(){
   $(this).children("input").prop("checked",true)
})



$("#replaceBut").click(function(){
   $(".genhuan").hide();
   $(".met").show();
})

$(".cancelBut").click(function(){
   $(".genhuan").show();
   $(".met").hide();
   $(".errorSpan").text("");
})


$(".bankCard p input").focus(function(){
      $(this).css({"color":"#14b1fe","box-shadow":" 1px 0 3px 1px #14b1fe","font-weight":"bold"})

})

$(".bankCard p input").blur(function(){
      $(this).css({"color":"#000","box-shadow":"none"})

})


/*$(".customerService li").hover(function(){
     $(this).children(".qGroup").show()
},function(){
 
  $(this).children(".qGroup").hide()
})

$(".backHome li").hover(function(){
     $(this).children(".toolMoreSame").show()
},function(){
 
  $(this).children(".toolMoreSame").hide()
})
*/


/*$(".see").click(function(){
  $(".seePopup").Ztpopup();
})*/

/*$(".remove").click(function(){
    $(".seePopup").animate({top:-800},300,function(){
        $(".seePopup").hide().css({top:0,left:0});
        $(".mark").remove();
    })
})*/



/*网银支付*/


$(".woyouyaoqingma").click(function(){
     var yaoqingma=$(".yaoqingma");
     if(yaoqingma.is(":hidden")){
       $(this).css("background-position","-122px 0")
        yaoqingma.show()
     }else{
      yaoqingma.hide()
      $(this).css("background-position","-5px 0")
     }
})


/*本息保障*/

$(".securityList li").click(function(){
     var index=$(this).index();
     var exhibition=$(".exhibition");
     exhibition.eq(index).fadeIn(500).siblings(".exhibition").hide();
     $(this).addClass("greey").siblings().removeClass("greey")
})


/*本息保障*/
})


