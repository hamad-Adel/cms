<div class="col-md-4">







    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="" method="post" id="search">
          <div class="input-group">
              <input type="text" class="form-control" name="search">
              <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                      <span class="glyphicon glyphicon-search"></span>
              </button>
              </span>
          </div>
        </form>

      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])):
        $search =  filter_var($_POST['search'], FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM posts WHERE  tags LIKE '%{$search}%'";
        $query = mysqli_query($dbh, $sql);
        if (!$query)
            die('Query Error ' . mysqli_error($dbh));

        $count = mysqli_num_rows($query);
        if (!$count)
            echo "<div class='alert alert-warning'>No Result with {$search} </div>";


      if($count) {
        echo "<div class='alert alert-info'>";
        while($row = mysqli_fetch_assoc($query)):
          echo "<a href='localhost/cms/{$row['title']}/{$row['id']}'>{$row['title']}</a> <br>";
        endwhile;
        echo '</div>';
      }
      mysqli_free_result($query);
    endif;
      ?>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>
</div>
