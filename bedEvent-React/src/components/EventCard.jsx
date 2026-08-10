function EventCard({ event }) {
    return (
        <div className="border rounded-lg p-5 shadow">
            <h2 className="text-xl font-bold">
                {event.title}
            </h2>

            <p className="mt-2 text-gray-600">
                {event.description}
            </p>

            <div className="mt-4 space-y-1">
                <p>
                    <strong>Date :</strong> {event.date}
                </p>

                <p>
                    <strong>Heure :</strong> {event.time}
                </p>

                <p>
                    <strong>Lieu :</strong> {event.location}
                </p>

                <p>
                    <strong>Prix :</strong> {event.price} DH
                </p>

                <p>
                    <strong>Capacité :</strong> {event.capacity}
                </p>
            </div>
        </div>
    );
}

export default EventCard;