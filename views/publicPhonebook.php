<div id="users">
    <?php foreach ($users as $usersItem) : ?>
        <ul class="collapsible popout">
            <li>
                <div class="collapsible-header">
                    <i class="material-icons">account_circle</i>
                    <?php echo $usersItem['first_name'] . ' ' . $usersItem['last_name']; ?>
                </div>
                <div class="collapsible-body">
                    <table class="container">
                        <thead>
                            <tr>
                                <th><i class="material-icons">location_city</i>Address</th>
                                <th><i class="material-icons">contact_phone</i>Number</th>
                                <th><i class="material-icons">contact_mail</i>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul>
                                        <li><?php echo $usersItem['address']; ?></li>
                                        <li><?php echo $usersItem['city']; ?></li>
                                        <li><?php echo $usersItem['country']; ?></li>
                                    </ul>
                                </td>
                                <td>
                                    <?php $numbers = explode(",", $usersItem['numbers']);
                                    foreach ($numbers as $number) : ?>
                                        <ul>
                                            <li>
                                                <?php echo ($number); ?>
                                            </li>
                                        </ul>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php $emails = explode(",", $usersItem['emails']);
                                    foreach ($emails as $email) : ?>
                                        <ul>
                                            <li>
                                                <?php echo ($email); ?>
                                            </li>
                                        </ul>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </li>
        </ul>
    <?php endforeach; ?>
</div>