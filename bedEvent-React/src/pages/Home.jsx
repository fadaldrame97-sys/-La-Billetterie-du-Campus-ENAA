import { useEffect, useState } from 'react'
import api from '../services/api';

function Home() {

    const [events,setEvents]=useState([]);

    useEffect(()=>{
      api.get('/events')
      .then(Response=>{
        console.log(Response.data);
      })

      .catch(error=>{
        console.log(error)
      });
      

  },[])
  

return <h1>BDE-Events</h1>;
    
}

export default Home;
