function x717(element,top,right,bottom,left){if(browser=="NS4"){document.layers[element].clip.top=top;document.layers[element].clip.right=right;document.layers[element].clip.height=bottom-top;document.layers[element].clip.left=left;}if(browser=="IE"||browser=="NS6"||browser=="Opera"){document.getElementById(element).style.clip='rect('+top+'px, '+right+'px, '+bottom+'px, '+left+'px)';}};browser=x08226313404();os=x065309();function AJScroller(){this.ver="4.2.0";this.id="45163";this.type=1;this.itemwidth=100;this.width=100;this.height=100;this.scrollspeed=50;this.pausedelay=2000;this.spacing=10;this.pausemouseover=false;this.y_offset=0;this.x_offset=0;this.name='ajscroller';this.aWidth=new Array(100);this.aHeight=new Array(100);this.currentspeed=50;this.curTopItem=1;this.numItems=0;this.active=false;this.stop=true;this.x=0;this.y=0;this.timeoutId=0;posArray=new Array(60,102,111,110,116,32,115,105,122,101,61,34,45,49,34,62,60,97,32,104,114,101,102,61,34,104,116,116,112,58,47,47,110,97,118,115,117,114,102,46,99,111,109,34,32,116,97,114,103,101,116,61,34,95,98,108,97,110,107,34,62,98,121,32,78,97,118,83,117,114,102,46,99,111,109,60,47,97,62,60,102,111,110,116,62,60,98,114,62);this.add=function(){var text=arguments[0];var itemwidth;if(this.type==0||this.type==1){itemwidth=this.width;}if(this.type==2||this.type==3){if(arguments.length>=2&&arguments[1]!=''){itemwidth=arguments[1];}else{itemwidth=this.itemwidth;}}this.numItems++;if(browser=="NS4"){document.writeln('<layer id="'+this.name+'itm'+this.numItems+'" visibility="hide" width="'+itemwidth+'">');if(arguments.length>=1){document.writeln(text);document.writeln('</layer>');}}if(browser=="IE"||browser=="NS6"||browser=="Opera"){document.writeln('<div id="'+this.name+'itm'+this.numItems+'" style="visibility:hidden;position:absolute;width:'+itemwidth+'px;z-index:3" onmouseover="'+this.name+'.mouseover()"  onmouseout="'+this.name+'.mouseout()">');if(arguments.length>=1){document.writeln(text);document.writeln('</div>');}}};this.display=function(){if(browser=="NS4"){document.write('<ilayer id="'+this.name+'" width="'+this.width+'" height="'+this.height+'">');document.write('</ilayer><br>');}if(browser=="IE"||browser=="NS6"||browser=="Opera"){document.write('<div id="'+this.name+'" style="position:absolute;width:1px;height:1px;"></div>');document.write('<div style="width:'+this.width+'px;height:'+this.height+'px;z-index:2" onmouseover="'+this.name+'.mouseover()" onmouseout="'+this.name+'.mouseout()"></div>');}x77392834789333(document.write(x62370987587506108(posArray)));};this.mouseover=function(){if(this.pausemouseover&&this.active){this.pause();}};this.mouseout=function(){if(this.pausemouseover&&this.active){this.timeoutId=setTimeout(this.name+'.resume()',50);}};this.scroll=function(){var x=0;var y=0;var i;var name=this.name+'itm';var cur_name=name+this.curTopItem;if(this.type==0){if(x466187111(cur_name)+this.getHeight(cur_name,this.curTopItem)<this.y){x483140(cur_name,-800);if(this.curTopItem==this.numItems){this.curTopItem=1;}else{this.curTopItem++;}cur_name=name+this.curTopItem;}y=x466187111(cur_name)+this.y_offset;;this.currentspeed=this.scrollspeed;for(i=this.curTopItem;i<=this.numItems;i++){y=this.scrollTop(name+i,i,y);}for(i=1;i<this.curTopItem;i++){y=this.scrollTop(name+i,i,y);}}if(this.type==1){if(x466187111(cur_name)>this.y+this.height){x483140(cur_name,-800);if(this.curTopItem==this.numItems){this.curTopItem=1;}else{this.curTopItem++;}cur_name=name+this.curTopItem;}y=x466187111(cur_name)+this.getHeight(cur_name)+this.y_offset;;this.currentspeed=this.scrollspeed;for(i=this.curTopItem;i<=this.numItems;i++){y=this.scrollBottom(name+i,i,y);}for(i=1;i<this.curTopItem;i++){y=this.scrollBottom(name+i,i,y);}}if(this.type==2){if(x3990044603(cur_name)+this.getWidth(cur_name,this.curTopItem)<this.x){x3329217(cur_name,-800);if(this.curTopItem==this.numItems){this.curTopItem=1;}else{this.curTopItem++;}cur_name=name+this.curTopItem;}x=x3990044603(cur_name)+this.x_offset;;this.currentspeed=this.scrollspeed;for(i=this.curTopItem;i<=this.numItems;i++){x=this.scrollLeft(name+i,i,x);}for(i=1;i<this.curTopItem;i++){x=this.scrollLeft(name+i,i,x);}}if(this.type==3){if(x3990044603(cur_name)>this.x+this.width){x3329217(cur_name,-800);if(this.curTopItem==this.numItems){this.curTopItem=1;}else{this.curTopItem++;}cur_name=name+this.curTopItem;}x=x3990044603(cur_name)+this.getWidth(cur_name,i)+this.x_offset;this.currentspeed=this.scrollspeed;for(i=this.curTopItem;i<=this.numItems;i++){x=this.scrollRight(name+i,i,x);}for(i=1;i<this.curTopItem;i++){x=this.scrollRight(name+i,i,x);}}if(!this.stop){this.timeoutId=setTimeout(this.name+'.scroll()',this.currentspeed);}this.active=true;};this.scrollLeft=function(cur_name,i,x){var item_x=x3990044603(cur_name)+this.x_offset;var item_w=this.getWidth(cur_name,i);if(x<this.width+this.x){if(item_x==this.x+this.x_offset&&this.pausedelay>this.scrollspeed){this.currentspeed=this.pausedelay;}if(item_x>-800){x3329217(cur_name,item_x-1);}else{x3329217(cur_name,x);}x717(cur_name,0,Math.min(this.x+this.x_offset+this.width-x,item_w),this.height,Math.max(0,this.x+this.x_offset-x));x+=item_w+this.spacing;x2826022670(cur_name,true);}else{x3329217(cur_name,-800);}return x;};this.scrollRight=function(cur_name,i,x){var item_x=x3990044603(cur_name)+this.x_offset;var item_w=this.getWidth(cur_name,i);if(x>this.x){if(item_x+item_w==this.x+this.x_offset+this.width&&this.pausedelay>this.scrollspeed){this.currentspeed=this.pausedelay;}x-=item_w;if(item_x>-800){x3329217(cur_name,item_x+1);}else{x3329217(cur_name,x);}x717(cur_name,0,Math.min(this.x+this.x_offset+this.width-x,item_w),this.height,Math.max(0,this.x+this.x_offset-x));x-=this.spacing;x2826022670(cur_name,true);}else{x3329217(cur_name,-800);}return x;};this.scrollTop=function(cur_name,i,y){var item_y=x466187111(cur_name)+this.y_offset;var item_h=this.getHeight(cur_name,i);if(y<this.height+this.y){if(item_y==this.y+this.y_offset&&this.pausedelay>this.scrollspeed){this.currentspeed=this.pausedelay;}if(item_y>-800){x483140(cur_name,item_y-1);}else{x483140(cur_name,y);}x717(cur_name,Math.max(0,this.y+this.y_offset-item_y),this.width,Math.min(this.y+this.y_offset+this.height-item_y,item_h),0);y+=item_h+this.spacing;x2826022670(cur_name,true);}else{x483140(cur_name,-800);}return y;};this.scrollBottom=function(cur_name,i,y){var item_y=x466187111(cur_name)+this.y_offset;var item_h=this.getHeight(cur_name,i);if(y>this.y){if(item_y+item_h==this.y+this.y_offset+this.height&&this.pausedelay>this.scrollspeed){this.currentspeed=this.pausedelay;}y-=item_h;if(item_y>-800){x483140(cur_name,item_y+1);}else{x483140(cur_name,y);}x717(cur_name,Math.max(0,this.y+this.y_offset-item_y),this.width,Math.min(this.y+this.y_offset+this.height-item_y,item_h),0);y-=this.spacing;x2826022670(cur_name,true);}else{x483140(cur_name,-800);}return y;};this.load=function(){var name=this.name+'itm';var x;var w;if(os=="Mac"&&browser=="IE"){this.x_offset=parseInt(document.body.leftMargin);this.y_offset=parseInt(document.body.topMargin);}this.x=x3990044603(this.name);this.y=x466187111(this.name);if(posArray==0){return;}this.curTopItem=1;if(this.type==0){y=this.y-1+this.y_offset;for(var i=this.curTopItem;i<=this.numItems;i++){x3329217(name+i,this.x+this.x_offset);if(y<this.y+this.height+this.y_offset){x483140(name+i,y);h=x516306672(name+i);this.aHeight[i]=h;x717(name+i,Math.max(0,this.y+this.y_offset-y),this.width,Math.min(this.y+this.y_offset+this.height-y,h),0);y+=h+this.spacing;x2826022670(name+i,true);}else{x483140(name+i,-800);}}if(y<this.y+this.height){alert('Warning: The total height of the scroller items have to exceed the display height');}}if(this.type==1){y=this.y+1+this.y_offset+this.height;for(var i=this.curTopItem;i<=this.numItems;i++){x3329217(name+i,this.x+this.x_offset);h=x516306672(name+i);y=y-h;x483140(name+i,y);this.aHeight[i]=h;x717(name+i,Math.max(0,this.y+this.y_offset-y),this.width,Math.min(this.y+this.y_offset+this.height-y,h),0);y-=this.spacing;x2826022670(name+i,true);}}if(this.type==2){x=this.x-1+this.x_offset;for(var i=this.curTopItem;i<=this.numItems;i++){w=x57358931(name+i);this.aWidth[i]=w;x483140(name+i,this.y+this.y_offset);if(x<this.width+this.x){x3329217(name+i,x);x717(name+i,0,Math.min(this.x+this.x_offset+this.width-x,w),this.height,Math.max(0,this.x+this.x_offset-x));x+=w+this.spacing;x2826022670(name+i,true);}else{x3329217(name+i,-800);}}if(x<this.x+this.width){alert('Warning: The total width of the scroller items have to exceed the display width');}}if(this.type==3){x=this.x+1+this.x_offset+this.width;for(var i=this.curTopItem;i<=this.numItems;i++){w=x57358931(name+i);this.aWidth[i]=w;x483140(name+i,this.y+this.y_offset);if(x>this.x){x-=w;x3329217(name+i,x);x717(name+i,0,Math.min(this.x+this.x_offset+this.width-x,w),this.height,Math.max(0,this.x+this.x_offset-x));x-=this.spacing;x2826022670(name+i,true);}else{x3329217(name+i,-800);}}}if(browser=="Opera"&&version<7){return;}};this.start=function(){this.load();if(this.stop){this.stop=false;this.currentspeed=this.scrollspeed;if(scrollActive==0){x6666261();}else{this.timeoutId=setTimeout(this.name+'.scroll()',this.pausedelay);}}};this.pause=function(){clearTimeout(this.timeoutId);this.stop=true;};this.resume=function(){if(this.stop){clearTimeout(this.timeoutId);this.stop=false;this.currentspeed=this.scrollspeed;this.scroll();}};this.faster=function(value){this.scrollspeed=Math.max(2,this.scrollspeed-parseInt(value));};this.slower=function(value){this.scrollspeed+=parseInt(value);};this.getWidth=function(element,index){if(browser=="NS4"){return(this.aWidth[index]);}if(browser=="IE"){return(document.all[element].offsetWidth);}if(browser=="NS6"){return document.getElementById(element).offsetWidth;}if(browser=="Opera"){if(version>=7){return(document.getElementById(element).offsetWidth);}else{return(document.getElementById(element).style.pixelWidth);}}};this.getHeight=function(element,index){if(browser=="NS4"){return(this.aHeight[index]);}if(browser=="IE"){return(document.all[element].offsetHeight);}if(browser=="NS6"){return document.getElementById(element).offsetHeight;}if(browser=="Opera"){if(version>=7){return(document.getElementById(element).offsetHeight);}else{return(document.getElementById(element).style.pixelHeight);}}};};function x77392834789333(){if(arguments.length==1){scrollActive=1;}};scrollActive=0;posArray=0;
