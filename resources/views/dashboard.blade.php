<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Dashboard</h2>
                </div>
                <div class="card-body">
                    <p class="lead">Welcome to your dashboard, <b>{{ auth()->user()->name }}!</b></p>

                    <div class="row mt-4">
                        <div class="col-md-4 mb-3">
                            <div class="card bg-light shadow-sm">
                                <div class="card-body text-center">
                                    <h5>Total Users</h5>
                                    <p class="display-6">105</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card bg-light shadow-sm">
                                <div class="card-body text-center">
                                    <h5>New Messages</h5>
                                    <p class="display-6">22</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card bg-light shadow-sm">
                                <div class="card-body text-center">
                                    <h5>Tasks Completed</h5>
                                    <p class="display-6">92%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="/profile" class="btn btn-outline-primary me-2">View Profile</a>
                        <a href="/settings" class="btn btn-outline-secondary">Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
