<html>
    <head>
        <title>Add friends</title>
    </head>
    <body>
        <a href="../index.php">Home</a>
        
        <form autocomplete="off" action="../components/friendRequest.php" method="POST">
            <div class="autocomplete" style="width:300px;">
              <input id="search" type="text" name="search" placeholder="Ajouter un ami">
              <input type="submit" name="submit" value="Search">
            </div>
        </form>
        <div style="position: relative;margin-top: -38px;margin-left: 215px;">
          <div id="show-list">
            <!-- Here autocomplete list will be display -->
          </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/autocomplete.js"></script>
    </body>
</html>

