console.log("Script loaded");

    // Clear the balance on page load
    document.addEventListener("DOMContentLoaded", () => {
        const balanceDisplay = document.getElementById('balance');
        if (balanceDisplay) {
            balanceDisplay.value = ''; // Clear the balance value
            console.log("Balance cleared");
        } else {
            console.error("Balance input not found");
        }
    });

    // Function to fetch balance from the file
    function fetchBalance() {
        // Make sure the path to balance_logs.txt is correct
        fetch('../logs/balance_logs.txt?nocache=' + new Date().getTime())
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                console.log(data); // Log the raw data fetched from the file

                // Split by newlines and get the last balance value
                const balances = data.trim().split('\n');
                const lastBalance = balances[balances.length - 1] || "No balance recorded yet.";

                // Update the balance input field with the last balance
                const balanceDisplay = document.getElementById('balance');
                if (balanceDisplay) {
                    balanceDisplay.value = lastBalance;
                    console.log("Balance updated:", lastBalance);
                } else {
                    console.error("Balance input not found");
                }
            })
            .catch(error => {
                console.error('Error fetching balance:', error);
            });
    }

    // Fetch balance every 2 seconds
    setInterval(fetchBalance, 2000);
    fetchBalance();