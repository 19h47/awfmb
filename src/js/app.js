// Make jQuery global
window.$ = window.jQuery = jQuery;
var fn = require('./functions');
var Page = require('./page');
var Panel = require('./panel');
var baseline = require('./vendors/baseline.js');

var App = {
    
    toggleMenu: null,
    toggleSearch: null,
    $body: null,

    init: function(){
		console.log('App.init');
        var _this = this;
        

        // $('img').baseline(34);

        // show/hide guides with CMD+;
        $(document).on('keydown.guides',function(e) {
            (e.metaKey || e.ctrlKey) && e.keyCode === 186 && $('.Guid').toggleClass('display-none');
        });

        Panel.init();
        Page.init();
    },

    _initEvents: function(){
        var _this = this;
    },

    _initPlugins: function(){
        $('.js-collapse').collapse({
            accordion: true,
            persist: false,
            open: function() {
                this.addClass('is-open');
                this.css({ height: this.children().outerHeight() });
            },
            close: function() {
                this.css({ height: "0px" });
                this.removeClass('is-open');
            }
        });
      
    },
    
    disableScroll: function() {
        // lock scroll position, but retain settings for later
        // http://stackoverflow.com/a/3656618
        this._body_scrollLeft = self.pageXOffset || document.documentElement.scrollLeft  || document.body.scrollLeft;
        this._body_scrollTop = self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop;
        $('html').css('overflow', 'hidden');
        window.scrollTo(this._body_scrollLeft, this._body_scrollTop);
        // disable scroll on touch devices as well
        if (this.is_touch) {
            $(document).on('touchmove.app', function(e) {
                e.preventDefault();
            });
        }
    },

    enableScroll: function(_position) {
        if (typeof _position === 'undefined') {
            _position = this._body_scrollTop;
        }

        var resume_scroll = true;
        if (typeof _position === 'boolean' && _position === false) {
            resume_scroll = false;
        }

        // unlock scroll position
        // http://stackoverflow.com/a/3656618
        $('html').css('overflow', 'visible');
        // resume scroll position if possible
        if (resume_scroll) {
            window.scrollTo(this._body_scrollLeft, _position);
        }
        // enable scroll on touch devices as well
        if (this.is_touch) {
            $(document).off('touchmove.app');
        }
    }
};

$(function(){
	window.app = App;
	window.app.init();
});
