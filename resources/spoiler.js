//$(document).ready(function() { 
$(function() {
	$(document).on("click",".spoiler span", function(){
		$(this).siblings(".content").fadeToggle(0);
	});
	$(document).on("click",".nsfw span", function(){
		$(this).siblings(".content").fadeToggle(0);
	});
});
