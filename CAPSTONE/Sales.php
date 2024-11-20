
<!DOCTYPE html>
<html>
    <head>
        <title> CLIENT | Sales </title>
        <meta charset = "UTF-8" />
        <meta name = "viewport" content="width=device-width, initial-scale=1.0" />
        <link rel = "stylesheet" type = "text/css" href = "salesDesign.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Sales', 'Monthly Sales'],
          ['Data 1',     10],
          ['Data 2',      2],
          ['Data 3',  2],
          ['Data 4', 2],
          ['Data 5',    7]
        ]);

        var options = {
          title: 'Title '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    </head>

<body>

    <header class = "header">
        <nav class = "navbar">
            <ul>
                <li><a href = "Sales.html"> Sales </a></li>
                <li><a href = "Records.html"> Records </a></li>
                <li><a href = "Register.html"> Registration </a></li>
                <li><a href = "Sign in.html"> Sign Out </a></li>
            </ul>
        </nav>
    </header>

    <table>
        <thead>
            <tr>
                <th> Title</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> Data 1 </td>
                <td> Data 2 </td>
            </tr>
           <!--<tr>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
            </tr> -->
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <div id="piechart" style="width: 900px; height: 500px;"></div>

</body>

</html>

<?php

?>