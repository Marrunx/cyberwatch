<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CyberBiz Watch - Account Creation </title>
    <link href="css/admin-registration.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/showPassword.js"></script>
    <script src="scripts/user_injection.js"></script>
    <script src="scripts/geoloc_address.js"></script>
</head>
<body>

<div class="container">
    <div class="titleHead">Admin and Staff Account Registration </div>
    <div class="sub-title">for Administrators and Staff of TNC Cyber Cafe only.</div>

    <form action="cyberbizwatch_admin_staff_reg.php" method="POST" autocomplete="off" id="form-register">
    <div class="grid-container">
        <!-- Personal Information -->
        <div class="form-category">
            <p class="category-title">Personal Information</p>
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" placeholder="Dela Cruz" required maxlength="150">
            

            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="Juan" required maxlength="150">

            <div class="mid-suffix-container">
                <div class="label-container">
                    <label for="midname">Middle Name</label>
                    <input type="text" name="midname" id="midname" placeholder="Reyes" maxlength="150">
                </div>

                <div class="label-container">
                    <label for="suffix">Suffix</label>
                    <input type="text" name="suffix" id="suffix" placeholder="Jr., Sr., etc." maxlength="5">
                </div>
            </div>

            <label for="bday">Birthday</label>
            <input type="date" name="bday" id="bday" required maxlength="8">
        </div>

        <!-- Contact Information -->
        <div class="form-category">
            <p class="category-title">Contact Information</p>
            <label for="mobileNum">Mobile Number</label>
            <input type="tel" name="mobileNum" id="mobileNum" placeholder="09123456789" required maxlength="11">

            <label for="telNum">Telephone Number</label>
            <input type="tel" name="telNum" id="telNum" placeholder="123-4567" required maxlength="7">
        </div>

        <!-- Home Address -->
        <div class="form-category">
            <p class="category-title">Home Address</p>
            <label for="province">Province</label>
            <select id="province" name="province" required>
                <option value="" disabled selected> Choose Province </option>
            </select>

            <label for="city"> City </label>
            <select name="city" id="city">
                <option value="" disabled selected> Select a City </option>
            </select>

            <label for="barangay"> Barangay </label>
            <select name="barangay" id="barangay">
                <option value="" disabled selected> Select a Barangay </option>
            </select>
                        
            <label for="houseNum"> House Number </label>
            <input type="text" name="houseNum" id="houseNum" placeholder="123" required maxlength="10">

            <label for="street"> Street </label>
            <input type="text" name="street" id="street" placeholder="Main St." required maxlength="150">
                        
            <label for="residence"> Residence </label>
            <input type="text" name="residence" id="residence" placeholder="Greenville Subdivision" required maxlength="150">
        </div>
<!-- address script -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const provinceSelect = document.getElementById("province");
        const citySelect = document.getElementById("city");
        const barangaySelect = document.getElementById("barangay");

        async function fetchProvinces() {
            try {
                const response = await fetch("https://psgc.gitlab.io/api/provinces/");
                const provinces = await response.json();

                provinces.forEach(province => {
                    const option = document.createElement("option");
                    option.value = province.code;
                    option.textContent = province.name;
                    provinceSelect.appendChild(option);
                });
            } catch (error) {
                console.error("Error fetching provinces:", error);
                provinceSelect.innerHTML = '<option value="" disabled>Error Loading Provinces</option>';
            }
        }

        async function fetchCities(provinceCode) {
            try {
                const response = await fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities/`);
                const cities = await response.json();

                citySelect.innerHTML = '<option value="" disabled selected>Select a City</option>';
                barangaySelect.innerHTML = '<option value="" disabled selected>Select a City First</option>';
                cities.forEach(city => {
                    const option = document.createElement("option");
                    option.value = city.code;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });
            } catch (error) {
                console.error("Error fetching cities:", error);
                citySelect.innerHTML = '<option value="" disabled>Error Loading Cities</option>';
            }
        }

        async function fetchBarangays(cityCode) {
            try {
                const response = await fetch(`https://psgc.gitlab.io/api/cities-municipalities/${cityCode}/barangays/`);
                const barangays = await response.json();

                barangaySelect.innerHTML = '<option value="" disabled selected>Select a Barangay</option>';
                barangays.forEach(barangay => {
                    const option = document.createElement("option");
                    option.value = barangay.code;
                    option.textContent = barangay.name;
                    barangaySelect.appendChild(option);
                });
            } catch (error) {
                console.error("Error fetching barangays:", error);
                barangaySelect.innerHTML = '<option value="" disabled>Error Loading Barangays</option>';
            }
        }

        fetchProvinces();

        provinceSelect.addEventListener("change", () => {
            const selectedProvinceCode = provinceSelect.value;
            if (selectedProvinceCode) {
                fetchCities(selectedProvinceCode);
            }
        });

        citySelect.addEventListener("change", () => {
            const selectedCityCode = citySelect.value;
            if (selectedCityCode) {
                fetchBarangays(selectedCityCode);
            }
        });
    });
</script>

            
            <!-- Account Information -->
        <div class="form-category-upper">
            <p class="category-title">Account Information</p>
            <label for="uname"> Username </label>
            <input type="text" name="uname" id="uname" placeholder="Create Username" required maxlength="12">

            <label for="adminPw"> Password </label>
            <input type="password" name="adminPw" id="adminPw" placeholder="Create Password" required minlength="8" maxlength="12">

            <label for="confirmPw"> Confirm Password </label>
            <input type="password" name="confirmPw" id="confirmPw" placeholder="Re-enter Password" required minlength="8" maxlength="12">

            <div class="showPassword-box">
                <input type="checkbox" id="showPass" onclick="togglePassword()">
                <p class="instruction"> Show Password </p>
            </div>
            
            <button type="submit" name="regButton" id="regButton"> Register </button>
            <p class="notice"> Already have an account? <a href="#"> Sign in </a> </p>
        </div>
    </div>
</form>

<div id="responsiveMessage"></div>

</div>

</body>
</html>

<?php
require 'dbconn.php';

$openCageApiKey = '2d0ab269147c4bf68a965e3f05792788';

if (isset($_POST['regButton'])) {
    // Sanitize and validate input
    $surname = mysqli_real_escape_string($conn, trim($_POST['surname'] ?? ''));
    $fname = mysqli_real_escape_string($conn, trim($_POST['fname'] ?? ''));
    $midname = mysqli_real_escape_string($conn, trim($_POST['midname'] ?? ''));
    $suffix = mysqli_real_escape_string($conn, trim($_POST['suffix'] ?? ''));

    $bday = $_POST['bday'] ?? '';

    $mobileNum = mysqli_real_escape_string($conn, trim($_POST['mobileNum'] ?? ''));
    $telNum = mysqli_real_escape_string($conn, trim($_POST['telNum'] ?? ''));

    $province = mysqli_real_escape_string($conn, trim($_POST['province'] ?? ''));
    $city = mysqli_real_escape_string($conn, trim($_POST['city'] ?? ''));
    $brgy = mysqli_real_escape_string($conn, trim($_POST['barangay'] ?? ''));
    $street = mysqli_real_escape_string($conn, trim($_POST['street'] ?? ''));
    $residence = mysqli_real_escape_string($conn, trim($_POST['residence'] ?? ''));
    $houseNum = mysqli_real_escape_string($conn, trim($_POST['houseNum'] ?? ''));

    $uname = mysqli_real_escape_string($conn, trim($_POST['uname'] ?? ''));
    $adminPw = $_POST['adminPw'] ?? '';
    $confirmPw = $_POST['confirmPw'] ?? '';

    // Validate required fields
    if (empty($surname) || empty($fname) || empty($bday) || empty($mobileNum) || empty($uname) || empty($adminPw)) {
        die("Please fill out all required fields.");
    }

    // Validate password
    if ($adminPw !== $confirmPw) {
        die("Passwords do not match.");
    }
    if (!preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,12}$/', $adminPw)) {
        die("Password must be 8-12 characters long, include uppercase, lowercase, number, and special character.");
    }

    // Hash password
    $hashedPassword = password_hash($adminPw, PASSWORD_BCRYPT);

    // Construct full name and address
    $fullName = "$surname $fname $midname $suffix";
    $address = "$houseNum, $residence, $street, $brgy, $city, $province";

    // Prepare SQL statement
    $sql = "INSERT INTO adminstaff_tbl (Name, Address, Birthday, MobileNumber, TelNumber, Username, Password) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $fullName, $address, $bday, $mobileNum, $telNum, $uname, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            echo "Account successfully created!";
        } else {
            echo "Error: Unable to create account. Please try again.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare the statement.";
    }
}

mysqli_close($conn);
?>

