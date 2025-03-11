<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-success text-white">
                    <h2>Your QR Code</h2>
                </div>
                <div class="card-body text-center">
                    <div id="qr-code-container" class="my-4">
                        {!! $qrCode !!}
                    </div>
                    <p>Scan this QR code to log in.</p>
                    <div class="d-grid gap-2 d-md-block">
                        <button id="download-qr-code" class="btn btn-primary me-2">Download QR Code</button>
                        <a href="/login" class="btn btn-secondary">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('download-qr-code').addEventListener('click', function () {
        const svgElement = document.querySelector('#qr-code-container svg');
        const serializer = new XMLSerializer();
        const svgString = serializer.serializeToString(svgElement);

        const svgBlob = new Blob([svgString], { type: 'image/svg+xml;charset=utf-8' });
        const svgUrl = URL.createObjectURL(svgBlob);

        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        const svgSize = svgElement.getBoundingClientRect();
        canvas.width = svgSize.width;
        canvas.height = svgSize.height;

        const img = new Image();
        img.onload = function () {
            context.drawImage(img, 0, 0, canvas.width, canvas.height);

            const pngUrl = canvas.toDataURL('image/png');

            const downloadLink = document.createElement('a');
            downloadLink.href = pngUrl;
            downloadLink.download = 'qrcode.png';
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);

            URL.revokeObjectURL(svgUrl);
        };

        img.src = svgUrl;
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>