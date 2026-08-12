import api from '../services/api';

function EventCard({ event }) {

     const user = JSON.parse(localStorage.getItem('user'));

    function reserve() {

       

        api.post(`/events/${event.id}/book`)
            .then(response => {
                console.log(response.data);
                alert('Réservation réussie !');
            })
            .catch(error => {
                console.log(error);
                alert('Erreur lors de la réservation.');
            });

    }

    return (
        <div className="bg-white p-5 rounded-lg shadow">

            <h2 className="text-xl font-bold">
                {event.title}
            </h2>

            <p className="text-gray-600">
                {event.description}
            </p>

            <p>
                Date : {event.date}
            </p>

            <p>
                Heure : {event.time}
            </p>

            <p>
                Capacité : {event.capacity}
            </p>

            {user && user.role !== 'admin' && (
    <button onClick={reserve}>
        Réserver
    </button>
)}

        </div>
    );
}

export default EventCard;