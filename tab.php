<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sortable Table with Search and Export</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>
<body>

  <h1>Sortable Table with Search and Export</h1>

  <div class="container">
    <input type="text" id="searchInput" placeholder="Search...">
    <button onclick="exportTable()">Export as XLS</button>
    <table id="dataTable" class="display">
      <thead>
        <tr>
          <th>Name</th>
          <th>Age</th>
          <th>Email</th>
          <th>Country</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>30</td>
          <td>john@example.com</td>
          <td>USA</td>
        </tr>
        <tr>
          <td>Jane Smith</td>
          <td>25</td>
          <td>jane@example.com</td>
          <td>Canada</td>
        </tr>
        <tr>
          <td>Mark Johnson</td>
          <td>35</td>
          <td>mark@example.com</td>
          <td>Australia</td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
  <script>
    $(document).ready(function() {
      // Initialize DataTable with sorting and export options
      $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'excelHtml5',
          'print'
        ]
      });
    });

    function exportTable() {
      // Trigger the export button click event
      $('.buttons-excel').click();
    }
  </script>

</body>
</html>
