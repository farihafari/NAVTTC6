let p = "";
for (let i=0; i<=30; i++){
    if(i%2 ==0){
        p+="<p style='background-color:blue;color:white'>"+i+"</p>";
    }else{
        p+="<p style='background-color:green;color:white'>"+i+"</p>";
    }
 
   
}
document.querySelector("#dv").innerHTML=p;