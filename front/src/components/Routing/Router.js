import { Routes, Route } from "react-router-dom";
import Courses from "../Сourses/Courses";
import Lessons from "../Lessons/Lessons";
import InfoPage from "../InfoPage/InfoPage";
import CoursPage from "../Сourses/CoursPage";
import Contacts from "../Contacts/Contacts";

function Router() {
    return (
        <Routes>
            <Route path="/" element={<InfoPage />} />
            <Route path="/courses">
                <Route index element={<Courses />} />
                <Route path=":coursId" element={<CoursPage />} />
            </Route>
            <Route path="/contacts" element={<Contacts />}></Route>
            {/*<Route path="*" element={ <Error/> }/>*/}
        </Routes>
    );
}

export default Router;
