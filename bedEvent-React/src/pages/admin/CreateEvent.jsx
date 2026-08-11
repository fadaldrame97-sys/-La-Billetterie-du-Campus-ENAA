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
        </div>
      )
      
}


export default Create;