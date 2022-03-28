import { Routes, Route } from "react-router-dom";
import Courses from "../Сourses/Courses";
import InfoPage from "../InfoPage/InfoPage";
import Lessons from "../Lessons/Lessons";

function Router() {
    return (
        <Routes>
            <Route path="/" element={<InfoPage />} />
            <Route path="/courses">
                <Route index element={<Courses />} />
                <Route path=":courseId" element={<Lessons />} />
            </Route>

            {/*<Route path="*" element={ <Error/> }/>*/}
        </Routes>
    );
}

export default Router;
