<?php
$host = $_SERVER['SERVER_NAME'];

echo'<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action = "'.$host.'/_handleSignup.php" method = "POST">
            <div class="mb-3">
             <input type="text" class="form-control" id="signupName" name="signupName" placeholder="Name" autocomplete="off" required>
            </div>
            <div class="mb-3">
             <input type="email" class="form-control" id="signupEmail" name="signupEmail" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="mb-3">
             <input type="password" class="form-control" id="signupPass" name="signupPass" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="mb-3">
             <input type="password" class="form-control" id="signupPassConform" name="signupPassConform" placeholder="Conform Password" autocomplete="off" required>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
      </form>
    </div>
  </div>
</div>';
?>