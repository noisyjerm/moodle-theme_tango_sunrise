/**
 * @fileOverview ajax and dhtml functions for Tango sunrise Moodle 2.0 theme
 * @author Jeremy FitzPatrick
 * @copyright (C) 2011 Jeremy FitzPatrick
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

YUI().use('dom', 'node', function(Y) {
	/**
	 * @description adds click events to header buttons
	 */
    function init() {
       Y.one("#login-info-wrapper").addClass("pop");
       Y.one("#loggedinas .logged-in").on("click", showHideLogin);
       Y.one("#loggedinas input.close").on("click", showHideLogin);
       
       Y.one("#loggedinas input.help").on("click", showHideHelp);
       Y.one("#theme-popup input.close").on("click", showHideHelp);
    }
    
    /**
     * @description toggles login box
     */
    function showHideLogin() {
    	Y.one("#smokescreen").setStyle("height", Y.DOM.docHeight());
    	Y.one("#smokescreen").toggleClass("show");
    	
    	Y.one("#login-info-wrapper").toggleClass("show");
    }
    
    /** 
     * @description toggles 'help' popup visibility
     */
    function showHideHelp() {
    	Y.one("#theme-popup").toggleClass("show");
    	Y.one("#smokescreen").toggleClass("show");
    	
    	Y.one("#smokescreen").setStyle("height", Y.DOM.docHeight());
    }
    
    
    Y.on("domready", init);
});

/**
 * @description sets dock position and adds classname to each dock item for icons
 * @return null
 */
function customise_dock_for_theme() {
	var dock = M.core_dock;
    dock.cfg.position = 'right';
    dock.on('dock:itemadded', function(item) {
    	item.nodes.dockitem.addClass(item.blockclass);
    });
}