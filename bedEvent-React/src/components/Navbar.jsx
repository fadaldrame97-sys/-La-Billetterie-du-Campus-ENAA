import { NavLink } from 'react-router-dom';

function Navbar() {
    return (
        
        <nav>

            <NavLink to="/"className={({isActive }) =>isActive? 'font-bold text-blue-600' : 'text-gray-600'}> Accueil </NavLink>
            <NavLink to="/login" className={({isActive }) =>isActive? 'font-bold text-blue-600' : 'text-gray-600'}>Connexion</NavLink> 
            <NavLink to="/profile/tickets" className={({isActive }) =>isActive? 'font-bold text-blue-600' : 'text-gray-600'}>Mes billets </NavLink>
            <NavLink to="/admin" className={({isActive }) =>isActive? 'font-bold text-blue-600' : 'text-gray-600'}>Administration</NavLink>

        </nav>
    );
}

export default Navbar;