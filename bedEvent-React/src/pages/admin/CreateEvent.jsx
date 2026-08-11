import { useState } from 'react';
import api from '../../services/api';

function Create(){

    const [event, setEvents]=useState({

        title:'' ,  description:'', date:'', time:'', location:'', price:'', capacity:''  });
}

function CreateEvent(){

    api.post('/events, event')
      .then(Response=>{
        console.log(Response.date);
      })

      .catch(error=>{
        console.log(error);
      });


      return(
        <div>
            <h1>Créer un évènement</h1>

           <input type="text" placeholder="Titre" value={event.title}
                onChange={(e) =>setEvent({...event, title: e.target.value}) }/>

            <textarea placeholder="Description" value={event.description}
                onChange={(e) => setEvent({...event, description: e.target.value})}
            />

            <input type="date" value={event.date}
                onChange={(e) => setEvent({...event, date: e.target.value})}
            />

            <input type="time" value={event.time}
                onChange={(e) => setEvent({...event, time: e.target.value})}
            />

            <input type="text" placeholder="Lieu" value={event.location}
                onChange={(e) => setEvent({...event, location: e.target.value}) }
            />

            <input type="number" placeholder="Prix" value={event.price}
                onChange={(e) => setEvent({...event, price: e.target.value}) }
            />

            <input type="number" placeholder="Capacité" value={event.capacity}
                onChange={(e) => setEvent({...event, capacity: e.target.value})}
            />

            <button onClick={createEvent}> Créer</button>
        </div>
      )
      
}


export default Create;