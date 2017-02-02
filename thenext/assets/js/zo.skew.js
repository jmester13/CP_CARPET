!(function($){
    "use strict";    
    $.fn.zoSkew = function(opts){
        return $(this).each(function(){
			var defaults = {
				border_size: 10,
				border_color: '#222222',
				skewsize: 20,
				skew: 'bottom',
			};
            var self = $(this),
                skew = self.data('zo-skew'),
                border_size = self.data('zo-bordersize'),
                border_color = self.data('zo-bordercolor'),
                skewsize = self.data('zo-skewsize'),
                w = 0,
                h = 0;
            var o = $.extend( defaults,{
				border_size: border_size,
				border_color: border_color,
				skewsize: 20,
				skew: skew,
			}, opts);
            self.css('position', 'relative');
            var canvas = document.createElement('canvas'),
                ctx = canvas.getContext('2d');
            switch(o.skew) {
                    case 'right':
                        w = self.innerWidth() + o.skewsize;
                        h = self.innerHeight();
                        break;
                     case 'bottom':
                        w = self.innerWidth();
                        h = self.innerHeight() + o.skewsize;
                        break;
            }
            
            self.append(canvas);
            $(window).load(function(){
                switch(o.skew) {
                        case 'right':
                            w = self.innerWidth() + o.skewsize;
                            h = self.innerHeight();
                            break;
                         case 'bottom':
                            w = self.innerWidth();
                            h = self.innerHeight() + o.skewsize;
                            break;
                }    
				console.log(self.innerHeight());        
                switch(o.skew) {
                    case 'right':
                        canvas.width = w;
                        canvas.height = h;
                        ctx.lineWidth = o.border_size;
                        ctx.strokeStyle = o.border_color;                    
                        ctx.beginPath();                    
                        ctx.moveTo(self.innerWidth(), h);
                        ctx.lineTo(0, h);
                        ctx.lineTo(0, 0);
                        ctx.lineTo(w, 0);
                        ctx.stroke();                        
                                            
                        ctx.lineWidth = o.border_size/2;
                        ctx.beginPath();
                        ctx.moveTo(w-1, 0);
                        ctx.lineTo(self.innerWidth(), h); 
                        ctx.stroke();
                        break;
                        
                    case 'bottom':
                        self.find('canvas').css('bottom', -o.skewsize);
                        canvas.width = w;
                        canvas.height = h;
                        ctx.lineWidth = o.border_size;
                        ctx.strokeStyle = o.border_color;  
						//ctx.fillStyle = '#8ED6FF';                  
                        ctx.beginPath();                    
                        ctx.moveTo( 0 , h);
                        ctx.lineTo(0, 0);
                        ctx.lineTo(w, 0);                        
                        ctx.lineTo(w, self.innerHeight());
                        ctx.stroke();                        
                                            
                        ctx.lineWidth = o.border_size/2;
                        ctx.beginPath();
                        ctx.moveTo(self.innerWidth(), self.innerHeight());
                        ctx.lineTo(0, h-o.border_size/5);
                        ctx.stroke();
                        break;
                } 
            }).trigger('resize');                      
            
        })
    }
    
    $(function(){
        $('[data-zo-skew]').zoSkew();
        $('.fa',$('#zo_social_widget-2')).zoSkew({
			border_size: 2,
			border_color: '#FFFFFF',
			skew: 'bottom',
			skewsize: 20,
		});
    })
})(jQuery)