function _(x){
	return document.getElementById(x);
}
function defaultStyle(x){
	_(x).style.border = "1px solid #ccc";
}

function log(){
	var username = _("username").value;
	var password = _("password").value;
	//var event_id = _("event_id").value;
	if(username == "" || password == ""){
		_("status").innerHTML = "<span style='color:red;'>Fill out all of the form data</span>";
	} else {
		_("loginbtn").style.display = "none";
		_("status").innerHTML = '<span style="color:green">Wait.........</span>';
		var ajax = ajaxObj("POST", "includes/login.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "login_failed"){
					_("status").innerHTML = "<span style='color:red'>Incorrect Credentials</span>";
					_("loginbtn").style.display = "block";
				} else if(ajax.responseText == "yes") {
					window.location = "home";
				}else{
					_("status").innerHTML = ajax.responseText;
					_("loginbtn").style.display = "block";
				}
	        }
        };
        ajax.send("username="+username+"&password="+password+"&login=login");
	}
}