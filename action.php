<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $currentUrl = $_POST['currentUrl'];
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        // MailChimp API credentials
        $apiKey = '9e825f9aab231924bf44e62d3db62006-us17';
        $listID = '19c24957f2';

        // MailChimp API URL
        $memberID = md5(strtolower($email));
        $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;

        // member information
        $json = json_encode([
            'email_address' => $email,
            'status'        => 'subscribed',
            'merge_fields'  => [
                'FNAME'     => $fname
            ]
        ]);

        // send a HTTP POST request with curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // store the status message based on response code
        if ($httpCode == 200) {
            $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You have been successfully signedup!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } else {
            switch ($httpCode) {
                case 214:
                    $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Congratulations!</strong> You have been already subscribed.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                    break;
                default:
                    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>OOps!</strong> Some problem occured!.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    break;
            }
            $_SESSION['msg'] = '<p>' . $msg . '</p>';
        }
    } else {
        $_SESSION['msg'] = '<p><div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>OOps</strong> Please Enter a valid email address.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>.</p>';
    }
}
// redirect to homepage
header("location: $currentUrl");