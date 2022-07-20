import React, {useEffect, useRef, useState} from "react";
import useWebSocket from "react-use-websocket";
import socketService from "../socket"
import {useSelector} from "react-redux";
import {connectServer, getAllStudents} from "../professor-commands";

export default function App() {
    const students = useSelector(state=> state.students)
    const [token, setToken] = useState('adfas123123')
    console.log(students)
    useEffect(()=> {

        socketService.createSocket()
        socketService.sendMsg(connectServer(5252,token, "sara othman"))
    },[])
    const getStudentHandler = (e) => {
        e.preventDefault()
        socketService.sendMsg(getAllStudents(token))
    }
    return (
        <div>
            <button onClick={()=> socket.current.send('abdo')}>send </button>
            <button>students</button>
            <div>
                <button onClick={getStudentHandler}>getStudents</button>
                <button>verify</button>
                {
                students?
                    <div>
                        {students.map(student=>
                            <div>
                                <span>{student.name}</span>
                                <span>{student.device_id}</span>
                                <span>{student.isVerified? 'verifid': 'notverfied\t'}</span>
                                <span>{student.hasRaisedHand? 'raisedHand': 'nohandisraised\t'}</span>
                                <span>{student.hasQuestion? 'hasQuestion': 'noQuestion\t'}</span>
                            </div>
                        )}
                    </div>
                    : null
                    }
            </div>
        </div>
    );
}
