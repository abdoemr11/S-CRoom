const  Commands = [


,
    {
        "action"     : "startExam"  ,
        "to"         : "server"    ,
        "from"       : "professor" ,
        "device_id": "00000",
        "execute"    : {
            "type": "MCQ",
            "content": {
                "q1": "afdgadsfg",
                "q2": "sdfadfadf"
            }
        }
    },
    {
        "action"     : "sendFile"  ,
        "to"         : "server"    ,
        "from"       : "professor" ,
        "device_id": "00000",
        "execute"    : {
            "file": "testfile"
        }
    }
]
const connectServer = (device_id, token, name) => (
    {
        "action": "connect",
        "to": "server",
        "from": "professor",
        "device_id": device_id,
        "execute": {
            "token": token,
            "name": name
            }
    }
)
const getAllStudents = (token) => ({
        "action"     : "getStudents"  ,
        "to"         : "server"    ,
        "from"       : "professor" ,
        "device_id": "00000", //destination id
        "execute"    : {
            token
    }
})
const getStudents = (id) => ({
    "action"     : "getStudents"  ,
    "to"         : "server"    ,
    "from"       : "professor" ,
    "device_id": id, //destination id
    "execute"    : {

    }
})
const verifyAllStudents = () => (    {
    "action"     : "verifyStudents"  ,
    "to"         : "server"    ,
    "from"       : "professor" ,
    "device_id": "00000",
    "execute"    : {

    }
})
export {connectServer, getAllStudents, getStudents, verifyAllStudents}
