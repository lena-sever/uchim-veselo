import { Routes, Route, HashRouter, useLocation, useParams } from "react-router-dom";
import Courses from "../Сourses/Courses";
import Lessons from "../Lessons/Lessons";
import LessonsItem from "../Lessons/LessonsItem";
import InfoPage from "../InfoPage/InfoPage";
import CoursPage from "../Сourses/CoursPage";
import  Contacts  from "../Contacts/Contacts";
import Error_404 from "../Error_404/Error_404";
import Login from "../Login/Login";
import SliderContainer from "../common/Slider/Slider";

import { sliderList } from "../../constants/forSlider/forSlider";
import Tests from "../Tests/Tests";
import Header from "../Header/Header";
import Footer from "../Footer/Footer";
import { useSelector } from "react-redux";
import { selectCourseId } from "../../store/courseId/courseIdSelector";
import PageFoundResults from "../PageFoundResults/PageFoundResults";
import AuthorPage from "../AuthorPage/AuthorPage";
import PainterPage from "../PainterPage/PainterPage";

function Router() {
    const {pathname} = useLocation();
    const courseId = useSelector( selectCourseId );
    const path1 = pathname == `/courses/${ courseId }/slider1`;
    const path2 = pathname == `/courses/${ courseId }/slider2`;
    const path3 = pathname == `/courses/${ courseId }/tests`;

    return (
        <>
            {
                path1 || path2 || path3 ? null : <Header/>
            }
            <div className={path1 || path2 || path3 ? "main" : "main main-header"}>
                <Routes>
                    <Route path="/" element={ <InfoPage/> }/>
                    <Route path="/author/:authorId" element={ <AuthorPage/> }/>
                    <Route path="/painter/:painterId" element={ <PainterPage/> }/>
                    <Route path="/courses">
                        <Route index element={ <Courses/> }/>
                        <Route path=":courseId" element={ <CoursPage/> }/>
                        <Route path=":courseId/tests" element={ <Tests/> }/>
                        <Route path=":courseId/:slider1" element={ <LessonsItem/> }/>
                        <Route path=":courseId/:slider2" element={ <LessonsItem/> }/>
                        <Route path=":courseId/:slider3" element={ <LessonsItem/> }/>
                    </Route>
                    <Route path="/contacts" element={ <Contacts/> }/>
                    <Route path="/login" element={ <Login/> }/>
                    <Route
                        path="/slider"
                        element={ <SliderContainer sliderList={ sliderList }/> }
                    />
                    <Route path="/foundResult" element={<PageFoundResults />}/>
                    <Route path="*" element={ <Error_404/> }/>
                </Routes>
            </div>
            {
                path1 || path2 || path3 ? null : <Footer/>
            }
        </>
    );
}

export default Router;
