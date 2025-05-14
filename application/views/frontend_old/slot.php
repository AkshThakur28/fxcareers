<section class="slotbook">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center my-5">
                        <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit.. -->
                    </h2>
                </div>
            </div>
            <div class="row g-4">

                <div class="col-lg-5">
                    <h3 class="text-warning mb-5">Select Date</h3>
                    <aside>
                        <div class="calendar-container">
                            <div class="calendar-header">
                                <button id="prev-month"><i class="fa-solid fa-angle-left"></i></button>
                                <h5 id="calendar-month-year">December 2024</h5>
                                <button id="next-month"><i class="fa-solid fa-angle-right"></i></button>
                            </div>
                            <div class="calendar-grid" id="calendar-grid">
                                <!-- Day labels and calendar days will be generated dynamically -->
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-7">
                    <h3 class="text-warning mb-5">Select Time</h3>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="time-picker-container">

                                <div class="time-list" id="timeList">
                                    <!-- Time slots -->
                                    <div class="time-item">09:00 AM</div>
                                    <div class="time-item">10:00 AM</div>
                                    <div class="time-item">11:00 AM</div>
                                    <div class="time-item">12:00 AM</div>
                                    <div class="time-item">01:00 PM</div>
                                    <div class="time-item">02:00 PM</div>
                                    <div class="time-item">03:00 PM</div>
                                    <div class="time-item">04:00 PM</div>
                                    <div class="time-item">05:00 PM</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="master_wraper d-none">

                                <div class="seat_wraper ">
                                    <div class="seat_box alrady_select">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            1
                                        </span>

                                    </div>
                                    <div class="seat_box ">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            2
                                        </span>
                                    </div>
                                    <div class="seat_box ">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            3
                                        </span>
                                    </div>
                                    <div class="seat_box ">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            4
                                        </span>
                                    </div>
                                    <div class="seat_box ">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            5
                                        </span>
                                    </div>
                                    <div class="seat_box ">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            6
                                        </span>
                                    </div>
                                    <div class="seat_box ">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            7
                                        </span>
                                    </div>
                                    <div class="seat_box ">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            8
                                        </span>
                                    </div>
                                    <div class="seat_box ">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            9
                                        </span>
                                    </div>
                                    <div class="seat_box ">
                                        <span class="icon ">
                                            <img src="public/web/assets/img/tradersfloor/seat.png" class="img-fluid" alt="">
                                        </span>
                                        <span class="seat_no">
                                            10
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12">

                            <div class="payment-options d-none" id="paymentOptions">
                                <h4 class="text-primary">Select Seat</h4>
                                <button id="payDaily">Pay for Daily</button>
                                <button id="payWeekly">Pay for Weekly</button>
                                <button id="payMonthly">Pay for Monthly</button>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </section>


 <style>
        .slotbook {
            padding: 50px 0px;
        }

        .seat_wraper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-left: 20px;
        }

        .seat_box {
            background-color: rgb(236, 236, 236);
            max-width: 135px;
            padding: 10px 30px;
            font-size: 20px;
            color: black;
            cursor: pointer;
            border-radius: 10px;
        }

        .selected_seat {
            background-color: #f9c311;
        }

        .alrady_select {
            background-color: rgb(254, 68, 68);
            color: white;
        }

        .seat_box img {
            max-width: 30px;
        }

        .seat_no {
            margin-left: 10px;
        }
        .calendar-container {
            max-width: 100%;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 20px 2px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 10px;
        }

        .calendar-header button {
            background: #ffffff;
            color: rgb(112, 112, 112);
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }


        .calendar-header h5 {
            margin: 0px;
            font-size: 1em;
            color: #333;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .day-label {
            text-align: center;
            /* font-weight: bold; */
            padding: 5px;
            background: #ffffff;
            color: #f9c311;
            border-radius: 4px;
        }

        .calendar-day {
            text-align: center;
            padding: 10px;
            background: #f0f0f0;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .calendar-day:hover {
            background: #e0e0e0;
        }

        .calendar-day.disabled {
            background: #ccc;
            color: #888;
            cursor: not-allowed;
        }

        .calendar-day.selected {
            background: #f9c311;
            color: white;
        }

        /* .calendar-day.today {
              background: #5cb85c;
              color: white;
            } */
  
        .time-picker-container {
            background-color: #fff;
            /* border: 1px solid #ddd; */
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
            border-radius: 10px;
            min-width: 400px;
            height: 100%;
            text-align: center;
        }

        .header {
            font-size: 20px;
            font-weight: bold;
            padding: 15px 0;
            background-color: #4285f4;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .time-list {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
            padding: 20px;
        }

        .time-item {
            padding: 10px;
            font-size: 16px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /*         
            .time-item:hover {
              background-color: #ffffff;
            } */

        .selected {
            background-color: #f9c311;
            color: white;
            border: none;
        }
        .payment-options button {
            margin: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #payDaily {
            background-color: #ffc107;
            color: white;
        }

        #payWeekly {
            background-color: #ffc107;
            color: rgb(255, 255, 255);
        }

        #payMonthly {
            background-color: #ffc107;
            color: white;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
    
    <script>
        // Add functionality to highlight the selected time slot
        // Add functionality to highlight the selected time slot
        const timeItems = document.querySelectorAll('.time-item');
        const master_wraper = document.getElementsByClassName('master_wraper')[0]; // Select the first element

        timeItems.forEach(item => {
            item.addEventListener('click', () => {
                // Toggle 'selected' class on clicked item
                item.classList.toggle('selected');

                // Check if ANY time item has 'selected' class
                const anySelected = Array.from(timeItems).some(i => i.classList.contains('selected'));

                // Show or hide the master_wraper based on selection
                if (anySelected) {
                    master_wraper.classList.remove('d-none');
                } else {
                    master_wraper.classList.add('d-none');
                }
            });
        });

    </script>
    <script>
        const seatBoxes = document.querySelectorAll('.seat_box'); // All seat elements
        const paymentOptions = document.getElementById('paymentOptions'); // Payment options section

        seatBoxes.forEach(seat => {
            seat.addEventListener('click', () => {
                // Toggle selected class for the clicked seat
                seat.classList.toggle('selected_seat');

                // Check if any seat is selected
                const anySelected = Array.from(seatBoxes).some(s => s.classList.contains('selected_seat'));

                // Toggle visibility of the payment options based on selection
                if (anySelected) {
                    paymentOptions.classList.remove('d-none'); // Show payment options
                } else {
                    paymentOptions.classList.add('d-none'); // Hide payment options
                }
            });
            // Payment button event listeners
         
        });

    </script>

    <script>
        const calendarGrid = document.getElementById('calendar-grid');
        const calendarMonthYear = document.getElementById('calendar-month-year');
        const prevMonthBtn = document.getElementById('prev-month');
        const nextMonthBtn = document.getElementById('next-month');

        const dayLabels = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        let currentDate = new Date();
        let selectedDates = []; // Stores selected dates

        function renderCalendar(date) {
            const year = date.getFullYear();
            const month = date.getMonth();
            const firstDayOfMonth = new Date(year, month, 1);
            const lastDayOfMonth = new Date(year, month + 1, 0);
            const today = new Date();

            calendarGrid.innerHTML = '';
            calendarMonthYear.textContent = `${firstDayOfMonth.toLocaleString('default', { month: 'long' })} ${year}`;

            // Add day labels
            dayLabels.forEach(label => {
                const labelDiv = document.createElement('div');
                labelDiv.className = 'day-label';
                labelDiv.textContent = label;
                calendarGrid.appendChild(labelDiv);
            });

            // Add padding days for the first week
            for (let i = 0; i < firstDayOfMonth.getDay(); i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day disabled';
                calendarGrid.appendChild(emptyDay);
            }

            // Add days of the month
            for (let day = 1; day <= lastDayOfMonth.getDate(); day++) {
                const dayDiv = document.createElement('div');
                dayDiv.className = 'calendar-day';
                dayDiv.textContent = day;

                const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const isToday = today.getDate() === day && today.getMonth() === month && today.getFullYear() === year;

                if (isToday) {
                    dayDiv.classList.add('today');
                }

                const isPast = new Date(year, month, day) < today && !(today.getDate() === day && today.getMonth() === month && today.getFullYear() === year);
                if (isPast) {
                    dayDiv.classList.add('disabled');
                }


                if (selectedDates.includes(dateStr)) {
                    dayDiv.classList.add('selected');
                }

                dayDiv.addEventListener('click', () => {
                    if (!dayDiv.classList.contains('disabled')) {
                        if (selectedDates.includes(dateStr)) {
                            selectedDates = selectedDates.filter(date => date !== dateStr);
                            dayDiv.classList.remove('selected');
                        } else {
                            selectedDates.push(dateStr);
                            dayDiv.classList.add('selected');
                        }
                        console.log('Selected Dates:', selectedDates);
                    }
                });

                calendarGrid.appendChild(dayDiv);
            }
        }

        prevMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar(currentDate);
        });

        nextMonthBtn.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar(currentDate);
        });

        renderCalendar(currentDate);
    </script>