window.onload = function(){
       var mainForm = document.getElementById("mainForm");
         mainForm.onsubmit = function(e){
          var requiredInputs = document.querySelectorAll(".required");
          for (var i=0; i < requiredInputs.length; i++){

              if(isBlank(requiredInputs[i]) ){
                e.preventDefault(); 
                requiredInputs[i].style.backgroundColor="#AA0000";
                 var nstr=requiredInputs[i].name;
                  logDisplay(10,nstr);
                 document.getElementById(nstr+"_label").style.visibility="visible";
              } 
      }
    }
}

   function isBlank(inputField){
    if (inputField.value==""){
   var nstr=inputField.name
   
	 var warningName = document.getElementById(nstr+"_label");
   if(warningName !=null){
	 warningName.visibility = "visible";
  }
return true;
	}
    return false;
   }

   function resetName(){

	   var nfield = document.getElementById("Username");
     console.log("|---|"+nfield+"|---|");
     var warningName=document.getElementById("Username_label");
     console.log("|---|"+warningName+"|---|");
     if(isBlank(nfield)){
          logDisplay(36, warningName.style.visibility);
          warningName.style.visibility = "visible";

     }else{
      logDisplay(40,warningName.style.backgroundColor);
       nfield.style.backgroundColor="#FFFFFF";

       logDisplay(42,warningName.style.backgroundColor);
       logDisplay( 43,warningName.style.visibility );
       warningName.style.visibility = "hidden";
     }


   }


   function resetCurrencyofstock(){

     var nfield = document.getElementById("Currencyofstock");
     console.log("|---|"+nfield+"|---|");
     var warningName=document.getElementById("Currencyofstock_label");
     console.log("|---|"+warningName+"|---|");
     if(isBlank(nfield)){
          logDisplay(36, warningName.style.visibility);
          warningName.style.visibility = "visible";

     }else{
      logDisplay(40,warningName.style.backgroundColor);
       nfield.style.backgroundColor="#FFFFFF";

       logDisplay(42,warningName.style.backgroundColor);
       logDisplay( 43,warningName.style.visibility );
       warningName.style.visibility = "hidden";
     }
  
   }  
   
   function resetStockDate(){

       var nfield = document.getElementById("StockDate");
       console.log("|---|"+nfield+"|---|");
       var warningName=document.getElementById("StockDate_label");
       console.log("|---|"+warningName+"|---|");
       if(isBlank(nfield)){
            logDisplay(36, warningName.style.visibility);
            warningName.style.visibility = "visible";

       }else{
        logDisplay(40,warningName.style.backgroundColor);
         nfield.style.backgroundColor="#FFFFFF";

         logDisplay(42,warningName.style.backgroundColor);
         logDisplay( 43,warningName.style.visibility );
         warningName.style.visibility = "hidden";
       }


     }

     function resetEmail(){

     var nfield = document.getElementById("email");
     console.log("|---|"+nfield+"|---|");
     var warningName=document.getElementById("email_label");
     console.log("|---|"+warningName+"|---|");
     if(isBlank(nfield)){
          logDisplay(36, warningName.style.visibility);
          warningName.style.visibility = "visible";

     }else{
      logDisplay(40,warningName.style.backgroundColor);
       nfield.style.backgroundColor="#FFFFFF";

       logDisplay(42,warningName.style.backgroundColor);
       logDisplay( 43,warningName.style.visibility );
       warningName.style.visibility = "hidden";
     }
  
   }

   function resetExchangethestock(){

       var nfield = document.getElementById("Exchangethestock");
       console.log("|---|"+nfield+"|---|");
       var warningName=document.getElementById("Exchangethestock_label");
       console.log("|---|"+warningName+"|---|");
       if(isBlank(nfield)){
            logDisplay(36, warningName.style.visibility);
            warningName.style.visibility = "visible";

       }else{
        logDisplay(40,warningName.style.backgroundColor);
         nfield.style.backgroundColor="#FFFFFF";

         logDisplay(42,warningName.style.backgroundColor);
         logDisplay( 43,warningName.style.visibility );
         warningName.style.visibility = "hidden";
       }


     }

     function resetCity(){

     var nfield = document.getElementById("City");
     console.log("|---|"+nfield+"|---|");
     var warningName=document.getElementById("City_label");
     console.log("|---|"+warningName+"|---|");
     if(isBlank(nfield)){
          logDisplay(36, warningName.style.visibility);
          warningName.style.visibility = "visible";

     }else{
      logDisplay(40,warningName.style.backgroundColor);
       nfield.style.backgroundColor="#FFFFFF";

       logDisplay(42,warningName.style.backgroundColor);
       logDisplay( 43,warningName.style.visibility );
       warningName.style.visibility = "hidden";
     }
  
   }

   function logDisplay(msg,line){
    console.log(line+"[debug]"+msg+"|---|");
   }
function validate() {
    if (document.form.email.value.trim() === "") {
        alert("Please enter a email address");
        document.form.email.focus();
        return false;
    }
    if (document.form.email.value !== "") {
        if (! (/^\d*(?:\.\d{0,2})?$/.test(document.form.email.value))) {
            alert("Please enter a email address");
            document.form.email.focus();
            return false;
        }
    }
    return true;
}
function myFunction() {
    var x = document.createElement("INPUT");
    x.setAttribute("type", "file");
    document.body.appendChild(x);
}
