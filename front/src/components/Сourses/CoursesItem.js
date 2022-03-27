import { Card, CardContent, CardMedia, Button, CardActionArea, CardActions, Typography } from "@mui/material";
import { NavLink } from "react-router-dom";

function CoursesItem({ course }) {

  const getId = () => {
    console.log( course.id );
  };
  return (
    <Card sx={ { width: 220, marginBottom: 5 } }>
      <CardActionArea>
        <CardMedia
          component="img"
          height="140"
          image={ course.img }
          alt="Изображение курса"
        />
        <CardContent>
          <Typography gutterBottom variant="h5" component="div">
            { course.title }
          </Typography>
          <Typography variant="body2" color="text.secondary">
            { course.text }
          </Typography>
        </CardContent>
      </CardActionArea>
      <CardActions>
        <Button as={ NavLink } to={ course.id } size="small" color="primary" onClick={ getId }>
          Перейти к урокам
        </Button>
      </CardActions>
    </Card>
  );
}

export default CoursesItem;