import {Button, Card, ProgressBar, Stack} from 'react-bootstrap';
import { currencyFormatter } from "./Utils";

export default function BudgetCard({ name, amount, max, gray, onAddExpenseClick }){
    const classNames = []
    if (amount > max){
        classNames.push("bg-danger", "bg-opacity-10")
    } else if (gray){
        classNames.push("bg-light")
    }

    return(
        <Card className={classNames.join(" ")}>
            <Card.Body>
                <Card.Title className="d-flex justify-content-between align-items-baseline fw-normal mb-3">
                    <div className="me-2">
                        { name }
                    </div>
                    <div className="d-flex align-items-baseline">
                        { currencyFormatter.format(amount) }
                        <span className="text-muted fs-6 ms-1">/ { currencyFormatter.format(max) }</span>
                    </div>
                </Card.Title>
                <ProgressBar className="rounded-pill"
                             variant={getProgress(amount, max)}
                             min={0}
                             max={max}
                             now={amount}
                />
                <Stack direction="horizontal" gap="2" className="mt-4">
                    <Button variant="outline-warning" className="ms-auto" onClick={onAddExpenseClick}>X Bouton en panne X</Button>
                    <Button variant="outline-info">Voir les dépenses</Button>
                </Stack>
            </Card.Body>
        </Card>
    )
}

function getProgress(amount, max){
    const ratio = amount / max
    if (ratio < .5) return "primary"
    if (ratio < .75) return "warning"
    return "danger"
}