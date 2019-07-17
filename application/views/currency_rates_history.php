<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/styles/style.css">
    <!--              Import font from Google                        -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>
<body>
<div class="header">
    <div class="container">
        <ul class="header-nav">
            <li><a href="/"> Main page </a></li>
        </ul>
    </div>

</div>
<div class="main">
    <div class="table-container">
        <table class="table">
            <tr>
                <th>Currency</th>
                <th>Sell Rate</th>
                <th>Buy Rate</th>
                <th>Date</th>
            </tr>
            <?php foreach ($rates as $item): ?>
                <tr>
                    <td><?php echo $item->code; ?> </td>
                    <td><?php echo $item->sell_rate; ?> </td>
                    <td><?php echo $item->buy_rate; ?> </td>
                    <td><?php echo $item->datetime; ?> </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>