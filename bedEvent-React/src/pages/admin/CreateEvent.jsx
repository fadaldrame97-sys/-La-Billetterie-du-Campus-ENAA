import { useState } from 'react';
import api from '../../services/api';

function CreateEvent(){

    const [event, setEvent]=useState({

        title:'' ,  description:'', date:'', time:'', location:'', price:'', capacity:''  });


function createEvent(){

    api.post('/events', event)
      .then(Response=>{
        console.log(Response.date);
      })

      .catch(error=>{
        console.log(error);
      });

}
      return(
        <div className="min-h-screen bg-gray-100 p-8">

         <div className="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
            <h1 className="text-2xl font-bold mb-6">Créer un évènement</h1>


          <div className="space-y-4">

           <input type="text" placeholder="Titre" value={event.title}
                onChange={(e) =>setEvent({...event, title: e.target.value}) } className="w-full border border-gray-300 rounded-lg p-3"/>

            <textarea placeholder="Description" value={event.description}
                onChange={(e) => setEvent({...event, description: e.target.value})}
           
             className="w-full border border-gray-300 rounded-lg p-3 h-32" />

            <div className="grid grid-cols-2 gap-4">

            <input type="date" value={event.date}
                onChange={(e) => setEvent({...event, date: e.target.value})}   className="w-full border border-gray-300 rounded-lg p-3"
            />

            <input type="time" value={event.time}
                onChange={(e) => setEvent({...event, time: e.target.value})}  className="w-full border border-gray-300 rounded-lg p-3"
            />

            </div>

            <input type="text" placeholder="Lieu" value={event.location}
                onChange={(e) => setEvent({...event, location: e.target.value}) }  className="w-full border border-gray-300 rounded-lg p-3"
            />

           <div className="grid grid-cols-2 gap-4">
            <input type="number" placeholder="Prix" value={event.price}
                onChange={(e) => setEvent({...event, price: e.target.value}) } className="w-full border border-gray-300 rounded-lg p-3"
            />

            <input type="number" placeholder="Capacité" value={event.capacity}
                onChange={(e) => setEvent({...event, capacity: e.target.value})}className="w-full border border-gray-300 rounded-lg p-3" 
            />
              </div>
            <button onClick={createEvent}  className="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700"> Créer</button>
        </div>
    </div>
    </div>
      )
      
}


export default CreateEvent;