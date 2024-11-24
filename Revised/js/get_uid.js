        // Function to send the UID, balance, and promo to the PHP script via AJAX
        function sendData() {
            var uid = document.getElementById("uid").value;         // Get the UID from the input field
            var balance = document.getElementById("loadBal").value; // Get the balance from the input field
            var promo = document.getElementById("promo").value;     // Get the promo from the input field

            
            if (uid === "" || balance === "" || promo === "") {
                alert("Please fill all fields.");
                return;
            }

            // Make an AJAX request using Fetch API
            fetch('submitData.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'uid=' + encodeURIComponent(uid) + 
                      '&balance=' + encodeURIComponent(balance) +
                      '&promo=' + encodeURIComponent(promo)
            })
            .then(response => response.json())  // Parse the JSON response
            .then(data => {
                console.log(data);  // Log the response (you can process it further)
                alert("Data sent:\nUID: " + data.uid + "\nBalance: " + data.balance + "\nPromo: " + data.promo);
            })
            .catch(error => {
                console.error("Error sending data:", error);
            });
        }
