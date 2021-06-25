 // AUTHOR:62011094
 // DATE:27/11/20

 // VALIDATION FUNCTION CALLED BY THE HTML FORM
 function Validate(form)
{
    // DECLARE VARIABLES TO STORE VALUES RETRIEVED FROM FORM
    var fn_id= document.getElementById("fn_id");
    var ln_id= document.getElementById("ln_id");
    var phone= document.getElementById("phone");
    var email= document.getElementById("email");
    var password= document.getElementById("password");
    var passwordCon= document.getElementById("password_");
    var err = 0;

    // CALL FUNCTIONS TO PERFORM VALIDATION

    // CALLS REQUIRED FUNCTION TO CHECK IF_EMPTY
    required(fn_id);
    required(ln_id);
    required(phone);
    required(email);
    required(password);
    required(passwordCon);
    // CALLS FUNCTION TO CHECK IF POLLING STATION isAlphaNumeric
    isAlphaNumeric(password);
    isAlphaNumeric(passwordCon);

    // CALLS FUNCTION TO CHECK FOR INTEGERS
    //anInteger(Clerk_id);
    //anInteger(Constituency_id);
    //anInteger(Poll_division_id);
    //anInteger(Candidate1votes);
    //anInteger(Candidate2votes);
    //anInteger(RejectedVotes);
    //anInteger(TotalVotes);


    // FUNCTION DEFINITION OF REQUIRED FUNCTION
    function required(x) 
    {
      // CHECKS IF FIELD IS EMPTY
      if (x.value.length == 0)
      { 
          // CHANGES backgroundColor TO RED IF TEST PASSED
          x.style.backgroundColor='red';
          this.err=1;
          return false;
      }
          return true;
    }

   // FUNCTION DEFINITION OF ISALPHANUMERIC FUNCTION
   function isAlphaNumeric(x)
    {
      // DECALE ARRAY STORING RANGE OF AlphaNumeric VALUE
     var letterNumber = /^[0-9a-zA-Z]+$/;

     // CHECKS IF VALUE FOLLOWS letterNumber RANGE AND IS AlphaNumeric
     if(x.value.match(letterNumber))
      {
        return true;
      }
    else
      {
        // CHANGES backgroundColor TO RED IF TEST FAILED
        x.style.backgroundColor='red';
        this.err=1;
       return false; 
      }
    }

    // FUNCTION DEFINITION OF ANINTEGER FUNCTION
    function anInteger(x)
    {
      // DECALE ARRAY STORING RANGE OF Numeric VALUE
     var number = /^[0-9]+$/;
     // CHECKS IF VALUE FOLLOWS letterNumber RANGE AND IS AlphaNumeric
     if(x.value.match(number))
      {
        return true;
      }
    else
      { 
        // CHANGES backgroundColor TO RED IF TEST FAILED
        x.style.backgroundColor='red';
        this.err=1; 
       return false; 
      }
    }

  if (this.err>0) {
    Alert("Enter Correct values");
  }
}
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "navbar") {
    x.className += " responsive";
  } else {
    x.className = "navbar";
  }
}
