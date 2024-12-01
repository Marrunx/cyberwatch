function generateTID() {
    // Generate a random 12-digit number as a string
    const randomNum = Math.floor(100000000000 + Math.random() * 900000000000); // 12-digit number
    const tid = 'TNCIMUS-' + randomNum.toString(); // Prefix and append random number
    // Set the value of the input field
    document.getElementById('tid').value = tid;
}

// Generate TID when the page loads
window.onload = generateTID;
