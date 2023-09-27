const navIconEl = document.querySelector('.nav__icon');
const navCloseEl = document.querySelector('.nav__close');
const navList = document.querySelector('.nav__list');
const navOverlayEl = document.querySelector('.nav__overlay');

const navOpen = () => {
    navList.classList.add('show');
    navOverlayEl.classList.add('active');
    document.body.style = 'visibility: visible; height: 100vh; width: 100vw; overflow: hidden;';

}

const navClose = () => {
    navList.classList.remove('show');
    navOverlayEl.classList.remove('active');
    document.body.style = 'visibility: visible; height: initial; width: 100%; overflow-s: hidden;'

}

navIconEl.addEventListener('click', navOpen);
navCloseEl.addEventListener('click', navClose);
navOverlayEl.addEventListener('click', navClose);






//contact




function ValidateEmail() {
    var email = document.getElementById("email").value;
    if (email == "") {
        document.getElementById("emailErr").innerText = "Email is required";
        return false;
    }

    document.getElementById("emailErr").innerText = "";
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!mailformat.test(email)) {
        emailErr.innerHTML = "Invalid Email Address.";
        return false;
    }
    return true;
}
function ValidateName()    //admin side category and hack name too
{
    var name = document.getElementById("name").value;
    if (name == "") {
        document.getElementById("nameErr").innerText = "Required";
        return false;
    }

    document.getElementById("nameErr").innerText = "";
    var nameFormat = /^[A-Za-z]*\s{1}[A-Za-z]*$/;
    if (!nameFormat.test(name)) {
        nameErr.innerHTML = "Can not contain numbers.";
        return false;
    }
    return true;
}
function ValidateMsg() {

    var msg = document.getElementById("messages").value;
    document.getElementById("msgErr").innerText = "";
    var required = 15;
    var left = required - msg.length;
    if (left > 0) {
        msgErr.innerHTML = left + " more characters required";
        return false;
    }

    return true;
}
function ValidateNumber() {
    var num = document.getElementById("number").value;
    if (num == "") {
        document.getElementById("numErr").innerText = "Phone Number is required";
        return false;
    }
    document.getElementById("numErr").innerText = "";
    var numFormat = /^[9][6-8]{1}[0-9]{8}$/;
    if (!numFormat.test(num)) {
        numErr.innerHTML = "Invalid number";
        return false;
    }
    return true;
}
function ValidateMyForm() {
    if (!ValidateName() || !ValidateNumber() || !ValidateEmail() || !ValidateMsg()) {
        submitErr.style.display = 'block';
        submitErr.innerHTML = "Please fix errors to submit";
        setTimeout(function () { submitErr.style.display = 'none'; }, 3000);
        return false;
    }

}

//hack



function ValidateDesc() {
    var msg = document.getElementById("messages").value;
    document.getElementById("msgErr").innerText = "";
    var required = 30;
    var left = required - msg.length;
    if (left > 0) {
        msgErr.innerHTML = left + " more characters required";
        return false;
    }

    return true;
}
function ValidateHack() {
    if (!ValidateName() || !ValidateDesc()) {
        submitErr.style.display = 'block';
        submitErr.innerHTML = "Please fix errors to submit";
        setTimeout(function () { submitErr.style.display = 'none'; }, 3000);
        return false;
    }
}


//category

function ValidateCat() {
    if (!ValidateName()) {
        submitErr.style.display = 'block';
        submitErr.innerHTML = "Please fix errors to submit";
        setTimeout(function () { submitErr.style.display = 'none'; }, 3000);
        return false;
    }
}


//recipe




function Sname() {
    var name = document.getElementById("sname").value;
    if (name == "") {
        document.getElementById("snameErr").innerText = "Required";
        return false;
    }

    // document.getElementById("snameErr").innerText = "";
    // var nameFormat = /^[A-Za-z]*\s{1}[A-Za-z]*$/;
    // if (!nameFormat.test(name)) {
    //     snameErr.innerHTML = "Can not contain numbers.";
    //     return false;
    // }
    return true;
}

function Sdescription() {
    var msg = document.getElementById("sdescription").value;
    document.getElementById("sdescErr").innerText = "";
    var required = 20;
    var left = required - msg.length;
    if (left > 0) {
        sdescErr.innerHTML = "Add " + left + " more characters";
        return false;
    }

    return true;
}

function Savailable() {
    var name = document.getElementById("savailable").value;
    if (name == "") {
        document.getElementById("savailErr").innerText = "Required";
        return false;
    }
    return true;
}
// function Alter() {
//     var note = document.getElementById("alter").value;
//     document.getElementById("alterErr").innerText = "";
//     var required = 10;
//     var msg = required - note.length;
//     if (msg > 0) {
//         alterErr.innerHTML = "Add " + msg + " more characters";
//         return false;
//     }

//     return true;
// }
// function Rdirection() {
//     var msg = document.getElementById("rdirection").value;
//     document.getElementById("rdirectErr").innerText = "";
//     var required = 50;
//     var left = required - msg.length;
//     if (left > 0) {
//         rdirectErr.innerHTML = "Add " + left + " characters more";
//         return false;
//     }

//     return true;
// }

function Skey() {
    var msg = document.getElementById("skey").value;
    document.getElementById("skeyErr").innerText = "";
    var required = 10;
    var left = required - msg.length;
    if (left > 0) {
        skeyErr.innerHTML = "Add " + left + " characters more";
        return false;
    }

    return true;
}

function Sprice() {
    var price = document.getElementById("sprice").value;
    document.getElementById("spriceErr").innerText = "";
    var numFormat = /^\d+/;
    if (!numFormat.test(price)) {
        rpriceErr.innerHTML = "Please only enter numeric characters";
        return false;
    }
    return true;
}

function Simg() {
    var uploadedFile = document.getElementById('simage');
    var pic = uploadedFile.value;
    var resExt = pic.substring(pic.lastIndexOf('.') + 1);
    if (!((resExt == "jpg") || (resExt == "jpeg") || (resExt == "png") || (resExt == "JPG") || (resExt == "JPEG") || (resExt == "PNG"))) {
        alert("File type should be jpg/jpeg/png");
        uploadedFile.value = '';
        return false;
    }
    return true;
}
// function Rvid() {
//     var uploadedFile = document.getElementById('file');
//     var vid = uploadedFile.value;
//     var resExt = vid.substring(vid.lastIndexOf('.') + 1);
//     if (!((resExt == "mp4"))) {
//         alert("File type should be mp4");
//         uploadedFile.value = '';
//         return false;
//     }
//     return true;
// }
function ValidateRecipe() {
    if (!Sname() || !Sdescription() || !Sprice() || !Savailable || !Simg() || !Skey()) {
        rsubmitErr.style.display = 'block';
        rsubmitErr.innerHTML = "Please fix errors to submit";
        setTimeout(function () { rsubmitErr.style.display = 'none'; }, 5000);
        return false;
    }

}
/*


function ValidateVid()    
{
    var vid= document.getElementById("file").value;
    if (vid==""){
        document.getElementById("vidErr").innerText="Required";
        return false;
    }
   
    document.getElementById("vidErr").innerText="";
    var vidFormat =/(\.mp4)$/i;
    if (!vidFormat.test(vid)) {
            vidErr.innerHTML = "Invalid Video Type.";
            return false;
        }
        return true;
}

*/









