<!DOCTYPE html>
<html>
<head>
  <title>Customer Feedback</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
</head>
<body>

<?php
include "conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['rating']) && isset($_POST['comments'])) {
    $username = $_POST['username'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    if (empty($comments)) {
      echo '<div class="alert alert-danger mt-4">Please write something</div>';
    } else {
      $sql = "INSERT INTO feedback (username, rating, feedback) VALUES ('$username', '$rating', '$comments')";

      if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success mt-4">Feedback submitted successfully!</div>';
      } else {
        echo '<div class="alert alert-danger mt-4">Error: ' . $conn->error . '</div>';
      }
    }
  }
}

$conn->close();
?>

<div class="container">
  <h1 class="mt-5">Customer Feedback</h1>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" class="form-control" value="<?php session_start(); echo $_SESSION['username'] ?? ''; ?>" readonly>
    </div>

    <div class="form-group">
      <label for="rating">Rating:</label>
      <select id="rating" name="rating" class="form-control" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>

    <div class="form-group">
      <label for="comments">Your comment:</label>
      <textarea id="comments" name="comments" rows="4" cols="50" class="form-control" maxlength="300"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit Feedback</button>
    <a href="panel.php">
      <button  type="button" class="btn btn-danger">Back</button>
    </a>
  </form>
</div>

</body>
</html>
