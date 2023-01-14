import {Button, Modal, Form} from "react-bootstrap";
import { useRef } from "react";
import { useBudgets } from "./BudgetsContext";

export default function AddBudgetModal({ show, handleClose }){
    const nameRef = useRef()
    const maxRef = useRef()
    const { addBudget } = useBudgets()
    function handleSubmit(e){
        e.preventDefault()
        addBudget({
            name: nameRef.current.value,
            max: parseFloat(maxRef.current.value),
        })
        handleClose()
    }

    return(
        <Modal show={show} onHide={handleClose}>
            <Form onSubmit={handleSubmit}>
                <Modal.Header closeButton>
                    <Modal.Title>Nouveau Budget</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <Form.Group className="mb-3" controlId="max">
                        <Form.Label>Titre de dépense</Form.Label>
                        <Form.Control ref={nameRef} type="text" required/>
                    </Form.Group>
                    <Form.Group className="mb-3" controlId="max">
                        <Form.Label>Somme prévue</Form.Label>
                        <Form.Control ref={maxRef} type="number" required min={0} step={0.01}/>
                    </Form.Group>
                    <div className="d-flex justify-content-end">
                        <Button variant="primary" type="submit">Envoyer</Button>
                    </div>
                </Modal.Body>
            </Form>
        </Modal>
    )
}