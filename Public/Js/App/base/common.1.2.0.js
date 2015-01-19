//放置短小的辅助性代码
define(function(require,exports,module){
	//fixed html5 tag less
	("abbr article aside audio canvas datalist details figcaption figure footer " +
            "header hgroup mark meter nav output progress section summary template time video"
            ).replace(/[^, ]+/g, function(tag) {
        document.createElement(tag);
    });
    // 屏蔽 低端浏览器的调试语句错误
    if(!window.console){
        window.console = {};
        window.console.log = window.console.info = function(){};
    }
    /**
     * 判断变量类型
     * @param type 变量类型 String ,Array,Object
     * @param obj 变量
     * @returns {boolean}
     */
    function isType(type, obj) {
        var clas = Object.prototype.toString.call(obj).slice(8, -1);
        return obj !== undefined && obj !== null && clas === type;
    }

    /**
     * 获取顶级域名
     * @returns string
     */
    function getTopDomain(){
        var regex = /(\w+\.(?:com|cn|net|org|cc|tv|com\.cn))(?:\/|$)/;
        return window.location.host.match(regex)[1];
    }
    var common = {};
    //命名空间
    common.str = {};
    common.num = {};
    common.bool = {};
    common.obj = {};
    common.arr = {};
    common.fun = {};
    common.date = {};
    common.reg = {};
    common.ui = {};
    common.util = {};

    /**
    * 生成url路径
    * @param {String} url 支持[分组/模块/操作]
    * @param {Object} vars 额外参数(支持数组传值)
    * @param {Boolean} redirect 是否跳转默认是
    * @param {Boolean} suffix 是否伪静态默认是
     * @param {Boolean} domain 是否显示域名,有分级时优先组
    * @author cwh
    */
    common.U = function(url,vars,redirect,suffix , domain){
        redirect = redirect || false;
    	//分组
    	var cwh_group = domain ? domain : window.STCONFIG.urlGroup;
    	//模型
    	var cwh_model = window.STCONFIG.urlModule;
    	//操作
    	var cwh_action = window.STCONFIG.urlAction;
        //分隔符
        var cwhDepr = window.STCONFIG.urlDepr;
    	if(url){
    		url = url.split("/");
    		if(url.length==3){
    			cwh_group = url[0];
    			cwh_model = url[1];
    			cwh_action = url[2];
    		}else if(url.length==2){
    			cwh_model = url[0];
    			cwh_action = url[1];
    		}else{
    			cwh_action = url[0];
    		}
    	}
    	//额外参数
    	var cwh_parameter = '';
    	if (vars){
    		if(isType('Array',vars)||isType('Object' , vars)){
    			for(var p in vars){
    				if(vars[p] != '' && typeof vars[p]!='function'){
    					cwh_parameter += cwhDepr + p + cwhDepr + vars[p];
    				}
    			}
    		}else{
    			var reg=new RegExp("&","g"); 
    			vars = vars.replace(reg,cwhDepr);
    			var reg=new RegExp("=","g"); 
    			cwh_parameter = vars.replace(reg,cwhDepr);
    		}
    	}
    	//伪静态
    	var cwh_suffix = window.STCONFIG.urlHtmlSuffix;
    	if(suffix === false){
    		cwh_suffix = '';
    	}
        //有分组参数
        if (cwh_group){
            url = 'http://' +cwh_group + '.' +getTopDomain() + cwhDepr + cwh_model + cwhDepr + cwh_action + cwh_parameter + cwh_suffix;
        } else {
            url = '/' + cwh_model + cwhDepr + cwh_action + cwh_parameter + cwh_suffix;
        }
    	//是否跳转url
    	if(redirect === false){
    		return url;
    	}else if(redirect === 'blank'){
            window.open(url,target = '_blank');
        }else{
            location.href = url;
    	}
    };

    //全角转半角
    common.str.toCDB = function(s){
        /*全角(65281-65374)与半角的对应关系是：均相差65248*/
        return s.replace(/[\uff01-\uff5e]/g,function(c){
            return String.fromCharCode(c.charCodeAt(0)-0xfee0);
        });
    };

    //按字节长度截断字符串
    common.str.substr = function(str,start,length,basebyte){
        str = str==null?'':str+'';
        if(str==''||length==null||!basebyte){
            return str.substr(start,length); 
        }else{
            var s = '',n = start||0,c,byteL = 0;           
            while(byteL<length){
                c = str.charAt(n++);
                if((/[\u0000-\u00ff]/).test(c)){
                    byteL+=1;
                }else if((/[\u0100-\uffff]/).test(c)){
                    byteL+=2;
                }else{
                    byteL+=3;
                }

                if(byteL<=length){
                    s+=c;
                }
            }

            return s;
        }
    };

    //数字序号中文
    common.str.cnIndex = function(index,frag){
        index = parseFloat(index);
        frag = Boolean(frag);
        var cnNums,cnPos;
        if(frag){
            cnNums = '零壹贰叁肆伍陆柒捌玖';
            cnPos = '拾佰仟万';
        }else{
            cnNums = '〇一二三四五六七八九';
            cnPos = '十百千万';
        }
        cnNums = cnNums.split('');
        cnPos = cnPos.split('');
        cnPos.unshift('');

        if(index<1){
            return cnNums[0]+'点'+(index+'').slice(2).replace(/\d/g,function(s){ return cnNums[s]; });
        }else if(index<10){
            return cnNums[index];
        }else if(index<20){
           return cnPos[0]+cnNums[index%10];
        }else if(index>=100000){
            var w = arguments.callee.call(this,(index/10000)>>0,frag)+cnPos[4];
            var q = arguments.callee.call(this,index%10000,frag);
            if(index%10000<1000){
                q = cnNums[0]+q;
            }
           return w+q;
        }else if(index%1>0){
            var z = arguments.callee.call(this,index>>0,frag);
            var d = arguments.callee.call(this,index%1,frag).slice(1);
            return z+d;
        }

        var arr = [],radix = 1,pos=1; 
        while(pos = (index/radix)>>0,pos>=1){            
            arr.unshift(cnNums[pos%10]+cnPos[(radix+'').length-1]);
            radix*=10;            
        }


        var s =  arr.join('')
            .replace(new RegExp('('+cnNums[0]+').?','g'),"$1")
            .replace(/(.?)\1+/g,"$1")
            .replace(new RegExp(cnNums[0]+'$','g'),'')
            .replace(new RegExp(cnNums[0]+'(?=.+?\\1)','g'),'')
            .replace(new RegExp('('+cnNums[0]+')(?=.*?\\1)','g'),'');
               
        return s;
    }

     //日期格式化
    common.date.format = function(date,formatStr){
        date = parseInt(date*1);
        date = !isNaN(date)&&new Date(date)||new Date();
        var dateParse = {
            y:date.getFullYear(),
            m:date.getMonth()+1,
            d:date.getDate(),
            h:date.getHours(),
            i:date.getMinutes(),
            s:date.getSeconds(),
            w:'星期'+('日一二三四五六').split('')[date.getDay()]
        }

        return formatStr.replace(/%([ymdhisw])/gi,function(m,s){
            var k = s.toLowerCase();
            var v = dateParse[k];
            if(s<'a'&&(v+'').length<2||s=='y'){
                v = ('0'+v).slice(-2);
            }

            return v;
        });

    }

    //时间格式化
    common.date.timeFormat = function(time,formatStr){
        time = parseInt(time*1);
        time = time||0;
        var parseTime = {
                h:parseInt(time/3600),
                i:parseInt((time%3600)/60),
                s:time%60
            };

        return formatStr.replace(/%([his])/gi,function(m,s){
            var k = s.toLowerCase();
            var v = parseTime[k];
            if(s<'a'&&(v+'').length<2){
                v = ('0'+v).slice(-2);
            }

            return v;
        });

    }

    common.ui.tabInit = function(){
        var tab,conf,callback,argsNum = arguments.length;
        if(argsNum<2){
            throw new Error("at least 2 arguments needed for function 'tabInit'");
        }
        while(argsNum--){
            if(!argsNum){
                tab = typeof(arguments[0])=="string"?$("#"+arguments[0]):$(arguments[0]);    
            }else if(arguments[argsNum].constructor===Function){
                callback = arguments[argsNum];
            }else if(arguments[argsNum].constructor===Object){
                conf = arguments[argsNum];            
            }                         
        }                    
        
                                
        $(tab).children()[(!conf||conf.eventType)||'click'](function(){ // tab导航            
            if(conf&&$(this).attr("class")==conf.tabClass[0]){
                return;
            }
            
            var curTabIndex = $(this).index();  //要求tab容器 的子元素都是 tab  切换按钮
            
            if(conf&&conf.tabClass&&conf.tabClass.length){
                $(this).siblings().removeClass(conf.tabClass[0]).addClass(conf.tabClass[1]);
                $(this).removeClass(conf.tabClass[1]).addClass(conf.tabClass[0]);
            }            
            
            if(conf&&conf.sheets&&conf.sheets.length){
                $.each(conf.sheets,function(i,v){
                    var sheet = $(typeof(conf.sheets[i])=="string"?"#"+conf.sheets[i]:conf.sheets[i]);
                    if(i==curTabIndex){
                        sheet.show();
                    }else{
                            sheet.hide();
                        }
                });
            }            
                                    
            if(callback){                
                callback.apply(this,[tab,curTabIndex,conf]);
            }
        });
    };
    
    //添加收藏夹
    common.AddFavorite = function(sURL, sTitle) {
	    sURL = sURL || location.href;
	    sTitle = sTitle || document.title;
	    try {
	    window.external.addFavorite(sURL, sTitle);
	    }
	    catch (e) {
	    	try { window.sidebar.addPanel(sTitle, sURL, ""); } 
	    	catch (e) { alert("加入收藏失败，请使用Ctrl+D进行添加"); }
	    }
    } 
    
    //清除HTML标记
    common.strip_tags = function(input, allowed) {
    	//将特殊字符转换为HTML实体
    	input = input.replace(/&amp;/g,'&').replace(/&quot;/g,'"').replace(/&#039;/g,"'").replace(/&lt;/g,'<').replace(/&gt;/g,'>');
    	allowed = (((allowed || '') + '').toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join(''); 
    	var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi;
        commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
        return input.replace(commentsAndPhpTags, '').replace(tags, function($0, $1) {
    		  return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
        });
    }

    common.random = function(min ,max){
        return Math.floor(Math.random() * (max - min)) + min;
    }
    module.exports = common;
});
