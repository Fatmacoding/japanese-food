const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signUp = document.getElementById('signUp');
const signIn = document.getElementById('signIn');

signUpButton.addEventListener('click', function (){
    signIn.style.display = "none";   
    signUp.style.display = "block";
});
signInButton.addEventListener('click', function (){
    signUp.style.display = 'none';
    signIn.style.display = 'block';   
});
