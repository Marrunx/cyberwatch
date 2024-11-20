let countdownTime = 0; 
let interval;
let currentLoad = 0; 
const hourlyRate = 20; // Price for 1 hour

// Start the countdown
function startCountdown() {
    // If there's a valid countdown time, start the countdown
    if (countdownTime > 0) {
        if (!interval) { // Only start the interval if it's not already running
            interval = setInterval(updateCountdown, 1000);
        }
    } else {
        alert("Please add load to start the timer.");
    }
}

// Stop the timer and calculate cost
function stopPC() {
    clearInterval(interval);
    interval = null;  // Reset the interval to prevent multiple intervals
    calculateCost();
}

// Update the countdown timer display
function updateCountdown() {
    if (countdownTime <= 0) {
        clearInterval(interval);
        interval = null;  // Reset the interval
        calculateCost();
        alert("Time's up!");
        return;
    }

    countdownTime--;

    const hours = Math.floor(countdownTime / 3600);
    const minutes = Math.floor((countdownTime % 3600) / 60);
    const seconds = countdownTime % 60;

    // Update the timer on the page
    document.getElementById("timer").textContent = 
        `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
}

// Pad numbers to ensure two digits
function pad(number) {
    return number < 10 ? '0' + number : number;
}

// Handle adding load to the balance
function addToLoad() {
    // Get the load balance input value, and remove the currency symbol (₱) before parsing it
    const loadInput = parseFloat(document.getElementById('loadBal').value.replace('₱', '').trim());
    
    if (!isNaN(loadInput) && loadInput > 0) {
        // Update the current load balance
        currentLoad += loadInput;

        // Calculate additional hours based on current load
        const additionalHours = Math.floor(currentLoad / hourlyRate);

        // Update countdown time based on additional hours
        countdownTime = additionalHours * 3600; // Convert hours to seconds

        // Start the countdown
        startCountdown();

        // Update costs based on current load
        calculateCost(); 

        // Reset the load balance input
        document.getElementById('loadBal').value = '';
    } else {
        alert("Please enter a valid amount to load.");
    }
}

// Calculate total cost based on current load and usage time
function calculateCost() {
    const totalCost = Math.floor(currentLoad / hourlyRate) * hourlyRate; // Total cost based on hours
    document.getElementById("cost").textContent = 
        `Total Cost: ₱${totalCost.toFixed(2)}`;
    document.getElementById("current-load").textContent = 
        `Current Load: ₱${currentLoad.toFixed(2)}`;
}

// Window onload function to set random PC number
window.onload = function() {
    var randomPCNumber = Math.floor(Math.random() * 2)  + 1;  // Generates number from 1 to 15
    document.getElementById('pc_number').value = randomPCNumber;  // Assign to input field
};
