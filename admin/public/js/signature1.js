// Create a new SignaturePad instance for Step 9
var signaturePad1 = new SignaturePad(document.getElementById('signature-canvas1'));

function openSignaturePopup1() {
  document.getElementById('signature-popup1').style.display = 'block';
}

function closeSignaturePopup1() {
  document.getElementById('signature-popup1').style.display = 'none';
}

// Handle Clear button click for Step 9
document.getElementById('cancel-button1').addEventListener('click', function () {
  signaturePad1.clear();
});

// Handle form submission for Step 9
document.getElementById('done-button1').addEventListener('click', function () {
  // Get the signature data as a base64-encoded PNG image for Step 9
  var signatureData1 = signaturePad1.toDataURL();

  // Set the value of the hidden input for Step 9 to the signature data
  document.getElementById('signature-data1').value = signatureData1;

  // Navigate to the next step (e.g., Step 10)
  document.getElementById('step9').style.display = 'none';
  document.getElementById('sstep10').style.display = 'block';
});
