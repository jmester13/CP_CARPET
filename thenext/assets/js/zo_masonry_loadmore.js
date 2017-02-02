jQuery(document).ready(function($) {     
	"use strict"; 
    var pageNum = parseInt(zo_more_obj.startPage) + 1;
 	var total = parseInt(zo_more_obj.total);
	var max = parseInt(zo_more_obj.maxPages);
 	var perpage = parseInt(zo_more_obj.perpage);
	var nextLink = zo_more_obj.nextLink;     
	$.countPost = function(total,perpage,pageNum){
		var cposts = total-perpage*pageNum;
		if(cposts>perpage){
			return 'Load More';
		}
		else{
			return 'Load More';
		}
	}
    
	$.loadData = function(){
		"use strict"; 
		// Masonry     

        if(zo_more_obj.masonry=='masonry'){
            $('.zo_items_loadmore').hide();
            var data = {
                action: 'zo_masonry_loadmore_refresh',
                startPage: pageNum ,
                zo_data: zo_more_obj.zo_masory
            };
            $.post(zo_more_obj.ajaxurl , data, function(response) {
                if(response != 0) {
                    $('.zo_items_loadmore').html('') ;
                    $('.zo_items_loadmore').append(response);
                    var  $items = {} ;
                    $('.zo_items_loadmore').each(function(index){
                        $(this).children().each(function(index){
                          $items[index] = $($(this));
                        }) 
                    });
                    $.each($items,function(idx, obj){
                         $('.zo-masonry-wrap').append($($(this)));   
                         $('.zo-masonry-wrap').shuffle('appended', $($(this))); 
                    }); 
                    setTimeout(function(){
                        $('.zo-masonry').find('.zo-masonry-item').append('<div class="shuffle__sizer"></div>');
                        zo_masonry_col_width($('.zo-masonry'), zo_more_obj.zo_masory.masonry_option['zo-masonry']);
                        zo_masonry_resize($('.zo-masonry'),zo_more_obj.admin);
                        $('.zo-masonry-wrap').shuffle('update');
                    }, 900);
                    //Add paging

                    pageNum++;
                     // Add a new placeholder, for when user clicks again.
                    $('#zo-load-posts').before('<div class="zo-placeholder-'+ pageNum +'"></div>')
                    if(zo_more_obj.ajaxType=='Button'){
                        // Update the button message.
                        if(pageNum <= max) {
                            $('#zo-load-posts a').text($.countPost(total,perpage,pageNum-1));
                        } 
                        else {
                            $('#zo-load-posts a').text('No more');
                        }    
                    }
                    else{
                        $('#zo-load-posts').find('a').text('');
                    }
                    $('#zo-load-posts').find('a').data('loading',0);
                } else {
                    
                }
            });
        }
        else {
            $.get(nextLink,function(data){  
                 var html='';
                $(data).find('.zo-grid > .zo-grid-item').each(function(){
                    html += $('<div>').append($(this).clone()).html();
                });
                $('.zo-grid').append(html); 
                pageNum++;
                
                if(nextLink.indexOf('/page/')>-1){
                    nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);
                }
                else{
                    nextLink = nextLink.replace(/paged=[0-9]?/, 'paged='+ pageNum);
                }
                // Add a new placeholder, for when user clicks again.
                $('#zo-load-posts').
                before('<div class="zo-placeholder-'+ pageNum +'"></div>')
                 if(zo_more_obj.ajaxType=='Button'){
                    // Update the button message.
                    if(pageNum <= max) {
                        $('#zo-load-posts a').text($.countPost(total,perpage,pageNum-1));
                    } else {
                        $('#zo-load-posts a').text('No more');
                    }    
                }else{
                    $('#zo-load-posts').find('a').text('');
                }
                $('#zo-load-posts').find('a').data('loading',0);
            });
        }
	}
	if(pageNum <= max) {
		var text=$.countPost(total,perpage,1);
		if(zo_more_obj.ajaxType=='Scroll'){
			text = '';
		}
		$('.zo_pagination').append('<div class="zo-placeholder-'+ pageNum +'"></div><p id="zo-load-posts"><a data-loading="0" href="#">'+text+'</a></p>');
		
	}
	if(zo_more_obj.ajaxType=='Button'){
		$('#zo-load-posts a').click(function(){
			if(pageNum <= max){
				$(this).text('Loading posts...');
				$.loadData();
			}
            else {
				//$('#zo-load-posts a').append('.');
			}
            return false;
		});
	}
	else{
		jQuery(document, window).scroll(function() {
			var bottomElm = ($('.zo-content .content-wrap').offset().top + $('.zo-content .content-wrap').height()) - jQuery(document).scrollTop();
			if (jQuery(window).height()>bottomElm){
				if(pageNum <= max){
					if($('#zo-load-posts').find('a').data('loading')!=1){
						$('#zo-load-posts').find('a').text('Loading posts...');
						$('#zo-load-posts').find('a').data('loading',1);
						$.loadData();
					}
				}
			}
		});
		var bottomElm = ($('.zo-content .content-wrap').offset().top + $('.zo-content .content-wrap').height()) - jQuery(document).scrollTop();
		if (jQuery(window).height()>bottomElm){
			if(pageNum <= max){
				if($('#zo-load-posts').find('a').data('loading')!=1){
					$('#zo-load-posts').find('a').text('Loading posts...');
					$('#zo-load-posts').find('a').data('loading',1);
					$.loadData();
				}
			}
		}		
	}
    zo_reload_filter('.zo-masonry');
    function zo_reload_filter($container){
        var $filter = $($container).parent().find('.zo-masonry-filter');
        $filter.find('a').click(function(e){
            e.preventDefault();
            // set active class
            $filter.find('a').removeClass('active');
            $(this).addClass('active');

            // get group name from clicked item
            var groupName = $(this).attr('data-group');
            // reshuffle grid
            $(this).parent().parent().parent().parent().find('.zo-masonry').shuffle('shuffle', groupName );
        });
    }

    function zo_masonry_col_width($container, options){
        //var w = $container.width(),
        var ww = $(window).width(),
            w = $container.width(),
            columnNum = 1,
            columnWidth = 0,
            columnHeight = 0;
        if(ww < 768){
            columnNum = options.grid_cols_xs;
        } else if(ww >= 768 && ww < 992){
            columnNum = options.grid_cols_sm;
        } else if(ww >= 992 && ww < 1200){
            columnNum = options.grid_cols_md;
        } else if(ww >= 1200){
            columnNum = options.grid_cols_lg;
        }
        columnWidth = Math.floor((w-options.grid_margin*(columnNum-1))/columnNum);
        columnHeight = columnWidth*options.grid_ratio;
        $container.find('.shuffle__sizer').css({
            width: columnWidth,
            margin: options.grid_margin
        });

        $container.find('.zo-masonry-item').each(function() {
            var $item = $(this),
                multiplier_w = $item.attr('class').match(/item-w(\d)/),
                multiplier_h = $item.attr('class').match(/item-h(\d)/),
                width = columnNum==1?columnWidth:multiplier_w[1]*columnWidth + (multiplier_w[1]-1)*options.grid_margin,
                height = columnNum==1?columnHeight:multiplier_h[1]*columnHeight + (multiplier_h[1]-1)*options.grid_margin;
            $item.css({
                width: width,
                height: height,
                marginBottom: options.grid_margin
            });
        });
        return columnWidth;
    }

    function zo_masonry_resize($container, $admin){
        $container.each(function(){
        var $grid = $(this),
            $parent = $(this).parent().attr('id');

        var options = zoMasonry[$parent];

        $grid.find('.zo-masonry-item').resizable({
            grid:[
                options.columnWidth + options.grid_margin,
                options.columnWidth * options.grid_ratio + options.grid_margin
            ],
            autoHide: true,
            start:function(){
                $grid.data('resize', false);
            },
            resize:function(){
                $grid.shuffle('update');
            },
            stop: function( event, ui ){
                $grid.data('resize', true);
                var w = Math.floor(ui.size.width/options.columnWidth),
                    h = Math.floor(ui.size.height/options.columnWidth / options.grid_ratio),
                    item = $(ui.element).data('index'),
                    pid = $(ui.element).data('id');
                console.log(w+'-'+h);
                /* add like. */
                $.post(ajaxurl, {
                    action : 'zo_masonry_save',
                    pid : pid,
                    id : $parent,
                    item : item,
                    width: w,
                    height: h,
                    dataType: "json"
                }, function(response) {

                });
            }
        });
    });
    }
})