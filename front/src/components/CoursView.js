import React from "react";
const CoursView = ({ courses }) => {
    const cours = courses.map((item) => {
        return <li>{item.name}</li>;
    });
    return (
        <div>
            <ul>{cours}</ul>
        </div>
    );
};

export default CoursView;
