(function ()
{
	// create ruvenShortcodes plugin
	tinymce.create("tinymce.plugins.ruvenShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("ruvenPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Shortcode Editor", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "ruven_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('ruven_button', {
                    title: "Shortcode Editor",
					image: RuvenShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b)
				{					
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Horizontal Ruler", "hr" );
					a.addWithPopup( b, "Info Box", "info_box" );
					a.addWithPopup( b, "Spacer", "spacer" );
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("ruvenPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Ruven Shortcodes',
				author: 'Orman Clark',
				authorurl: 'http://themeforest.net/user/ormanclark/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add ruvenShortcodes plugin
	tinymce.PluginManager.add("ruvenShortcodes", tinymce.plugins.ruvenShortcodes);
})();