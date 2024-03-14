// function itSelfCall(){
//     alert("hello world");
// }
// itSelfCall();
// alert("hello world");
// function call on click
function userDetail(){
    let uName = document.getElementById("userName").value;
    let para = document.getElementById("para");
    para.innerHTML= uName;
    para.style.backgroundColor="blue";
    para.style.color="white";
    para.style.padding="2px"
    console.log(uName);
    console.log(para)
}