import { useEffect } from 'react'
import api from './services/api'

function App() {

  useEffect(()=>{
      api.get('/events')
      .then(Response=>{
        console.log(Response.data);
      })

      .catch(error=>{
        console.log(error)
      });
      

  },[])
  

  return <h1>BDE-EVENTS</h1>
    
}

export default App
