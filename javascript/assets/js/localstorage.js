// function loStorage(){
//     localStorage.setItem("name","ali");
// }
// function seStorage(){
//     sessionStorage.setItem("name","aliya");

// }
let uName = document.querySelector("#uname");
    let uEmail  = document.querySelector("#uemail");
    let uPassword = document.querySelector("#upassword");
    let uPhone = document.querySelector("#uphone");
function registration(){
    
    if(uName.value && uEmail.value && uPassword.value && uPhone.value){
        let userDetail = {
            name:uName.value,
            email:uEmail.value,
            password:uPassword.value,
            phone:uPhone.value
        }
        // localStorage.setItem("name",uName);
        // localStorage.setItem("email",uEmail);
        // for single data
        // localStorage.setItem("userDetail",JSON.stringify(userDetail));
        // for multiple data storing on local storage

        if(localStorage.getItem("userDetails")==null){
            localStorage.setItem("userDetails","[]");
          
        }
        let getData = JSON.parse(localStorage.getItem("userDetails"));
        console.log(getData)
        getData.push(userDetail);
        localStorage.setItem("userDetails",JSON.stringify(getData))
        alert("register your account successfully");

    }else{
        alert("every field are required to fill")
    }
    // console.log(localStorage.getItem("userDetails"))
    // console.log(JSON.parse(localStorage.getItem("userDetails")))

}
// console.log(localStorage.getItem("userDetails"))
// login work
function login(){
    let fetchData = JSON.parse(localStorage.getItem("userDetails"));
    // console.log(fetchData);

  let errorMail = document.querySelector("#errorMail");
  let errorPassword = document.querySelector("#errorPassword");
if(uEmail.value && uPassword.value ){
   for(let localData of fetchData){
    // console.log(localData.name)
    if(localData.email == uEmail.value && localData.password == uPassword.value){
        alert("SUCCESSFULLY");
        location.assign("admin.html")
        break;
    }
    else if(localData.email != uEmail.value && localData.password != uPassword.value){
        alert("sorry");
        break;
    }
   }
}else{
    errorMail.innerHTML="please fill this field";
    errorMail.style.color="red";
    errorPassword.innerHTML="please fill this field";
    errorPassword.style.color="red";
}              
    
}
