function miniCalculator(){
let op1 = parseInt(document.querySelector("#num1").value);
let op2 = parseInt(document.querySelector("#num2").value);
let operators = document.querySelector("#operators").value;
let result = document.querySelector("#result");
if(operators =="+"){
    result.innerHTML = op1+op2;
    result.style.display="block"
}else if(operators =="-"){
   if(op1>op2){
    result.innerHTML = op1-op2;
    result.style.display="block"
   }else{
    result.innerHTML="oprand 2 must be less than to oprand one for subtraction";
    result.style.color="red";
    result.style.backgroundColor ="transparent";
    result.style.display="block"
   }
}
else if(operators =="*"){
    result.innerHTML = op1*op2;
    result.style.display="block"
}
else if(operators =="/"){
    result.innerHTML = op1/op2;
    result.style.display="block";
}
else{
    result.innerHTML= "please enter the valid data!";
    result.style.color="red";
    result.style.backgroundColor ="transparent";
    result.style.display="block"
}
}