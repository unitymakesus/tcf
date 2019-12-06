(function($){

	FLBuilder.registerModuleHelper( 'uabb-off-canvas', {
		_templates: {
            saved_modules: '',
            saved_rows: '',
            page_templates: '',
        },
		init: function()
		{
			var form	= $('.fl-builder-settings');
			content_type	= form.find('select[name=content_type]'); 
            preview_off_canvas = form.find('select[name=preview_off_canvas]');
            btn_style   = form.find('select[name=btn_style]');
            save_button = form.find('.fl-builder-settings-save');

            UABBButton.init();
			this._contentTypeChange();
            this._showCanavsPreview();

			content_type.on('change', $.proxy( this._contentTypeChange, this ) );
            btn_style.on('change', this._btn_style_changed );
            save_button.off( 'click' ).on( 'click', this._btn_style_changed);

            this._btn_style_changed();
            $( '.fl-builder-content' ).on( 'fl-builder.layout-rendered', $.proxy( this._showCanavsPreview, this ) );
		},
        _btn_style_changed: function() {

            var form    = $('.fl-builder-settings');
            icon = form.find( 'input[name=btn_icon]' );
            btn_icon = form.find( 'input[name=btn_icon]' ).val();


            if ( 0 === btn_icon.length ) {
                icon.rules('remove');
            }
        },
        _showCanavsPreview: function() {
            var form    = $('.fl-builder-settings');
            preview_off_canvas = form.find('select[name=preview_off_canvas]').val();
            node_id         = form.attr('data-node');
            modal_node       = $( '#offcanvas-' + node_id );

            if ( '1' === preview_off_canvas ) {

                modal_node.removeClass( 'uabb-drag-fix' );

                if ( modal_node.hasClass( 'uabb-offcanvas-position-at-left' ) ) {

                    $( 'body' ).css( 'margin-left' , '0' );

                    modal_node.css( 'left', '0' );

                    modal_node.addClass( 'uabb-off-canvas-show' );

                } else if( modal_node.hasClass( 'uabb-offcanvas-position-at-right' ) ) {

                    $( 'body' ).css( 'margin-right', '0' );

                    modal_node.css( 'right', '0' );

                    modal_node.addClass( 'uabb-off-canvas-show' );
                }
            } else {

                modal_node.removeClass( 'uabb-off-canvas-show' );

                modal_node.addClass( 'uabb-drag-fix' );
            }
        },
		_contentTypeChange: function()
        {

            var form            = $('.fl-builder-settings');

            var type = form.find('select[name=content_type]').val();

            if ( 'saved_modules' === type ) {
                this._setTemplates('saved_modules');
            }
            if ( 'saved_rows' === type ) {
                this._setTemplates('saved_rows');
            }
            if ( 'saved_page_templates' === type ) {
                this._setTemplates('page_templates');
            }
        },
        _getTemplates: function( type, callback )
        {
            if ( 'undefined' === typeof type ) {
                return;
            }

            if ( 'undefined' === typeof callback ) {
                return;
            }
            if ( 'saved_modules' === type ) {
                type = 'module';
            } else if ( 'saved_rows' === type ) {
                type = 'row';
            } else if ( 'page_templates' === type ) {
                type = 'layout';
            }
            var self = this;

            $.post(
                ajaxurl,
                {
                    action: 'uabb_get_saved_templates',
                    type: type
                },
                function( response ) {
                    callback(response);
                }
            );
        },
        _setTemplates: function( type )
        {
            var form = $('.fl-builder-settings'),       
                select = form.find( 'select[name="ct_' + type + '"]' ),
                value = '', self = this;

            if ( 'undefined' !== typeof FLBuilderSettingsForms && 'undefined' !== typeof FLBuilderSettingsForms.config ) {
                if ( "uabb-off-canvas" === FLBuilderSettingsForms.config.id ) {
                    value = FLBuilderSettingsForms.config.settings['ct_' + type];
                }
            }
            if ( this._templates[type] !== '' ) {
                select.html( this._templates[type] );
                select.find( 'option[value="' + value + '"]').attr('selected', 'selected');

                return;
            }

            this._getTemplates(type, function( data ) {
                var response = JSON.parse( data );

                if ( response.success ) {
                    self._templates[type] = response.data;
                    select.html( response.data );
                    if ( '' !== value ) {
                        select.find( 'option[value="' + value + '"]').attr('selected', 'selected');
                    }
                }
            });
        },
	});

})(jQuery);