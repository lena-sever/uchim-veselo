import * as React from "react";
import { Navigate, NavLink, useParams } from "react-router-dom";
import { useSelector } from "react-redux";
import { selectCourses } from "../../store/courses/coursesSelectors";
import { Box, Link, List, ListItemButton, ListItemText } from "@mui/material";

function Lessons() {
  const { courseId } = useParams();
  const courses = useSelector( selectCourses );

  if( !courses[ courseId ] ) {
    return <Navigate replace to="/courses"/>;
  }

  return (
    <>
      <h2>{ courses[ courseId ].title } </h2>
      <Link as={ NavLink } to="/courses">Вернуться к списку курсов</Link>

      <Box sx={ { width: "100%", maxWidth: 600 } }>
        <List component="nav" aria-label="main mailbox folders">
          { courses[ courseId ].lessons.map( lesson => (

            <ListItemButton>
              <ListItemText primary={ lesson }/>
            </ListItemButton>
          ) ) }
        </List>
      </Box>

    </>
  );
}

export default Lessons;