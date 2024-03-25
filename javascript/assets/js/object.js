let student={
    name:"ali",
    email:"ali@gmail.com",
    phone:"03462353647",
}
let div = document.getElementById("para");
let x ="";
// console.log(student)
// document.write(student.name+" "+ student.email +" "+student.phone);
for(let key in student){
x+= "<p>"+key+" "+ student[key]+"</p>";
    // console.log(student[key])
}
div.innerHTML=x;