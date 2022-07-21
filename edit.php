<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Update CRUD</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">Update Page</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php

              include 'model.php';
              $model = new Model();
              $id = $_REQUEST['id'];
              $row = $model->edit($id);

              if (isset($_POST['update'])) {
                if (isset($_POST['fristname']) && isset($_POST['lastname']) && isset($_POST['phone_number']) && isset($_POST['password'])) {
                  if (!empty($_POST['fristname']) && !empty($_POST['lastname']) && !empty($_POST['phone_number']) && !empty($_POST['password']) ) {
                    
                    $data['id'] = $id;
                    $data['fristname'] = $_POST['fristname'];
                    $data['lastname'] = $_POST['lastname'];
                    $data['phone_number'] = $_POST['phone_number'];
                    $data['password'] = $_POST['password'];

                    $update = $model->update($data);

                    if($update){
                      echo "<script>alert('record update successfully');</script>";
                      echo "<script>window.location.href = 'show.php';</script>";
                    }else{
                      echo "<script>alert('record update failed');</script>";
                      echo "<script>window.location.href = 'show.php';</script>";
                    }

                  }else{
                    echo "<script>alert('empty');</script>";
                    header("Location: edit.php?id=$id");
                  }
                }
              }

          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="">fristname</label>
              <input type="text" name="fristname" value="<?php echo $row['fristname']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">lastname</label>
              <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">phone_number</label>
              <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">password</label>
              <input type="text" name="password" value="<?php echo $row['password']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-primary">edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php
include('backEdit.html');
?>...

</body>
</html>


