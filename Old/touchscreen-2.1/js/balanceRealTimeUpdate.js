// JavaScript function to update the load balance in real-time via AJAX
function updateBalance() {
    fetch('reloadPage.php?action=getBalance')
        .then(response => response.json())
        .then(data => {
            // Update the load balance and UID on the page
            document.getElementById('loadBal').value = '₱' + data.amount;
            document.getElementById('current-load').textContent = 'Current Load: ₱' + data.amount;
            document.getElementById('uid').textContent = data.uid;
        })
        .catch(error => console.error('Error fetching balance:', error));
}

// Update the balance every 5 seconds
setInterval(updateBalance, 5000);

// Existing functions for starting countdown, adding load, etc.