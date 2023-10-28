<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // The form has been submitted
    // Establish a database connection
    $mysqli = new mysqli("localhost", "root", "", "appointment");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Retrieve form data if the form was submitted
    if (
        isset($_POST['department']) && isset($_POST['doctor']) &&
        isset($_POST['patient_name']) && isset($_POST['phone_number']) &&
        isset($_POST['age']) && isset($_POST['sex']) &&
        isset($_POST['appointment_date']) && isset($_POST['appointment_time'])
    ) {
        $department = $_POST['department'];
        $doctor = $_POST['doctor'];
        $patient_name = $_POST['patient_name'];
        $phone_number = $_POST['phone_number'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];

        // Insert data into the database
        $sql = "INSERT INTO appointments (department, doctor, patient_name, phone_number, age, sex, appointment_date, appointment_time)
                VALUES ('$department', '$doctor', '$patient_name', '$phone_number', '$age', '$sex', '$appointment_date', '$appointment_time')";

        if ($mysqli->query($sql) === TRUE) {
            // Booking successful, send a response to JavaScript
            echo "<script>alert('Appointment booked successfully!')</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            // An error occurred, send a response to JavaScript
            echo "error";
        }
    }

    // Close the database connection
    $mysqli->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <link rel="stylesheet" href="appointment.css">
</head>

<body>



    <a href="index.php" class="appointment-back">
        <button>Go Back</button></a>

    <form action="appointment.php" method="POST">
        <div class="appointment-logo">
            <img src="img/hoslogo.png" alt="Your Logo">
        </div>
        <h2>Book Your Appointment</h2>


        <div class="form-row">
            <div>
                <label for="patient_name">Patient Name:</label>
                <input type="text" name="patient_name" required>
            </div>
            <div>
                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>

            </div>
        </div>

        <div class="form-row">
            <div>
                <label for="age">Age:</label>
                <input class="appointment-age" type="number" name="age" required min="0" max="120">
            </div>
            <div class="sex-radio">
                <label for="sex" class="appointment-sex">Sex:</label>
                <div class="radio-options">
                    <input type="radio" name="sex" value="Male"> Male
                    <input type="radio" name="sex" value="Female"> Female
                </div>
            </div>


        </div>


        <label for="department">Select a Department:</label>
        <select name="department" id="department">
            <option value="" disabled selected>Select a Department</option>
            <option value="Orthopedic">Orthopedic</option>
            <option value="Surgeon">Surgeon</option>
            <option value="Hematology">Hematology</option>
            <option value="Gynecology">Gynecology</option>
            <option value="Gastroenterology">Gastroenterology</option>
            <option value="Cardiology">Cardiology</option>
            <option value="Nephrology">Nephrology</option>
            <option value="Neurology">Neurology</option>
            <option value="Physician">Physician</option>

        </select>

        <label for="doctor">Select a Doctor:</label>
        <select name="doctor" id="doctor" disabled>
            <option value="" disabled selected>Select a Department First</option>

        </select>


        <div class="form-row">
            <div>
                <label for="appointment_date">Appointment Date:</label>
                <input type="date" name="appointment_date" required min="<?php echo date('Y-m-d'); ?>">
            </div>
            <div>
                <label for="appointment_time">Slots Available:</label>
                <select name="appointment_time" required>
                    <option value="" disabled selected>Select a time slot</option>
                    <option value="08:00">08:00 AM</option>
                    <option value="09:00">09:00 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="13:00">01:00 PM</option>
                    <option value="14:00">02:00 PM</option>
                    <option value="15:00">03:00 PM</option>
                    <option value="16:00">04:00 PM</option>
                    <option value="17:00">05:00 PM</option>
                </select>
            </div>

        </div>

        <!-- <input type="submit" value="Book Appointment"> -->
        <button class="appointment-btn">Book Appointment</button>
    </form>

    </div>

    <script>
        const departmentSelect = document.getElementById("department");
        const doctorSelect = document.getElementById("doctor");

        const doctors = {
            Orthopedic: ["Dr. Vikas", "Dr. Piyush"],
            Surgeon: ["Dr. Vimal", "Dr. Gautam"],
            Physician: ["Dr. Namrata", "Dr. Shalu"],
            Hematology: ["Dr. Adarsh", "Dr. Abhishek"],
            Gynecology: ["Dr. Aditya", "Dr. Prakash"],
            Gastroenterology: ["Dr. Rahul", "Dr. Harsh"],
            Cardiology: ["Dr. Satya Prakash Mishra", "Dr. K Karuna Kumar"],
            Nephrology: ["Dr. S.S.Thakur", "Dr. Chirag"],
            Neurology: ["Dr. Aryan", "Dr. Rishav"],
        };

        departmentSelect.addEventListener("change", () => {
            const selectedDepartment = departmentSelect.value;
            doctorSelect.innerHTML = "";

            if (selectedDepartment) {
                doctors[selectedDepartment].forEach((doctor) => {
                    const option = document.createElement("option");
                    option.text = doctor;
                    option.value = doctor;
                    doctorSelect.appendChild(option);
                });
                doctorSelect.removeAttribute("disabled");
            } else {
                doctorSelect.setAttribute("disabled", "true");
            }
        });
    </script>
</body>

</html>