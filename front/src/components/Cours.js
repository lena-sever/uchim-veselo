import React from "react";
import { connect } from "react-redux";
import CoursView from "./CoursView";

const Cours = ({ courses }) => {
    return <CoursView courses={courses} />;
};

const mapStateToProps = (state) => {
    return {
        courses: state.courses.list,
    };
};

export default connect(mapStateToProps, {})(Cours);
