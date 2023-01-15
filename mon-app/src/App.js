import {Routes, Route} from 'react-router-dom';
import './App.css';
import './Helpers/Variables.css'
import GroupCreation from "./Pages/GroupCreation";
import Profil from "./Pages/Profil";
import Navigation from "./Composant/Navigation";
import Header from "./Composant/Header";
import Group from "./Pages/Group";

function App() {
    return (
        <div className="App">
            <Header />
            <Navigation />
            <div>
                <Routes>
                    <Route path="/" element={<Profil />} />
                    <Route path="/group_creation" element={<GroupCreation />} />
                    <Route path="/group" element={<Group />} />
                </Routes>
            </div>
        </div>
    );
}

export default App;
