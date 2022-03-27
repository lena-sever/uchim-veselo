import axios from "axios";

import {urlCourses} from "../constants/url";

export const coursesAPI = {
    getCourses() {
        return axios.get(urlCourses)
        .then((response) => response)
        .catch((err) => err);
    },
};