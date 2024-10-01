document
  .getElementById("community-contact-form-test-hasnain")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    // Get form data
    const name = document.getElementById("contact-name-hasnain").value;
    const email = document.getElementById("contact-email-hasnain").value;
    const subject = document.getElementById("contact-subject-hasnain").value;
    const message = document.getElementById("contact-message-hasnain").value;

    const templateParams = {
      subject_html: subject,
      from_name: name,
      message_html: message,
      reply_to: email,
    };

    // Send email using EmailJS
    emailjs.send("tasty_trade", "template_0pjx2pc", templateParams).then(
      function (response) {
        console.log("SUCCESS!", response.status, response.text);
        alert("Email sent successfully!");
        // Clear form after successful submission (optional)
        document.getElementById("contact-form").reset();
      },
      function (error) {
        console.log("FAILED...", error);
        alert("Failed to send email. Please try again.");
      }
    );
  });
