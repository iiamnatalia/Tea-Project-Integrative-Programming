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

    </style>


</head>

<body>
    <?php 
    include "components/header.php";

   $sqlProducts = "SELECT * FROM products WHERE prod_category != 'Add-Ons' LIMIT 12";
   $stmtProducts = $pdo->prepare($sqlProducts);
   $stmtProducts->execute();
   $resultProducts = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);

   $sqlAddresses = "SELECT `uaddress_id`, `user_id`, `uaddress_name`, `uaddress_type`, `uaddress_house_num`, `uaddress_street`, `uaddress_brgy`, `uaddress_city`, `uaddress_landmark`, `uaddress_added_at` FROM `user_addresses` WHERE user_id = :user_id AND uaddress_type = 'Saved'";
   $stmtAddresses = $pdo->prepare($sqlAddresses);
   $stmtAddresses->execute(['user_id' => $id]);
   $resultAddresses = $stmtAddresses->fetchAll(PDO::FETCH_ASSOC);
?>



    <div class="middle">
        <div class="container" id="sectioncont">
            <div id="profilecont">
                <h2>Account Profile</h2>
                <form method="post" action="customer-account-update-profile.php" enctype="multipart/form-data">
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
               <div id="profilecont">

                <h2>Change Password</h2>
                <p>
                    You need to verify your identity by entering your current password. Then, input your new desired password and confirm it. Finally, save the changes. <br>Use your new password to log in to your account from now on.
                </p>
                <form method="post" action="customer-account-update-password.php" onsubmit="return validatePassword()">
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
        </div>
        <div class="container" id="sectioncont">
            
            <div id="profilecont">
                                <h2>My Addresses</h2>
                <?php foreach ($resultAddresses as $address) { ?>
                    <div class="address">
                        <p>Address Name: <?php echo $address['uaddress_name']; ?></p>
                        <p>House Number: <?php echo $address['uaddress_house_num']; ?></p>
                        <p>Street: <?php echo $address['uaddress_street']; ?></p>
                        <p>Barangay: <?php echo $address['uaddress_brgy']; ?></p>
                        <p>City: <?php echo $address['uaddress_city']; ?></p>
                        <p>Landmark: <?php echo $address['uaddress_landmark']; ?></p>
                    </div>
                <?php } ?>
                
            </div>
        </div>
        <div class="container" id="sectioncont">
            <div id="profilecont">

                <form method="post" action="customer-account-add-address.php">
                    <h3>Add New Address</h3>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        /**
         * __________________________________________________________________
         *
         * Phillipine Address Selector
         * __________________________________________________________________
         *
         * MIT License
         * 
         * Copyright (c) 2020 Wilfred V. Pine
         * 
         * Permission is hereby granted, free of charge, to any person obtaining a copy
         * of this software and associated documentation files (the "Software"), to deal
         * in the Software without restriction, including without limitation the rights
         * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
         * copies of the Software, and to permit persons to whom the Software is
         * furnished to do so, subject to the following conditions:
         *
         * The above copyright notice and this permission notice shall be included in
         * all copies or substantial portions of the Software.
         *
         * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
         * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
         * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
         * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
         * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
         * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
         * THE SOFTWARE.
         *
         * @package Phillipine Address Selector
         * @name Wilfred V. Pine <only.master.red@gmail.com>
         * @copyright Copyright 2020 (https://dev.confired.com)
         * @link https://github.com/redmalmon/philippine-address-selector
         * @license https://opensource.org/licenses/MIT MIT License
         */

        var my_handlers = {
            // fill province
            fill_provinces: function () {
                //selected region
                var region_code = $(this).val();

                // set selected text to input
                var region_text = $(this).find("option:selected").text();
                let region_input = $('#region-text');
                region_input.val(region_text);
                //clear province & city & barangay input
                $('#province-text').val('');
                $('#city-text').val('');
                $('#barangay-text').val('');

                //province
                let dropdown = $('#province');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
                dropdown.prop('selectedIndex', 0);

                //city
                let city = $('#city');
                city.empty();
                city.append('<option selected="true" disabled></option>');
                city.prop('selectedIndex', 0);

                //barangay
                let barangay = $('#barangay');
                barangay.empty();
                barangay.append('<option selected="true" disabled></option>');
                barangay.prop('selectedIndex', 0);

                // filter & fill
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
            // fill city
            fill_cities: function () {
                //selected province
                var province_code = $(this).val();

                // set selected text to input
                var province_text = $(this).find("option:selected").text();
                let province_input = $('#province-text');
                province_input.val(province_text);
                //clear city & barangay input
                $('#city-text').val('');
                $('#barangay-text').val('');

                //city
                let dropdown = $('#city');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose city/municipality</option>');
                dropdown.prop('selectedIndex', 0);

                //barangay
                let barangay = $('#barangay');
                barangay.empty();
                barangay.append('<option selected="true" disabled></option>');
                barangay.prop('selectedIndex', 0);

                // filter & fill
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
            // fill barangay
            fill_barangays: function () {
                // selected barangay
                var city_code = $(this).val();

                // set selected text to input
                var city_text = $(this).find("option:selected").text();
                let city_input = $('#city-text');
                city_input.val(city_text);
                //clear barangay input
                $('#barangay-text').val('');

                // barangay
                let dropdown = $('#barangay');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose barangay</option>');
                dropdown.prop('selectedIndex', 0);

                // filter & Fill
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
                // set selected text to input
                var barangay_text = $(this).find("option:selected").text();
                let barangay_input = $('#barangay-text');
                barangay_input.val(barangay_text);
            },

        };


        $(function () {
            // events
            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);
            $('#barangay').on('change', my_handlers.onchange_barangay);

            // load region
            let dropdown = $('#region');
            dropdown.empty();
            dropdown.append('<option selected="true" disabled>Choose Region</option>');
            dropdown.prop('selectedIndex', 0);
            const url = 'address-api/ph-json/region.json';
            // Populate dropdown with list of regions
            $.getJSON(url, function (data) {
                $.each(data, function (key, entry) {
                    dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
                })
            });

        });
    </script>
</body>

</html>
