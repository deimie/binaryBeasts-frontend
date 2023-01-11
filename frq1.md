### FRQ 1

<div class="box-shadow">
  <div class="row">
        <div class="column">
  <form>
    <label for="calendar">Input a Year:</label>
    <input id="calendar" type="text" placeholder="Input a year"> <br>
    <label for="calendar2">Input a Month:</label>
    <input id="calendar2" type="text" placeholder="Input a month"> <br>
    <label for="calendar3">Input a Day:</label>
    <input id="calendar3" type="text" placeholder="Input a day"> <br>
    <input type="submit">
  </form>
  </div>
  <div class="column">
  <br>
  <p>Is this a Leap Year? </p> <p id="isLeapYear"></p> <br>
  <p>What is the first day of the year? </p> <p id="firstDayOfYear"></p> <br> 
  <p>What day of the year is it?</p> <p id="dayOfYear"></p><br>
  <p>What day of the week is it?</p> <p id=""></p>
  </div>
</div>
<style>
    .box-shadow {
        background-color: #A594F9;
        color: #F5EFFF;
        padding: 10px;
        border-radius: 4px;
        box-shadow: 10px 5px 5px rgb(11, 67, 198);
        }
    .column {
    float: left;
    width: 50%;
    }
    .row:after {
    content: "";
    display: table;
    clear: both;
    }
</style>

<!-- Script is layed out in a sequence (without a function) and will execute when page is loaded -->
<script>
const init = () => {
  const inputForm = document.querySelector('form')

  inputForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const input = document.querySelector('input#calendar');
    const input2 = document.querySelector('input#calendar2');
    const input3 = document.querySelector('input#calendar3');
  
    fetch(`https://binarybeasts.nighthawkcoding.ml/api/calendar/isLeapYear/${input.value}`)
    .then(response => response.json())
    .then(data => {
      const isLeapYear = document.querySelector('p#isLeapYear');

      isLeapYear.innerText = data.isLeapYear;
    });

    fetch(`https://binarybeasts.nighthawkcoding.ml/api/calendar/firstDayOfYear/${input.value}`)
    .then(response => response.json())
    .then(data => {
      const firstDayOfYear = document.querySelector('p#firstDayOfYear');

      firstDayOfYear.innerText = data.firstDayOfYear;
    });

    fetch(`https://binarybeasts.nighthawkcoding.ml/api/calendar/dayOfYear/${input2.value}/${input3.value}/${input.value}`)
    .then(response => response.json())
    .then(data => {
      const dayOfYear = document.querySelector('p#dayOfYear');

      dayOfYear.innerText = data.dayOfYear;
    });

  });
}

document.addEventListener('DOMContentLoaded', init);
</script>