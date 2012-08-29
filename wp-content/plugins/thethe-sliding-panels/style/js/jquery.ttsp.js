/** 
 * The Sliding Panels - jQuery plugin
 *
 * Copywrite © TFTM 2010
 *
 * Recoment version of jQuery 1.4.2 or later
 */

(function($){
    /*
     * @plugin: Top Panel
     *
     * Initialization (with default settings):
     * <script type="text/javascript">
     *      $('#thetheTopPanel').topPanel();
     * </script>
     */
    $.fn.topPanel = function(settings){
        var options = $.extend({
            width : '400',
			widthUnit : 'px',
            height : '200px',
            speed : 500,
			
			theme : 'black',
			transparent : true,
            bgColor : '',
			opacity : 30,
            borderColor : '',
			borderWidth : 0,
			textColor : '',
			
			radius : 0,
			tabRadius : 0,
			shadowSize : 0,
			shadowColor : '',

            autoOpen : true,
            autoClose : false,
            openIn : 10,
            closeAfter : 30,
            showTab : true,
            tabText : 'Top Panel',
            showCloseButton : true,
            closeButtonText : 'X',
			firstVisitShow : true,
			regularity : 'always',
			backLink : true
        },settings);

        return this.each(function(){
            var div = $('#tspAbsoluteTP'),
                setTimeout = window.setTimeout,
                divString = '<div/>',
				elem = $(this);
            if (div) div.remove();
			options.opacity = 1 - (parseInt(options.opacity)/100);
            var divAbsoluteHeight = parseInt(options.height),
                divArticleHeight = parseInt(options.height),
				divContentHeight = divAbsoluteHeight - parseInt(options.borderWidth),
				divRadius = parseInt(options.radius),
				tabRadius = parseInt(options.tabRadius),
                divFixed = $(divString).attr('id','tspTopFixed').addClass('thetheSP' + ' theme-'+options.theme),
                divAbsolute = $(divString).attr('id','tspAbsoluteTP'),
                divTransparent = $(divString).addClass('transparentTP'),
                divTopPanel = $(divString).attr('id','tspTopPanel').addClass('tspTopPanel'),
                divContainer = $(divString).addClass('containerTP'), // panel-container
                divTrigger = $(divString).addClass('tspTrigger tspTriggerTP').css({
					'top' : '-'+parseInt(options.borderWidth)+'px'
				}),
                divTriggerLeft = $(divString).addClass('leftTP'),
                divTriggerCenter = $(divString).addClass('tspTriggerC').html(options.tabText).css({
                    'background-color' : options.bgColor,
                    'color' : options.textColor,
					'border-width' : parseInt(options.borderWidth),
					'border-color' : options.borderColor,
					WebkitBorderBottomLeftRadius: tabRadius,
					WebkitBorderBottomRightRadius: tabRadius,
					MozBorderRadiusBottomleft: tabRadius,
					MozBorderRadiusBottomright: tabRadius,
					'border-bottom-left-radius' : tabRadius,
					'border-bottom-right-radius' : tabRadius,
					MozBoxShadow : '0 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					WebkitBoxShadow : '0 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					'box-shadow' : '0 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor										
							
                }),
                divTriggerRight = $(divString).addClass('rightTP'),
                divPanelContainer = $(divString).addClass('secondTP').css({ // panel-wrapper
                    'height' : divAbsoluteHeight
                }),
                divPanel = $(divString).addClass('panelTP').css({
                    'height' : divAbsoluteHeight
                }),
                divContent = $(divString).addClass('contentTP contentSP').css({
                    'width' : parseInt(options.width) + options.widthUnit,
                    'height' : divContentHeight,
					'border-width' : parseInt(options.borderWidth),
					'border-color' : options.borderColor,
					WebkitBorderBottomLeftRadius: divRadius,
					WebkitBorderBottomRightRadius: divRadius,
					MozBorderRadiusBottomleft: divRadius,
					MozBorderRadiusBottomright: divRadius,
					'border-bottom-left-radius' : divRadius,
					'border-bottom-right-radius' : divRadius,
					MozBoxShadow : '0 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					WebkitBoxShadow : '0 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					'box-shadow' : '0 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor										
                }),
				divBg = $(divString).addClass('tspBg').css({
                    'background-color' : options.bgColor,
                    'opacity' : options.transparent ? (options.opacity ? options.opacity : 0.8) : 1,
					WebkitBorderBottomLeftRadius: divRadius,
					WebkitBorderBottomRightRadius: divRadius,
					MozBorderRadiusBottomleft: divRadius,
					MozBorderRadiusBottomright: divRadius,
					'border-bottom-left-radius' : divRadius,
					'border-bottom-right-radius' : divRadius
                }),
                divClose = $(divString).addClass('tspClose').html(options.closeButtonText).css({
                    'border-color' : options.textColor,
                    'color' : options.textColor
                }),
                divArticle = $(divString).addClass('articleTP').css({
                    'height' : divArticleHeight,
                    'overflow' : 'hidden'
                }),
	            divBackLink = $(divString).addClass('backLink').html('<a href="http://thethefly.com/wp-plugins/thethe-sliding-panels/" title="Powered by TheThe Sliding Panels WordPress Plugin" target="_blank">?</a>').css({
                    'color' : options.textColor
    	        });
				
			if ( (parseInt(options.width) == 100) && (options.widthUnit == "%") )
				$(divContent).css({'border-left' : 'none','border-right' : 'none'});
			
            $(this).css({
				'color' : options.textColor
			});

            var up = false,
                isActive = false,
                wasActive = false;
                
            var sliding = function(e){
                    if (isActive){
                        e.preventDefault();
                        return false;
                    }
                    
                    wasActive = isActive = true;

                    $(divAbsolute).animate({
                        top : (up ? '-=' : '+=') + divAbsoluteHeight + 'px'
                    }, options.speed, function(){up = !up;});

                    setTimeout(function(){isActive = false;}, options.speed);
            },
			addPanel = function(){
	            if (options.showCloseButton){
    	            $(elem).prepend(divClose);				
				}
	            if (options.backLink)
   			        $(divContent).append(divBackLink);			
				$(divContent).append(divBg);
				$(divContent).append(elem);			
    	        $(divPanel).append(divContent);
        	    $(divPanelContainer).append(divPanel);
	            $(divContainer).append(divPanelContainer);
    	        if (options.showTab){
        	    	$(divTrigger).append(divTriggerLeft);
	            	$(divTrigger).append(divTriggerCenter);
		            $(divTrigger).append(divTriggerRight);			
	    	        $(divContainer).append(divTrigger);
				}
    	        $(divTopPanel).append(divContainer);
        	    $(divAbsolute).append(divTopPanel);
	            $(divFixed).append(divAbsolute);
    	        $('body').append(divFixed);
							
                $(divClose).click(sliding);
                $(divTrigger).click(sliding);
                $(divAbsolute).css('top','-' + divAbsoluteHeight + 'px');

                if (options.autoOpen)
                {
                    setTimeout(function()
                    {
                        if (!up && !wasActive && !isActive)
                        {
                                $(divTrigger).click();
                                wasActive = false;
                        }
                    },options.openIn * 1000);

                    if (options.autoClose)
                    {
                        setTimeout(function()
                        {
                            if (up && !wasActive && !isActive)
                                $(divTrigger).click();
                        },options.closeAfter * 1000);
                    }
                }				
			};

            $(function(){ // DOM Ready
				elem.hide();
				var now = new Date(),
					expDate = new Date(now.getFullYear() + 20,01,01),
					firstVisit = new Date($.cookie("thethefly-tp-first-visit")),
					lastVisit = new Date($.cookie("thethefly-tp-last-visit")),								
					difTime = parseInt((now - lastVisit)/1000/60);
								
				function showP(){
					elem.show();
	                addPanel();
					$.cookie("thethefly-tp-last-visit", now, {expires: expDate, path: "/"});								
				}
				if($.cookie("thethefly-tp-first-visit")){
					switch (options.regularity) {
						case 'always': 
							showP();
							break;
						case 'once':
							if(!$.cookie("thethefly-tp-last-visit"))
								showP();
							break;										
						case 'every_hour':										
							if(( difTime ) >= 60 ){
								showP();											
							}										
							break;
						case 'every_3_hour':
							if(( difTime ) >= 180 ){
								showP();											
							}
							break;
						case 'every_6_hour':
							if(( difTime ) >= 360 ){
								showP();											
							}
							break;
						case 'every_12_hour':
							if(( difTime ) >= 720 ){
								showP();											
							}
							break;
						case 'every_day':
							if(( difTime ) >= 1440 ){
								showP();											
							}
							break;
						case 'every_week':
							if(( difTime ) >= 10080 ){
								showP();											
							}
							break;
						case 'every_month':
							if(( difTime ) >= 43200 ){
								showP();											
							}
							break;
					}				
				} else if (options.firstVisitShow){
					$.cookie("thethefly-tp-first-visit", now, {expires: expDate, path: "/"});
					showP();
				} else {
					$.cookie("thethefly-tp-first-visit", now, {expires: expDate, path: "/"});
				}
            });			
        });
    }
    /*
     * @plugin: Bottom Panel
     *
     * Initialization (with default settings):
     * <script type="text/javascript">
     *      $('#bottomPanel').bottomPanel();
     * </script>
     */
    $.fn.bottomPanel = function(settings){
        var options = $.extend({
            width : '400',			
            height : '200',
			widthUnit : 'px',
            speed : 500,
			
			theme : 'black',
			transparent : true,
            bgColor : '',
			opacity : 30,			
            borderColor : '',
			borderWidth : 0,
			textColor : '',
			
			radius : 0,
			tabRadius : 0,
			shadowSize : 0,
			shadowColor : '',

            autoOpen : true,
            autoClose : false,
            openIn : 10,
            closeAfter : 30,
            showTab : true,
            tabText : 'Bottom Panel',
            showCloseButton : true,
            closeButtonText : 'X',
			firstVisitShow : true,			
			regularity : 'always',
			backLink : true
		},settings);
        
        return this.each(function(){
            var div = $('#tspAbsoluteBP'),
                setTimeout = window.setTimeout,
                divString = '<div/>',
				elem = $(this);
            if (div) div.remove();
			options.opacity = 1 - (parseInt(options.opacity)/100);

            var divAbsoluteHeight = parseInt(options.height),
                divArticleHeight = parseInt(options.height),
				divContentHeight = divAbsoluteHeight - parseInt(options.borderWidth),				
				divRadius = parseInt(options.radius),
				tabRadius = parseInt(options.tabRadius),
                divFixed = $(divString).attr('id','tspBottomFixed').addClass('thetheSP' + ' theme-'+options.theme),
                divAbsolute = $(divString).attr('id','tspAbsoluteBP'),
                divTransparent = $(divString).addClass('transparentBP'),
                divBottomPanel = $(divString).attr('id','tspBottomPanel').addClass('tspBottomPanel'),
                divContainer = $(divString).addClass('containerBP'), // panel-container
                divTrigger = $(divString).addClass('tspTrigger tspTriggerBP'),
                divTriggerLeft = $(divString).addClass('leftBP'),
				divTriggerCenter = $(divString).addClass('tspTriggerC').html(options.tabText).css({
                    'background-color' : options.bgColor,
                    'color' : options.textColor,
					'border-width' : parseInt(options.borderWidth),
					'border-color' : options.borderColor,					
					WebkitBorderTopLeftRadius: tabRadius,
					WebkitBorderTopRightRadius: tabRadius,
					MozBorderRadiusTopleft: tabRadius,
					MozBorderRadiusTopright: tabRadius,
					'border-top-left-radius' : tabRadius,
					'border-top-right-radius' : tabRadius,
					MozBoxShadow : '0 -1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					WebkitBoxShadow : '0 -1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					'box-shadow' : '0 -1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor										
										
                }),
                divTriggerRight = $(divString).addClass('rightBP'),
                divPanelContainer = $(divString).addClass('secondBP').css({ // panel-wrapper
                    'height' : divAbsoluteHeight
                }),
                divPanel = $(divString).addClass('panelBP').css({
                    'height' : divAbsoluteHeight
                }),
                divContent = $(divString).addClass('contentBP contentSP').css({
                    'width' : parseInt(options.width) + options.widthUnit,
                    'height' : divContentHeight,
					'border-width' : parseInt(options.borderWidth),
					'border-color' : options.borderColor,
					WebkitBorderTopLeftRadius: divRadius,
					WebkitBorderTopRightRadius: divRadius,
					MozBorderRadiusTopleft: divRadius,
					MozBorderRadiusTopright: divRadius,
					'border-top-left-radius' : divRadius,
					'border-top-right-radius' : divRadius,
					MozBoxShadow : '0 -1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					WebkitBoxShadow : '0 -1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					'box-shadow' : '0 -1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor															
                }),
				divBg = $(divString).addClass('tspBg').css({
                    'background-color' : options.bgColor,
                    'opacity' : options.transparent ? (options.opacity ? options.opacity : 0.8) : 1,
					WebkitBorderTopLeftRadius: divRadius,
					WebkitBorderTopRightRadius: divRadius,
					MozBorderRadiusTopleft: divRadius,
					MozBorderRadiusTopright: divRadius,
					'border-top-left-radius' : divRadius,
					'border-top-right-radius' : divRadius
                }),
                divClose = $(divString).addClass('tspClose').html(options.closeButtonText).css({
                    'border-color' : options.textColor,
                    'color' : options.textColor
                }),
                divArticle = $(divString).addClass('articleBP').css({
                    'background-color' : options.bgColor,
                    'border-color' : options.borderColor,
                    'height' : divArticleHeight,
                    'overflow' : 'hidden'
                }),
	            divBackLink = $(divString).addClass('backLink').html('<a href="http://thethefly.com/wp-plugins/thethe-sliding-panels/" title="Powered by TheThe Sliding Panels WordPress Plugin" target="_blank">?</a>').css({
                    'color' : options.textColor
    	        });
				
			if ( (parseInt(options.width) == 100) && (options.widthUnit == "%") ){
				$(divContent).css({'border-left' : 'none','border-right' : 'none'});
			}
            $(this).css({'color' : options.textColor});			
            
            var up = false,
                wasActive = false,
                isActive = false;
                
            var sliding = function(e){
                    if (isActive){
                        e.preventDefault();
                        return false;
                    }
                    
                    wasActive = isActive = true;

                    if (!up){ // when we go to @slideDown don't show scrolling
                        $(divAbsolute).animate({
                            bottom : '+=' + divAbsoluteHeight + 'px'
                        }, options.speed, function(){up = !up;});
                    }                    

                    if (up){ // when we go to @slideUp don't show scrolling
                        $(divAbsolute).animate({
                            bottom : '-=' + divAbsoluteHeight + 'px'
                        }, options.speed, function(){up = !up;});
                    }

                    setTimeout(function(){isActive = false;}, options.speed);
            },
			addPanel = function(){
	            if (options.backLink)
   			        $(divContent).append(divBackLink);
				if (options.showCloseButton){
    	            $(elem).prepend(divClose);				
				}
				$(divContent).append(divBg);
				$(divContent).append(elem);
	            $(divPanel).append(divContent);
        	    $(divPanelContainer).append(divPanel);
    	        $(divContainer).append(divPanelContainer);
	            if (options.showTab){
        	    	$(divTrigger).append(divTriggerLeft);
    	        	$(divTrigger).append(divTriggerCenter);
		            $(divTrigger).append(divTriggerRight);			
	    	        $(divContainer).append(divTrigger);
				}			
	            $(divBottomPanel).append(divContainer);
        	    $(divAbsolute).append(divBottomPanel);
    	        $(divFixed).append(divAbsolute);
	            $('body').append(divFixed);

	            div = $(divPanelContainer);
				
				$(divClose).click(sliding);
                $(divTrigger).click(sliding);
                $(divAbsolute).css('bottom','0px');

                if (options.autoOpen)
                {
                    setTimeout(function()
                    {
                        if (!up && !wasActive && !isActive)
                        {
                                $(divTrigger).click();
                                wasActive = false;
                        }
                    },options.openIn * 1000);

                    if (options.autoClose)
                    {
                        setTimeout(function()
                        {
                            if (up && !wasActive && !isActive)
                                $(divTrigger).click();
                        },options.closeAfter * 1000);
                    }
                }
			};

            $(function(){ // DOM Ready
				elem.hide();
				var now = new Date(),
					expDate = new Date(now.getFullYear() + 20,01,01),
					firstVisit = new Date($.cookie("thethefly-bp-first-visit")),
					lastVisit = new Date($.cookie("thethefly-bp-last-visit")),								
					difTime = parseInt((now - lastVisit)/1000/60);
								
				function showP(){
					elem.show();
	                addPanel();
					$.cookie("thethefly-bp-last-visit", now, {expires: expDate, path: "/"});								
				}
				if($.cookie("thethefly-bp-first-visit")){
					switch (options.regularity) {
						case 'always': 
							showP();
							break;
						case 'once':
							if(!$.cookie("thethefly-bp-last-visit"))
								showP();
							break;										
						case 'every_hour':										
							if(( difTime ) >= 60 ){
								showP();											
							}										
							break;
						case 'every_3_hour':
							if(( difTime ) >= 180 ){
								showP();											
							}
							break;
						case 'every_6_hour':
							if(( difTime ) >= 360 ){
								showP();											
							}
							break;
						case 'every_12_hour':
							if(( difTime ) >= 720 ){
								showP();											
							}
							break;
						case 'every_day':
							if(( difTime ) >= 1440 ){
								showP();											
							}
							break;
						case 'every_week':
							if(( difTime ) >= 10080 ){
								showP();											
							}
							break;
						case 'every_month':
							if(( difTime ) >= 43200 ){
								showP();											
							}
							break;
					}				
				} else if (options.firstVisitShow){
					$.cookie("thethefly-bp-first-visit", now, {expires: expDate, path: "/"});
					showP();
				} else {
					$.cookie("thethefly-bp-first-visit", now, {expires: expDate, path: "/"});
				}
            });
        });
    }
    /*
     * @plugin PopUp Window
     *
     * Initialization (with default settings):
     * <script type="text/javascript">
     *      $('#thethePopUp').popUp();
     * </script>
     */
    $.fn.popUp = function(settings){
        var options = $.extend({
			theme : 'black',
			transparent : true,
            bgColor : '',
			opacity : 30,			
            borderColor : '',
			borderWidth : 0,
            overlayColor : '',
            overlayOpacity : 35,			
			textColor : '',
			
			radius : 4,			
			shadowSize : 0,
			shadowColor : '',
			
            width : '400',
            height : '300',
            left : '100',
            top : '100',
            right : null,
            bottom : null,
			showCloseButton: true,
			closeButtonText : 'Close',			
            closeButtonClass : 'tspClose',
            effect : 'slideDown',
            speed : 1000,
            center : true,
            fixed : true,
            // aoutoOpen
            autoOpen : true,
            openIn : 1,
            autoClose : false,
            closeAfter : 30,
			firstVisitShow : true,			
			regularity : 'always',
			backLink : true
        },settings);

        /*
         * Creation document murkup
         */
		options.opacity = 1 - (parseInt(options.opacity)/100);
		options.overlayOpacity = 1 - (parseInt(options.overlayOpacity)/100);
        var div = $('#tspPopUpAbsolute'),
            setTimeout = window.setTimeout,
			divRadius = parseInt(options.radius),
            divString = '<div/>';
            
        var divFixed = $(divString).attr('id','tspPopUpFixed').addClass('thetheSP' + ' theme-'+options.theme).css({
                'display' : 'none',
                'position' : options.fixed ? 'fixed' : 'absolute'
            }),
            divAbsolute = $(divString).attr('id','tspPopUpAbsolute').addClass('contentSP').css({
					'border-width' : parseInt(options.borderWidth),
					'border-color' : options.borderColor,				
					WebkitBorderRadius: divRadius,
					MozBorderRadius: divRadius,
					'border-radius' : divRadius,
					MozBoxShadow : '0 0 '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					WebkitBoxShadow : '0 0 '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					'box-shadow' : '0 0 '+ parseInt(options.shadowSize) +'px ' + options.shadowColor					
			}),
            divOverflow = $(divString).addClass('overflow'),
            divContent = $(divString).addClass('tspPopUpContent'),
			divBg = $(divString).addClass('tspBg').css({
                    'background-color' : options.bgColor,
                    'opacity' : options.transparent ? (options.opacity ? options.opacity : 0.8) : 1,
					WebkitBorderRadius: divRadius,
					MozBorderRadius: divRadius,
					'border-radius' : divRadius					
            }),
            divClose = $(divString).addClass('tspClose').html(options.closeButtonText).css({
                    'border-color' : options.textColor,
                    'color' : options.textColor
            }),
            divBackLink = $(divString).addClass('backLink').html('<a href="http://thethefly.com/wp-plugins/thethe-sliding-panels/" title="Powered by TheThe Sliding Panels WordPress Plugin" target="_blank">?</a>').css({
                    'color' : options.textColor
            });
			

        var error = function(msg){
            alert('Error in jquery.tsp.popup.js: [' + msg + ']');
        }

        var init = function(elem){
            divFixed = $('#tspPopUpFixed');
            divAbsolute = $('#tspPopUpAbsolute');
            divOverflow = divFixed.find('.overflow');
            divContent = divAbsolute.find('.tspPopUpContent').eq(0);
        }

        var create = function(){
            $(divAbsolute).append(divContent);
			$(divAbsolute).append(divBg);
            $(divFixed).append(divOverflow);
            $(divFixed).append(divAbsolute);
            $('body').append(divFixed);

            var width = parseInt(options.width),
                height = parseInt(options.height),
                bottom = parseInt(options.bottom),
                right = parseInt(options.right);

			$(divOverflow).css({
					'background-color' : options.overlayColor,
					'opacity' : options.overlayOpacity					
			});
            $(divAbsolute).css({
                'width' : width + 'px',
                'height' : height + 'px'
            });

            if (options.center){
                $(divAbsolute).css({
                    'left' : ($(window).width() - (width + parseInt(options.borderWidth) * 2)) / 2 + $(window).scrollLeft() + 'px',
                    'top' : ($(window).height() - (height + parseInt(options.borderWidth) * 2)) / 2 + $(window).scrollTop() + 'px'
                });
            }else{
                $(divAbsolute).css(options.right ? 'right' : 'left', options.right ? right + 'px' : options.left);
                $(divAbsolute).css(options.bottom ? 'bottom' : 'top', options.bottom ? bottom  + 'px' : options.top);
            }
        }

        /*
         * @OnResizeEvent handler
         */
        var resizeOverflow = function(){
            var div = [divFixed, divOverflow];
            $(div).css({
                'width' : $(this).width(),
                'height' : $(this).height()
            });
        }
		var changePosition = function(){
					$(divAbsolute).css({
						'top' : ($(window).height() - $(divAbsolute).outerHeight()) / 2 > 0 
							  ? ($(window).height() - $(divAbsolute).outerHeight()) / 2 : 0,
						'left' : ($(window).width() - $(divAbsolute).outerWidth()) / 2 > 0 
							   ? ($(window).width() - $(divAbsolute).outerWidth()) / 2 : 0 
					});
			};

        /*
         * @bindEvents function
         */
        var bindEvents = function(elem){
				$(elem).attr('popup','autoOpen');
				start(elem);
                $(document).resize(resizeOverflow);
	            if (options.center)
					$(window).resize(changePosition);
                $(document).keydown(function(e){if (e.keyCode == 27) unbindEvents(elem);});
                $(divOverflow).click(function(){unbindEvents(elem);});
	            if (options.showCloseButton)
					$(divClose).click(function(){unbindEvents(elem);});
        }

        /*
         * @ubindEvents function
         */
        var unbindEvents = function(elem){
            $(elem).appendTo('body');
			$(elem).removeAttr('popup');           
            var div = [$(elem), $(divFixed)];
            $(div).each(function(){this.css('display','none');});
            $(document).unbind('resize', resizeOverflow);
            $(divOverflow).unbind('click');
        }

        /*
         * @startEffects function
         */
        var start = function(elem){
            if (!$(elem).attr('popup'))
                $(elem).attr('popup','was');				
				$(elem).css({'color' : options.textColor});
				
            if (options.showCloseButton)
                $(elem).prepend(divClose);
            if (options.backLink)
                $(divAbsolute).append(divBackLink);

			divAbsolute1 = $(divAbsolute)[0];			
			
            var effects = 'slideUp|slideDown|slideLeft|slideRight|fadeIn'.split('|'),
				left = parseInt(jQuery.style(divAbsolute1, 'left')),
				top = parseInt(jQuery.style(divAbsolute1, 'top')),
                right = parseInt(jQuery.style(divAbsolute1, 'right')),
                bottom = parseInt(jQuery.style(divAbsolute1, 'bottom')),
                absoluteWidth = parseInt(options.width),
                absoluteHeight = parseInt(options.height),
                width = parseInt($('body').width()),
                height = parseInt($(window).height()),
                issetBottom = options.bottom && !options.center,
                issetRight = options.right && !options.center;				
			
            var show = function(type){
                $(elem).css('display','block').appendTo($(divContent));
                $(divFixed).css('display','block');
                
                if (type == 'horizontal'){
                    if (issetRight) $(divAbsolute).animate({'right' : right + 'px'}, options.speed);
                    else $(divAbsolute).animate({'left' : left + 'px'}, options.speed);
                }
                if (type == 'vertical'){
                    if (issetBottom) $(divAbsolute).animate({'bottom' : bottom + 'px'}, options.speed);
                    else $(divAbsolute).animate({'top' : top + 'px'}, options.speed);
                }
            };

            switch(options.effect){
                case effects[0] : // slideUp
                    $(divAbsolute).css(issetRight ? 'right' : 'left', issetRight ? right : left)
                        .css(issetBottom ? 'bottom' : 'top', issetBottom ? - absoluteHeight + 'px' : height + 'px');
                    show('vertical');				
                    break;
                case effects[1] : // sildeDown
                    $(divAbsolute).css(issetRight ? 'right' : 'left', issetRight ? right + 'px' : left + 'px')
                        .css(issetBottom ? 'bottom' : 'top', issetBottom ? height + 'px' : - absoluteHeight + 'px');
                    show('vertical');				
                    break;
                case effects[2] : // slideLeft
                    $(divAbsolute).css(issetBottom ? 'bottom' : 'top', issetBottom ? bottom : top)
                        .css(issetRight ? 'right' : 'left', issetRight ? '-' + absoluteWidth + 'px' : width + 'px');
                    show('horizontal');
                    break;
                case effects[3] : // slideRight
                    $(divAbsolute).css(issetBottom ? 'bottom' : 'top', issetBottom ? bottom : top)
                        .css(issetRight ? 'right' : 'left', issetRight ? width : '-' + absoluteWidth + 'px');
                    show('horizontal');
                    break;
                case effects[4] : // fadeIn
                    show();
                    $(divFixed).css({'display' : 'block','opacity' : 0}).animate({'opacity' : 1}, options.speed);
                    break;
                default :
                    show();
            }
        }

        /*
         * Run PopUp plugin
         */
        return this.each(function(){
            if (!div.attr('id')) create();
            else init();
            var elem = this;

            $(function(){ // DOM Ready
                $(elem).css('display','none');                

                if (options.autoOpen)
                {
                    setTimeout(function(){
                        if ($(divContent).html() == '' && !$(elem).attr('popup'))
                        {
							var now = new Date(),
								expDate = new Date(now.getFullYear() + 20,01,01),
								firstVisit = new Date($.cookie("thethefly-mw-first-visit")),
								lastVisit = new Date($.cookie("thethefly-mw-last-visit")),								
								difTime = parseInt((now - lastVisit)/1000/60);
								
							function showP(){
								bindEvents(elem);
								$.cookie("thethefly-mw-last-visit", now, {expires: expDate, path: "/"});								
							}
							
							if($.cookie("thethefly-mw-first-visit")){
							switch (options.regularity) {
								case 'always': 
									showP();
									break;
								case 'once':
									if(!$.cookie("thethefly-mw-last-visit"))
										showP();
									break;										
								case 'every_hour':										
									if(( difTime ) >= 60 ){
										showP();											
									}										
									break;
								case 'every_3_hour':
									if(( difTime ) >= 180 ){
										showP();											
									}
									break;
								case 'every_6_hour':
									if(( difTime ) >= 360 ){
										showP();											
									}
									break;
								case 'every_12_hour':
									if(( difTime ) >= 720 ){
										showP();											
									}
									break;
								case 'every_day':
									if(( difTime ) >= 1440 ){
										showP();											
									}
									break;
								case 'every_week':
									if(( difTime ) >= 10080 ){
										showP();											
									}
									break;
								case 'every_month':
									if(( difTime ) >= 43200 ){
										showP();											
									}
									break;
							}				
							} else if (options.firstVisitShow){
								$.cookie("thethefly-mw-first-visit", now, {expires: expDate, path: "/"});
								showP();
							} else {
								$.cookie("thethefly-mw-first-visit", now, {expires: expDate, path: "/"});
							}							
						}
                    },options.openIn * 1000);

                    if (options.autoClose && !$(elem).attr('popup'))
                    {
                        setTimeout(function(){
                            if ($(divContent).html() != '' && $(elem).attr('popup') == 'autoOpen')
                            {
                                unbindEvents(elem);																
                            }
                        },options.closeAfter * 1000);
                    }
                }
            });
        });
    }

    /*!
     *  @plugin leftPanel
     *
     * Initialization (with default settings):
     * <script type="text/javascript">
     *      $('#thetheLeftPanel').leftPanel();
     * </script>
     **/
    $.fn.leftPanel = function(settings){
        var options = $.extend({
            width : '400',
            height : '200',
			heightUnit : 'px',			
            speed : 500,
			
			theme : 'black',
			transparent : true,
            bgColor : '',
			opacity : 0,			
            borderColor : '',
			borderWidth : 0,
			textColor : '',
			
			radius : 0,
			tabRadius : 0,
			shadowSize : 0,
			shadowColor : '',

            autoOpen : true,
            autoClose : false,
            openIn : 10,
            closeAfter : 30,
            showTab : true,
            tabText : 'Left Panel',
            showCloseButton : true,
            closeButtonText : 'X',
			firstVisitShow : true,			
			regularity : 'always',
			backLink : true
        },settings);

        this.each(function(){
            var div = $('#tspAbsoluteLP'),
                setTimeout = window.setTimeout,
                divString = '<div/>',
                elem = $(this),
                isActive = false,
                hidden = true;
			options.opacity = 1 - (parseInt(options.opacity)/100);
            var width = parseInt(options.width),
				widthAbs = parseInt(options.width) + parseInt(options.borderWidth),
                height = parseInt(options.height),
				divRadius = parseInt(options.radius),
				tabRadius = parseInt(options.tabRadius),                
                divFixed = $(divString).attr('id','tspLeftFixed').addClass('thetheSP' + ' theme-'+options.theme),
                divAbsolute = $(divString).attr('id','tspAbsoluteLP').css({
					'left' : '-' + widthAbs  + 'px',
					'width' : widthAbs + 'px'
                }),
                divContent = $(divString).addClass('contentLP contentSP').css({
                    'width' : width + 'px',
                    'height' : height + options.heightUnit,
					'border-width' : parseInt(options.borderWidth),
					'border-color' : options.borderColor,
					WebkitBorderTopRightRadius: divRadius,
					WebkitBorderBottomRightRadius: divRadius,
					MozBorderRadiusTopright : divRadius,
					MozBorderRadiusBottomright : divRadius,
					'border-top-right-radius' : divRadius,
					'border-bottom-right-radius' : divRadius,
					MozBoxShadow : '1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					WebkitBoxShadow : '1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					'box-shadow' : '1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor															
                }),
                divTrigger = $(divString).addClass('tspTrigger tspTriggerLP').css({
 					'left' : width + 'px'
                }),

                divTriggerTop = $(divString).addClass('tspTriggerT'),
                divTriggerCenter = $(divString).addClass('tspTriggerC').html('<span>'+options.tabText+'</span>').css({
                    'background-color' : options.bgColor,
                    'color' : options.textColor,
					'border-width' : parseInt(options.borderWidth),
					'border-color' : options.borderColor,
					WebkitBorderTopRightRadius: tabRadius,
					WebkitBorderBottomRightRadius: tabRadius,
					MozBorderRadiusTopright : tabRadius,
					MozBorderRadiusBottomright : tabRadius,
					'border-top-right-radius' : tabRadius,
					'border-bottom-right-radius' : tabRadius,
					MozBoxShadow : '1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					WebkitBoxShadow : '1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					'box-shadow' : '1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor
                }),
                divTriggerBottom = $(divString).addClass('tspTriggerB'),
				divBg = $(divString).addClass('tspBg').css({
                    'background-color' : options.bgColor,
                    'opacity' : options.transparent ? options.opacity : 1,
					WebkitBorderTopRightRadius: divRadius,
					WebkitBorderBottomRightRadius: divRadius,
					MozBorderRadiusTopright : divRadius,
					MozBorderRadiusBottomright : divRadius,
					'border-top-right-radius' : divRadius,
					'border-bottom-right-radius' : divRadius
                }),
                divClose = $(divString).addClass('tspClose').html(options.closeButtonText).css({
                    'border-color' : options.textColor,
                    'color' : options.textColor
                }),
	            divBackLink = $(divString).addClass('backLink').html('<a href="http://thethefly.com/wp-plugins/thethe-sliding-panels/" title="Powered by TheThe Sliding Panels WordPress Plugin" target="_blank">?</a>').css({
                    'color' : options.textColor
    	        });

			if ( (parseInt(options.height) == 100) && (options.heightUnit == "%") )
				$(divContent).css({'border-top' : 'none','border-bottom' : 'none'});	
			$(this).css({'width' : options.width, 'color' : options.textColor});
			
            var hide = function(time){
                    if (!isActive && !hidden)
                    {
                        isActive = true;                        
                        $(divAbsolute).animate({'left' : '-=' + widthAbs + 'px'}, {
                                duration : time ? time : options.speed,
                                complete : function(){
                                    isActive = false;
                                    hidden = true;
                                }
                            });
                    }
                },
                show = function(){
                    if (!isActive && hidden)
                    {
                        isActive = true;
                        $(divAbsolute).animate({'left' : '+=' + widthAbs + 'px'}, {
                                duration : options.speed,
                                complete : function(){
                                    isActive = false;
                                    hidden = false;
                                }
                            });
                    }
                },
                addPanel = function(){
                    // check is panel exist
                    if (div) div.remove();

                    // create panel
					if (options.showCloseButton){
						$(divClose).click(hide);		                
						elem.prepend(divClose);						
					}
		            if (options.backLink)
        		        $(divContent).append(divBackLink);					
					$(divContent).append(divBg);				

		            if (options.showTab){
        	            $(divTrigger).append(divTriggerTop);
    	                $(divTrigger).append(divTriggerCenter);
	                    $(divTrigger).append(divTriggerBottom);
	                    $(divAbsolute).append(divTrigger);
    	                // bind events

						// ie :(
						if ($.browser.msie && $.browser.version <= 8) {
							$(divTrigger).find('span').css({
								'margin' : 0,
								'left' : 0,
								'top' : 0,
								'filter': 'progid:DXImageTransform.Microsoft.BasicImage(rotation=1)'
							});							
						}
						$(divTrigger).click(function (){
		                    if (!isActive && hidden){
								show();
							} else {
								hide();
							}							
						});
					}
					
                    $(divContent).append(elem);
                    $(divAbsolute).append(divContent);
                    $(divFixed).append(divAbsolute).appendTo('body');
					$(divContent).css({
						'top' : ($(window).height() - $(divContent).outerHeight()) / 2 > 0 
							  ? ($(window).height() - $(divContent).outerHeight()) / 2 : 0 
					});


                    $(window).resize(changePosition);

                    if (options.autoOpen)
                    {
                        setTimeout(function(){
							show();
                        },options.openIn * 1000);

                        if (options.autoClose)
                        {
                            setTimeout(function(){
                                hide();
                            },options.closeAfter * 1000)
                        }
                    }
                },
                changePosition = function(){
                    if (!options.top)
                    {
						$(divContent).css({
							'top' : ($(window).height() - $(divContent).outerHeight()) / 2 > 0 
								  ? ($(window).height() - $(divContent).outerHeight()) / 2 : 0 
						});
                    }
                };

            $(function(){ // DOM Ready
				elem.hide();
				var now = new Date(),
					expDate = new Date(now.getFullYear() + 20,01,01),
					firstVisit = new Date($.cookie("thethefly-lp-first-visit")),
					lastVisit = new Date($.cookie("thethefly-lp-last-visit")),								
					difTime = parseInt((now - lastVisit)/1000/60);
								
				function showP(){
					elem.show();
	                addPanel();
					$.cookie("thethefly-lp-last-visit", now, {expires: expDate, path: "/"});								
				}
				if($.cookie("thethefly-lp-first-visit")){
					switch (options.regularity) {
						case 'always': 
							showP();
							break;
						case 'once':
							if(!$.cookie("thethefly-lp-last-visit"))
								showP();
							break;										
						case 'every_hour':										
							if(( difTime ) >= 60 ){
								showP();											
							}										
							break;
						case 'every_3_hour':
							if(( difTime ) >= 180 ){
								showP();											
							}
							break;
						case 'every_6_hour':
							if(( difTime ) >= 360 ){
								showP();											
							}
							break;
						case 'every_12_hour':
							if(( difTime ) >= 720 ){
								showP();											
							}
							break;
						case 'every_day':
							if(( difTime ) >= 1440 ){
								showP();											
							}
							break;
						case 'every_week':
							if(( difTime ) >= 10080 ){
								showP();											
							}
							break;
						case 'every_month':
							if(( difTime ) >= 43200 ){
								showP();											
							}
							break;
					}				
				} else if (options.firstVisitShow){
					$.cookie("thethefly-lp-first-visit", now, {expires: expDate, path: "/"});
					showP();
				} else {
					$.cookie("thethefly-lp-first-visit", now, {expires: expDate, path: "/"});
				}
			});
        });

        return this;
    }

    /*!
     * @plugin Right Panel
     * 
     * Initialization (with default settings):
     * <script type="text/javascript">
     *      $('#thetheRightPanel').rightPanel();
     * </script>
     **/

    $.fn.rightPanel = function(settings){
        var options = $.extend({
            width : '400',
            height : '200',
			heightUnit : 'px',			
            speed : 500,
			
			theme : 'black',
			transparent : true,
            bgColor : '',
			opacity : 30,			
            borderColor : '',
			borderWidth : 0,
			textColor : '',
			
			radius : 0,
			tabRadius : 0,
			shadowSize : 0,
			shadowColor : '',

            autoOpen : true,
            autoClose : false,
            openIn : 10,
            closeAfter : 30,
            showTab : true,
            tabText : 'Right Panel',
            showCloseButton : true,
            closeButtonText : 'X',
			firstVisitShow : true,			
			regularity : 'always',
			backLink : true
        },settings);

        this.each(function(){
            var div = $('#tspAbsoluteRP'),
                setTimeout = window.setTimeout,
                divString = '<div/>',
                elem = $(this),
                isActive = false,
                hidden = true;
			options.opacity = 1 - (parseInt(options.opacity)/100);
            var width = parseInt(options.width),
				widthAbs = parseInt(options.width) + parseInt(options.borderWidth),
                height = parseInt(options.height),
				divRadius = parseInt(options.radius),				
                tabRadius = parseInt(options.tabRadius),
                divFixed = $(divString).attr('id','tspRightFixed').addClass('thetheSP' + ' theme-'+options.theme),
                divAbsolute = $(divString).attr('id','tspAbsoluteRP').css({
					'right' : '-' + widthAbs + 'px',
					'width' : widthAbs + 'px'
                }),
                divContent = $(divString).addClass('contentRP contentSP').css({
                    'width' : width + 'px',
                    'height' : height + options.heightUnit,
					'border-width' : parseInt(options.borderWidth),
					'border-color' : options.borderColor,
					WebkitBorderTopLeftRadius: divRadius,
					WebkitBorderBottomLeftRadius: divRadius,
					MozBorderRadiusTopleft : divRadius,
					MozBorderRadiusBottomleft : divRadius,
					'border-top-left-radius' : divRadius,
					'border-bottom-left-radius' : divRadius,
					MozBoxShadow : '-1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					WebkitBoxShadow : '-1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					'box-shadow' : '-1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor					
				}),
                divTrigger = $(divString).addClass('tspTrigger tspTriggerRP').css({
					'right' : widthAbs + 'px'
                }),
                divTriggerTop = $(divString).addClass('tspTriggerT'),
                divTriggerCenter = $(divString).addClass('tspTriggerC').html('<span>'+options.tabText+'</span>').css({
                    'background-color' : options.bgColor,
                    'color' : options.textColor,
					'border-width' : parseInt(options.borderWidth),
					'border-color' : options.borderColor,
					WebkitBorderTopLeftRadius: tabRadius,
					WebkitBorderBottomLeftRadius: tabRadius,
					MozBorderRadiusTopleft : tabRadius,
					MozBorderRadiusBottomleft : tabRadius,
					'border-top-left-radius' : tabRadius,
					'border-bottom-left-radius' : tabRadius,
					MozBoxShadow : '-1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					WebkitBoxShadow : '-1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor,
					'box-shadow' : '-1px 1px '+ parseInt(options.shadowSize) +'px ' + options.shadowColor					
                }),
                divTriggerBottom = $(divString).addClass('tspTriggerB');
				divBg = $(divString).addClass('tspBg').css({
                    'background-color' : options.bgColor,
                    'opacity' : options.transparent ? (options.opacity ? options.opacity : 0.8) : 1,
					WebkitBorderTopLeftRadius: divRadius,
					WebkitBorderBottomLeftRadius: divRadius,
					MozBorderRadiusTopleft : divRadius,
					MozBorderRadiusBottomleft : divRadius,
					'border-top-left-radius' : divRadius,
					'border-bottom-left-radius' : divRadius
                }),
                divClose = $(divString).addClass('tspClose').html(options.closeButtonText).css({
                    'border-color' : options.textColor,
                    'color' : options.textColor
                }),
	            divBackLink = $(divString).addClass('backLink').html('<a href="http://thethefly.com/wp-plugins/thethe-sliding-panels/" title="Powered by TheThe Sliding Panels WordPress Plugin" target="_blank">?</a>').css({
                    'color' : options.textColor
    	        });
				
			if ( (parseInt(options.height) == 100) && (options.heightUnit == "%") )
				$(divContent).css({'border-top' : 'none','border-bottom' : 'none'});				
			$(this).css({'width' : width + 'px', 'color' : options.textColor});
			
            var hide = function(time){
                    if (!isActive && !hidden)
                    {
                        isActive = true;
                        divAbsolute.animate({
							'right' : '-=' + widthAbs + 'px'},{
								duration : time ? time : options.speed,
								complete : function(){
									isActive = false;
    		                        hidden = true;
								}
						});
                    }
                },
                show = function(){
                    if (!isActive && hidden)
                    {
                        isActive = true;
                        divAbsolute.animate({'right' : '+=' + widthAbs + 'px'}, {
                                duration : options.speed,
                                complete : function(){
                                    isActive = false;
                                    hidden = false;
                                }
                            });                        
                    }
                },
                addPanel = function(){
                    // check is panel exist
                    if (div) div.remove();

                    // create panel
					if (options.showCloseButton){
						$(divClose).click(hide);
		                elem.prepend(divClose);						
					}
		            if (options.backLink)
        		        $(divContent).append(divBackLink);					
					$(divContent).append(divBg);				

		            if (options.showTab){
        	            $(divTrigger).append(divTriggerTop);
    	                $(divTrigger).append(divTriggerCenter);
	                    $(divTrigger).append(divTriggerBottom);
	                    $(divAbsolute).append(divTrigger);
						// ie :(
						if ($.browser.msie && $.browser.version <= 8) {
							$(divTrigger).find('span').css({
								'margin' : 0,
								'left' : 0,
								'top' : 0,
								'filter': 'progid:DXImageTransform.Microsoft.BasicImage(rotation=3)'
							});							
						}						
    	                // bind events
						$(divTrigger).click(function (){
		                    if (!isActive && hidden){
								show();
							} else {
								hide();
							}							
						});
					}
                    $(divContent).append(elem);
                    $(divAbsolute).append(divContent);
                    $(divFixed).append(divAbsolute).appendTo('body');

					$(divContent).css({
						'top' : ($(window).height() - $(divContent).outerHeight()) / 2 > 0 
							  ? ($(window).height() - $(divContent).outerHeight()) / 2 : 0 
					});

                    $(window).resize(changePosition);

                    if (options.autoOpen)
                    {
                        setTimeout(function(){
							show();
                        },options.openIn * 1000);

                        if (options.autoClose)
                        {
                            setTimeout(function(){
                                hide();
                            },options.closeAfter * 1000)
                        }
                    }
                },
                changePosition = function(){
                    if (!options.top)
                    {
						$(divContent).css({
							'top' : ($(window).height() - $(divContent).outerHeight()) / 2 > 0 
								  ? ($(window).height() - $(divContent).outerHeight()) / 2 : 0 
						});
                    }
                };

            $(function(){ // DOM Ready
				elem.hide();
				var now = new Date(),
					expDate = new Date(now.getFullYear() + 20,01,01),
					firstVisit = new Date($.cookie("thethefly-rp-first-visit")),
					lastVisit = new Date($.cookie("thethefly-rp-last-visit")),								
					difTime = parseInt((now - lastVisit)/1000/60);
								
				function showP(){
					elem.show();
	                addPanel();
					$.cookie("thethefly-rp-last-visit", now, {expires: expDate, path: "/"});								
				}
				if($.cookie("thethefly-rp-first-visit")){
					switch (options.regularity) {
						case 'always': 
							showP();
							break;
						case 'once':
							if(!$.cookie("thethefly-rp-last-visit"))
								showP();
							break;										
						case 'every_hour':										
							if(( difTime ) >= 60 ){
								showP();											
							}										
							break;
						case 'every_3_hour':
							if(( difTime ) >= 180 ){
								showP();											
							}
							break;
						case 'every_6_hour':
							if(( difTime ) >= 360 ){
								showP();											
							}
							break;
						case 'every_12_hour':
							if(( difTime ) >= 720 ){
								showP();											
							}
							break;
						case 'every_day':
							if(( difTime ) >= 1440 ){
								showP();											
							}
							break;
						case 'every_week':
							if(( difTime ) >= 10080 ){
								showP();											
							}
							break;
						case 'every_month':
							if(( difTime ) >= 43200 ){
								showP();											
							}
							break;
					}				
				} else if (options.firstVisitShow){
					$.cookie("thethefly-rp-first-visit", now, {expires: expDate, path: "/"});
					showP();
				} else {
					$.cookie("thethefly-rp-first-visit", now, {expires: expDate, path: "/"});
				}
            });
        });

        return this;
    }

})(jQuery)