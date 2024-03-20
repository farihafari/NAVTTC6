let studentDetail = [

    [  "ali",29,"full stack development"],
    [ "alisha",29,"web app  development"],
    [  "aliyar",29,"mern stack development"],
    [  "alishar",29,"mern stack development"]
];
let x="";

// console.log(studentDetail)
// document.write(studentDetail[0]+" <br>")
// document.write(studentDetail[2]+" <br>")
// document.write(studentDetail.length+" <br>")
// for single dimensional
// for(let i =0; i<studentDetail.length;i++ ){
//     console.log(i);
//     // document.write(i+"=> "+studentDetail[i]+" <br>")
//     x+="<li>"+studentDetail[i]+"</li>"

// }

// for two dimensional
let y="";
for(let i=0; i<studentDetail.length;i++){
y+="<tr>";
    for(let j=0;j<studentDetail[i].length;j++){
          y+="<td>"+studentDetail[i][j]+"</td>";
    }
  y+="</tr>"

}
document.querySelector('#tb').innerHTML=y;