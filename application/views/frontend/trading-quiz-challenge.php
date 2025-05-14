<main>
    <section class="Enquiry_form_wraper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="<?= base_url('website/submit_trading_quiz_challenge_data') ?>" method="POST">
                        <div class="form_wraper">
                            <!-- Step 1: -->
                            <div class="e_form_one e_form_Section  d-block p-md-5" id="quiz_form">
                                <h2 class="pb-3 text-center">Fill out the Details</h2>

                                <input type="hidden" name="quiz_time" id="quiz_time">
                                <input type="hidden" name="quiz_score" id="quiz_score">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name*</label>
                                            <input type="text" class="form-control" name="firstname"
                                                placeholder="Enter Your First Name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name*</label>
                                            <input type="text" class="form-control" name="lastname"
                                                placeholder="Enter Your Last Name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email ID*</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Your Email ID" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Contact Number*</label>
                                            <input type="tel" id="mobile" class="form-control" name="mobile"
                                                placeholder="Enter Your Contact Number" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Job title*</label>
                                            <input type="text" class="form-control" name="job_title"
                                                placeholder="Enter you job title" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <button class="bg-primary d-flex align-items-center"
                                                onclick="startCountdown()" id="submit_quiz_info" type="button">
                                                <span>Submit</span>
                                                <span class="more_nav_arrow ms-1 bg-dark">
                                                    <i class="ri-arrow-right-up-line text-primary fw-bold"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="quiz_box p-md-5 d-none" id="quiz_box">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="heada text-center  pb-5">

                                            <h6>Trading Quiz Challenge Test Your Skills & Win Big!</span></h6>
                                            <h2> Top 5 winners get <span class="text-primary">100 AED</span> cash each!
                                            </h2>
                                            <h4>Plus, enjoy 25% OFF on all our trading courses!</h4>

                                            <div class="circle-timer mx-auto">
                                                <svg>
                                                    <circle cx="70" cy="70" r="64" />
                                                    <circle cx="70" cy="70" r="64" id="progress" />
                                                </svg>
                                                <div class="time" id="time">60</div>
                                            </div>
                                            <h4>Your Time Starts Now</h4>

                                        </div>
                                    </div>

                                </div>

                                <div class="row g-4">
                                    <?php foreach ($questions as $index => $q): ?>
                                        <div class="col-lg-12 radio-input">
                                            <h4 class="mb-3">Q.<?= $index + 1 ?>     <?= $q->question ?></h4>
                                            <label class="quiz-option">
                                                <input type="radio" name="answers[<?= $q->id ?>]" value="1" required>
                                                <?= $q->answer1 ?>
                                            </label>
                                            <label class="quiz-option">
                                                <input type="radio" name="answers[<?= $q->id ?>]" value="2">
                                                <?= $q->answer2 ?>
                                            </label>
                                            <label class="quiz-option">
                                                <input type="radio" name="answers[<?= $q->id ?>]" value="3">
                                                <?= $q->answer3 ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>

                                    <div class="col-lg-12">
                                        <button class="bg-primary d-flex align-items-center" id="final_submit"
                                            type="submit">
                                            <span>Submit</span>
                                            <span class="more_nav_arrow ms-1 bg-dark">
                                                <i class="ri-arrow-right-up-line text-primary fw-bold"></i>
                                            </span>
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

</main>



<style>
    .circle-timer {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 20px;
    }

    svg {
        width: 150px;
        height: 150px;
        transform: rotate(-90deg);
    }

    circle {
        fill: none;
        stroke-width: 12;
        stroke: #e6e6e6;
    }

    #progress {
        stroke: #f7c215;
        stroke-dasharray: 339.29;
        /* 2 * π * r (r=54) */
        stroke-dashoffset: 0;
        transition: stroke-dashoffset 1s linear;
    }

    .time {
        position: absolute;
        top: 53%;
        left: 47%;
        transform: translate(-50%, -50%);
        font-size: 1.5rem;
        font-weight: bold;
        color: rgb(0, 0, 0);
    }



    /* Base style for label */
    .quiz-option {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        display: flex;
        margin-bottom: 15px;
        align-items: center;
        gap: 15px;
    }

    .quiz-option input {
        width: 20px;
        height: 20px;
        accent-color: #9d7c0d;
    }

    /* Hide the default radio button */

    /* Highlight the label when its radio is checked */
    .quiz-option input[type="radio"]:checked+label,
    .quiz-option:has(input[type="radio"]:checked) {
        background-color: #f7c21591;
        /* light green or any color you want */
        /* border-color: #000; */
    }
</style>


<script>
    const circle = document.getElementById("progress");
    const timeText = document.getElementById("time");
    const radius = 64;
    const circumference = 2 * Math.PI * radius;
    let duration = 60;
    let timer;
    let timeLeft = duration;

    function setProgress(percent) {
        const offset = circumference - (percent / 100) * circumference;
        circle.style.strokeDashoffset = offset;
    }

    function startCountdown() {
        // Start timer setup
        timeLeft = duration;
        setProgress(100);
        timeText.textContent = timeLeft;

        clearInterval(timer);
        timer = setInterval(() => {
            timeLeft--;

            if (timeLeft <= 0) {
                clearInterval(timer);
                setProgress(0);
                timeText.textContent = "00";

                alert("Time's up! You need to submit the quiz again.");
                window.location.href = "<?= base_url('trading-quiz-challenge') ?>";
                return;
            }

            const percent = (timeLeft / duration) * 100;
            setProgress(percent);
            timeText.textContent = timeLeft;
        }, 1000);

        document.getElementById('quiz_form').classList.remove('d-block');
        document.getElementById('quiz_form').classList.add('d-none');

        document.getElementById('quiz_box').classList.remove('d-none');
        document.getElementById('quiz_box').classList.add('d-block');
    }

    circle.style.strokeDasharray = circumference;
    circle.style.strokeDashoffset = 0;

    document.getElementById('final_submit').addEventListener('click', function (e) {
        e.preventDefault(); 

        clearInterval(timer);
        const totalQuestions = 5;
        let score = 0;

        const correctAnswers = {
            que1: "2",
            que2: "2",
            que3: "1",
            que4: "2",
            que5: "1"
        };

        for (let i = 1; i <= totalQuestions; i++) {
            const selected = document.querySelector(`input[name="que${i}"]:checked`);
            if (selected && selected.id.endsWith(correctAnswers[`que${i}`])) {
                score++;
            }
        }

        document.getElementById('quiz_score').value = score;
        document.getElementById('quiz_time').value = duration - timeLeft;

        this.closest('form').submit();
    });

</script>





<!-- <script>
    let duration = 60;
    let timeLeft = duration;
    const circle = document.getElementById("progress");
    const timeText = document.getElementById("time");
    const radius = 64;
    const circumference = 2 * Math.PI * radius;

    function setProgress(percent) {
        const offset = circumference - (percent / 100) * circumference;
        circle.style.strokeDashoffset = offset;
    }

    circle.style.strokeDasharray = circumference;
    circle.style.strokeDashoffset = 0;

    const timer = setInterval(() => {
        timeLeft--;

        if (timeLeft <= 0) {
            clearInterval(timer);
            setProgress(0);
            timeText.textContent = "00";
            return;
        }

        const percent = (timeLeft / duration) * 100;
        setProgress(percent);
        timeText.textContent = timeLeft;
    }, 1000);
</script> -->