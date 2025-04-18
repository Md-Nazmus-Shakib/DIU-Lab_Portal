<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Lab PC Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #f1f1f1;
    }

    header {
      background: #222;
      color: white;
      padding: 1rem 2rem;
      text-align: center;
    }

    .container {
      padding: 2rem;
      max-width: 1200px;
      margin: auto;
    }

    .section {
      background: white;
      border-radius: 8px;
      padding: 1.5rem;
      margin-bottom: 2rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .section h2 {
      margin-bottom: 1rem;
      font-size: 20px;
    }

    form input,
    form select,
    form button {
      padding: 0.5rem;
      margin-right: 0.5rem;
      margin-bottom: 1rem;
    }

    .pc-boxes {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .pc-box {
      background: #dceefb;
      border-radius: 8px;
      padding: 1rem;
      width: 150px;
      text-align: center;
      box-shadow: 0 1px 3px rgba(0,0,0,0.2);
      position: relative;
    }

    .pc-box p {
      margin: 0.5rem 0;
    }

    .delete-btn {
      position: absolute;
      top: 8px;
      right: 8px;
      background: red;
      color: white;
      border: none;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      cursor: pointer;
    }
  </style>
  </head>
<body>
  <header>
    <h1>Admin Dashboard - Lab PC Management</h1>
  </header>

  <div class="container">
    <!-- Add Lab Room Section -->
    <!-- <div class="section">
      <h2>Add New Lab Room</h2>
      <form id="labForm">
        <input type="text" placeholder="Lab Name" name="lab_name" required>
        <button type="submit">Add Lab</button>
      </form>
    </div> -->

    <!-- Add PC Section -->
    <div class="section">
      <h2>Add New PC to a Lab</h2>
      <form id="pcForm" method="POST" action="dashDb.php">
        <select name="lab_id" required>
          <option value="">Select Lab</option>
          <option value="616">616</option>
          <option value="610">610</option>
          <!-- Labs should be populated from DB -->
        </select>
        <input type="text" placeholder="PC Number" name="pc_name" required>
        <select name="status">
          <option value="working">Working</option>
          <option value="problem">Problematic</option>
        </select>
        <button type="submit" name="addpc">Add PC</button>
      </form>
    </div>

    <div class="section">
      <h2>Delete PC from a Lab</h2>
      <form id="pcForm" method="POST" action="dashDb.php">
        <select name="lab_id" required>
          <option value="">Select Lab</option>
          <option value="616">616</option>
          <option value="610">610</option>
          <!-- Labs should be populated from DB -->
        </select>
        <input type="text" placeholder="PC Number" name="pc_name" required>
        <select name="status">
          <option value="Solve">Solve</option>
          <option value="Processing">Problematic</option>
        </select>
        
        <button type="submit" name="deletepc">Delete PC</button>
      </form>
    </div>
    <div class="section">
      <h2>Update Status</h2>
      <form id="pcForm" method="POST" action="dashDb.php">
        <select name="lab_id" required>
          <option value="">Select Lab</option>
          <option value="616">616</option>
          <option value="610">610</option>
          <!-- Labs should be populated from DB -->
        </select>
        <input type="text" placeholder="PC Number" name="pc_name" >
        
        <button type="submit" name="update">Update</button>
      </form>
    </div>

    <!-- PC Display Section -->
    <div class="section">
      <h2>Show Report</h2>
      <form id="pcForm" method="POST" action="report.php" target="_blank">
        <select name="lab_id" required>
          <option value=""  disabled selected>Select Lab</option>
          <option value="616">616</option>
          <option value="610">610</option>
          <!-- Labs should be populated from DB -->
        </select>
        
        
        <button type="submit" name="searchpc">Search</button>
      </form>
        <!-- Dynamically added PC boxes will appear here -->
      </div>
    </div>
  </div>
  <!-- <script>
    // Example of adding dummy PC data dynamically
    document.getElementById('pcForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const pcName = e.target.pc_name.value;
      const pcStatus = e.target.pc_status.value;
      const pcContainer = document.getElementById('pcContainer');

      const div = document.createElement('div');
      div.className = 'pc-box';
      div.innerHTML = `
        <button class="delete-btn">&times;</button>
        <i class="fa-solid fa-desktop fa-2x"></i>
        <p><strong>${pcName}</strong></p>
        <p>Status: ${pcStatus}</p>
      `;

      div.querySelector('.delete-btn').addEventListener('click', () => div.remove());
      pcContainer.appendChild(div);

      e.target.reset();
    });
  </script> -->
  </body>
  </html>