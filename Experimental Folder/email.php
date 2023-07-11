<?php
ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', 587);

$to = "ryanjamesc4@gmail.com";
$subject = "Acceptance of Offer for On-the-Job Training (OJT)";
$headers = "From: mymovies1.out.of.5@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=utf-8\r\n";

$fullTexts = "
    Dear [Recipient's Name],

    I hope this message finds you well. I am writing to formally accept the offer for the On-the-Job Training (OJT) position at [Company Name], as communicated to me in the offer letter dated [Date of Offer Letter]. I am excited and grateful for this opportunity to further enhance my skills and contribute to the success of your esteemed organization.

    // Rest of the email content...

    Thank you for your time and consideration.

    Yours sincerely,
    [Name]
";

// Send the email
if (mail($to, $subject, $fullTexts, $headers)) {
    echo "Mail Sent.";
} else {
    echo "Failed to send the mail.";
}
