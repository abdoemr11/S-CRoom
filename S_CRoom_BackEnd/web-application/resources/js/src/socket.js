
let socket = null
const createSocket = () => {
    socket = new WebSocket('ws://127.0.0.1:8080')
    socket.onmessage = (e) => {
        console.log(JSON.parse(e.data))
    }
}
const sendMsg = (msg) => {
    if(socket.readyState !== 1)
        setTimeout(()=> {
            socket.send(JSON.stringify(msg))

        }, 1000)
    else
        socket.send(JSON.stringify(msg))

}

export default {createSocket,sendMsg
}
