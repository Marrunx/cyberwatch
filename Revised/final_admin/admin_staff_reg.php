<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CyberBizWatch - Registration </title>
    <link rel="stylesheet" href="css/grid.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/showPassword.js"></script>
    <script src="scripts/user_injection.js"></script>
</head>
<body>

<div class="container">
<form action="admin_staff_reg.php" method="POST" autocomplete="off">
    <div class="form-grid-container">
        <div class="grid-item">
        <p class="logo"> <span class="cyberbiz"> CyberBiz</span><span class="watch">Watch</span></p>
        <p class="sublogo"> for TNC Cyber Cafe </p>
            <p class="section-headings"> Personal Information </p>
                <div class="label-forms">
                    <label for="surname"> Surname </label>
                    <input type="text" id="surname" name="surname" placeholder="Dela Cruz" maxlength="60">
                    <label for="fname"> First Name </label>
                    <input type="text" id="fname" name="fname" placeholder="Juan" maxlength="60">
                    
                    <div class="mid-suffix-container">
                        <div class="mid-suffix">
                            <label for="mid-name"> Middle Name </label>
                            <input type="text" id="mid-name" name="mid-name" placeholder="Pablo" maxlength="100">
                        </div>
                        
                        <div class="mid-suffix">
                            <label for="surname"> Suffix </label>
                            <input type="text" id="suffix" name="suffix" placeholder="Jr., Sr., etc.," maxlength="3">
                        </div>
                    </div>
                    
                    <label for="surname"> Birthday </label>
                    <input type="date" id="bday" name="bday" maxlength="8">
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const birthdayInput = document.getElementById("bday");
                                const form = document.querySelector("form");
                                    form.addEventListener("submit", function (event) {
                                        const bday = new Date(birthdayInput.value);
                                        const today = new Date();
                                            if (bday > today) {
                                                alert("Birthday cannot be in the future.");
                                                event.preventDefault();  // Prevent form submission
                                            }
                                    });
                            });
                        </script>
                </div>
        </div>

        <div class="grid-item">
            <div class="contact-container">
            <p class="section-headings"> Contact Information </p>
                <div class="label-forms">
                    <label for="mobilenum"> Mobile Number </label>
                    <input type="tel" id="mobilenum" name="mobilenum" placeholder="09123456789" maxlength="11">
                    <label for="tel-num"> Telephone Number </label>
                    <input type="tel" id="tel-num" name="tel-num" maxlength="8" placeholder="123-4567">
                </div>
                        <!-- script for '-' in input telnum 
                        <script>
                        // Automatically format telephone number with hyphen
                        document.getElementById('tel-num').addEventListener('input', function(event) {
                            let value = event.target.value.replace(/\D/g, ''); // Remove all non-digit characters
    
                        // Insert hyphen after the third digit only if total length is less than or equal to 7
                        if (value.length > 3) { 
                            value = value.slice(0, 3) + '-' + value.slice(3, 7); // Insert hyphen after the third digit
                        }
    
                        // Limit to 7 digits (including hyphen)
                        if (value.length > 7) {
                            value = value.slice(0, 7); // Limit to 7 digits (including hyphen)
                        }
    
                        event.target.value = value; // Update input value
                        });
                        </script> -->


                </div>
        </div>
        
        <div class="grid-item">
            <p class="section-headings"> Home Address </p>
                <div class="label-forms">
                    <div class="prov-city-container">
                        <div class="prov-city">
                            <label for="province">Province</label>
                            <input type="text" name="province" id="province" placeholder="Cavite" required maxlength="100">
                            <!-- <select id="province" name="province" required>
                                <option value="" disabled selected> Choose Province </option>
                            </select> -->
                        </div>

                        <div class="prov-city">
                            <label for="city"> City </label>
                            <input type="text" name="city" id="city" placeholder="Imus City" required maxlength="100">
                            <!-- <select name="city" id="city">
                                <option value="" disabled selected> Select a City </option>
                            </select> -->
                        </div>
                    </div>
                    
                    <label for="barangay"> Barangay </label>
                    <input type="text" name="barangay" id="barangay" placeholder="San Isidro" required maxlength="100">
                    <!-- <select name="barangay" id="barangay">
                        <option value="" disabled selected> Select a Barangay </option>
                    </select> -->
                        
                    <label for="houseNum"> House Number </label>
                    <input type="text" name="houseNum" id="houseNum" placeholder="123" required maxlength="15">

                    <label for="street"> Street </label>
                    <input type="text" name="street" id="street" placeholder="Main St." maxlength="100">
                        
                    <label for="residence"> Residence </label>
                    <input type="text" name="residence" id="residence" placeholder="Greenville Subdivision" maxlength="100">
                </div>
        </div>

<!-- address script 
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
</script>-->

        <div class="grid-item">
            <div class="account-container">
            <p class="section-headings"> Account Creation </p>
                <div class="label-forms">
                    <label for="uname"> Username </label>
                    <input type="text" name="uname" id="uname" placeholder="Create Username" required minlength="6">

                    <label for="adminPw"> Password </label>
                    <input type="password" name="adminPw" id="adminPw" placeholder="Create Password" required minlength="8" maxlength="18">

                    <label for="confirmPw"> Confirm Password </label>
                    <input type="password" name="confirmPw" id="confirmPw" placeholder="Re-enter Password" required minlength="8" maxlength="18">

                        <div class="showPassword-box">
                            <input type="checkbox" id="showPass" onclick="togglePassword()">
                            <p class="instruction"> Show Password </p>
                        </div>

                        <label for="roles"> Roles </label>
                        <select name="roles" id="roles">
                            <option value="admin"> Admin </option>
                            <option value="staff"> Staff </option>
                        </select>
            
                    <button type="submit" name="regButton" id="regButton"> Register </button>
                        <p class="notice"> Already have an account? <a href="#"> Sign in </a> </p>
                </div>
            </div>
        </div>

    </div>
</form>
</div>

</body>
</html>

<?php
    // Database connection
require 'dbconn.php';

if (isset($_POST['regButton'])) {
    // Database connection


    // Collect form data
    $surname = $_POST['surname'];
    $fname = $_POST['fname'];
    $mid_name = $_POST['mid-name'];
    $suffix = $_POST['suffix'];
    $bday = $_POST['bday'];
    $mobilenum = $_POST['mobilenum'];
    $tel_num = $_POST['tel-num'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $houseNum = $_POST['houseNum'];
    $street = $_POST['street'];
    $residence = $_POST['residence'];
    $uname = $_POST['uname'];
    $adminPw = $_POST['adminPw'];
    $confirmPw = $_POST['confirmPw'];
    $roles = $_POST['roles'];

    //Role validation
    $validRoles = ['admin', 'staff'];
    if (!in_array(strtolower($roles), $validRoles)) {
        die("Invalid role selected.");
    }
    
    // Password validation (8-12 characters, with uppercase, lowercase, and numbers)
    $minLength = 8;
    $maxLength = 18;

    // Check if password length is valid
    if (strlen($adminPw) < $minLength || strlen($adminPw) > $maxLength) {
        die("Password must be between $minLength and $maxLength characters.");
    }

    // Validate if the password contains at least one lowercase letter, one uppercase letter, and one number
    if (!preg_match('/[a-z]/', $adminPw)) {
        die("Password must contain at least one lowercase letter.");
    }

    if (!preg_match('/[A-Z]/', $adminPw)) {
        die("Password must contain at least one uppercase letter.");
    }

    if (!preg_match('/\d/', $adminPw)) {
        die("Password must contain at least one number.");
    }

    // Check if password and confirm password match
    if ($adminPw !== $confirmPw) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashedPw = password_hash($adminPw, PASSWORD_BCRYPT); // Note: Use a stronger hashing function like password_hash in real-world projects

    $fullname = $surname . ', ' . $fname . ' ' . $mid_name . ' ' . $suffix;
    $address = $houseNum . ', ' . $residence . ', ' . $street . ', ' . $barangay . ', ' . $city . ', ' . $province;


    // Insert into the database
    $sql = "INSERT INTO adminstaff_tbl (Name, Address, Birthday, MobileNumber, TelNumber, Username, Password, Position) 
            VALUES ('$fullname', '$address', '$bday', '$mobilenum', '$tel_num', '$uname', '$hashedPw', '$roles')";

    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully.";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
