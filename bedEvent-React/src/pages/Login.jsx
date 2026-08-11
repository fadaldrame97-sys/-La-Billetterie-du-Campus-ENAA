import { useState } from 'react';
import api from '../services/api';

function Login() {

    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    function login() {

        api.post('/login', {
            email: email,
            password: password
        })
        .then(response => {

            console.log(response.data);

            localStorage.setItem('token', response.data.token);

        })
        .catch(error => {

            console.log(error);

        });
    }

    return (
        <div className="min-h-screen bg-gray-100 flex items-center justify-center">

            <div className="bg-white p-8 rounded-lg shadow-md w-full max-w-md">

                <h1 className="text-2xl font-bold text-center text-gray-800 mb-6">
                    Connexion
                </h1>

                <div className="space-y-4">

                    <input
                        type="email"
                        placeholder="Email"
                        value={email}
                        onChange={(e) => setEmail(e.target.value)}
                        className="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />

                    <input
                        type="password"
                        placeholder="Mot de passe"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        className="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />

                    <button
                        onClick={login}
                        className="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700"
                    >
                        Se connecter
                    </button>

                </div>

            </div>

        </div>
    );
}

export default Login;