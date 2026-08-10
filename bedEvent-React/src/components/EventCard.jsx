
function EventCard({event}){
    return (
        <div>
            <h1>{event.title}</h1>
            <p>{event.description}</p>
            <p>{event.date}</p>
            <p>{event.time}</p>
            <p>{event.location}</p>
            <p>{event.price} DH</p>
            <p>Capacité:{event.capacity}</p>
        </div>
    )
}
export default EventCard;