import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import api from '../../services/api';

function AdminDashboard() {

    const navigate = useNavigate();


    const [stats, setStats] = useState([]);
    const [events, setEvents] = useState([]);
    const [editingEvent, setEditingEvent] = useState(null);



    useEffect(() => {

        api.get('/events')
            .then(response => {
                console.log(response.data);
                setEvents(response.data);
            })
            .catch(error => { console.log(error);});

            api.get('/admin/events/stats')
        .then(response => {
            console.log(response.data);
            setStats(response.data);
        })
        .catch(error => {
            console.log(error);
        });

    }, []);


         
    function updateEvent () {

    api.put(`/events/${editingEvent.id}`, {
        title: editingEvent.title,
        description: editingEvent.description,
        date: editingEvent.date,
        time: editingEvent.time,
        location: editingEvent.location,
        price: editingEvent.price,
        capacity: editingEvent.capacity
    })
    .then(response => {  console.log(response.data); 
      
            setEvents(events.map(event =>
            event.id === editingEvent.id
                ? response.data.event
                : event
                ));
             setEditingEvent(null);

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
        <div className="min-h-screen bg-gray-100 p-6">

            <h1 className="text-3xl font-bold text-gray-800 mb-6">Dashboard Admin</h1>


            {editingEvent && (
                 <div className="bg-white p-6 rounded-lg shadow mb-8">
                     
                    <h2 className="text-xl font-bold text-gray-800 mb-4">Modifier l'événement</h2>
                   <div className="flex flex-col gap-4"> 
                    <input type="text" value={editingEvent.title} onChange={(e) => {

                         setEditingEvent({...editingEvent,title: e.target.value });  }}  className="border border-gray-300 rounded p-2" 
                          />

                    <textarea value={editingEvent.description} onChange={(e) => {
                    setEditingEvent({ ...editingEvent,description: e.target.value }); }}  className="border border-gray-300 rounded p-2" 

                    />         

                    <input type="date" value={editingEvent.date}   onChange={(e) => {
                         setEditingEvent({...editingEvent,date: e.target.value });  }}  className="border border-gray-300 rounded p-2"  />
                    <input type="time" value={editingEvent.time}  onChange={(e) => {
                        setEditingEvent({...editingEvent,time: e.target.value });  }} className="border border-gray-300 rounded p-2" />

                    
                        <input type="text" value={editingEvent.location} onChange={(e) => {
                        setEditingEvent({...editingEvent, location: e.target.value });  }} 
                            className="border border-gray-300 rounded p-2"/>
                       
                       <input type="number" value={editingEvent.price} onChange={(e) => {
                          setEditingEvent({...editingEvent, price: e.target.value });  }} 
                            className="border border-gray-300 rounded p-2"/>

                    <input type="number" value={editingEvent.capacity} onChange={(e) => {
                        setEditingEvent({...editingEvent,capacity: e.target.value });  }}  className="border border-gray-300 rounded p-2" />                                     
                    <button onClick={updateEvent} className="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700"> Enregistrer </button>

                </div>
            </div>
            )}

         <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {events.map(event => (

                
                <div key={event.id} className="bg-white p-5 rounded-lg shadow">
                    <h2  className="text-xl font-bold text-gray-800 mb-2">{event.title}</h2>
                    <p className="text-gray-600 mb-3">{event.description}</p>
                    <p className="text-gray-700"> <strong>Date :</strong> {event.date} à {event.time} </p>
                    





                    <p className="text-gray-700 mb-4"> <strong>Capacité :</strong> {event.capacity}</p>
                    <p className="text-blue-600">   
                    <strong>Réservations :</strong> {stat ? stat.nombre_reservations : 0}
                     </p>

                    <p className="text-green-600">
                    <strong>Places restantes :</strong>
                    {stat ? stat.places_restantes : event.capacity}
                    </p>

                    <div className="flex gap-2">
                        <button onClick={()=>setEditingEvent(event)} className="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Modifier </button>
                        <button onClick={()=>deleteEvent(event.id)} className="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer </button>
                    </div>


                </div>
            ))}
            </div>

            <button onClick={() => navigate('/admin/events/create')} className="mt-8 bg-green-600 text-white px-5 py-3 rounded-lg hover:bg-green-700"
           >
            Créer un événement
           </button>

        </div>

        

     
    );

}

export default AdminDashboard;