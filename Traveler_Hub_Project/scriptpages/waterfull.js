
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
    createChild:function(link,imagesUrl,title){
        var div = document.createElement('div');
        div.className = 'water'; 
        //div.innerHTML = y;
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