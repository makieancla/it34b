<?php
require_once 'config/config.php';

$user_ID = $_SESSION['user_id'] ?? null;
$user_email = $_SESSION['user_email'] ?? null;

$buttons = [
    'login',
    'logout',
    'create Record',
    'Update Record',
    'Delete Record',
    'View Record',
    'Upload File',
    'Download',
    'Serch',
    'Generate Report',
];

?>

<table border="1 cellpadding=" 10">
    <tr>
        <th>Action</th>
        <th>Log Activity</th>
    </tr>

    <?php foreach ($buttons as $button): ?>
        <tr>
            <td><?= htmlspecialchars($button) ?></td>
            <td>

                <form method="POST">
                    <input type="hidden" name="action" value="<?= htmlspecialchars($button) ?>">
                    <button type="submit">Test</button>
                </form>

            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? "test_activity";

    $status = random_int(0, 1) === 1 ? 'Success' : 'Failed';

    $succes = logActivity(
        $pdo,
        $user_ID,
        $user_email,
        $action,
        $status
    );

    if ($succes) {
        echo "<p>Activity: " . htmlspecialchars($action) .
            " Status: " . htmlspecialchars($status) .
            " logged successfully.</p>";
    } else {
        echo "<p>Failed to log activity.</p>";
    }
}

?>