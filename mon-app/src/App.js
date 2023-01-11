import './App.css';
import Container from "react-bootstrap/Container";
import {Button, Stack} from "react-bootstrap";
import BudgetCard from "./BudgetCard";

function App() {
  return <Container>
    <Stack direction="horizontal" gap="2" className={"mb-4 mt-4"}>
      <h1 className="me-auto">Coloc & Co</h1>
      <Button variant="primary">Ajouter un Budget</Button>
      <Button variant="outline-primary">Changer de Budget</Button>
    </Stack>
    <div className="cards">
      <BudgetCard name="Alimentaire"
                  gray
                  amount={300}
                  max={1000}>

      </BudgetCard>
    </div>
  </Container>
}

export default App;