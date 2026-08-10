import { useEffect, useState } from 'react';
import api from '../services/api';

function AdminDashboard() {

    const [events, setEvents] = useState([]);
    const [editingEvent, setEditingEvent] = useState(null);



    useEffect(() => {

        api.get('/events')
            .then(response => {
                console.log(response.data);
                setEvents(response.data);
            })
            .catch(error => { console.log(error);});

    }, []);


         
      const updateEvent = () => {

    api.put(`/events/${editingEvent.id}`, {
        title: editingEvent.title,
        date: editingEvent.date,
        time: editingEvent.time,
        capacity: editingEvent.capacity
    })
    .then(response => {

        console.log(response.data);

    })
    .catch(error => {

        console.log(error);

    });
    };

       
    return (
        <div>

            <h1>Dashboard Admin</h1>


            {editingEvent && (
            <div>

                 <h2>Modifier l'événement</h2>

                 <input type="text" value={editingEvent.title} onChange={(e) => {

                         setEditingEvent({...editingEvent,title: e.target.value });  }}  />

                 <input type="date" value={editingEvent.date}   onChange={(e) => {
                         setEditingEvent({...editingEvent,date: e.target.value });  }}  />
                 <input type="time" value={editingEvent.time}  onChange={(e) => {
                        setEditingEvent({...editingEvent,time: e.target.value });  }}  />
                 <input type="number" value={editingEvent.capacity} onChange={(e) => {
                        setEditingEvent({...editingEvent,capacity: e.target.value });  }}  />                                     
            <button onClick={updateEvent}> Enregistrer </button>

        </div>
          )}

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