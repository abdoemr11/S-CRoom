import {createSlice} from "@reduxjs/toolkit";

const initialState = [
    {
        name: "abdelrahman",
        device_id: "12345",
        isVerified: false,
        hasRaisedHand: false,
        hasQuestion: false
    }
]
const studentSlice = createSlice({
    name: 'students',
    initialState,
    reducers: {
        addStudent(state, action){
            state.push(action.payload)
        },
        toggleVerify(state, action){
            const student = state.find(student=> student.id === action.payload)
            student['isVerified'] = !student['isVerified']
        },
        toggleRaiseHand(state, action){
            const student = state.find(student=> student.id === action.payload)
            student['hasRaisedHand'] = !student['hasRaisedHand']
        },
        toggleHasQuestion(state, action){
            const student = state.find(student=> student.id === action.payload)
            student['hasQuestion'] = !student['hasQuestion']
        },
    }
})

export default studentSlice.reducer
