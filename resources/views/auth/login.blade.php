<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h2>Login with QR Code</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="qr_code" class="form-label">Enter QR Code (Optional)</label>
                            <input type="text" name="qr_code" id="qr_code_input" class="form-control" placeholder="QR Code" autocomplete="off">
                        </div>

                        <div id="qr-scanner" class="text-center mb-3">
                            <h3>Or Scan QR Code</h3>
                            <video id="preview" class="border" style="width: 100%; max-width: 300px;"></video>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>

                   <!-- @if(auth()->check())
    <div class="mt-4 text-center">
        <h3>Your QR Code</h3>
        <img src="{{ Storage::url(auth()->user()->qr_code) }}" alt="QR Code" class="img-fluid">
    </div>
@endif -->

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
<script>
    window.onload = function () {
        const videoElement = document.getElementById("preview");
        const qrCodeInput = document.getElementById("qr_code_input");

        const html5QrCode = new Html5Qrcode("preview");

        Html5Qrcode.getCameras().then(cameras => {
            if (cameras && cameras.length) {
                html5QrCode.start(
                    cameras[0].id,
                    {
                        fps: 10,
                        qrbox: { width: 250, height: 250 }
                    },
                    qrCodeMessage => {
                        qrCodeInput.value = qrCodeMessage; // Automatically set the scanned value
                        alert("QR Code Detected!");
                        html5QrCode.stop(); // Stop scanning once a code is detected
                    },
                    errorMessage => {
                        console.log("Scanning failed: ", errorMessage);
                    }
                ).catch(err => {
                    console.error("Error starting QR code scanning: ", err);
                });
            }
        }).catch(err => console.error("Camera access failed: ", err));
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>