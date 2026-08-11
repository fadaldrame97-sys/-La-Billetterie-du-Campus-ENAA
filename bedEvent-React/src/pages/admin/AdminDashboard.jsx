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


         
    function updateEvent () {

    api.put(`/events/${editingEvent.id}`, {
        title: editingEvent.title,
        description: editingEvent.description,
        date: editingEvent.date,
        time: editingEvent.time,
        capacity: editingEvent.capacity
    })
    .then(response => {  console.log(response.data); 
      
            setEvents(events.map(event =>
            event.id === editingEvent.id
                ? response.data.event
                : event
                ));




     })
    .catch(error => { console.log(error); });
    };



     function deleteEvent(id) {

        api.delete(`/events/${id}`)
        .then(response => { console.log(response.data);

            setEvents(events.filter(event => event.id !== id));

        })
        .catch(error => { console.log(error); });
        }



       
    return (
        <div>

            <h1>Dashboard Admin</h1>


            {editingEvent && (
                <div>

                    <h2>Modifier l'événement</h2>

                    <input type="text" value={editingEvent.title} onChange={(e) => {

                         setEditingEvent({...editingEvent,title: e.target.value });  }}  />

                    <textarea value={editingEvent.description} onChange={(e) => {
                    setEditingEvent({ ...editingEvent,description: e.target.value }); }} />         

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
                    <button onClick={()=>deleteEvent(event.id)}>Supprimer </button>

                </div>
            ))}

        </div>

     
    );

}

export default AdminDashboard;