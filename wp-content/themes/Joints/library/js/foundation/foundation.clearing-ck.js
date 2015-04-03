(function(e,t,n,r){"use strict";Foundation.libs.clearing={name:"clearing",version:"5.0.0",settings:{templates:{viewing:'<a href="#" class="clearing-close">&times;</a><div class="visible-img" style="display: none"><img src="//:0"><p class="clearing-caption"></p><a href="#" class="clearing-main-prev"><span></span></a><a href="#" class="clearing-main-next"><span></span></a></div>'},close_selectors:".clearing-close",init:!1,locked:!1},init:function(t,n,r){var i=this;Foundation.inherit(this,"throttle loaded");this.bindings(n,r);e(this.scope).is("[data-clearing]")?this.assemble(e("li",this.scope)):e("[data-clearing]",this.scope).each(function(){i.assemble(e("li",this))})},events:function(n){var r=this;e(this.scope).off(".clearing").on("click.fndtn.clearing","ul[data-clearing] li",function(t,n,i){var n=n||e(this),i=i||n,s=n.next("li"),o=n.closest("[data-clearing]").data("clearing-init"),u=e(t.target);t.preventDefault();if(!o){r.init();o=n.closest("[data-clearing]").data("clearing-init")}if(i.hasClass("visible")&&n[0]===i[0]&&s.length>0&&r.is_open(n)){i=s;u=e("img",i)}r.open(u,n,i);r.update_paddles(i)}).on("click.fndtn.clearing",".clearing-main-next",function(e){r.nav(e,"next")}).on("click.fndtn.clearing",".clearing-main-prev",function(e){r.nav(e,"prev")}).on("click.fndtn.clearing",this.settings.close_selectors,function(e){Foundation.libs.clearing.close(e,this)}).on("keydown.fndtn.clearing",function(e){r.keydown(e)});e(t).off(".clearing").on("resize.fndtn.clearing",function(){r.resize()});this.swipe_events(n)},swipe_events:function(t){var n=this;e(this.scope).on("touchstart.fndtn.clearing",".visible-img",function(t){t.touches||(t=t.originalEvent);var n={start_page_x:t.touches[0].pageX,start_page_y:t.touches[0].pageY,start_time:(new Date).getTime(),delta_x:0,is_scrolling:r};e(this).data("swipe-transition",n);t.stopPropagation()}).on("touchmove.fndtn.clearing",".visible-img",function(t){t.touches||(t=t.originalEvent);if(t.touches.length>1||t.scale&&t.scale!==1)return;var r=e(this).data("swipe-transition");typeof r=="undefined"&&(r={});r.delta_x=t.touches[0].pageX-r.start_page_x;typeof r.is_scrolling=="undefined"&&(r.is_scrolling=!!(r.is_scrolling||Math.abs(r.delta_x)<Math.abs(t.touches[0].pageY-r.start_page_y)));if(!r.is_scrolling&&!r.active){t.preventDefault();var i=r.delta_x<0?"next":"prev";r.active=!0;n.nav(t,i)}}).on("touchend.fndtn.clearing",".visible-img",function(t){e(this).data("swipe-transition",{});t.stopPropagation()})},assemble:function(t){var n=t.parent();if(n.parent().hasClass("carousel"))return;n.after('<div id="foundationClearingHolder"></div>');var r=e("#foundationClearingHolder"),i=n.data("clearing-init"),s=n.detach(),o={grid:'<div class="carousel">'+s[0].outerHTML+"</div>",viewing:i.templates.viewing},u='<div class="clearing-assembled"><div>'+o.viewing+o.grid+"</div></div>";return r.after(u).remove()},open:function(t,n,r){var i=r.closest(".clearing-assembled"),s=e("div",i).first(),o=e(".visible-img",s),u=e("img",o).not(t);if(!this.locked()){u.attr("src",this.load(t)).css("visibility","hidden");this.loaded(u,function(){u.css("visibility","visible");i.addClass("clearing-blackout");s.addClass("clearing-container");o.show();this.fix_height(r).caption(e(".clearing-caption",o),t).center(u).shift(n,r,function(){r.siblings().removeClass("visible");r.addClass("visible")})}.bind(this))}},close:function(t,n){t.preventDefault();var r=function(e){return/blackout/.test(e.selector)?e:e.closest(".clearing-blackout")}(e(n)),i,s;if(n===t.target&&r){i=e("div",r).first();s=e(".visible-img",i);this.settings.prev_index=0;e("ul[data-clearing]",r).attr("style","").closest(".clearing-blackout").removeClass("clearing-blackout");i.removeClass("clearing-container");s.hide()}return!1},is_open:function(e){return e.parent().prop("style").length>0},keydown:function(t){var n=e("ul[data-clearing]",".clearing-blackout");t.which===39&&this.go(n,"next");t.which===37&&this.go(n,"prev");t.which===27&&e("a.clearing-close").trigger("click")},nav:function(t,n){var r=e("ul[data-clearing]",".clearing-blackout");t.preventDefault();this.go(r,n)},resize:function(){var t=e("img",".clearing-blackout .visible-img");t.length&&this.center(t)},fix_height:function(t){var n=t.parent().children(),r=this;n.each(function(){var t=e(this),n=t.find("img");t.height()>n.outerHeight()&&t.addClass("fix-height")}).closest("ul").width(n.length*100+"%");return this},update_paddles:function(t){var n=t.closest(".carousel").siblings(".visible-img");t.next().length>0?e(".clearing-main-next",n).removeClass("disabled"):e(".clearing-main-next",n).addClass("disabled");t.prev().length>0?e(".clearing-main-prev",n).removeClass("disabled"):e(".clearing-main-prev",n).addClass("disabled")},center:function(e){this.rtl?e.css({marginRight:-(e.outerWidth()/2),marginTop:-(e.outerHeight()/2)}):e.css({marginLeft:-(e.outerWidth()/2),marginTop:-(e.outerHeight()/2)});return this},load:function(e){if(e[0].nodeName==="A")var t=e.attr("href");else var t=e.parent().attr("href");this.preload(e);return t?t:e.attr("src")},preload:function(e){this.img(e.closest("li").next()).img(e.closest("li").prev())},img:function(t){if(t.length){var n=new Image,r=e("a",t);r.length?n.src=r.attr("href"):n.src=e("img",t).attr("src")}return this},caption:function(e,t){var n=t.data("caption");n?e.html(n).show():e.text("").hide();return this},go:function(t,n){var r=e(".visible",t),i=r[n]();i.length&&e("img",i).trigger("click",[r,i])},shift:function(e,t,n){var r=t.parent(),i=this.settings.prev_index||t.index(),s=this.direction(r,e,t),o=parseInt(r.css("left"),10),u=t.outerWidth(),a;if(t.index()!==i&&!/skip/.test(s)){if(/left/.test(s)){this.lock();r.animate({left:o+u},300,this.unlock())}else if(/right/.test(s)){this.lock();r.animate({left:o-u},300,this.unlock())}}else if(/skip/.test(s)){a=t.index()-this.settings.up_count;this.lock();a>0?r.animate({left:-(a*u)},300,this.unlock()):r.animate({left:0},300,this.unlock())}n()},direction:function(t,n,r){var i=e("li",t),s=i.outerWidth()+i.outerWidth()/4,o=Math.floor(e(".clearing-container").outerWidth()/s)-1,u=i.index(r),a;this.settings.up_count=o;this.adjacent(this.settings.prev_index,u)?u>o&&u>this.settings.prev_index?a="right":u>o-1&&u<=this.settings.prev_index?a="left":a=!1:a="skip";this.settings.prev_index=u;return a},adjacent:function(e,t){for(var n=t+1;n>=t-1;n--)if(n===e)return!0;return!1},lock:function(){this.settings.locked=!0},unlock:function(){this.settings.locked=!1},locked:function(){return this.settings.locked},off:function(){e(this.scope).off(".fndtn.clearing");e(t).off(".fndtn.clearing")},reflow:function(){this.init()}}})(jQuery,this,this.document);