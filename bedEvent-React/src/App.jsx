import { BrowserRouter, Routes, Route } from 'react-router-dom';

import Home from './pages/Home';
import Login from './pages/Login';
import ProfileTickets from './pages/ProfileTickets';
import AdminDashboard from './pages/admin/AdminDashboard';
import Create from './pages/admin/Create';

function App() {
    return (
        <BrowserRouter>

            <Routes>

                <Route path="/" element={<Home />} />

                <Route path="/login" element={<Login />} />

             

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
