<?php
$pageTitle = "System Settings";
?>
<?php include 'includes/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<main class="main-content">
    <div class="page-header">
        <h2>System Settings</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action active">General Settings</a>
                        <a href="#" class="list-group-item list-group-item-action">System Configuration</a>
                        <a href="#" class="list-group-item list-group-item-action">User Management</a>
                        <a href="#" class="list-group-item list-group-item-action">Backup & Restore</a>
                        <a href="#" class="list-group-item list-group-item-action">Document Templates</a>
                        <a href="#" class="list-group-item list-group-item-action">Email Settings</a>
                        <a href="#" class="list-group-item list-group-item-action">Security</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h5>General Settings</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="systemName" class="form-label">System Name</label>
                            <input type="text" class="form-control" id="systemName" value="Balas Mexico System">
                        </div>
                        <div class="mb-3">
                            <label for="barangayName" class="form-label">Barangay Name</label>
                            <input type="text" class="form-control" id="barangayName" value="Barangay Balas">
                        </div>
                        <div class="mb-3">
                            <label for="municipality" class="form-label">Municipality/City</label>
                            <input type="text" class="form-control" id="municipality" value="Mexico">
                        </div>
                        <div class="mb-3">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control" id="province" value="Pampanga">
                        </div>
                        <div class="mb-3">
                            <label for="region" class="form-label">Region</label>
                            <input type="text" class="form-control" id="region" value="Region III">
                        </div>
                        <div class="mb-3">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode" value="2000">
                        </div>
                        <div class="mb-3">
                            <label for="systemLogo" class="form-label">System Logo</label>
                            <input class="form-control" type="file" id="systemLogo">
                            <small class="text-muted">Recommended size: 200x60 pixels</small>
                        </div>
                        <div class="mb-3">
                            <label for="favicon" class="form-label">Favicon</label>
                            <input class="form-control" type="file" id="favicon">
                            <small class="text-muted">Recommended size: 32x32 pixels</small>
                        </div>
                        <div class="mb-3">
                            <label for="timezone" class="form-label">Timezone</label>
                            <select class="form-select" id="timezone">
                                <option value="Asia/Manila" selected>Asia/Manila (UTC+8)</option>
                                <!-- More timezone options would be added here -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dateFormat" class="form-label">Date Format</label>
                            <select class="form-select" id="dateFormat">
                                <option value="Y-m-d">YYYY-MM-DD (2023-05-16)</option>
                                <option value="m/d/Y">MM/DD/YYYY (05/16/2023)</option>
                                <option value="d/m/Y">DD/MM/YYYY (16/05/2023)</option>
                                <option value="F j, Y">Month Day, Year (May 16, 2023)</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2">Reset</button>
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>