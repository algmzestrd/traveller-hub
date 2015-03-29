


var WaterFull = {
    $:function(id){return document.getElementById(id);},
    data:[{imgUrl:'images/02.jpg',link:'javascript:void(0)',title:'01'},
          {imgUrl:'images/02.jpg',link:'javascript:void(0)',title:'02'},
          {imgUrl:'images/03.jpg',link:'javascript:void(0)',title:'03'},
          {imgUrl:'images/05.jpg',link:'javascript:void(0)',title:'04'},
          {imgUrl:'images/06.jpg',link:'javascript:void(0)',title:'05'},
          {imgUrl:'images/07.jpg',link:'javascript:void(0)',title:'06'},
          {imgUrl:'images/08.jpg',link:'javascript:void(0)',title:'07'},
          {imgUrl:'images/09.jpg',link:'javascript:void(0)',title:'08'},
          {imgUrl:'images/10.jpg',link:'javascript:void(0)',title:'09'},
          {imgUrl:'images/11.jpg',link:'javascript:void(0)',title:'10'},
          {imgUrl:'images/12.jpg',link:'javascript:void(0)',title:'11'},
          {imgUrl:'images/13.jpg',link:'javascript:void(0)',title:'12'},
          {imgUrl:'images/14.jpg',link:'javascript:void(0)',title:'13'},
          {imgUrl:'images/15.jpg',link:'javascript:void(0)',title:'14'}
          ],
    createChild:function(link,title){
        var str = '<p>First thing First First thing First First thing First First thing First First thing First First thing First First thing First First thing First First thing First First thing First First thing First First thing First First thing First First thing First </p>';
        var div = document.createElement('div');
        div.className = 'water';
        div.innerHTML = str; 
        var dataSpan = document.createElement('span');
        var btn = document.createElement("BUTTON");
        btn.setAttribute('onclick', 'goodplus(1);');
        var t = document.createTextNode("Join us");       // Create a text node
        btn.appendChild(t);
        dataSpan.innerHTML = 0;
        div.appendChild(dataSpan);
        btn.setAttribute("class", "btn btn-primary");
        div.appendChild(btn);
        var num;
        var flag = 0;
        var span = document.getElementsByTagName('span');
        for(var i = 1; i < span.length + 1; i++)
        {
          senddata(i); 
        }
        function goodplus(gindex)
        {
              flag = 1;
              num = parseInt(span.item(gindex-1).innerHTML);
              if(checkcookie(gindex) == true){
              num = num + 1;
              senddata(gindex);
              }
              else{
                alert("You Have clicked the Join") 
              }              
        }
        function senddata(aindex)
        {
          var xmlhttp;
          var txt;
          if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
          }else{
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function()
          {
              if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
              {
                txt = xmlhttp.responseText;
                var cookieindex = aindex - 1;
                document.getElementsByTagName('span').item(cookieindex).innerHTML = txt;
              }
          }
            xmlhttp.open("GET","/ajax/json/index.php?num=" + num + '&flag=' + flag + '&aindex=' + aindex,true);
            xmlhttp.send();
        }
        function checkcookie(gindex)
        {
            var thiscookie = 'sdcity_foodmap_goodplus' + gindex;
            var mapcookie = getCookie(thiscookie)
            if (mapcookie!=null && mapcookie!=""){
              return false;
            }
            else 
            {
              setCookie(thiscookie,thiscookie,365);
              return true;
            } 
        }
  

        function getCookie(c_name)
        {
          if (document.cookie.length > 0)
          {
              c_start = document.cookie.indexOf(c_name + "=");
              if (c_start != -1)
              {
                c_start = c_start + c_name.length + 1 ;
                c_end = document.cookie.indexOf(";" , c_start);
                 if (c_end == -1) {
                  c_end = document.cookie.length;
                }
                return unescape(document.cookie.substring(c_start , c_end));
              } 
          }
          return "";
        }
 
        function setCookie(c_name,value,expiredays)
        {

            var exdate=new Date();
            exdate.setDate( exdate.getDate() + expiredays )
            document.cookie = c_name + "=" + escape(value) + ((expiredays==null) ? "" : "; expires=" + exdate.toGMTString())
        }
        return div;
    },



    on:function(element, type, func) {
        if (element.addEventListener) {
            element.addEventListener(type, func, false); 
        } else if (element.attachEvent) {
            element.attachEvent('on' + type, func);
        } else {
            element['on' + type] = func;
        }
    },
    
    getRowByHeight:function(){
        var row = [this.$('row1'),this.$('row2'),this.$('row3'),this.$('row4')];
        var height = [];
        for(var i = 0;row[i];i++){
            row[i].height = row[i].offsetHeight;
            height.push(row[i]);
        }
        
        height.sort(function(a,b){
            return a.height - b.height;
        });
        return height;
    },
   
    getPageHeight:function(){
        return document.documentElement.scrollHeight || document.body.scrollHeight ;
    },
    
    getScrollTop:function(){
        return document.documentElement.scrollTop || document.body.scrollTop;
    },
   
    getClientHeigth:function(){
        return document.documentElement.clientHeight || document.body.clientHeight;
    },
    append:function(){
        var i = 0,rows = this.getRowByHeight(),div,k;
        for(;this.data[i];i++){
            div = this.createChild(this.data[i].link, this.data[i].imgUrl,this.data[i].title);
             k = ((i+1)>4)?i%4:i;            
			
			rows[k].appendChild(div);
        }
    },
	 onScroll:function(){
        
        var height = WaterFull.getPageHeight();
        var scrollTop = WaterFull.getScrollTop();
        var clientHeight = WaterFull.getClientHeigth();
    
        if(scrollTop + clientHeight > height - 50){
            WaterFull.append();
        }
    },
    timer:null
};
WaterFull.on(window, 'scroll',function(){
    clearTimeout( WaterFull.timer );
    WaterFull.timer = setTimeout(WaterFull.onScroll,500);
});