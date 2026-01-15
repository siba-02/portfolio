<?php
session_start();
include 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}

// Fetch student data
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <style>
    /* ===== Global Styles ===== */
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #001f3f, #003f73);
      color: #fff;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    /* ===== Dashboard Container ===== */
    .dashboard {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      padding: 40px;
      border-radius: 20px;
      width: 85%;
      max-width: 900px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
      animation: fadeIn 1s ease-in-out;
      text-align: center;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ===== Header ===== */
    h2 {
      color: cyan;
      text-shadow: 0 0 15px cyan;
      font-weight: 600;
      margin-bottom: 10px;
    }

    p {
      margin-bottom: 30px;
      font-size: 16px;
      color: #e0e0e0;
    }

    /* ===== Table Styles ===== */
    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
      background: rgba(0, 0, 0, 0.3);
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      color: #f1f1f1;
    }

    th {
      background: linear-gradient(135deg, #00c3ff, #0074D9);
      color: #fff;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      font-size: 15px;
    }

    tr:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: scale(1.02);
      transition: 0.3s ease;
    }

    /* ===== Button Styles ===== */
    .logout-btn {
      display: inline-block;
      margin-top: 25px;
      padding: 12px 25px;
      background: linear-gradient(135deg, #00c3ff, #0074D9);
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 600;
      box-shadow: 0 5px 15px rgba(0, 115, 255, 0.4);
      transition: all 0.3s ease;
    }

    .logout-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(0, 115, 255, 0.6);
    }

    /* ===== Responsive Design ===== */
    @media (max-width: 768px) {
      .dashboard {
        width: 95%;
        padding: 20px;
      }
      table {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h2>Welcome, Admin</h2>
    <p>You are successfully logged in.</p>

    <?php if ($result->num_rows > 0) { ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Course</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['course']; ?></td>
        </tr>
        <?php } ?>
      </table>
    <?php } else { ?>
      <p>No student records found.</p>
    <?php } ?>

    <a href="logout.php" class="logout-btn">Logout</a>
  </div>
</body>
</html>

<?php $conn->close(); ?>
