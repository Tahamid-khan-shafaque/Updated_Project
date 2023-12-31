<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Countries</title>
  <style>
    body {
      display: grid;
    }

    label {
      display: block;
    }

    input {
      display: block;
      margin: 10px 0 10px 0;
    }

    h1 {
      color: teal;
    }

    .container {
      margin: auto;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', () => {

      const selectDrop = document.querySelector('#countries');
      // const selectDrop = document.getElementById('countries');


      fetch('http://restcountries.eu/rest/v2/all').then(res => {
        return res.json();
      }).then(data => {
        let output = "";
        data.forEach(country => {
          output += `
            <option value="${country.name}">${country.name}</option>`;
        })

        selectDrop.innerHTML = output;
      }).catch(err => {
        console.log(err);
      })


    });
  </script>
</head>

<body>

  <div class="container">
    <h1>All countries Dropdown List</h1>
    <form action="">

      <label for="countries">Choose your Country:</label>
      <select id="countries" name="countries"></select>
      <input type="submit" value="Register">
    </form>
  </div>

</body>

</html>