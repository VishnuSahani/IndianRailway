<?php require('head_section.php');?>

<script>
function _(id)
{ 
return document.getElementById(id);
 }
function submitForm786(){
  _("mybtn").disabled = true;
  _("status").innerHTML = 'please wait ...';
  var formdata = new FormData();
  formdata.append( "dname", _("name").value );
  formdata.append( "demail", _("email").value );
  formdata.append( "dphone", _("phone").value );
  formdata.append( "dsub", _("subject").value );
  formdata.append( "msg", _("notice").value );
  var ajax = new XMLHttpRequest();
  ajax.open( "POST", "example_parser.php" );
  ajax.onreadystatechange = function() {
    if(ajax.readyState == 4 && ajax.status == 200) {
      if(ajax.responseText == "success"){
        _("my_form").innerHTML = '<h2>Thanks '+_("n").value+', your message has been sent.</h2>';
      } else {
        _("status").innerHTML = ajax.responseText;
        _("mybtn").disabled = false;
          _("my_form").reset();
      }
    }
  }
  ajax.send( formdata );
}


////////////////


   
   function makeUppercase4()
   {
      document.contact.name.value=document.contact.name.value.toUpperCase();
   }

    function makeUppercase5()
   {
      document.contact.subject.value=document.contact.subject.value.toUpperCase();
   }

function ValidateAlpha(evt)
   {
     var keyCode=(evt.which)?evt.which:evt.keyCode
     if ((keyCode >= 65 && keyCode <= 97) || keyCode == 32 || (keyCode >= 97 && keyCode <= 122 ||keyCode ==8 ))
      {
        return true;
      }
        return false;
   }
   function ValidateNum(evt1)
   {
     var keyCode=(evt1.which)?evt1.which:evt1.keyCode
     if (keyCode >= 48 && keyCode <= 57 || keyCode ==8)
      {
        return true;
      }
        return false;
   }
</script>
<div class="container" >
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto" >
        <h2 class="text-center">Drop Your Message</h2>
            <p  class="text-center">Feel Free To Contact Us.</p>


             <form  id="my_form"  name="contact" onSubmit="submitForm786(); return false;">
    <!--<form  id="my_form"  name="contact" action="example_parser.php" method="post">-->
    <div class="form-row">
    <div class="form-group col-lg-6">
        <label>Name *</label>
        <input type="text" name="name" id="name" class="form-control" onkeypress="return ValidateAlpha(event);"  onkeyup="makeUppercase4();" style="margin-top:10px;border:1px solid #e26228;border-left:3px solid #e26228;border-right:3px solid #e26228;" required="required">
    </div><!-- form group col 6 -->

    <div class="form-group col-lg-6">
        <label>Email *</label>
        <input type="email" name="email" id="email" class="form-control" style="margin-top:10px;border:1px solid #e26228;border-left:3px solid #e26228;border-right:3px solid #e26228;" required="required">
    </div><!-- form group col 6 -->
    </div><!-- form row  -->
    <div class="form-row">
    <div class="form-group col-lg-6">
        <label>Phone *</label>
         <input type="text" name="phone" id="phone" class="form-control"  maxlength="10" minlength="10" onkeypress="return ValidateNum(event);" style="margin-top:10px;border:1px solid #e26228;border-left:3px solid #e26228;border-right:3px solid #e26228;" required="required">
    </div><!-- form group col 6 -->
                        
    <div class="form-group col-lg-6">
      <label>Subject *</label>
              <input type="text" name="subject" id="subject" class="form-control" onkeypress="return ValidateAlpha(event);"  onkeyup="makeUppercase5();" style="margin-top:10px;border:1px solid #e26228;border-left:3px solid #e26228;border-right:3px solid #e26228;" required="required">

      
     </div> <!-- form group col 6 -->
   </div><!-- form row  -->

                       
  <div class="form-row">
    <div class="form-group col-lg-12">
        <label>Message *</label>
          <textarea name="message" id="notice" required="required"  class="form-control" rows="5" style="margin-top:15px;border:1px solid #e26228; border-left:3px solid #e26228;border-right:3px solid #e26228;padding:0 10px 0 20px; resize:none" placeholder="Enter your message..">
            
          </textarea>
  </div><!-- form group col 12---->
   
    </div><!-- form row -->
                       
   <div class="form-row">
    <div class="form-group col-lg-12">                     
  <center><input type="submit" name="submit" id="mybtn" class="btn btn-success btn-lg" value="Submit Message"></center>
    <span id="status" style="color:red;"><strong><b></b></strong></span>
    </form>
 </div><!-- form group col 12---->
   
    </div><!-- form row -->

      </div>
<!-- col xl lg md close -->
      
    </div>    <!-- row close -->
  </div>
  <!-- container close -->



   <!-- ---------------- -->
<div class="container-fluid" title="Best Software Development Company in Gorakhpur Uttar Pradesh India">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 card border-0">
        <div class="card-header bg-dark text-center text-light">
          <i class="fa fa-envelope" style="font-size:26px;color:#e26228;"></i><font style="font-size:22px;">  <strong> Registered Office</strong></font>
        </div><!-- card header close -->

        <div class="card-body text-center">
           <address>
            <strong style="color:#e26228; font-size:20px;">
              <b>
                <i>Indian Railways</i>
              </b>
            </strong>
            <br>
           INDIA<br> INDIA <br>(U.P.) INDIA

             
    <br>            
Mobile : <span style="font-weight:normal"><a href="tel:+91-1212121212" >+91 1212121212,</a> <a href="tel:+91-1212121212" >+91 1212121212</a></span><br />
      
    
    E-mail : <span><a href="mailto:help@gmail.com"  style="color:#e26228;">help@gmail.com</a></span>
     <br>
    <span><a href="mailto:help@gmail.com
"  style="color:#e26228;">help@gmail.com</a></span>

<br>
    <span><a href="mailto:help@ibndigital.com
"  style="color:#e26228;">help@ibndigital.com</a></span>
      </address>

          
        </div><!-- card body close -->

      </div>
<!-- col xl lg md 6 close -->
      

       <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">
        <div class="map">
 
 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14370.084763683974!2d82.6663395!3d25.7863742!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa6d01d4ee275a486!2sIBN%20DIGITAL%20SERVICES!5e0!3m2!1sen!2sin!4v1608196858441!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
      </div>
<!-- col xl lg md 6 close -->
      
    </div>
    <!-- row close -->


  </div>
  <!-- container close -->

<?php require('footer.php');?>>>>>