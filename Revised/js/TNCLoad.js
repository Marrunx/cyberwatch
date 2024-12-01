const uid = document.getElementById('uid').value;
const billInput = document.getElementById('balance');

//url params

const balance = document.getElementById('loadBal').value;

setInterval(() =>{
  const floatBalance  = parseFloat(billInput.value);
  if(floatBalance > 1){
  const urlParams = new URLSearchParams(window.location.search);
  const pcNum = urlParams.get('pcNumber');

      const billBalance = document.getElementById('balance').value;
      window.location.href = `../function/addBalance.php?uid=${uid}&balance=${balance}&bill=${billBalance}&pcNumber=${pcNum}`;
}});


const dropdown = document.getElementById("promo");

// Loop through the options in the dropdown
Array.from(dropdown.options).forEach(option => {
  if (option.value > balance) {
    option.disabled = true; // Disable the option if it doesn't match
  }
});