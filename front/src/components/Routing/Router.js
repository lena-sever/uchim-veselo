import { Routes, Route } from "react-router-dom";
import Courses from "../Сourses/Courses";
import Lessons from "../Lessons/Lessons";
import LessonsItem from "../Lessons/LessonsItem";
import InfoPage from "../InfoPage/InfoPage";
import CoursPage from "../Сourses/CoursPage";
import Contacts from "../Contacts/Contacts";
import Error_404 from "../Error_404/Error_404";
import Login from "../Login/Login";
import SliderContainer from "../common/Slider/Slider";

function Router() {
    return (
        <Routes>
            <Route path="/" element={<InfoPage />} />
            <Route path="/courses">
                <Route index element={<Courses />} />
                <Route path=":courseId" element={<Lessons />} />
                <Route path=":courseId/:lessonId" element={<LessonsItem />} />
                <Route path=":coursId" element={<CoursPage />} />
            </Route>
            <Route path="/contacts" element={<Contacts />}></Route>
            <Route path="/login" element={<Login />}></Route>
            <Route path="/slider" element={<SliderContainer />}></Route>
            <Route path="*" element={<Error_404 />}></Route>
        </Routes>
    );
}

export default Router;
