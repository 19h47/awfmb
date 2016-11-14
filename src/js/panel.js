window.$ = window.jQuery = jQuery;

var Panel = {
    $body: '',
    $panel: '',
    _classPanelOpen: '',

    init: function(){
        console.log('Panel.init');
        
        this.$body = $('body');
        this.$panelContent = $('.js-panel-content');
        this.$panelTitle = $('.js-panel-title');
        this._classPanelOpen = 'panel-is-open';

        this.initEvents();
    },

    initEvents: function(){
        var _this = this;
        $(document)
            .on('click', '.js-load-news', function(e){
                console.log("Show menu");
                _this._togglePanel();

                return false;
            })
            .on('click', function(e){

                if (!$(e.target).closest('.js-panel').length && _this.$body.hasClass(_this._classPanelOpen)) {
                    // Hide the menus.
                    console.log('Hide menu');
                    _this._closePanel();

                    return false;
                }
            });
    },

    _togglePanel: function(){
        var _this = this;

        if( _this.$body.hasClass(_this._classPanelOpen) ){
            
            _this._closePanel();

        } else{
            _this._openPanel();
            _this._ajaxRequestNews();
        }
    },
    _openPanel: function(){
        // var _this = this;

        this.$body.addClass(this._classPanelOpen);
        app.disableScroll();
    },

    _closePanel: function(){
        // var _this = this;

        this.$body.removeClass(this._classPanelOpen);
        app.enableScroll();
    },

    _ajaxRequestNews: function(){
        var _this = this;

        $.ajax({
            url: wp.ajax_url,
            type: 'post',
            data: {
                action: 'awfmb_load_news'
            },
            beforeSend: function() {
                $(_this.$panelContent).html(' ');
                $(_this.$panelTitle).html('Loading...');
            },
            success: function( result ) {
                $(_this.$panelContent).html(result);
                $(_this.$panelTitle).html('News');
            }
        });
    }
};

module.exports = Panel;