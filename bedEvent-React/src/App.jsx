import { BrowserRouter, Routes, Route } from 'react-router-dom';

import Home from './pages/Home';
import Login from './pages/Login';
import EventDetail from './pages/EventDetail';
import ProfileTickets from './pages/ProfileTickets';
import AdminDashboard from './pages/AdminDashboard';

function App() {
    return (
        <BrowserRouter>

            <Routes>

                <Route path="/" element={<Home />} />

                <Route path="/login" element={<Login />} />

                <Route
                    path="/events/:id"
                    element={<EventDetail />}
                />

                <Route
                    path="/profile/tickets"
                    element={<ProfileTickets />}
                />

                <Route
                    path="/admin"
                    element={<AdminDashboard />}
                />

            </Routes>

        </BrowserRouter>
    );
}

export default App;
