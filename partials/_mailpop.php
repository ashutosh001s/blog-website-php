<div class="newsletterModal">
    <!-- Modal -->
    <div class="modal fade" id="newsletterModal" tabindex="-1" style="backdrop-filter: blur(5px);"
        aria-labelledby="newsletterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content newsModalContent">
                <div class="modal-body">
                    <!-- newsletter start  -->

                    <div class="popNewsletter">
                        <p class="sidebarHeading">Newsletter</p>
                        <p class="formTextSmall">Signup and receive our exclusive blogging and digital marketing tips
                            right
                            in
                            your inbox.</p>
                        <form class="emailForm" action="/action.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control newsletterInput" name="fname"
                                    placeholder="Enter your first name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control newsletterInput" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-news" type="Submit">Sign Up</button>
                            </div>
                            <?php
                            $statusMsg = !empty($_SESSION['msg']) ? $_SESSION['msg'] : '';
                            unset($_SESSION['msg']);
                            echo $statusMsg;
                            ?>
                        </form>
                    </div>
                    <!-- newsletter end  -->
                </div>
            </div>
        </div>
    </div>
</div>