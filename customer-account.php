    <?php
require ('database/connections/conx-customer.php');
$user = $_SESSION['user'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Assume $id is retrieved from session or request
$id = $user_id; // Example user ID

$sql = "SELECT * FROM users WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
session_abort();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeaProj. E-Sip - Account</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/admin_profile_style.css">

    <!-- JAVASCRIPTS -->
    <script src="https://kit.fontawesome.com/1fd0899690.js" crossorigin="anonymous"></script>
    <script src="js/account.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #profilediv {
            background-image: url('<?php echo $row['user_pic'];?>');
        }
        .nav-tabs {
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 20px !important;
        }
        li.nav-item {
            font-size: 1.5rem;
        }
        .nav-link {
            color: #559078;
            font-weight: 500;
        }
        input#profile_pic {
    width: 100%;
}

input[type="file"]{
    width: calc(100% - 20px);
    padding: 2px 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.file::before {
    content: 'Upload Photo';
    display: inline-block;
    margin: 10px 0px;
    margin-right: -90px;
    border: 1.5px solid rgb(221, 221, 221);
    border-radius: 5px;
    padding: 5px 20px;
    outline: none;
    white-space: nowrap;
    cursor: pointer;
    font-weight: 500;
    font-size: 15px;
}

#profilename .info input, #password .info input  {
    width: 100%;
    padding: 10px 20px;
    border-radius: 5px;
    border: 1.5px solid #DFDFDF;
    margin: 0px;
    background: none;
}
input#email {
    cursor: not-allowed;
    background-color: rgba(0, 0, 0, 0.075) !important;
}

.info {
    margin-bottom: 5px;
}

.updatediv {
    text-align: center;
    margin-top: 5px;
}

.updatediv .updatebtn {
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    color: white;
    background-color: #0e3d30;
    width: 100%;
    cursor: pointer;
}

.mt-5, .my-5 {
    margin-top: 3rem !important;
    padding: 50px !important;
}

.nav-tabs .nav-link:hover {
    color: #000 !important;
}

.nav-tabs .nav-link.active {
    color: #ffffff !important;
    background-color: #3d6655 !important;
    border-color: #19875459 #dee2e6 #fff !important;
    width: 200px !important;
}

.mfa {
    display: flex;
    align-items: center;
}

.info {
    margin-right: 10px;
    cursor: pointer;
}

.fa-toggle-on,
.fa-toggle-off {
    font-size: 2em;
}

.mfa button {
    margin-top: 10px;
    padding: 5px 10px;
    font-size: 1em;
}

.mt-5, .my-5 {
    margin-top: 6rem !important;
    margin-bottom: 6rem !important;
}

.info input, .info select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    background: #f9f9f9;
    transition: background 0.3s;
    margin: 0;
}

button.btn-archive {
    width: 100%;
    padding: 10px;
    font-size: 1.3rem;
    background-color: #ffffff00;
    color: #dc3545;
    border: 1px solid #dc3545;
    border-radius: 5px;
    font-weight: 600;
}
    </style>
</head>

<body>


    <?php include "components/header.php"; ?>

    <?php
    // var_dump($_SESSION);
    $sqlProducts = "SELECT * FROM products WHERE prod_category != 'Add-Ons' LIMIT 12";
    $stmtProducts = $pdo->prepare($sqlProducts);
    $stmtProducts->execute();
    $resultProducts = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);

    $sqlAddresses = "SELECT * FROM `user_addresses` WHERE user_id = :user_id AND uaddress_type = 'Saved' AND uaddress_archived = 0 ORDER BY uaddress_added_at DESC";
    $stmtAddresses = $pdo->prepare($sqlAddresses);
    $stmtAddresses->execute(['user_id' => $id]);
    $resultAddresses = $stmtAddresses->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">Account Settings</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="addresses-tab" data-bs-toggle="tab" data-bs-target="#addresses" type="button" role="tab" aria-controls="addresses" aria-selected="false">Addresses</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="add-address-tab" data-bs-toggle="tab" data-bs-target="#add-address" type="button" role="tab" aria-controls="add-address" aria-selected="false">Add Address</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                
                <form method="post" action="customer-account-update-profile.php" enctype="multipart/form-data">
                    <h2>Account Profile</h2>
                    <div id="profiledivcont">
                        <div id="profilediv"></div>
                        <div>
                            <input class="file" type="file" name="profile_pic" id="profile_pic">
                        </div>
                    </div>
                    <?php foreach ($user_info as $user) { ?>
                        <div id="profilename">
                            <div class="info">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="<?php echo $user['user_email']; ?>" disabled>
                            </div>
                            <div class="info">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" name="fname" value="<?php echo $user['user_fname']; ?>" required max="50" pattern="[a-zA-Z\s]{1,50}$" title="First name must contain only letters and be maximum 50 characters long.">
                            </div>
                            <div class="info">
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" name="lname" value="<?php echo $user['user_lname']; ?>" required max="50" pattern="[a-zA-Z\s]{1,50}$" title="Last name must contain only letters and be maximum 50 characters long.">
                            </div>
                            <div class="info">
                                <label for="num">Contact Number:</label>
                                <input type="text" id="num" name="num" value="<?php echo $user['user_num']; ?>" required pattern="^(09\d{9}|0\d{10})$" title="Contact number should start with '0' and be exactly 11 digits">
                            </div>
                            <div class="updatediv">
                                <input class="updatebtn" type="submit" value="Update Profile">
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">

                <form method="post" action="customer-account-mfa-update.php">
                    <h2>Multi-Factor Authentication</h2>
                    <div class="updatediv">
                        <?php 
                            // Select user MFA status
                            $selectQuery = "SELECT `user_mfa` FROM `users` WHERE `user_id` = :userId";
                            $stmt = $pdo->prepare($selectQuery);
                            $stmt->execute(['userId' => $user_id]);

                            $userMfa = $stmt->fetchColumn();

                            if ($userMfa == "Disabled") {
                                echo '<input class="updatebtn" type="submit" name="enable_mfa" value="Enable MFA">';
                            }else if ($userMfa == "Enabled") {
                                echo '<input class="updatebtn" type="submit" name="disable_mfa" value="Disable MFA">';
                            }
                        ?>

                    </div>
                </form>

                <form method="post" action="customer-account-update-password.php" onsubmit="return validatePassword()">
                    <h2>Change Password</h2>
                    <div id="accountpass">
                        <div class="info">
                            <label for="old_pass">Old Password:</label>
                            <input type="password" id="old_pass" name="old_pass" value="" placeholder="Enter Old Password" required pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{6,}$" title="Password must be at least 6 characters long and contain at least one letter, one number, and one special character.">
                        </div>
                        <div class="info">
                            <label for="new_pass">New Password:</label>
                            <input type="password" id="new_pass" name="new_pass" value="" placeholder="Enter New Password" required pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{6,}$" title="Password must be at least 6 characters long and contain at least one letter, one number, and one special character.">
                        </div>
                        <div class="info">
                            <label for="cnew_pass">Confirm New Password:</label>
                            <input type="password" id="cnew_pass" name="cnew_pass" value="" placeholder="Confirm New Password" required pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{6,}$" title="Password must be at least 6 characters long and contain at least one letter, one number, and one special character.">
                        </div>
                        <div class="updatediv">
                            <input class="updatebtn" type="submit" value="Update Password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="addresses" role="tabpanel" aria-labelledby="addresses-tab">
                <h2>My Addresses</h2>
                <?php foreach ($resultAddresses as $address) { ?>
                    <div class="address">
                        <p>Address Name: <?php echo $address['uaddress_name']; ?></p>
                        <p>House Number: <?php echo $address['uaddress_house_num']; ?></p>
                        <p>Street: <?php echo $address['uaddress_street']; ?></p>
                        <p>Barangay: <?php echo $address['uaddress_brgy']; ?></p>
                        <p>City: <?php echo $address['uaddress_city']; ?></p>
                        <p>Landmark: <?php echo $address['uaddress_landmark']; ?></p>
                        <form method="post" action="customer-account-archive-address.php" onsubmit="return confirm('Are you sure you want to archive this address?');">
                            <input type="hidden" name="address_id" value="<?php echo $address['uaddress_id']; ?>">
                            <button type="submit" class="btn-archive">Delete</button>
                        </form>
                    </div>
                <?php } ?>
            </div>

            <div class="tab-pane fade" id="add-address" role="tabpanel" aria-labelledby="add-address-tab">

                <form method="post" action="customer-account-add-address.php">
                                    <h2>Add New Address</h2>
                    <div class="info">
                        <label for="region">Region</label>
                        <select id="region" name="region"></select>
                        <input type="hidden" name="region_text" id="region-text">
                    </div>
                    <div class="info">
                        <label for="province">Province</label>
                        <select id="province" name="province"></select>
                        <input type="hidden" name="province_text" id="province-text">
                    </div>
                    <div class="info">
                        <label for="city">City</label>
                        <select id="city" name="city"></select>
                        <input type="hidden" name="city_text" id="city-text">
                    </div>
                    <div class="info">
                        <label for="barangay">Barangay</label>
                        <select id="barangay" name="barangay"></select>
                        <input type="hidden" name="barangay_text" id="barangay-text">
                    </div>
                    <div class="info">
                        <label for="address_name">Address Name</label>
                        <input type="text" id="address_name" name="address_name" required>
                    </div>
                    <div class="info">
                        <label for="house_num">House Number</label>
                        <input type="text" id="house_num" name="house_num">
                    </div>
                    <div class="info">
                        <label for="street">Street</label>
                        <input type="text" id="street" name="street" required>
                    </div>
                    <div class="info">
                        <label for="landmark">Landmark</label>
                        <input type="text" id="landmark" name="landmark">
                    </div>
                    <div class="updatediv">
                        <input class="updatebtn" type="submit" value="Add Address">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('components/footer.php'); ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const toggleIcon = document.getElementById('toggleIcon');
    const mfaToggle = document.getElementById('mfaToggle');
    const mfaForm = document.getElementById('mfaForm');

    toggleIcon.addEventListener('click', () => {
        mfaToggle.checked = !mfaToggle.checked;
        toggleIcon.classList.toggle('fa-toggle-on');
        toggleIcon.classList.toggle('fa-toggle-off');
    });

    mfaForm.addEventListener('submit', (event) => {
        // Form will be submitted with mfaToggle state
        if (mfaToggle.checked) {
            mfaToggle.value = "on";
        } else {
            mfaToggle.value = "off";
        }
    });
});

        var my_handlers = {
            fill_provinces: function () {
                var region_code = $(this).val();
                var region_text = $(this).find("option:selected").text();
                $('#region-text').val(region_text);
                $('#province-text').val('');
                $('#city-text').val('');
                $('#barangay-text').val('');

                let dropdown = $('#province');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
                dropdown.prop('selectedIndex', 0);

                let city = $('#city');
                city.empty();
                city.append('<option selected="true" disabled></option>');
                city.prop('selectedIndex', 0);

                let barangay = $('#barangay');
                barangay.empty();
                barangay.append('<option selected="true" disabled></option>');
                barangay.prop('selectedIndex', 0);

                var url = 'address-api/ph-json/province.json';
                $.getJSON(url, function (data) {
                    var result = data.filter(function (value) {
                        return value.region_code == region_code;
                    });
                    result.sort(function (a, b) {
                        return a.province_name.localeCompare(b.province_name);
                    });
                    $.each(result, function (key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
                    })
                });
            },
            fill_cities: function () {
                var province_code = $(this).val();
                var province_text = $(this).find("option:selected").text();
                $('#province-text').val(province_text);
                $('#city-text').val('');
                $('#barangay-text').val('');

                let dropdown = $('#city');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose city/municipality</option>');
                dropdown.prop('selectedIndex', 0);

                let barangay = $('#barangay');
                barangay.empty();
                barangay.append('<option selected="true" disabled></option>');
                barangay.prop('selectedIndex', 0);

                var url = 'address-api/ph-json/city.json';
                $.getJSON(url, function (data) {
                    var result = data.filter(function (value) {
                        return value.province_code == province_code;
                    });
                    result.sort(function (a, b) {
                        return a.city_name.localeCompare(b.city_name);
                    });
                    $.each(result, function (key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
                    })
                });
            },
            fill_barangays: function () {
                var city_code = $(this).val();
                var city_text = $(this).find("option:selected").text();
                $('#city-text').val(city_text);
                $('#barangay-text').val('');

                let dropdown = $('#barangay');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose barangay</option>');
                dropdown.prop('selectedIndex', 0);

                var url = 'address-api/ph-json/barangay.json';
                $.getJSON(url, function (data) {
                    var result = data.filter(function (value) {
                        return value.city_code == city_code;
                    });
                    result.sort(function (a, b) {
                        return a.brgy_name.localeCompare(b.brgy_name);
                    });
                    $.each(result, function (key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
                    })
                });
            },
            onchange_barangay: function () {
                var barangay_text = $(this).find("option:selected").text();
                $('#barangay-text').val(barangay_text);
            },
        };

        $(function () {
            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);
            $('#barangay').on('change', my_handlers.onchange_barangay);

            let dropdown = $('#region');
            dropdown.empty();
            dropdown.append('<option selected="true" disabled>Choose Region</option>');
            dropdown.prop('selectedIndex', 0);
            const url = 'address-api/ph-json/region.json';
            $.getJSON(url, function (data) {
                $.each(data, function (key, entry) {
                    dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
                })
            });
        });
    </script>
</body>

</html>
