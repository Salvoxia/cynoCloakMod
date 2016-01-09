<?php
$modInfo['cynoCloakMod']['name'] = "Cyno/Cloak Mod";
$modInfo['cynoCloakMod']['abstract'] = "shows whether ships had Cynos/Cloaks/Entosis Links fitted on the front page";
$modInfo['cynoCloakMod']['about'] = "Tyr, enhanced for Entosis Links by Salvoxia";

event::register('home_assembling', 'cynoCloakMod::init');

class cynoCloakMod {

	public static function init(&$home) {
		// Load the css
		$home->addBehind("start", "cynoCloakMod::loadCSS");
		// Add the request functions to the front page
		$home->addBehind("start", "cynoCloakMod::load");
	}
	
	public static function loadCSS($home) {
		$home->page->addHeader("\t<link rel=\"stylesheet\" type=\"text/css\" href=\"mods/cynoCloakMod/cynoCloakMod.css\" />");
		// Laterz
		//$home->page->addHeader("\t<script src='mods/cynoCloakMod/jquery-1.7.1.js' type='text/javascript'></script>");
		//$home->page->addHeader("\t<script src='mods/cynoCloakMod/scroller.js' type='text/javascript'></script>");
	}
	
	public static function load(){
		include_once('mods/cynoCloakMod/cynoCloakMod.php');
		return "\t<!--cyno/cloak mod loaded-->";
	}
}



?>