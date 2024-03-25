let mobileData = [
    {
        name:"vivo",
        price:47589,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v1.jpg"
    },
    {
        name:"vivo 11",
        price:45689,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v2.jpg"
    },
    {
        name:"vivo 12",
        price:47589,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v3.jpg"
    },
    {
        name:"vivo 4",
        price:47589,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v4.jpg"
    },
    {
        name:"vivo 5",
        price:47589,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v5.jpg"
    },
    {
        name:"vivo",
        price:47589,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v1.jpg"
    },
    {
        name:"vivo 11",
        price:45689,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v2.jpg"
    },
    {
        name:"vivo 12",
        price:47589,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v3.jpg"
    },
    {
        name:"vivo 4",
        price:47589,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v4.jpg"
    },
    {
        name:"vivo 5",
        price:47589,
        descript:"  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam maiores quod odit maxime temporibus veniam deserunt doloremque et quos praesentium,",
        image:"assets/images/v5.jpg"
    },
];
let x="";
// console.log(mobileData)
// document.write(mobileData[1].name)
for(let index in mobileData){
    x+=`
    <tr>
    <td>${mobileData[index].name}</td>
    <td>${mobileData[index].price}</td>
    <td>${mobileData[index].descript}</td>
    <td><img src="${mobileData[index].image}"></td>
</tr>
    `
    // console.log(mobileData[index].price)
}
document.querySelector("#data").innerHTML=x;