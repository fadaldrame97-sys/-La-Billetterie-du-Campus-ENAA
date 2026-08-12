import { useEffect, useState } from 'react';
import api from '../services/api';

function ProfileTickets() {

    const [tickets, setTickets] = useState([]);

    useEffect(() => {

        api.get('/user/tickets')
            .then(response => {
                console.log(response.data);
                setTickets(response.data);
            })
            .catch(error => {
                console.log(error);
            });

    }, []);

    return (
        <div className="min-h-screen bg-gray-100 p-6">

            <h1 className="text-3xl font-bold text-gray-800 mb-6">
                Mes billets
            </h1>

            {tickets.length === 0 ? (

                <p className="text-gray-600">
                    Vous n'avez pas encore de réservation.
                </p>

            ) : (

                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    {tickets.map(ticket => (

                        <div
                            key={ticket.id}
                            className="bg-white p-6 rounded-lg shadow"
                        >

                            <h2 className="text-xl font-bold text-gray-800 mb-3">
                                {ticket.event.title}
                            </h2>

                            <p className="text-gray-600 mb-2">
                                {ticket.event.description}
                            </p>

                            <p className="text-gray-700">
                                <strong>Date :</strong> {ticket.event.date}
                            </p>

                            <p className="text-gray-700">
                                <strong>Heure :</strong> {ticket.event.time}
                            </p>

                            <p className="text-gray-700">
                                <strong>Lieu :</strong> {ticket.event.location}
                            </p>

                            <p className="text-gray-700">
                                <strong>Prix :</strong> {ticket.event.price} DH
                            </p>

                            <p className="text-green-600 font-semibold mt-4">
                                Réservation confirmée
                            </p>

                        </div>

                    ))}

                </div>

            )}

        </div>
    );
}

export default ProfileTickets;