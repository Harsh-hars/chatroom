
// we will reflect msg 
let msgdiv = document.querySelector('.msg');
setInterval(()=>{
    fetch('readMsg.php').then(
        r=>{
            if(r.ok){
                return r.text();
            }
        }
    ).then(
        d=>{
            msgdiv.innerHTML=d
        }
    )
},300);




// ADD Messages to the DataBase 
window.onkeydown = (e) => {
    if (e.key == "Enter") {
        update();
    }
}



// update function to send msg
const update = () => {
    let msg = input_msg.value;
    input_msg.value = "";
    fetch(`addMsg.php?msg=${msg}`).then(
        // r refers to response
        r => {
            if (r.ok) {
                return r.text();
            }
        }
    ).then(
        // d refers to data coming
        d => {
            console.log("msg send successfully");
            msgdiv.scrollTop=(msgdiv.scrollHeight-msgdiv.clientHeight);
        }
    )
}

