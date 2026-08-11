import { useState } from "react";
import api from './services/api';

function create(){

    const [event, setEvents]=useState({

        title:'' ,  description:'', date:'', time:'', location:'', price:'', capacity:''  });
}

function createEvent(){

    api.post('/events, event')
      .then(Response=>{
        console.log(Response.date);
      })
}


export default Create;