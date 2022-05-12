function check(){
    let pass = document.getElementById("userPassword").value;
    let confirmPass = document.getElementById("userPasswordConfirm").value;
    let match = document.getElementById("passMatch");
    if(pass === confirmPass){
        match.innerHTML = "Password match";
        match.style.background = "rgba(78, 245, 123,0.6)";
    }
    else{
        match.innerHTML = "Password don`t match";
        match.style.background = "rgba(237, 49, 36,0.6)";
    }
}
function showHide(id){
    let idInput;
    if(id === "showPass")
        idInput = "#userPassword";
    else if(id === "showConfPass")
        idInput = "#userPasswordConfirm";
    let idI = '#' + id;
    if($(idInput).attr('type') == 'password'){
        $(idInput).attr('type','text');
        $(idI).attr('src','../img/invisible.png');
    }
    else{
        $(idInput).attr('type','password');
        $(idI).attr('src','../img/visible.png');
    }
}