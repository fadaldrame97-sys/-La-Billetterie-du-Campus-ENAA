import { useEffect } from 'react'
import api from '../services/api';

function Home() {

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
