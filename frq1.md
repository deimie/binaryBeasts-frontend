### FRQ 1

<div class="box-shadow">
  <div class="row">
        <div class="column">
  <form>
    <label for="calendar">Input a Year:</label>
    <input id="calendar" type="text" placeholder="Input a year">
    <input type="submit">
  </form>
  </div>
  <div class="column">
  <br>
  <p>Is this a Leap Year? </p> <p id="isLeapYear"></p> <br>
  <p>What is the first day of the year? </p> <p id="firstDayOfTheYear"></p> <br> <p>What day of the year is it?<br>What day of the week is it?</p>
  <table>
    <tbody id="result">
    <!-- javascript generated data -->
    </tbody>
  </table>
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
  
    fetch(`https://binarybeasts.nighthawkcoding.ml/api/calendar/isLeapYear/${input.value}`)
    .then(response => response.json())
    .then(data => {
      const isLeapYear = document.querySelector('p#isLeapYear');

      isLeapYear.innerText = data.isLeapYear;
    });

  });
}

const initt = () => {
  const inputForm = document.querySelector('form')

  inputForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const input = document.querySelector('input#calendar');
  
    fetch(`https://spiderbiters.nighthawkcodingsociety.com/api/calendar/firstDayOfTheYear/${input.value}`)
    .then(response => response.json())
    .then(data => {
      const firstDayOfTheYear = document.querySelector('p#firstDayOfTheYear');

      firstDayOfTheYear.innerText = data.firstDayOfTheYear;
    });


  });
}

document.addEventListener('DOMContentLoaded', init);
document.addEventListener('DOMContentLoaded', initt);
</script>