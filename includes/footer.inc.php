<footer class="flex-row align-center justify-content-space-around wrap bg-tertiary-color-1000 p-large">
    <div class="container">
        <div class="contianer-head">
            <h3>Important links</h3>
        </div>
        <nav>
            <a href="#">About</a>
            <a href="#">Contact Us</a>
            <a href="#">Support</a>
            <a href="#">Terms of Use</a>
            <a href="#">FAQs</a>
        </nav>
    </div>
    <div class="container">
        <div class="contianer-head">
            <h3>About Us</h3>
        </div>
        <nav>
            <a href="#">Our Staff</a>
            <a href="#">Internships</a>
            <a href="#">Our Story</a>
            <a href="#">Location</a>
        </nav>
    </div>
    <div class="container">
        <div class="contianer-head">
            <h3>Connect</h3>
        </div>
        <nav>
            <a href="#"><i class="fa-brands fa-facebook"></i> Facebook</a>
            <a href="#"><i class="fa-brands fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a>
        </nav>
    </div>
    <div class="footnote">
        <p> &copy; <span id="year">2022</span> | St. Benson's Homeopathic Clinic Ltd</p>
        <p>Developed with <span class="danger-color-100">❤</span> by Benson</p>
    </div>
</footer>
<!--    Alert boxes -->
<div class="alert-modal">
    <div class="card" id="success-alert">
        <div class="card-icon">
            <div class="success icon-container flex-row align-center justify-content-center ">
                <i class="fa-solid fa-check fs-xxx-huge success-color-200"></i>
            </div>
        </div>
        <div class="card-body">
            <h4 class="alert-msg">Appointment booked successfully!</h4>
            <a href="web/viewbooking.php" class="bg-success-color-200 hover primary-color-100 p-small round-l navigator">View Appointment</a>
        </div>
    </div>

    <div class="card" id="danger-alert">
        <div class="card-icon">
            <div class="danger icon-container flex-row align-center justify-content-center ">
                <i class="fa-solid fa-times fs-xxx-huge danger-color-200"></i>
            </div>
        </div>
        <div class="card-body">
            <!-- todo: Add link to recieve feedback -->
            <h4 class="alert-msg">Soemthing went wrong. Please try again. If issue persists, <a href="#">send us a message</a> </h4>
            <a href="javascript:void(0)" id="closealert" class="bg-danger-color-200 hover primary-color-100 p-small round-l navigator">Try again</a>
        </div>
    </div>

    <div class="card" id="normal-alert">
        <div class="card-body">
            <!-- todo: Add link to recieve feedback -->
            <h4 class="alert-msg">Hold on! <br> You are being redirected </h4>

        </div>
    </div>

    <div class="card" id="confirm-alert">
        <div class="card-body">
            <!-- todo: Add link to recieve feedback -->
            <h4 class="alert-msg"> Confirm </h4>

            <div class="flex-row">
                <button style ="display: inline-block" id="yesBtn" class="bg-success-color-100 hover primary-color-100 reg-btn full-width round-l mr-small">Yes</button>
                <button style ="display: inline-block" id="noBtn" class="bg-danger-color-100 hover primary-color-100 reg-btn full-width round-l ">No</button>
            </div>

        </div>
    </div>


</div>
<div class="popup-bar">
    <p id="popup-msg">Message</p>
</div>
</body>

</html>