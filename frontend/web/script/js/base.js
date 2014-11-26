var fun ={
    param:function(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]); return null;
       }
}

$(function(){
   $("._href").attr("href","javascript:void(0);");
});



/**
 *Start_form
 *vesion:1.3
 **/
(function($){
    $.fn.form=function(opt_params){
        var opt={
            url:"",
            pre:true,
            group:''
        }
        $.extend(opt,opt_params);
        
        var obj=$(this);  
        var form_id=obj.attr("id");
        var url=opt.url;


        /*Start_验证*/
        
        //加载时的处理
        $("[v],[v_a]",obj).each(function(){
            var v_name=$(this).attr('v')||$(this).attr('v_a');
            $(this).after("<span class='v_tip'></span>");
            var q=false;
            switch(v_name){
                case 'user_name':
                    q=true;
                    v_type_reg(this,'请输入正确的姓名',/^[\u4e00-\u9fa5A-Za-z0-9\[\](){}_]{2,10}$/,q);
                    break;
                case 'user_code':
                    v_focus(this,'编号格式为：如SXD-555');
                    q=true;
                    v_type_reg(this,'请输入正确的编号：如 SXD-555',/^SXD-[0-9]{1,5}$/,q);
                    break;
                case 'radio':
                    v_type_radio(this,'至少选择一个');
                    break;
                case 'mobile':
                    v_type_reg(this,'请输入正确的手机号码',/^1[0-9]{10}$/,q);
                    break;
                case 'user_idcard':
                    var reg = /^([1-9]\d{7}((0[1-9])|(1[0-2]))((0[1-9])|([1-2][0-9])|(3[0-1]))\d{3})|([1-9]\d{5}[1-9]\d{3}((0[1-9])|(1[0-2]))((0[1-9])|([1-2][0-9])|(3[0-1]))\d{3}(\d|x|X))$/;
                    v_type_reg(this,'请输入15或18位身份证号',reg,q);
                    break;
                case 'address':
                    v_type_str(this,[0,50],q);
                    break;
                case 'name':
                    q=true;
                    v_type_reg(this,'请输入正确的中文名称',/^[\u4e00-\u9fa5A-Za-z0-9\[\](){}]{2,20}$/,q);
                    break;
                case 'sort':
                    q=true;
                    v_type_int(this,[1,10],q);                   
                    break;
                 case 'module':
                    v_type_str(this,[0,20],q);                   
                    break;
                case 'control':
                    q=true;
                    v_type_str(this,[1,20],q);                   
                    break;
                case 'action':
                    q=true;
                    v_type_str(this,[1,20],q);                   
                    break;
                case 'remark':
                    v_type_str(this,[0,50],q);                   
                    break;
                case 'title':
                    q=true;
                    v_type_str(this,[1,50],q);                   
                    break;
                case 'destination':
                    q=true;
                    v_type_str(this,[1,50],q);                   
                    break;
                case 'ip':
                    q=true;
                    var reg=/^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5]):[1-9][0-9]*$/;
                    v_type_reg(this,'请输入正确的IP：如 192.168.1.33:8080',reg,q);                   
                    break;
                case 'password':
                    q=true;
                    v_type_str(this,[6,10],q);                   
                    break;
                case 'joindate':
                    q=true;
                    v_type_str(this,0,q);  
                    break;
                case 'user_id':
                    q=true;
                    v_type_int(this,[1,10],q);  
                    break;
                case 'cardtime':
                    q=true;
                    v_type_str(this,0,q);  
                    break;
                case 'content':
                    q=true;
                    v_type_str(this,[1,200],q);  
                    break;
                case 'reason':
                    q=true;
                    v_type_str(this,[1,200],q);
                    break;
                case 'per':
                    q=true;
                    v_type_reg(this,"请输入正确的百分比范围0-100",/\d+$/,q);
                    break;
                case 'comment':
                    q=true;
                    v_type_str(this,[1,150],q);                   
                    break; 
                default:
                    //alert("验证名字有错了！");
                    break;
            }
            if($(this).attr('v_q')==="true"){
                v_tip_notice(this,'*')
            }else if($(this).attr('v_q')==="false"){ 
            }else{
                if(q){
                   v_tip_notice(this,'*')
                }
            }
               
        });  

        //提交时验证判定
        function v_submit(){
            $("[v]:not([v_status_right][v_status_error])",obj).each(function(){
                  $(this).click().blur();
            });
            var num=$("[v_status_error]",obj).size();
            if(num==0){
                return true;
            }
            else{
                return false;
            }
        }
        
        //焦点事件     
        function v_focus(obj,str){ 
             $(obj).focus(function(){
                v_tip_focus(obj,str);
             });
        }
        //焦点事件     
        function v_q(obj,q){
            var v_q=$(obj).attr('v_q');
            if(v_q==='false'){
                q=false;
            }            
            else if(v_q==='true'){
                q=true;
            }

            if(q&&$(obj).val()==''){
                v_tip_error(obj,"*必填");
                return false;
            }
            else if(!q&&$(obj).val()==''){
                v_tip_right(obj);
            }
            else{
                return true;
            }
        }
        //各种验证类型
        function v_type_reg(obj,str,reg,q){//失去焦点事件：正则表达式
            $(obj).blur(function(){
                if(v_q(obj,q)){
                    var regBool=reg.test($(this).val());
                    if(!regBool){
                        v_tip_error(this,str);
                    }
                    else {
                        v_tip_right(this);
                    }
                }
            });
        }
        function v_type_radio(obj,str){//失去焦点事件：radio
            $(obj).click(function(){
                if($(':radio:checked',$(obj)).val()==null){
                    v_tip_error(this,str);
                 }
                else {
                    v_tip_right(this);
                }
            });
        }
        function v_type_str(obj,arr,q){
            $(obj).blur(function(){
                if(v_q(obj,q)){
                    if($(this).val().length>arr[1]||$(this).val().length<arr[0]){
                        v_tip_error(this,'长度范围为'+arr[0]+'-'+arr[1]+'字符');
                    }else{
                        var str_val=$(this).val();
                        str_val=str_val.replace(/'/g,'"');
                        $(this).val(str_val);
                        v_tip_right(this);
                    }
                }
            });
        }
        function v_type_int(obj,arr,q){
            $(obj).blur(function(){
                if(v_q(obj,q)){
                    if($.isNumeric($(this).val())){
                        if($(this).val().length>arr[1]||$(this).val().length<arr[0]){
                             v_tip_error(this,'长度范围为'+arr[0]+'-'+arr[1]+'位数字');
                        }else{
                            v_tip_right(this);
                        }
                    }else{
                         v_tip_error(this,'只能输入数字');
                    }
                }
            });
        }
        
        //提示处理函数
        function v_tip_notice(obj,str){//提示
            $(obj).next('span').html('<span class="v_tip_notice">'+str+'</span>');
        }
        function v_tip_error(obj,str){//错误
            $(obj).attr('v_status_error','v_status_error');
            $(obj).removeAttr('v_status_right');
            $(obj).next('span').html('<span class="v_tip_error">'+str+'</span>');
        }
        function v_tip_right(obj){//正确
            $(obj).attr('v_status_right','v_status_right');      
            $(obj).removeAttr('v_status_error');
            $(obj).next('span').html('<span class="v_tip_right"></span>');
        }
        function v_tip_focus(obj,str){
             $(obj).next('span').html('<span class="v_tip_focus">'+str+'</span>');
        }
        /*End_验证*/
        
        
        /*Start_提交处理*/
        $("#"+form_id+"_submit , ."+form_id+"_submit",obj).click(function(){
            if(!v_submit()){
               //d.tip(0,'请正确填写页面信息');
                return false;
            }
            if((form_id+"_before" in window)&&(typeof(eval(form_id+"_before"))=="function")){//前置函数接口
                if(!eval(form_id+"_before")()){
                    return false;
                }
            }
            if($("#"+form_id+"_id").val()==""){
                alert("你没选择项目");
                return false;   
            }
            var obj=this;
            $(obj).attr('disabled','disabled');//setTimeout(function(){$(this).removeAttr('disabled');},3000);
             var param=$("#"+form_id).serialize(); 
              $.ajax({
                 type: "POST",
                 url: url,
                 data:param,
                 dataType:'json',
                 success: function(data, textStatus){
                     $(obj).removeAttr('disabled');
                    if((form_id+"_success" in window)&&(typeof(eval(form_id+"_success"))=="function")){
                      eval(form_id+"_success")(data);
                    }        
                 },
                 error:function(){
                     $(obj).removeAttr('disabled');
                     alert("有错了！");
                 }
              });
            return false;
        });
        /*End_提交处理*/
        var formValue=function(frm) {
            var o = {};
            var a = $(frm).serializeArray();
            $.each(a, function () {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });

            return o;
        };
     }
})($);
/**
 *end_form
 **/



/**
 *Start_form
 *vesion:1.3
 **/
(function($){
    $.fn.ajaxtable=function(opt_params){
        var opt={
            url:""
        };
        $.extend(opt,opt_params);
        
        var obj=$(this);  
        var id=obj.attr("id");
        var id_form=id+'_form';
        var id_list=id+'_list';
        var url=opt.url;
        
        $("#"+id+'_form',obj).append("<input name='page' type='hidden' value='1'/>");
       $(".yiiPager li a",obj).removeAttr('href'); 
        
        $(".yiiPager li",obj).live('click',function(){ 
              var page=$(this).attr('page')||1;           
              $("input[name='page']").val(page); 
              $("#"+id_form+"_submit").click();
         });
        
        /*Start_提交处理*/
        $("#"+id_form+"_submit , ."+id_form+"_submit",obj).click(function(){
            $("#"+id_list).append('<div class="yiiPager_doing"><span>正在请求...</span></div>');
           // return;
            var obj_btn=this;
            $(obj_btn).attr('disabled','disabled');
             var param=$("#"+id_form).serialize(); 
              $.ajax({
                 type: "POST",
                 url: url,
                 data:param,
                 dataType:'text',
                 success: function(data, textStatus){
                     $(obj_btn).removeAttr('disabled');
                    // $(data).replaceAll("#"+id_list);
                     $("#"+id_list).html(data);
                     $('#'+id_form+' input[name="page"]').val(1);
                     $(".yiiPager li a",obj).removeAttr('href'); 
                 },
                 error:function(){
                     $(obj_btn).removeAttr('disabled');
                     alert("网络异常！");
                 }
              });
            return false;
        });
        $("#"+id_form+"_submit").click();
        /*End_提交处理*/
     }
})($);
/**
 *end_form
 **/


/**
 *Start_allcb
 *vesion:1.0
 **/
(function($){
    $.fn.allcb=function(opt_params){
        var opt={
            input:""
        }
        $.extend(opt,opt_params);
        
        var obj=$(this); 
        var id=obj.attr("id");
        var obj_all=$("input[type='checkbox'][name='all']",obj);
        var obj_cb=$("input[type='checkbox'][name='cb']",obj);
        obj_all.click(function(){
            if($(this).attr("checked")=="checked"){
                obj_cb.attr("checked",true);
            }
            else{
                obj_cb.removeAttr("checked");
            }
            input_val();
        });
        obj_cb.click(function(){
            if($(this).attr("checked")!="checked"){
                obj_all.removeAttr("checked");
            }
            else{
                if(obj_cb.size()==obj_cb.filter(":checked").size()){
                   obj_all.attr("checked",true);
                }
            }
            input_val();
        });
        
        
        var input_val=function(){
            var arr=[];
            obj_cb.each(function(){                
                if($(this).attr("checked")=="checked"){
                    arr.push($(this).val());
                }
                var arr_str=arr.join(","); 
                $("#"+opt.input).val(arr_str);
            });
        }
    }
})($);
/**
 *end_allcb
 **/


/**
 *Start_form
 *vesion:1.0
 **/
(function($){
    $.fn.form_submit=function(opt_params){
        var opt={
            url:""
        }
        $.extend(opt,opt_params);
        
        var obj=$(this); 
        var form_id=obj.attr("id");
        var url=opt.url;
        
        /*Start_处理事件*/
        //单选
        $("[type='radio']",obj).click(function(){
           $("[name='"+$(this).attr("name")+"'][type='hidden']").val($(this).val());
        }); 
        //多项

        
        /*End_处理事件*/
        
        /*Start_提交处理*/
        $(obj).submit(function(){
            var param="";
            var param_arr=[];
            $("[type='text'],[type='hidden'],[type='password'],textarea,select",obj).each(function(){
                        var str=form_id+"["+$(this).attr("name")+"]="+$(this).val();
                        param_arr.push(str);
                });
                param=param_arr.join('&');
                $.ajax({
                   type: "POST",
                   url: url,
                   data:param,
                   dataType:'json',
                   success: function(data, textStatus){
                      /* if(data.tip!=""){
                           alert(data.tip);
                       }*/
                       if(data.state&&typeof(eval(form_id))=="function"){//成功和定义了函数才执行回调
                           eval(form_id)();
                       }
                   },
                   error:function(){
                       alert("有错了！");
                   }
                });
            return false;
        })
        /*End_提交处理*/
    }
})($);
/**
 *end_form
 **/



/*Start_cookie封装操作*/
var cookie={
	//设置cookie
	set:function(name,value){
		var Days = 300; //此 cookie 将被保存 300 天
		var exp = new Date();    //new Date("December 31, 9998");
		exp.setTime(exp.getTime() + Days*24*60*60*1000);
		document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
	},
	//获取cookie
	get:function(name){
		var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
		if(arr != null) return unescape(arr[2]); return null;
	},
	//删除cookie
	del:function(name){
		var exp = new Date();
		exp.setTime(exp.getTime() - 1);
		var cval=cookie.get(name);
		if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
	}
}
/*End_cookie封装操作*/

/*Start_format_ate*/
var date_cut_sec = function(data){
    if(""!==data){
        var arr = data.split(":");
        data = arr[0]+":"+arr[1];
    }
   return data;
};
 /*End_format_ate*/
/*Start_滚动条设置*/
 $(function(){
     scrollBar();
     $(window).resize(function() {
        scrollBar();
     });
     function scrollBar(){
        var sidenav_height = $(".sidenav_wrap").height();
        var header_height = $(".header").height();
        var window_height=$(window).height(); 
        if(sidenav_height+header_height>window_height){   
            $(".sidenav").mCustomScrollbar({
                scrollButtons:{enable:true},
                theme:"light-thick",
                scrollSpeed:10,
                scrollAmount:20
            });
            $(".mCSB_container").css("margin-right","15px");
            $(".mCSB_container").css("left","2px");
            $(".mCSB_dragger_bar").css("background-color","white");
            $(".mCSB_draggerRail").css("position","absolute");
            $(".mCSB_draggerRail").css("margin-left","6px");
        }else{
            $(".mCSB_container").css("margin-right","0px");
        }
     }
 });
 /*End_滚动条设置*/
 $(function(){
     $(".search_btn").before("<input type='text' style='display:none' />");
 });