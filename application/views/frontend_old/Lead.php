<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leads</title>
</head>
<body>
    <h1>Leads</h1>

    <?php if (isset($leads['error'])): ?>
        <p>Error: <?= $leads['error']; ?></p>
    <?php else: ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Field Data</th>
                <th>Created Time</th>
            </tr>
            <?php foreach ($leads as $lead): ?>
                <tr>
                    <td><?= $lead['id']; ?></td>
                    <td>
                        <?php foreach ($lead['field_data'] as $field): ?>
                            <?= $field['name']; ?>: <?= $field['values'][0]; ?><br>
                        <?php endforeach; ?>
                    </td>
                    <td><?= $lead['created_time']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
