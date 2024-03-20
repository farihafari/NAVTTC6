let i=0;
let para = document.querySelector("#para");
let x='' ;
while(i<10){
    // document.write("while loop "+i+"<br>");
    // para.innerHTML +=i;
    x+="<p>"+i+"<p>";
    i++;
}
para.innerHTML=x;