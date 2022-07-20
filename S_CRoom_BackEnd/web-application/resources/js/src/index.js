// resources/js/components/HelloReact.js

import React from 'react';
import ReactDOM, {createRoot} from 'react-dom/client';
import App from "./Components/App";
import {Provider} from "react-redux";
import store from "./store"

const container = document.getElementById('socket-root');
if (container) {
    const root = createRoot(container); // createRoot(container!) if you use TypeScript
    root.render(
        <Provider store={store}>
        <App tab="home" />
        </Provider>
    );

    console.log('find the root element')

} else
    console.log('cant find the root element')

