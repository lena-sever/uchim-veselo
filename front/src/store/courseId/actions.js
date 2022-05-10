export const COURSE_ID = "COURSE::COURSE_ID";

export const getCourseId = (id) => ( {
    type: COURSE_ID,
    payload: id
} );
