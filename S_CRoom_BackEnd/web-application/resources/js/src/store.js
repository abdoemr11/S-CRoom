import {configureStore} from "@reduxjs/toolkit";
import students from "./reducers/students";


const store = configureStore({
    reducer: {
        students: students
    }

})
export default store
