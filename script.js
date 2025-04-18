// let signUpBtn = document.querySelector('.signUpbtn');
// let signInBtn = document.querySelector('.signInbtn');
// let namefield = document.querySelector('.nameField');
// let emailfield = document.querySelector('.emailField');
// let passfield = document.querySelector('.passField');
// let title = document.querySelector('.title');
// let underline = document.querySelector('.underline');
// let text = document.querySelector('.text');
// let gsign = document.querySelector('.gsign');

// // signInBtn.addEventListener('click',()=>{
// //     namefield.style.maxHeight = '0';
// //     title.innerHTML = 'Sign In';
// //     text.innerHTML = 'Forget Password?';
// //     gsign.innerHTML = 'Or sign in with';
// //     signUpBtn.classList.add('disable');
// //     signInBtn.classList.remove('disable')
// // });

// // signUpBtn.addEventListener('click',()=>{
// //     namefield.style.maxHeight = '60px';
// //     title.innerHTML = 'Sign Up';
// //     text.innerHTML = 'Password Suggestions : Maximum 8 characters.';
// //     gsign.innerHTML = 'Or connect with';
// //     signUpBtn.classList.remove('disable');
// //     signInBtn.classList.add('disable')
// // });

// // function togglePassword() {
// //     const passwordInput = document.getElementById("password");
    
// //     if (passwordInput.type === "password") {
// //         passwordInput.type = "text";
// //     } else {
// //         passwordInput.type = "password";
// //     }
// // }
// function validate(){
    
//     const email = document.getElementById("email").value;
//     const password = document.getElementById("password").value;
//     // if(namefield.style.maxHeight === '0px'|| namefield.style.maxHeight === '')
//     // {
        
//     //             namefield.style.maxHeight = '60px';
//     //             title.innerHTML = 'Sign Up';
//     //             text.innerHTML = 'Password Suggestions : Maximum 8 characters.';
                
//     //             gsign.innerHTML = 'Or connect with';
//     //             signUpBtn.classList.remove('disable');
//     //             signInBtn.classList.add('disable');
//     //             return;
           
//     // }
//      if (!email.includes("@diu.edu.bd")) {
//         alert("Please enter a valid email!");
//         return false;
//     }
//     else if (password.length < 6) {
//         alert("Password must be at least 6 characters long.");
//         return false;
//     }
//     else if (password.length > 8) {
//         alert("Maximum 8 characters.");
//         return false;
//     }
   
        
//             // namefield.style.maxHeight = '0px';
//             // title.innerHTML = 'Sign In';
//             // text.innerHTML = 'Forget Password?';
//             // gsign.innerHTML = 'Or sign in with';
//             // document.getElementById("name").value = "";
//             // document.getElementById("email").value = "";
//             // document.getElementById("password").value = "";
//             // signUpBtn.classList.add('disable');
//             // signInBtn.classList.remove('disable');
    
   

// }




function popup(popup_name)
{
  get_popup=document.getElementById(popup_name);
  conte = document.getElementById("container")
  if(get_popup.style.display=="flex")
  {
    get_popup.style.display="none";
    conte.style.display="flex";
   
  }
  else
  {
    get_popup.style.display="flex";
    
    conte.style.display="none";
  }
}

function popup1()
{
  // get_popup=document.getElementById(popup_name);
  // conte = document.getElementById("pc-popup1")
  // if(get_popup.style.display=="flex")
  // {
  //   get_popup.style.display="none";
  //   //conte.style.display="flex";
   
  // }
  // else{
  //   get_popup.style.display="flex";
  // }
  const popup = document.getElementById('pc-popup');
    if (popup) {
      popup.style.display="none";
    }
}
function popup2() {
  const popup = document.getElementById('prblm-popup');
  if (popup.style.display === "flex" ) {
      popup.style.display = "none";
  } else {
      popup.style.display = "flex"; // or "block" depending on your CSS
  }
}




