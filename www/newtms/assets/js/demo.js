$(document).ready(function(){
	
	$("#browser").treeview();
	
	$("#navigation").treeview({
		persist: "location",
		collapsed: true,
		unique: true
	});
	
	$("#red").treeview({
		animated: "fast",
		collapsed: true,
		unique: true,
		persist: "cookie",
		toggle: function() {
			window.console && console.log("%o was toggled", this);
		}
	});
	
	$("#black, #gray").treeview({
		control: "#treecontrol",
		persist: "cookie",
		cookieId: "treeview-black"
	});

});