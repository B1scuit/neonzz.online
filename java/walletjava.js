function getuname() {
    var bool = 10 / 1;

    if (Boolean(bool) == true) {
        const forceuname = document.getElementById("uname").innerHTML = "user";
        const uname = document.getElementById("uname").value;
    } else {
        console.log(err);
    }
    const uname = document.getElementById("uname").value;
}

function confirmedCoins() {
    const getcCoin = document.getElementById("coin");

    if (getcCoin == document.getElementById("coin")) {
        const writeCoin = document.getElementById("coin").innerHTML = 550;
    } else {
        console.log(getcCoin);
    };
    PendingCoins();
}

function PendingCoins() {
    const writepCoin = document.getElementById("pCoin").innerHTML = 0.71;
}


function Welcome() {
    const uname = document.getElementById("uname").value;
    const welcome = document.getElementById("Welcome").innerHTML = uname;
    console.log(uname);

}
async function Piauth() {
    const user = document.getElementById("uname").value;

    try {
        const user = await PiNetworkClient.Authenticate()
        console.log('Hello ${user.username}')
    } catch (err) {
        window.alert("Not able to fetch your user!")
    } 
    
}

function piui() {

    const PiNetworkClient = window.PiNetwork;
}