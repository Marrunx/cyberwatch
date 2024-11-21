const textarea = document.getElementById('loadBal');
const select = document.getElementById('promoList');

// Function to update the dropdown options
function updateDropdown() {
  const textareaValue = parseInt(textarea.value, 10);

  // Loop through the dropdown options
  for (let option of select.options) {
    const optionValue = parseInt(option.value, 10);
    if (!isNaN(textareaValue) && textareaValue >= optionValue) {
      option.disabled = false; // Enable the option if textarea value is greater or equal
    } else {
      option.disabled = true; // Disable the option otherwise
    }
  }

  // Ensure the selected value is valid
  if (select.options[select.selectedIndex]?.disabled) {
    select.selectedIndex = -1; // Clear the selection if the current option is disabled
  }
}

// Attach the event listener to the textarea
textarea.addEventListener('input', updateDropdown);
updateDropdown();

//when availing load promo
document.getElementById('loadButton').addEventListener('click', function(){
    const select = document.getElementById("promoList");
    const selectedPromo = select.value;

    if(selectedPromo == ""){
        alert('Select a promo.');
    }else{
    const pcNumber = document.getElementById('pc_number').value;

          // Calculate the time in hours based on PHP (1 hour = 20 PHP)
          const timeInHours = selectedPromo / 20;

          // Convert time to minutes for the timer page
          const timeInMinutes = timeInHours * 60;

    const uid = document.getElementById("uid").textContent;

    const timeUrl = `pcCounter.php?uid=${uid}&time=${timeInMinutes}&pc_number=${pcNumber}`;
    

    alert('You have availed a promo. Please proceed to your designateed desktop');

    window.open(timeUrl, "_blank");

    window.location.href = '../TNCScan.php';

    }
})
