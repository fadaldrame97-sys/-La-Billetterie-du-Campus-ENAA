import { useEffect, useState } from 'react';
import api from '../services/api';
import EventCard from '../components/EventCard';

function Home() {

    const [events, setEvents] = useState([]);

    useEffect(() => {
        api.get('/events')
            .then(response => {
                setEvents(response.data);
            })
            .catch(error => {
                console.log(error);
            });
    }, []);

    return (
        <div className="max-w-6xl mx-auto p-6">

            <h1 className="text-3xl font-bold mb-6">
                BDE-Events
            </h1>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {events.map(event => (
                    <EventCard
                        key={event.id}
                        event={event}
                    />
                ))}

            </div>

        </div>
    );
}

export default Home;