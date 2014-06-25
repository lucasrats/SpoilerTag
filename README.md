## esoTalk – SpoilerTag plugin

- Enable [spoiler] and [nsfw] tag to hide spoilers.

### Installation

Browse to your esoTalk plugin directory:
```
cd WEB_ROOT_DIR/addons/plugins/
```

Clone the SpoilerTag plugin repo into the plugin directory:
```
git clone git@github.com:esoTalk-plugins/SpoilerTag.git SpoilerTag
```

Chown the SpoilerTag plugin folder to the right web user:
```
chown -R apache:apache SpoilerTag/
```

## Translation

Create `definitions.SpoilerTag.php` in your language pack with the following definition:

	$definitions["SpoilerBBCode"] = "Spoiler";
