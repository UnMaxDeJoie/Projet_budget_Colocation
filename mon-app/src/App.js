import './App.css';
import Container from "react-bootstrap/Container";
import {Button, Stack} from "react-bootstrap";
import BudgetCard from "./BudgetCard";
import AddBudgetModal from "./AddBudgetModal";
import AddExpenseModal from "./AddExpenseModal";
import { useState } from "react";
import {useBudgets} from "./BudgetsContext";

function App() {
  const [showAddBudgetModal, setShowAddBudgetModal] = useState(false)
  const [showAddExpenseModal, setShowAddEpenseModal] = useState(false)
  const [addExpenseModalBudgetId, setAddExpenseModalBudgetId] = useState()
  const { budgets, getBudgetExpenses } = useBudgets()

  function openAddExpenseModal(budgetId){
      setShowAddEpenseModal(true)
      setAddExpenseModalBudgetId(budgetId)
  }

  return (
    <>
      <Container className="my-4">
        <Stack direction="horizontal" gap="2" className={"mb-4 mt-4"}>
          <h1 className="me-auto">Coloc & Co</h1>
          <Button variant="primary" onClick={() => setShowAddBudgetModal(true)}>Ajouter un Budget</Button>
          <Button variant="outline-primary" onClick={openAddExpenseModal}>Nouvelle dépense</Button>
        </Stack>
        <div className="cards">
          { budgets.map(budget => {
              const amount = getBudgetExpenses(budget.id).reduce((total, expense) => total + expense.amount, 0)
              return(
              <BudgetCard
                  key={budget.id}
                  name={budget.name}
                  amount={amount}
                  max={budget.max}>
                  onAddExpenseClick = {() => openAddExpenseModal(budget.id)}
              </BudgetCard>)
          })}
        </div>
      </Container>
      <AddBudgetModal show={showAddBudgetModal} handleClose={() => setShowAddBudgetModal(false)} />
      <AddExpenseModal show={showAddExpenseModal} defaultBudgetId={addExpenseModalBudgetId} handleClose={() => setShowAddExpenseModal(false)} />
    </>)}

export default App;