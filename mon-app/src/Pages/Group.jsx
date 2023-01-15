import React from "react";

export default function GroupCreation() {
        fetch('http://localhost:3000/group_creation')
        .then((response) => {
            console.log(response.json())
        })

    return (
        <div>
            <h1>Création de votre colocation</h1>
            <div>
                <p>Nom de votre colocation: </p>
                <input type="text" onChange={this.handleChange}/>
                <input type="submit" value={"Submit"}/>
            </div>
        </div>
    )
}