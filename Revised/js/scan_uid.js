   // Debugging log to ensure the script is loaded
   console.log("Script loaded");

   // Clear the textarea on page load
   document.addEventListener("DOMContentLoaded", () => {
       const uidDisplay = document.getElementById('uid-display');
       if (uidDisplay) {
           uidDisplay.value = ''; // Clear the textarea
           console.log("Textarea cleared");
       } else {
           console.error("Textarea not found");
       }
   });

   function fetchUID() {
       fetch('logs/rfid_logs.txt?nocache=' + new Date().getTime())
           .then(response => {
               if (!response.ok) {
                   throw new Error('Network response was not ok');
               }
               return response.text();
           })
           .then(data => {
               // Split by newlines and get the last UID
               const uids = data.trim().split('\n');
               const lastUID = uids[uids.length - 1] || "Please scan your Card.";

               // Update the textarea with the last UID
               const uidDisplay = document.getElementById('uid-display');
               if (uidDisplay) {
                   uidDisplay.value = lastUID;
                   console.log("UID updated:", lastUID);
               } else {
                   console.error("Textarea not found");
               }
           })
           .catch(error => {
               console.error('Error fetching UID:', error);
           });
   }

   // Fetch UID every 2 seconds
   setInterval(fetchUID, 2000);
   fetchUID();