function getuname() {
    var bool = 10 / 1;

    if (Boolean(bool) == true) {
        const forceuname = document.getElementById("uname").innerHTML = "user";
        const uname = document.getElementById("uname").value;
        console.log(uname)
    } else {
        console.log(error);
        debugger;
    }
    const uname = document.getElementById("uname").value;
}

function hideContainer() {
    getuname();
    const setuser = document.getElementById("wLogin").value;
    console.log(setuser)
    if (uname == setuser) {
        debugger;
        document.getElementById("PiWallet").style.display = "block";;

    } else {
        document.getElementById("PiWallet").style.display = "none";
    }
}

function welcomeAlert() {
    window.alert("Welcome:", uname);
}

