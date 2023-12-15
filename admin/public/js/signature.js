var signaturePad = new SignaturePad(document.getElementById('signature-canvas'));

function openSignaturePopup() {
  document.getElementById('signature-popup').style.display = 'block';
}

function closeSignaturePopup() {
  document.getElementById('signature-popup').style.display = 'none';
}

// Handle Clear button click
document.getElementById('cancel-button').addEventListener('click', function () {
  signaturePad.clear();
});

// Handle form submission
document.getElementById('done-button').addEventListener('click', function () {
  // Get the signature data as a base64-encoded PNG image
  var signatureData = signaturePad.toDataURL();

  // Set the value of the hidden input to the signature data
  document.getElementById('signature-data').value = signatureData;

  // Navigate to the next step (e.g., Step 9)
  document.getElementById('step8').style.display = 'none';
  document.getElementById('step9').style.display = 'block';
});
