import React from 'react'
import { NavLink } from 'react-router-dom'

export default function Home() {
    return (
        <div className={"nav border-4"}>
            <NavLink to="/" style={({ isActive }) => ({
                color: isActive ? '#fff' : '#545e6f',
                background: isActive ? '#7600dc' : '#f0f0f0',
            })}>Profil</NavLink>
            <NavLink to="/group_creation" style={({ isActive }) => ({
                color: isActive ? '#fff' : '#545e6f',
                background: isActive ? '#7600dc' : '#f0f0f0',
            })}>Création</NavLink>
            <NavLink to="/group" style={({ isActive }) => ({
                color: isActive ? '#fff' : '#545e6f',
                background: isActive ? '#7600dc' : '#f0f0f0',
            })}>Colocation</NavLink>
        </div>
    )
}
