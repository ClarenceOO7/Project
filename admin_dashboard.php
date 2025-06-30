<?php
$conn = new mysqli("localhost", "root", "", "barangay_reports");

$sql = "SELECT reports.*, users.name FROM reports 
        JOIN users ON reports.user_id = users.id ORDER BY date_submitted DESC";
$result = $conn->query($sql);
?>

<table border="1">
  <tr>
    <th>Reporter</th><th>Type</th><th>Description</th><th>Location</th><th>Status</th><th>Actions</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['type'] ?></td>
    <td><?= $row['description'] ?></td>
    <td><?= $row['location'] ?></td>
    <td><?= $row['status'] ?></td>
    <td>
      <form action="update_status.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <select name="status">
          <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
          <option value="resolved" <?= $row['status'] == 'resolved' ? 'selected' : '' ?>>Resolved</option>
        </select>
        <button type="submit">Update</button>
      </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>