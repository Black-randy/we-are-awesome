<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WE ARE AWESOME</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./css/home_style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

  <div class="layout-container">
    <!-- Include the navigation bar -->
    <?php include 'nav_bar.php'; ?>

    <!-- Content area on the left side -->
    <div class="content" id="main-content">
      <!-- Content will be loaded here -->
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Function to load content into the main-content div
      function loadContent(content) {
        $("#main-content").html(content);
      }

      // Event handler for navigation button click
      $(".nav-button").click(function() {
        // Get the data-target attribute value (content file to load)
        var targetContent = $(this).data("target");

        // Load content using AJAX
        $.get(targetContent, function(data) {
          loadContent(data);
        });
      });
    });
  </script>

</body>
</html>
