import { NavLink } from 'react-router-dom';

function Navbar() {
    return (
        <nav>

            <NavLink to="/"> Accueil </NavLink>
            <NavLink to="/login"> Connexion</NavLink> 
            <NavLink to="/profile/tickets">Mes billets </NavLink>
            <NavLink to="/admin">Administration</NavLink>

        </nav>
    );
}

export default Navbar;