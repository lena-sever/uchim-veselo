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

import {sliderList} from "../../constants/forSlider/forSlider";
import Tests from "../Tests/Tests";

function Router() {
    return (
        <Routes>
            <Route path="/" element={<InfoPage />} />
            <Route path="/courses">
                <Route index element={<Courses />} />
                <Route path=":courseId" element={<CoursPage />} />
                <Route path=":courseId/:slider1" element={<LessonsItem />} />
                <Route path=":courseId/:slider2" element={<LessonsItem />} />
                <Route path=":courseId/2/tests" element={ <Tests/> }/>
            </Route>
            <Route path="/contacts" element={<Contacts />} />
            <Route path="/login" element={<Login />} />
            <Route
                path="/slider"
                element={<SliderContainer sliderList={sliderList} />}
             />
            <Route path="*" element={<Error_404 />} />
        </Routes>
    );
}

export default Router;
