import axios from "axios";

import {
    urlCourses,
    urlAuth,
    urlReviews,
    firstPatgHistory,
    lastPatgHistory,
    urlRegistration,
    urlLogin,
    urlResultFound,
    urlAuthorComics,
    urlPainterComics,
    urlLikeComics,
} from "../constants/url";

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
    likeComics(like) {
        debugger;
        return axios
            .post(urlLikeComics, like)
            .then(() => "ok")
            .catch((err) => err);
    },
};

export const auth = {
    me() {
        return axios
            .post(urlAuth, {
                session_token: localStorage.getItem("token"),
            })
            .then((data) => {
                return data.data;
            })
            .catch((res) => {
                return res;
            });
    },
    sigIn(payload) {
        return axios
            .post(`${urlLogin}`, payload)
            .then((data) => {
                localStorage.setItem("token", data.data.session_token);
                return data.data;
            })
            .catch((err) => err);
    },
    sigUp(payload) {
        return axios
            .post(`${urlRegistration}`, payload, {
                credentials: "include",
                "Access-Control-Allow-Origin": "*",
                Accept: "application/json",
                "Content-Type": "application/json",
            })
            .then((data) => {
                return data.data;
            })
            .catch((err) => err.message);
    },
};

export const resultFoundAPI = {
    resultFound(payload) {
        return axios
            .post(`${urlResultFound}`, { search_phrase: payload })
            .then((data) => {
                return data.data;
            })
            .catch((err) => err.message);
    },
};

export const authorAPI = {
    resultAuthor(payload) {
        return axios
            .get(`${urlAuthorComics}/${payload}`, {
                author_id: payload,
            })
            .then((data) => {
                return data.data;
            })
            .catch((err) => err.message);
    },
};

export const painterAPI = {
    resultPainter(payload) {
        return axios
            .get(`${urlPainterComics}/${payload}`, {
                painter_id: payload,
            })
            .then((data) => {
                return data.data;
            })
            .catch((err) => err.message);
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
            .then((response) => response);
    },
    getLastPartHistory(id) {
        return axios
            .get(`${lastPatgHistory}/${id}`)
            .then((response) => response);
    },
};

export const reviewsAPI = {
    getReviews() {
        return axios.get(urlReviews).then((res) => res);
    },
    getReview(courseId) {
        return axios.get(`${urlCourses}/${courseId}`).then((res) => res);
    },
    addReview(review) {
        return axios.post(`${urlReviews}`, review).then(() => "ok");
    },
};

export const testsAPI = {
    getFirstTest(courseId) {
        return axios
            .get(`${urlCourses}/first_test/${courseId}`)
            .then((response) => response)
            .catch((err) => err);
    },
    getSecondTest(courseId) {
        return axios
            .get(`${urlCourses}/second_test/${courseId}`)
            .then((response) => response)
            .catch((err) => err);
    },
};
