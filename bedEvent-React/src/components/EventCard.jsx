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

                if (error.response?.data?.message) {

                    alert(error.response.data.message);

                } else {

                    alert('Une erreur est survenue.');

                }

            });
    }

    return (
        <div className="bg-white p-5 rounded-lg shadow">

            <h2 className="text-xl font-bold text-gray-800">
                {event.title}
            </h2>

            <p className="text-gray-600 mt-2">
                {event.description}
            </p>

            <p className="mt-3">
                <strong>Date :</strong> {event.date}
            </p>

            <p>
                <strong>Heure :</strong> {event.time}
            </p>

            <p>
                <strong>Capacité :</strong> {event.capacity}
            </p>
            <p>
             <strong>Prix :</strong> {event.price} DH
            </p>

            {user && user.role === 'student' && (

                <button
                    onClick={reserve}
                    className="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                >
                    Réserver
                </button>


                

            )}


            

        </div>
    );
}

export default EventCard;