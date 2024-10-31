
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var ruven_popup = {
    	loadVals: function()
    	{
    		var shortcode = $('#_ruven_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.ruven-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('ruven_', ''),		// gets rid of the ruven_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_ruven_ushortcode').remove();
    		$('#ruven-sc-form-table').prepend('<div id="_ruven_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_ruven_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.ruven-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('ruven_', '')		// gets rid of the ruven_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_ruven_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_ruven_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_ruven_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_ruven_ushortcode').remove();
    		$('#ruven-sc-form-table').prepend('<div id="_ruven_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				ruvenPopup = $('#ruven-popup');

            tbWindow.css({
                height: ruvenPopup.outerHeight() + 50,
                width: ruvenPopup.outerWidth(),
                marginLeft: -(ruvenPopup.outerWidth()/2)
            });

			ajaxCont.css({
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: (tbWindow.outerHeight()-47),
				overflow: 'auto', // IMPORTANT
				width: ruvenPopup.outerWidth()
			});
			
			$('#ruven-popup').addClass('no_preview');
    	},
    	load: function()
    	{
    		var	ruven_popup = this,
    			popup = $('#ruven-popup'),
    			form = $('#ruven-sc-form', popup),
    			shortcode = $('#_ruven_shortcode', form).text(),
    			popupType = $('#_ruven_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		ruven_popup.resizeTB();
    		$(window).resize(function() { ruven_popup.resizeTB() });
    		
    		// initialise
    		ruven_popup.loadVals();
    		ruven_popup.children();
    		ruven_popup.cLoadVals();
    		
    		// update on children value change
    		$('.ruven-cinput', form).live('change', function() {
    			ruven_popup.cLoadVals();
    		});
    		
    		// update on value change
    		$('.ruven-input', form).change(function() {
    			ruven_popup.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.ruven-insert', form).click(function() {    		 			
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_ruven_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}
    
    // run
    $('#ruven-popup').livequery( function() { ruven_popup.load(); } );
});