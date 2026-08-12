import { useEffect, useState } from 'react';
import api from '../services/api';

function PassTicket() {

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

            <div className="max-w-6xl mx-auto">

                <h1 className="text-3xl font-bold text-gray-800 mb-8">
                    Mes billets
                </h1>

                {tickets.length === 0 ? (

                    <div className="bg-white p-8 rounded-lg shadow text-center">
                        <p className="text-gray-600">
                            Vous n'avez encore aucune réservation.
                        </p>
                    </div>

                ) : (

                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        {tickets.map(ticket => (

                            <div
                                key={ticket.id}
                                className="bg-white rounded-lg shadow p-6"
                            >

                                <h2 className="text-xl font-bold text-gray-800 mb-4">
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

                                <div className="mt-5 p-4 bg-blue-50 rounded-lg">

                                    <p className="text-sm text-gray-600">
                                        Code du billet
                                    </p>

                                    <p className="text-lg font-bold text-blue-600">
                                        {ticket.ticket_code}
                                    </p>

                                </div>

                            </div>

                        ))}

                    </div>

                )}

            </div>

        </div>
    );
}

export default PassTicket;   