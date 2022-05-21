import "./Footer.css";

function Footer() {
    return (
        <>
            <footer className="footer">
                <div className="footer-wrp">
                    <span className="footer-text-polity">
                        &copy; СмартКомикс 2022
                    </span>
                    <span className="footer-text-polity">
                       All rights reserved
                    </span>
                    <div className="footer__social-icon-wrp">
                        <a href="#" className="footer__social-icon-link">
                            <svg
                                className="footer__social-icon"
                                width="22"
                                height="22"
                                id="Bold"
                                enableBackground="new 0 0 24 24"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="m21.534 7.113c.976-.693 1.797-1.558 2.466-2.554v-.001c-.893.391-1.843.651-2.835.777 1.02-.609 1.799-1.566 2.165-2.719-.951.567-2.001.967-3.12 1.191-.903-.962-2.19-1.557-3.594-1.557-2.724 0-4.917 2.211-4.917 4.921 0 .39.033.765.114 1.122-4.09-.2-7.71-2.16-10.142-5.147-.424.737-.674 1.58-.674 2.487 0 1.704.877 3.214 2.186 4.089-.791-.015-1.566-.245-2.223-.606v.054c0 2.391 1.705 4.377 3.942 4.835-.401.11-.837.162-1.29.162-.315 0-.633-.018-.931-.084.637 1.948 2.447 3.381 4.597 3.428-1.674 1.309-3.8 2.098-6.101 2.098-.403 0-.79-.018-1.177-.067 2.18 1.405 4.762 2.208 7.548 2.208 8.683 0 14.342-7.244 13.986-14.637z"></path>
                            </svg>
                        </a>
                        <a href="#" className="footer__social-icon-link">
                            <svg
                                className="footer__social-icon"
                                width="22"
                                height="22"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"
                            >
                                <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                            </svg>
                        </a>
                        <a href="#" className="footer__social-icon-link">
                            <svg
                                className="footer__social-icon"
                                width="22"
                                height="22"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 512"
                            >
                                <path d="M386.061 228.496c1.834 9.692 3.143 19.384 3.143 31.956C389.204 370.205 315.599 448 204.8 448c-106.084 0-192-85.915-192-192s85.916-192 192-192c51.864 0 95.083 18.859 128.611 50.292l-52.126 50.03c-14.145-13.621-39.028-29.599-76.485-29.599-65.484 0-118.92 54.221-118.92 121.277 0 67.056 53.436 121.277 118.92 121.277 75.961 0 104.513-54.745 108.965-82.773H204.8v-66.009h181.261zm185.406 6.437V179.2h-56.001v55.733h-55.733v56.001h55.733v55.733h56.001v-55.733H627.2v-56.001h-55.733z"></path>
                            </svg>
                        </a>
                        <a href="#" className="footer__social-icon-link">
                            <svg
                                className="footer__social-icon"
                                width="22"
                                height="22"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512"
                            >
                                <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </footer>
        </>
    );
}

export default Footer;
