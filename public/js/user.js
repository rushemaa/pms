var username_state = false;

function _(el){
    return document.getElementById(el);
}

function check_username(){

    var username = _('username').value;
    if (username == '') {
        username_state = false;
        _("feedback").innerHTML="";
        return;
    }
    var ajax = ajaxObj("POST", "userAction.php");
    ajax.onreadystatechange = function() {
        if(ajaxReturn(ajax) == true) {
            if(ajax.responseText == "taken"){
                username_state = false;
                _("feedback").innerHTML="<span style='color:red;'>Sorry... Username already taken!</span>";
                //username.parent().addClass("is-invalid");
            } else if(ajax.responseText == "not_taken") {
                username_state = true;
                _("feedback").innerHTML="<span style='color:green;'>Username available</span>";
                // username.parent().addClass("is-valid");
            }
        }
    };
    ajax.send("username="+username+"&username_check=1");
}
function check_username_update(id){
    var username = _('username').value;
    var status=_("username_status");
    var i=id;
    if (username == '') {
        username_state = false;
       status.innerHTML="";
        return;
    }
    var ajax = ajaxObj("POST", "userAction.php");
    ajax.onreadystatechange = function() {
        if(ajaxReturn(ajax) == true) {
            if(ajax.responseText == "taken"){
                username_state = false;
                status.innerHTML="<span style='color:red;'>Sorry... Username already taken!</span>";
            } else if(ajax.responseText == "not_taken") {
                username_state = true;
                //username.parent().addClass("is-invalid");
                status.innerHTML="<span style='color:green;'>Username available</span>";
            }
            else {
                alert(ajax.responseText);
            }
        }
    };
    ajax.send("username="+username+"&id="+i+"&username_update=1");
}


function register() {
      var  firstname=_("firstname" ).value;
        var lastname=_('lastname').value;
        var middle=_('middlename').value;
       var  email=_('email').value;
       var  password=_('password').value;
        var institution=_('institution').value;
        var level=_('level').value;
        var username=_('username').value;
        var status=_("status");
    if(firstname == "" || lastname == "" || email == "" || password == "" || institution == "" || level == "" || username == ""){
        status.innerHTML = "<span style='color:red;'>Fill out all of the form data</span>";
    }
    else if(username_state===false){
        status.innerHTML = "<span style='color:red;'>Choose collect username.</span>";
    }
    else if(username_state) {
        var ajax = ajaxObj("POST", "userAction.php");
        ajax.onreadystatechange = function() {
            if(ajaxReturn(ajax) == true) {
                if(ajax.responseText == "success"){
                    swal("Saved!", "success");
                    _("registerfrm").reset();
                    status.innerHTML =" ";
                } else {
                    status.innerHTML = "<span style='color:red;'>An Error occurred while saving!</span>";
                }
            }
        };
        ajax.send("username="+username+"&firstname="+firstname+"&middlename="+middle+"&password="+password+"&email="+email+"&institution="+institution+"&level="+level+"&lastname="+lastname+"&add=add");


    }



}

function editUser(id) {
   username_state=true;
    var  firstname=_("firstname" ).value;
    var lastname=_('lastname').value;
    var middle=_('middlename').value;
    var  email=_('email').value;
    var  password=_('password').value;
    var institution=_('institution').value;
    var level=_('level').value;
    var username=_('username').value;
    var status=_("status");
    if(firstname == "" || lastname == "" || email == "" || institution == "" || level == "" || username == ""){
        status.innerHTML = "<span style='color:red;'>Fill out all of the form data</span>";
    }
    else if(username_state===false){
        status.innerHTML = "<span style='color:red;'>Choose collect username.</span>";
    }
    else if(username_state) {
        var ajax = ajaxObj("POST", "userAction.php");
        ajax.onreadystatechange = function() {
            if(ajaxReturn(ajax) == true) {

                if(ajax.responseText == "updated"){
                    swal("updated!", "success");
                    status.innerHTML ="";
                    window.location.replace("users");
                } else {
                    status.innerHTML = "<span style='color:red;'>error.</span>";

                }
            }
        };
        ajax.send("username="+username+"&firstname="+firstname+"&middlename="+middle+"&password="+password+"&email="+email+"&institution="+institution+"&level="+level+"&lastname="+lastname+"&id="+id+"&edit=edit");


    }



}


