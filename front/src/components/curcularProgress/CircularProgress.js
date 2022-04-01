import loader from "./img/loader.svg";
import "./CircularProgress.css";

function CircularProgress() {

  return (
    <div className="loader-wrapper">
      <img src={ loader } alt=""/>


    </div>
  );
}

export default CircularProgress;