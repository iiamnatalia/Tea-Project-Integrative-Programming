
<?php 
require ('database/connections/conx-customer.php');
$user_id = $_SESSION['user_id'];

$mfa_status = '';

if (isset($_POST['enable_mfa'])) {
    // Update MFA status
    $updateQuery = "UPDATE `users` SET `user_mfa` = 'Enabled' WHERE `user_id` = :user_id";
    $stmt = $pdo->prepare($updateQuery);
    $stmt->execute(['user_id' => $user_id]);
    $mfa_status = 'enabled';
} else if (isset($_POST['disable_mfa'])) {
    // Update MFA status
    $updateQuery = "UPDATE `users` SET `user_mfa` = 'Disabled' WHERE `user_id` = :user_id";
    $stmt = $pdo->prepare($updateQuery);
    $stmt->execute(['user_id' => $user_id]);
    $mfa_status = 'disabled';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MFA Status</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- MFA Status Modal -->
<div class="modal fade" id="mfaModal" tabindex="-1" aria-labelledby="mfaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mfaModalLabel">MFA Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($mfa_status === 'enabled'): ?>
                    MFA has been enabled successfully.
                <?php elseif ($mfa_status === 'disabled'): ?>
                    MFA has been disabled successfully.
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var mfaStatus = "<?php echo $mfa_status; ?>";
    $(document).ready(function(){
        if (mfaStatus === 'enabled' || mfaStatus === 'disabled') {
            $('#mfaModal').modal('show');
        }

        $('#mfaModal').on('hidden.bs.modal', function (e) {
            if (mfaStatus === 'enabled' || mfaStatus === 'disabled') {
                window.location.href = 'customer-account.php';
            }
        });
    });
</script>

</body>
</html>


