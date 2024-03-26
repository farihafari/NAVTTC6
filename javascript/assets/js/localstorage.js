// function loStorage(){
//     localStorage.setItem("name","ali");
// }
// function seStorage(){
//     sessionStorage.setItem("name","aliya");

// }
function registration(){
    let uName = document.querySelector("#uname").value;
    let uEmail  = document.querySelector("#uemail").value;
    let uPassword = document.querySelector("#upassword").value;
    let uPhone = document.querySelector("#uphone").value;
    if(uName && uEmail && uPassword && uPhone){
        let userDetail = {
            name:uName,
            email:uEmail,
            password:uPassword,
            phone:uPhone
        }
        // localStorage.setItem("name",uName);
        // localStorage.setItem("email",uEmail);
        localStorage.setItem("userDetail",JSON.stringify(userDetail));
        alert("register your account successfully");

    }else{
        alert("every field are required to fill")
    }
    console.log(localStorage.getItem("userDetail"))
}
