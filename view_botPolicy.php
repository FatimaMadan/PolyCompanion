<?php
ob_start();
include 'debugging.php';
include 'header.php';
include 'Users.php';

 if (empty($_SESSION['uid'])) {
     // User is not logged in, redirect to login page
     echo $_SESSION['username'];
     header("Location: Login.php");
     exit();
 }
 $state = '';
 $uid = $_SESSION['uid'];
?>

<script>
      var uid = <?php echo json_encode($_SESSION['uid']); ?>;

    function updateAgreement(action) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response if needed
            console.log(xhr.responseText);
        }
    };
    xhr.open('GET', 'check_user_agree.php?action=' + action + '&uid=' + uid, true);
    xhr.send();
}
</script>

<div class="container-xxl py-5">
  <div class="container">
    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="width: 100%;">
      <h6 class="section-title bg-white text-start text-primary pe-3">Privacy Policy</h6>
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-0">Polybot Policy</h1>
 <?php
$userAgree = Users::getUserAgree($_SESSION['uid']);

if ($userAgree !== 1) {
    $btn = 'I Agree to the Polybot Policy';
    $action = "confirm";
} else {
    $btn = 'I do not agree to the Polybot Policy';
    $action = "notConfirm";
}
?>

<button class="btn btn-primary py-3 px-5 mt-2" onclick="updateAgreement('<?php echo $action; ?>')"><?php echo $btn; ?></button>     
      </div>
      <div class="privacy-policy-container text-justify">
        <p>
          Effective date: 11 December 2023
        </p>
        <p>
          This Privacy Policy outlines the practices and procedures followed by our chatbot service ("Polybot") regarding the collection, use, disclosure, and protection of personal information. By using the Chatbot, you agree to the terms and conditions of this Privacy Policy.
        </p>
        <br>
        <br><h3>Information We Collect</h3>
        <br><h4>1. Personal Information</h4>
        <p>
          We may collect certain personally identifiable information ("Personal Information") from you during your interaction with the Chatbot. This may include, but is not limited to, your name, email address, and other contact details. We only collect Personal Information that is voluntarily provided by you.
        </p>
        <br><h4>2. Usage Data</h4>
        <p>
          In addition to Personal Information, we may collect non-personally identifiable information that is automatically generated as part of your use of the Chatbot. This may include, but is not limited to, your IP address, browser type, operating system, and device information.
        </p>
        <br><br><h3>Use of Information</h3>
        <br><h4>2.1 Purpose</h4>
        <p>
          We collect and use Personal Information for the following purposes:
        </p>
        <ul>
          <li>To provide and improve the functionality and performance of the Chatbot.</li>
          <li>To understand user preferences and customize the Chatbot experience.</li>
          <li>To analyze and report on aggregated, anonymized data for research and improvement purposes.</li>
          <li>To communicate with you and respond to your inquiries.</li>
        </ul>
        <br><h4>2.2 Anonymized Data</h4>
        <p>
          Please note that any data collected and used for research and improvement purposes will be anonymized and aggregated, ensuring that individual users cannot be identified.
        </p>
        <br><br><h3>Data Sharing and Disclosure</h3>
        <br><h4>3.1 Third-Party Service Providers</h4>
        <p>
          We may engage third-party service providers to assist us in operating and maintaining the Chatbot or to perform services on our behalf. These service providers may have access to Personal Information solely for the purpose of providing services to us and are obligated to maintain the confidentiality and security of such information.
        </p>
        <br><h4>3.2 Legal Compliance</h4>
        <p>
          We may disclose Personal Information if required to do so by law or if we believe that such action is necessary to comply with legal obligations or protect our rights, property, or safety.
        </p>
        <br><br><h3>Data Security</h3>
        <br><h4>4.1 Security Measures</h4>
        <p>
          We take reasonable precautions and implement appropriate technical and organizational measures to protect against unauthorized access, use, alteration, or disclosure of Personal Information. However, no data transmission over the internet or electronic storage system can be guaranteed to be 100% secure.
        </p>
        <br><h4>4.2 Retention Period</h4>
        <p>
          We retain Personal Information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law.
        </p>
        <br><br><h3>Your Rights</h3>
        <br><h4>5.1 Access and Correction</h4>
        <p>
          You have the right to access and update your Personal Information that we hold. If you wish to exercise this right, please contact us using the contact details provided below.
        </p>
        <br><h4>5.2 Opt-Out</h4>
        <p>
          You have the right to opt-out of receiving promotional communications from us. You can exercise this right by following the instructions in the communication or by contacting us.
        </p>
        <br><br><h3>Updates to this Privacy Policy</h3>
        <p>
          We reserve the right to update or modify this Privacy Policy at any time, and such changes will be effective upon posting the revised policy on this page. We encourage you to review this Privacy Policy periodically for any updates or changes.
        </p>
        <br><br><h3>Contact Us</h3>
        <p>
          If you have any questions, concerns, or requests regarding this Privacy Policy or our privacy practices, please contact us by clicking on the button: <button class="option-button"><a href="contact.php">Contact us</a></button>
        </p>
        <p>
          Please note that this Privacy Policy applies solely to the Chatbot and does not govern the practices of third parties that may interact with the Chatbot or websites and services linked to or from the Chatbot. We encourage you to review the privacy policies of those third parties to understand their data collection, use, and disclosure practices.
        </p>
      </div>
    </div>
  </div>
</div>


<?php
include 'footer.php';
?>