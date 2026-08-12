import { useNavigate } from 'react-router-dom';
import api from '../services/api';

function Navbar() {

    const navigate = useNavigate();

    const token = localStorage.getItem('token');
    const user = JSON.parse(localStorage.getItem('user'));

    function logout() {

        api.post('/logout')
            .then(response => {

                console.log(response.data);

                localStorage.removeItem('token');
                localStorage.removeItem('user');

                navigate('/login');

            })
            .catch(error => {

                console.log(error);

                // Même si le serveur rencontre un problème,
                // on supprime quand même la session locale
                localStorage.removeItem('token');
                localStorage.removeItem('user');

                navigate('/login');
            });
    }

    return (
        <nav className="bg-white shadow p-4">

            <div className="max-w-6xl mx-auto flex justify-between items-center">

                <h1
                    className="text-xl font-bold cursor-pointer"
                    onClick={() => navigate('/')}
                >
                    BDE-Events
                </h1>

                <div className="flex items-center gap-4">

                    {token && user?.role === 'student' && (
                        <>

                            <button
                                onClick={() => navigate('/')}
                                className="text-gray-700 hover:text-blue-600"
                            >
                                Accueil
                            </button>

                            <button
                                onClick={() => navigate('/profile/tickets')}
                                className="text-gray-700 hover:text-blue-600"
                            >
                                Mes billets
                            </button>

                        </>
                    )}

                    {token && user?.role === 'admin' && (

                        <button
                            onClick={() => navigate('/admin')}
                            className="text-gray-700 hover:text-blue-600"
                        >
                            Administration
                        </button>

                    )}

                    {!token && (

                        <button
                            onClick={() => navigate('/login')}
                            className="bg-blue-600 text-white px-4 py-2 rounded-lg"
                        >
                            Connexion
                        </button>

                    )}

                    {token && (

                        <button
                            onClick={logout}
                            className="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700"
                        >
                            Déconnexion
                        </button>

                    )}

                </div>

            </div>

        </nav>
    );
}

export default Navbar;