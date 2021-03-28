<?php
$host = $_SERVER['SERVER_NAME'];
echo'<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action = "https://'.$host.'/partials/_handleLogin.php" method = "POST">
            <div class="mb-3">
             <input type="email" class="form-control" id="loginId" name="loginId" placeholder="Email" autocomplete="on" required>
            </div>
            <div class="mb-3">
             <input type="password" class="form-control" id="loginPass" name="loginPass" placeholder="Password" autocomplete="on" required>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>';
?>