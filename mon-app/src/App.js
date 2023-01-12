import './App.css';
import Container from "react-bootstrap/Container";
import {Button, Stack} from "react-bootstrap";
import BudgetCard from "./BudgetCard";
import AddBudgetModal from "./AddBudgetModal";
import { useState } from "react";

function App() {
  const [showAddBudgetModal, setShowAddBudgetModal] = useState(false)

  return (
    <>
      <Container className="my-4">
        <Stack direction="horizontal" gap="2" className={"mb-4 mt-4"}>
          <h1 className="me-auto">Coloc & Co</h1>
          <Button variant="primary" onClick={() => setShowAddBudgetModal(true)}>Ajouter un Budget</Button>
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
      <AddBudgetModal show={showAddBudgetModal} handleClose={() => setShowAddBudgetModal(false)} />
    </>)}

export default App;