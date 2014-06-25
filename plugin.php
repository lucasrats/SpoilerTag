<?php
if (!defined("IN_ESOTALK")) exit;
 
 ET::$pluginInfo["SpoilerTag"] = array(
	"name" => "SpoilerTag",
	"description" => "Enable [spoiler] and [nsfw] tag to hide spoilers.",
	"version" => "1.0.2",
	"author" => "Ramouch0",
	"authorEmail" => "me@Ramouch0.org",
	"authorURL" => "http://Ramouch0.org",
	"license" => "GPLv2"
);

class ETPlugin_SpoilerTag extends ETPlugin {

	public function handler_conversationController_renderBefore($sender){
			$sender->addCSSFile($this->resource("spoiler.css"));
			$sender->addJSFile($this->resource("spoiler.js"));
	}
	
	public function handler_memberController_renderBefore($sender){
		$this->handler_conversationController_renderBefore($sender);
	}
	
	public function handler_format_format( $sender ){
		// Spoiler - [spoiler:title]text[/spoiler]
		$regexp = "/(.*?)\n?\[spoiler(?:(?::|=)(.*?)(]?))?\]\n?(.*?)\n?\[\/spoiler\]\n{0,2}/is";
		while (preg_match($regexp, $sender->content)) {
			$sender->content = preg_replace($regexp,
				"$1</p><div class=\"spoiler\"><span>".T("Spoiler!")."</span> <span class=\"title\">$2$3</span><div class=\"content\">$4</div></div><p>", $sender->content);
		}
		
		// NSFW - [nsfw:title]text[/nsfw]
		$regexp = "/(.*?)\n?\[nsfw(?:(?::|=)(.*?)(]?))?\]\n?(.*?)\n?\[\/nsfw\]\n{0,2}/is";
		while (preg_match($regexp, $sender->content)) {
			$sender->content = preg_replace($regexp,
				"$1</p><div class=\"nsfw\"><span>".T("NSFW")."</span> <span class=\"title\">$2$3</span><div class=\"content\">$4</div></div><p>", $sender->content);
		}
	}
	
	/**
	 * Add an event handler to the "getEditControls" method of the conversation controller to add Spoiler bbcode
	 *
	 * @return void
	 */
	public function handler_conversationController_getEditControls($sender, &$controls, $id)
	{
		addToArrayString($controls, "spoiler", "<a href='javascript:SpoilerTag.spoiler(\"$id\");void(0)' title='".T("SpoilerBBCode")."' class='spoiler span'><i class='icon-spoiler'></i></a>", 0);
	
	}
}

?>
