// Navbar

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", () =>{
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
})

document.querySelectorAll(".nav-link").forEach(n=>n.addEventListener("click", () => {
    hamburger.classList.remove("active");
}))


// Banner Slider
var firstindex=0;
function autoslider(){
    setTimeout(autoslider, 2000);
    var images;
    const img=document.querySelectorAll(".sliderimage");
    for(images=0;images<img.length;images++){
        img[images].style.display="none";
    }
    firstindex++;
    if(firstindex > img.length){
        firstindex=1;
    }
    img[firstindex - 1].style.display="block";
}
autoslider();

// Validation for login form

function loginvalidate(){
    let user = document.login.user.value;
if(user== ""){
    alert("Select User");
    document.login.user.focus();
    return false;  
}
let un = document.login.username.value;  
  if (un == "") {
    alert("Enter Username");
    document.login.username.focus();
    return false;
}
let upwd = document.login.pwd.value; 
if(upwd== ""){
    alert("Enter Password");
    document.login.pwd.focus();
    return false;  
}
document.login.submit();
}

//Validaton for sign-up form

function signupvalidate(){
    let uname=document.signup.name.value;
    if(uname==""){
        alert("Enter Full Name");
        document.signup.name.focus();
        return false;
    }
    let usrname=document.signup.username.value;
    if(usrname==""){
        alert("Enter Username");
        document.signup.username.focus();
        return false;
    }
    let password=document.signup.pwd.value;
    if(password==""){
        alert("Enter Password");
        document.signup.pwd.focus();
        return false;
    }
    document.signup.submit();
}

//Validation for add product form

function validateaddproduct(){
    let prono = document.addproduct.pno.value;
if(prono== ""){
    alert("Enter Product Id");
    document.addproduct.pno.focus();
    return false;  
}
let productname = document.addproduct.pname.value;
if(productname== ""){
    alert("Enter Product Name");
    document.addproduct.pname.focus();
    return false;  
}
let category = document.addproduct.category.value;
if(category== ""){
    alert("Enter Category");
    document.addproduct.category.focus();
    return false;  
}
let price = document.addproduct.pri.value;
if(price== ""){
    alert("Enter Price");
    document.addproduct.pri.focus();
    return false;  
}
let size = document.addproduct.psize.value;
if(size== ""){
    alert("Enter Size");
    document.addproduct.psize.focus();
    return false;  
}
let pimage = document.addproduct.img.value;
if(pimage== ""){
    alert("Upload Image");
    document.addproduct.img.focus();
    return false;  
}
let pstatus = document.addproduct.pstatus.value;
if(pstatus== ""){
    alert("Enter Status");
    document.addproduct.pstatus.focus();
    return false;  
}
document.addproduct.submit();
}

//Validation for delete product form

function validatedeleteproduct(){
    let prono = document.deleteproduct.pno.value;
    if(prono== ""){
        alert("Enter Product Id For Deletion");
        document.deleteproduct.pno.focus();
        return false;  
    } 
    document.deleteproduct.submit();
}

//Validation for searching product id in edit product form

function validatesearchproduct(){
    let prono = document.searchproduct.pno.value;
    if(prono== ""){
        alert("Select Product Id");
        document.searchproduct.pno.focus();
        return false;  
    } 
    document.searchproduct.submit();
}

//Validation for add admin form

function validateaddadmin(){
    let userno = document.add-admin.usernmbr.value;
    if(userno== ""){
        alert("Enter Admin Id");
        document.add-admin.usernmbr.focus();
        return false;  
    } 
    document.add-admin.submit();
}












