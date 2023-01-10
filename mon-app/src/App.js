import './App.css';
import Container from "react-bootstrap/Container";
import {Button, Stack} from "react-bootstrap";
import Card from "./Card";

function App() {
  return <container>
    <Stack direction="horizontal" gap="2" className={"mb-4"}>
      <h1 className="me-auto">Coloc & Co</h1>
      <Button variant="primary">Ajouter un Budget</Button>
      <Button variant="outline-primary">Ajouter une dépense</Button>
    </Stack>
    <div className="card">

    </div>
  </container>
}

export default App;