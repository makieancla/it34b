<?php
require_once __DIR__ . '/../config/config.php';

$user_ID = $_SESSION['user_id'] ?? null;
$user_email = $_SESSION['user_email'] ?? null;

$buttons = [
    'login'              => '#3498db',
    'logout'             => '#9b59b6',
    'create Record'      => '#2ecc71',
    'Update Record'      => '#f39c12',
    'Delete Record'      => '#e74c3c',
    'View Record'        => '#1abc9c',
    'Upload File'        => '#34495e',
    'Download'           => '#16a085',
    'Search'             => '#d35400',
    'Generate Report'    => '#8e44ad',
];

?>



<table border="1" cellpadding="10">
    <tr>
        <th>Action</th>
        <th>Log Activity</th>
    </tr>

    <?php foreach ($buttons as $button => $color): ?>
        <tr>
            <td><?= htmlspecialchars($button) ?></td>
            <td>

                <form method="POST">
                    <input type="hidden" name="action" value="<?= htmlspecialchars($button) ?>">
                    <button type="submit" style="background: <?= $color ?>;">Test</button>
                </form>

            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? "test_activity";

    $status = random_int(0, 1) === 1 ? 'Success' : 'Failed';

    $success = logActivity(
        $pdo,
        $user_ID,
        $user_email,
        $action,
        $status
    );

    if ($success) {
        echo "<p>Activity: " . htmlspecialchars($action) .
            " Status: " . htmlspecialchars($status) .
            " logged successfully.</p>";
    } else {
        echo "<p>Failed to log activity.</p>";
    }
}   