<?php
  $page_title = 'Edit Account';
  require_once('includes/load.php');
   page_require_level(3);
?>
<?php
//update user image
  if(isset($_POST['submit'])) {
  $photo = new Media();
  $user_id = (int)$_POST['user_id'];
  $photo->upload($_FILES['file_upload']);
  if($photo->process_user($user_id)){
    $session->msg('s','photo has been uploaded.');
    redirect('edit_account.php');
    } else{
      $session->msg('d',join($photo->errors));
      redirect('edit_account.php');
    }
  }
?>
<?php
 //update user other info
  if(isset($_POST['update'])){
    $req_fields = array('name','username' );
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$_SESSION['user_id'];
           $name = remove_junk($db->escape($_POST['name']));
       $username = remove_junk($db->escape($_POST['username']));
            $sql = "UPDATE users SET name ='{$name}', username ='{$username}' WHERE id='{$id}'";
    $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount updated ");
            redirect('edit_account.php', false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_account.php', false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_account.php',false);
    }
  }
?>
<?php include_once('layouts/header.php'); ?>

    <div class = "edit-my-account">
      <!-- <div class="col-md-5"> -->
        <div class="panel "> <!--panel-default-->
          <div class="panel-heading clearfix">
            <span class="glyphicon glyphicon-edit"></span>
            <span>Edit My Account</span>
          </div>
                <div class="form-group-edit">
                      <label for="photo" class="control-label">Change Photo</label>
                </div>
          <!-- <div class="panel-body-change-photo"> -->
              <div class="row">
                <div class="image">
                    <img class="img-circle img-size-2" src="uploads/users/<?php echo $user['image'];?>" alt="">
                </div>

                <!-- <div class="col-md-8"> -->
                  <form class="form" action="edit_account.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group-edit">
                    <input type="file" name="file_upload" class="btn-profile btn-default btn-file"/>
                    <label for="file_upload">Choose File</label>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo $user['id'];?>">
                    <button type="submit" name="submit" class="btn btn-warning">Change</button>
                  </div>
                </form>
                <!-- </div> -->
              </div>
            <!-- </div> -->

          <div class="panel-body-edit-account">
              <form method="post" action="edit_account.php?id=<?php echo (int)$user['id'];?>" class="clearfix">
                <div class="form-group-edit">
                      <label for="name" class="control-label">Name</label>
                      <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($user['name'])); ?>">
                
                  </div>
                  <div class="form-group-edit">
                      <label for="username" class="control-label">Username</label>
                      <input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($user['username'])); ?>">
                  </div>
                  <div class="form-group clearfix">
                        <a href="change_password.php" title="change password" class="btn-changepass pull-right">Change Password</a>
                        <button type="submit" name="update" class="btn-update btn-info">Update</button>
                  </div>
              </form>
            </div>
        </div>
      <!-- </div> -->
    </div>


<?php include_once('layouts/footer.php'); ?>
