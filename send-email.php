<?php
// Email configuration
$recipient_email = 'mjassociates1992@gmail.com';
$sender_name = 'MJ Associates Website';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Sanitize and validate form inputs
    $name = trim($_POST['Name'] ?? '');
    $phone = trim($_POST['Phone Number'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $business_type = trim($_POST['Business Type'] ?? '');
    $service_required = trim($_POST['Service Required'] ?? '');
    $message = trim($_POST['Message'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($phone)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Required fields are missing']);
        exit;
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid email format']);
        exit;
    }
    
    // Build email content
    $email_subject = "New Enquiry from MJ Associates Website - {$name}";
    
    $email_body = "New Enquiry Details:\n\n";
    $email_body .= "Name: {$name}\n";
    $email_body .= "Email: {$email}\n";
    $email_body .= "Phone Number: {$phone}\n";
    $email_body .= "Business Type: " . (!empty($business_type) ? $business_type : 'Not specified') . "\n";
    $email_body .= "Service Required: " . (!empty($service_required) ? $service_required : 'Not specified') . "\n";
    $email_body .= "Message:\n{$message}\n\n";
    $email_body .= "---\nThis enquiry was submitted from the MJ Associates website.";
    
    // Set email headers
    $headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Send email to the business
    $business_email_sent = mail($recipient_email, $email_subject, $email_body, $headers);
    
    // Send confirmation email to the user
    $confirmation_subject = "We received your enquiry - MJ Associates";
    $confirmation_body = "Hello {$name},\n\n";
    $confirmation_body .= "Thank you for reaching out to MJ Associates. We have received your enquiry and will get back to you shortly.\n\n";
    $confirmation_body .= "Enquiry Summary:\n";
    $confirmation_body .= "Service Required: " . (!empty($service_required) ? $service_required : 'Not specified') . "\n";
    $confirmation_body .= "Business Type: " . (!empty($business_type) ? $business_type : 'Not specified') . "\n\n";
    $confirmation_body .= "We will contact you at:\n";
    $confirmation_body .= "Phone: {$phone}\n";
    $confirmation_body .= "Email: {$email}\n\n";
    $confirmation_body .= "Best regards,\nMJ Associates Team";
    
    $confirmation_headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
    $confirmation_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    $user_email_sent = mail($email, $confirmation_subject, $confirmation_body, $confirmation_headers);
    
    // Return response
    if ($business_email_sent) {
        http_response_code(200);
        echo json_encode(['success' => true, 'message' => 'Thank you — your enquiry has been sent!']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'There was an error sending your enquiry. Please try again.']);
    }
    exit;
}

// If not a POST request, return error
http_response_code(405);
echo json_encode(['success' => false, 'message' => 'Invalid request method']);
?>
