<?php include "src/book.php" ?>
<?php include "templates/header.php"; ?>

<h1>Display Books</h1>

<div class="container">
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Pages</th>
        <th scope="col">Category</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $row) { ?>
        <tr>
          <td><?php echo ($row["title"]); ?></td>
          <td><?php echo ($row["author"]); ?></td>
          <td><?php echo ($row["pages"]); ?></td>
          <td><?php echo ($row["category"]); ?></td>
        </tr>
      <?php } ?>




      <!-- <tr>
          <th scope="row">Book1</th>
          <td>Author1</td>
          <td>200</td>
          <td>Fiction</td>
        </tr>
        <tr>
          <th scope="row">Book2</th>
          <td>Author 2</td>
          <td>410</td>
          <td>Non-fiction</td>
        </tr>
        <tr>
          <th scope="row">Book</th>
          <td>Author3</td>
          <td>3020</td>
          <td>Fiction</td>
        </tr> -->
    </tbody>
  </table>
</div>
</body>

</html>