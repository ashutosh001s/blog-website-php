<div class="newsletterModal">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="newsletterModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newsletterModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- newsletter start  -->

                    <div class="postNewsletter">
                        <p class="sidebarHeading">Newsletter</p>
                        <p class="formTextSmall">Signup and receive our exclusive blogging and digital marketing tips
                            right
                            in
                            your inbox.</p>
                        <form class="emailForm" action="/action.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control newsletterInput" id="name" name="fname"
                                    placeholder="Enter your first name">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control newsletterInput" id="email" name="email"
                                    placeholder="Enter your email">
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