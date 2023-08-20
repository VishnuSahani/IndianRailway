// JavaScript Document
function makeUppercase()
   {
      document.reg.stdname.value=document.reg.stdname.value.toUpperCase();
   }
   function makeUppercase1()
   {
      document.reg.fname.value=document.reg.fname.value.toUpperCase();
   }
   function makeUppercase2()
   {
      document.reg.col.value=document.reg.col.value.toUpperCase();
   }
   function makeUppercase3()
   {
      document.feed.name.value=document.feed.name.value.toUpperCase();
   }
   function makeUppercase4()
   {
      document.contact.name.value=document.contact.name.value.toUpperCase();
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
   
   function reg()
{
    if(document.date.name.value=="")
	{
	    alert("Please fill Your Name.");
		document.date.name.focus();
		return false;
	}
	if(document.date.fname.value=="")
	{
	    alert("Please fill Your Father Name.");
		document.date.fname.focus();
		return false;
	}
	if(document.date.mname.value=="")
	{
	    alert("Please fill Your Mother Name.");
		document.date.mname.focus();
		return false;
	}
	if(document.date.number.value=="")
	{
	     alert("Please fill your Mob. No.");
	     document.date.number.focus();
	     return false;
	}
	if(document.date.add.value=="")
	{
	     alert("Please fill your Address");
	     document.date.add.focus();
	     return false;
	}
	if(document.date.email.value=="")
	{
	     alert("Please Fill Your Email ID");
	     document.date.email.focus();
	     return false;
	}
	e=document.date.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.date.email.focus();
			return false;
	      }
		  if(document.date.pass.value=="")
	{
	     alert("Please Fill Your Password");
	     document.date.pass.focus();
	     return false;
	}
	if(document.date.city.value=="")
	{
	     alert("Please Fill Your City");
	     document.date.city.focus();
	     return false;
	}
	
	if(document.date.dob.value=="")
	{
	     alert("Please Fill Your Date of birth");
	     document.date.dob.focus();
	     return false;
	}
	if(document.date.gender.value=="")
	{
	     alert("Please Select Your Gender");
	     document.date.gender.focus();
	     return false;
	}
		 
	return true;
}