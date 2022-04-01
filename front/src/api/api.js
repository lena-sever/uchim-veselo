import axios from "axios";

import { urlCourses } from "../constants/url";

export const coursesAPI = {
    getCourses() {
        return axios
            .get(urlCourses)
            .then((response) => response)
            .catch((err) => err);
    },
    getCours(coursId) {
        return axios
            .get(`${urlCourses}/${coursId}`)
            .then((response) => response)
            .catch((err) => err);
    },
};

export const lessonsAPI = {
    getCourse(courseId) {
        return axios
            .get( `${ urlCourses }/${ courseId }` )
            .then( (response) => response )
            .catch( (err) => err );
    },
};
