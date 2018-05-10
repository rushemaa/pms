<?php require_once("includes/validate_credentials.php"); 
require_once '../web-config/config.php';
require_once '../web-config/database.php';

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<?php require_once("includes/head.php"); ?>
</head>
<body>
    <?php require_once 'includes/left_nav.php'; ?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
     <?php require_once 'includes/top_nav.php'; ?>
     <div class="container">
         <form id="regForm" action="">

<h1 class="text-center">Register:</h1><br>

<!-- One "tab" for each step in the form: -->
<div class="tab" id="tab1">
  <div class="header">
                            <h3>
                                <small>Instution Basic Info</a></small>
                            </h3>
                        </div>
                        <br>
                            <div class="form-group form-float">
                                        <div class="form-line">
                                         <label class="form-label">Instution *</label> 
                                    <select class="form-control show-tick" id="myselect">
                                    <?php $st = $database->query("SELECT * FROM institution WHERE status='active'");
                                    foreach ($st as $key => $value) { if ($value['Name'] !== "MOFA"){?>
                                        <option id="option" value="<?=$value['Id']?>"><?=$value['Name']?></option><?php }} ?>
                                    </select>
                                </div>
                            </div>
                                    <div class="form-group form-float">
                                      <label class="form-label" id="l_names">Name *</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name" required id="names">
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                      <label class="form-label" id="l_phone">Phone Number*</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="phone" id="phone" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                      <label class="form-label" id="l_contact">Contact Person*</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="contact_person" id="contact" required>
                                        </div>
                                    </div>
</div>
<br>
<div class="tab" id="tab2">                       
                                        <h3>
                                <small>Instution Location</a></small>
                            </h3><br><br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                  <label class="form-label">Country*</label>
                                                    <div class="form-line">
                                                       <select name="country" id="country" class="form-control">

                                        <?php $st2 = $database->query("SELECT * FROM countries"); 
                                                           foreach ($st2 as $key => $value) {?>
                                                        <option id="option" value="<?=$value['id']?>"><?=$value['name']?></option><?php } ?>
                                                       </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                  <label class="form-label">Province *</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="province"  id="province">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                  <label class="form-label">District *</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="name"  id="district">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                  <label class="form-label">Sector *</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="province"  id="sector">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                  <label class="form-label">Cell *</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="province"  id="cell">
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-float">
                                                <label class="form-label">plot Number *</label>
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="name" id="plot">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

</div>

<div class="tab" id="tab3">
 <h3>Instution Cars</h3><br><br>
                                <fieldset>
                                    <div class="form-group form-float" id="holder">
                                      <label class="form-label">Car Plate Number*</label>
                                        <div class="form-line">
                                            <input type="text" name="name"  id="plate_number" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                      <label class="form-label">Car Model*</label>
                                        <div class="form-line">
                                            <input type="text" id="model" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                      <label class="form-label">Car Warranty*</label>
                                        <div class="form-line">
                                            <input type="text" id="warranty" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                      <label class="form-label">Insurance Compagny*</label>
                                        <div class="form-line">
                                            <input type="text" id="insurance" class="form-control">
                                            
                                        </div>
                                    </div>
                                </fieldset>
</div>
<div style="overflow:auto;">
  <div style="float:right;">
    <button class="btn btn-success" type="button" id="prevBtn" onclick="prevTab(-1)">Previous</button>
    <button class="btn btn-success" type="button" id="nextBtn" onclick="nextPrev(1)">Save and Continue</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<style type="text/css">
#regForm {
  background-color: #ffffff;
  margin: 2px auto;
  padding: 40px;
  width: 90%;
  min-width: 300px;
}

/* Style the input fields */
input,select {
  padding: 10px;
  margin-top: 20px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
     </div>
     <script type="text/javascript">
        getValue("#myselect","",'id_institution');
        getValue("#phone","#l_phone",'telephone');
        getValue("#contact","#l_contact",'contact_person');
        getValue("#names","#l_names",'name');
        function getValue(name,l_name,column){
        $.ajax({
            url:'isset.php',
            type:'post',
            data: {'name': column},
            success:function(data){
                if (data!="not") {
                    if (name!="#myselect") {
                        $(name).val(data);
                        $(l_name).css("display","none");
                    }
                    else{
                    $(name+ " option[value="+data+"]").prop('selected', true);}
                }
                
            }
        });}

    function check(){
        $.ajax({
                    url: 'save.php',
                    type : 'POST',
                    data : {
                        'institution': $( "#myselect" ).val(),
                        'names' : $('#names').val(),
                        'contact' : $('#contact').val(),
                        'phone' : $('#phone').val(),
                    },
                    beforeSend: function(){
                        $("#submit").val('submitting ...');
                    },
                    success: function(data){
                        if (data!="Updated") {
                            swal("Success!", data, "success");
                        }
                        
                    }
                });
    }

        function destroy(){
          $.ajax({
            url : 'destroy.php',
            success:function(data){
                console.log(data);
                                }
                });
        }

        function saveCars(){
                $.ajax({
                    url: 'save2.php',
                    type : 'POST',
                    data : {
                        'plate_number': $("#plate_number" ).val(),
                        'insurance' : $('#insurance').val(),
                        'warranty' : $('#warranty').val(),
                        'model' : $('#model').val(),
                    },
                    beforeSend: function(){
                        $("#submit").val('submitting ...');
                    },
                    success: function(data){
                        console.log(data);
                        swal("Success!", "Car has been saved!", "success");
                        destroy();
                        window.location.reload();
                    }
                });
            }


            function saveLocation(){
                $.ajax({
                    url: 'saveLocation.php',
                    type : 'POST',
                    data : {
                        'province': $("#province" ).val(),
                        'district' : $('#district').val(),
                        'sector' : $('#sector').val(),
                        'cell' : $('#cell').val(),
                        'country' : $('#country').text(),
                        'plot_nber' : $('#plot').val(),
                    },
                    beforeSend: function(){
                        $("#submit").val('submitting ...');
                    },
                    success: function(data){
                        console.log(data);
                    }
                });
            }
     </script>
     <script type="text/javascript">
         var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display

  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:

  if (x[currentTab].getAttribute('id')=="tab1") {
    check();
  }
  else if (x[currentTab].getAttribute('id')=="tab2") {
    saveLocation();
  }


  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    saveCars();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
function prevTab(n) {
   
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
     </script>
     <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
     <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


   
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>