import { BrowserRouter, Routes, Route } from 'react-router-dom';

import Home from './pages/Home';
import Login from './pages/Login';
import ProfileTickets from './pages/ProfileTickets';
import AdminDashboard from './pages/admin/AdminDashboard';
import CreateEvent from './pages/admin/CreateEvent';
import Navbar from './components/Navbar';

function App() {
    return (
        <BrowserRouter>
        <Navbar />

            <Routes>

                <Route path="/" element={<Home />} />

                <Route path="/login" element={<Login />} />

             

                <Route path="/profile/tickets" element={<ProfileTickets />}/>

                <Route path="/admin" element={<AdminDashboard />}/>
                <Route path="/admin/events/create" element={<CreateEvent />} />

            </Routes>

        </BrowserRouter>
    );
}

export default App;
