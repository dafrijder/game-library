//login page
var loginButton = document.getElementById("loginbutton");
var loginform = document.getElementById("loginform");

var signupButton = document.getElementById("signupbutton");
var signupform = document.getElementById("signupform");

loginButton.addEventListener("click", function(){
    loginform.style.display = "block";
    signupform.style.display = "none";
});
signupButton.addEventListener("click", function(){
    signupform.style.display = "block";
    loginform.style.display = "none";
});