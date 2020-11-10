jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.cta_plugin', {
        init : function(ed, url) {
            // Register command for when button is clicked
            ed.addCommand('cta_insert_shortcode', function() {
                selected = tinyMCE.activeEditor.selection.getContent();

                if( selected ){
                    //If text is selected when button is clicked
                    //Wrap shortcode around it.
                    content =  '[cta href=""]'+selected+'[/cta]';
                } else{
                    content =  '[cta href=""][/cta]';
                }

                tinymce.execCommand('mceInsertContent', false, content);
            });

            // Register buttons - trigger above command when clicked
            ed.addButton('byuh_button_cta', {title : 'Insert CTA', cmd : 'cta_insert_shortcode', image: '' });
        },   
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('byuh_button_cta', tinymce.plugins.cta_plugin);
});