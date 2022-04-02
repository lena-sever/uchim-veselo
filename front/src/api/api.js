import axios from "axios";

import {urlCourses, urlAuth} from "../constants/url";

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
    getLessons(coursId) {
        return axios
            .get(`${urlCourses}/${coursId}`)
            .then((response) => response.data.lessons)
            .catch((err) => err);
    },
};

export const auth = {
    sigIn(payload) {
        return axios
            .post(`${urlAuth}`, payload)
            .then(() => "ok")
            .catch((err) => err);
    },
    sigUp(payload) {
        return axios
            .post(`${urlAuth}`, payload)
            .then(() => "ok")
            .catch((err) => err);
    }
}