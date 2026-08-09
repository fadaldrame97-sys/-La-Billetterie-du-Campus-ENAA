import { useEffect } from 'react'
import api from './services/api'

function App() {

  useEffect(()=>{
      api.get('/events')
      .then(Response=>{
        console.log(Response.data)
      })

  })
  

  return (

  )
    
}

export default App
