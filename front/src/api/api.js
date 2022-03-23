import axios from "axios";

export const coursesAPI = {
    coursesAPI() {
        // return axios.get("url").then((response) => response);
        return {
            data: [{ name: "course3" }, { name: "course3" }],
        };
    }
};