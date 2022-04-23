import axios from "axios";

import { urlCourses, urlAuth, urlReviews, firstPatgHistory, lastPatgHistory } from "../constants/url";

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
    },
};

export const lessonsAPI = {
    getCourse(courseId) {
        return axios
            .get(`${urlCourses}/${courseId}`)
            .then((response) => response)
            .catch((err) => err);
    },
    getFistPartHistory(id) {
        
        return axios 
            .get(`${firstPatgHistory}/${id}`)
            .then((response) => response)
    },
    getLastPartHistory(id) {
        return axios 
            .get(`${lastPatgHistory}/${id}`)
            .then((response) => response)
    }
};

export const reviewsAPI = {
    getReviews() {
        return axios.get(urlReviews).then((res) => res);
    },
    getReview(courseId) {
        return axios.get(`${urlCourses}/${courseId}`).then((res) => res);
    },
};
