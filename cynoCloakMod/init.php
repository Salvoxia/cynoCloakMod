<?php
$modInfo['cynoCloakMod']['name'] = "Cyno/Cloak Mod";
$modInfo['cynoCloakMod']['abstract'] = "shows whether ships had Cynos/Cloaks/Entosis Links fitted on the front page";
$modInfo['cynoCloakMod']['about'] = "Tyr, enhanced for Entosis Links by Salvoxia";

event::register('home_assembling', 'cynoCloakMod::init');

// register for the get_tpl event in order to replace the default killlisttable template with the mod's own
event::register("get_tpl", "cynoCloakMod::getModifiedTemplate");

class cynoCloakMod {

	public static function init(&$home) {
		// Load the css
		$home->addBehind("start", "cynoCloakMod::loadCSS");
		// Add the request functions to the front page
		$home->addBehind("start", "cynoCloakMod::load");
	}
	
	public static function loadCSS($home) 
	{
		$home->page->addHeader("\t<link rel=\"stylesheet\" type=\"text/css\" href=\"mods/cynoCloakMod/cynoCloakMod.css\" />");
	}
	
	public static function load()
	{
		include_once('mods/cynoCloakMod/cynoCloakMod.php');
		return "\t<!--cyno/cloak mod loaded-->";
	}
	
	/**
	 * Is a callback for the get_tpl event.
	 * Returns the mod's modified template whenever the killlisttable template
	 * is requested
	 * @param string $templateName
	 */
	public static function getModifiedTemplate(&$templateName)
	{
		if($templateName == 'killlisttable')
		{
			$templateName = getcwd() . "/mods/cynoCloakMod/templates/killlisttable.tpl";
		}
	}
	
	
}



?>