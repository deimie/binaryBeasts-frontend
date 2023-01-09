### FRQ 1

<div class="box-shadow">
  <div class="row">
        <div class="column">
  <form action="/action_page.php">
    <label for="calendar">Input a Date:</label>
    <input type="date" id="calendar" name="calendar">
    <input type="submit">
  </form>
  </div>
  <div class="column">
  <br>
  <p>Is this a Leap Year? <br>What is the first day of the year?<br>What day of the year is it?<br>What day of the week is it?</p>
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
  // prepare HTML result container for new output
  const resultContainer = document.getElementById("result");

  // prepare fetch options
  const url = "https://flockhub.nighthawkcoding.ml/api/calendar/";
  const options = {
    method: 'GET', // *GET, POST, PUT, DELETE, etc.
    mode: 'cors', // no-cors, *cors, same-origin
    cache: 'default', // *default, no-cache, reload, force-cache, only-if-cached
    credentials: 'omit', // include, *same-origin, omit
    headers: {
      'Content-Type': 'application/json'
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
  };

  // fetch the API
  fetch(url, options)
    // response is a RESTful "promise" on any successful fetch
    .then(response => {
      // check for response errors
      if (response.status !== 200) {
          const errorMsg = 'Database response error: ' + response.status;
          console.log(errorMsg);
          const tr = document.createElement("tr");
          const td = document.createElement("td");
          td.innerHTML = errorMsg;
          tr.appendChild(td);
          resultContainer.appendChild(tr);
          return;
      }
      // valid response will have json data
      response.json().then(data => {
          console.log(data);
          for (const row of data) {
            // tr and td build out for each row
            const tr = document.createElement("tr");
            const name = document.createElement("td");
            const dob = document.createElement("td");
      
            // data is specific to the API
            name.innerHTML = row.name; 
            dob.innerHTML = row.dob; 

            // this build td's into tr
            tr.appendChild(name);
            tr.appendChild(dob);
           

            // add HTML to container
            resultContainer.appendChild(tr);
          }
      })
  })
  // catch fetch errors (ie ACCESS to server blocked)
  .catch(err => {
    console.error(err);
    const tr = document.createElement("tr");
    const td = document.createElement("td");
    td.innerHTML = err;
    tr.appendChild(td);
    resultContainer.appendChild(tr);
  });
</script>
