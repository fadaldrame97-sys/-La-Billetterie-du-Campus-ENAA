import { useEffect, useState } from 'react';
import api from '../services/api';

function AdminDashboard() {

    const [events, setEvents] = useState([]);
    const [editingEvent, setEditingEvent] = useState([null]);



    useEffect(() => {

        api.get('/events')
            .then(response => {
                console.log(response.data);
                setEvents(response.data);
            })
            .catch(error => { console.log(error);});

    }, []);

    return (
        <div>

            <h1>Dashboard Admin</h1>

            {events.map(event => (
                <div key={event.id}>
                    <h2>{event.title}</h2>
                    <p>{event.description}</p>
                    <p> {event.date} à {event.time} </p>
                    <p>Capacité : {event.capacity}</p>

                    <button onClick={()=>setEditingEvent(event)}>Modifier </button>
                    <button>Supprimer </button>

                </div>
            ))}

        </div>
    );
}

export default AdminDashboard;