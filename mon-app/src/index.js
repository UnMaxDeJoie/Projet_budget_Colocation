import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import "bootstrap/dist/css/bootstrap.css";
import { BudgetsProvider } from "./BudgetsContext";

ReactDOM.render(
  <React.StrictMode>
      <BudgetsProvider>
          <App />
      </BudgetsProvider>
  </React.StrictMode>,
    document.getElementById("root")
);