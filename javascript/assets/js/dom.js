let name = document.getElementById("name");
let email = document.getElementById("email");
let phone = document.getElementById("phone");
let uname= prompt("enter your name");
let uemail = prompt("enter your email");
let uphone= prompt("enter your phone number");

if(uname && uemail && uphone){
    name.innerHTML=uname;
    name.style.backgroundColor="blue";
    name.style.color="white";
    
    
    email.innerHTML=uemail;
    email.style.backgroundColor="red";
    email.style.color="white";
    
    phone.innerHTML=uphone;
    phone.style.backgroundColor="green";
    phone.style.color="white";
    
}
else{
    alert("required fill ")
}
// console.log(x);