import React from "react";

export default function Profil() {
    return (
        <div>
            <h1 className={"header-title"}>Bienvenue Prénom,</h1>
            <div className={"grid"}>
                <div className={"coloc_members border-4 p-3"}>
                    <h3>Votre colocation:</h3>
                    <ul>
                        <p>Bla</p>
                        <p>Bli</p>
                        <p>Blou</p>
                    </ul>
                </div>
                <div className={"spent border-4 p-3"}>
                    <h3>Vos dépenses:</h3>
                    <div className={"grid-spent"}>
                        <h4 className={"grid-date jcc df"}>Date</h4>
                        <h4 className={"grid-price jcc df"}>Montant</h4>
                        <h4 className={"grid-description jcc df"}>Description</h4>
                    </div>
                    <hr/>
                    <div className={"grid-spent"}>
                        {/*<p>12/01/2023</p>
                        <p>23,99€</p>
                        <p>Achat pour la salle</p>*/}
                        <p className={"grid-date jcc df"}>Bla</p>
                        <p className={"grid-price jcc df"}>Bli</p>
                        <p className={"grid-description jcc df"}>Bli</p>
                    </div>
                </div>
            </div>
        </div>
    )
}