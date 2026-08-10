import { useEffect, useState } from 'react'
import api from '../services/api';
import EventCard from '../components/EventCard';

function Home() {

    const [events,setEvents]=useState([]);

    useEffect(()=>{
      api.get('/events')
      .then(Response=>{
        console.log(Response.data);
        setEvents(Response.data);
      })

      .catch(error=>{
        console.log(error)
      });
      

  },[])
  

return (

  <div> 
   <h1>BDE-Events</h1>

   {events.map(events=>(

    <EventCard key={event.id} event={event}/> 

   ))}

   </div> 
);


    
}

export default Home;
