<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Phone book</title>
    <link href="/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</head>

<body>
    <div class="page-wrapper">
        <nav>
            <div class="nav-wrapper container  ">
                <a class="brand-logo center">Phone book</a>
                <div class="right hide-on-med-and-down">
                    <a href="/" class="waves-effect waves-light btn">Sing out</a>
                </div>
            </div>
        </nav>

        <div class="card">
            <div class="card-tabs container">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a href="#users">Public Phonebook</a></li>
                    <li class="tab"><a class="active" href="#contact">My contact</a></li>
                </ul>
            </div>
            <div class="container">
                <div class="card-content">

                    <?php include ROOT . '/views/publicPhonebook.php'; ?>

                    <div id="contact">

                        <form method="post" user-id="<?php echo ($user['id']); ?>" action="/update/updateUser/<?php echo ($user['id']); ?>">
                            <table class="card">
                                <thead class>
                                    <tr>
                                        <th><i class="material-icons">location_city</i>
                                            <h5>Address</h5>
                                        </th>
                                        <th><i class="material-icons">contact_phone</i>
                                            <h5>Number</h5>
                                        </th>
                                        <th><i class="material-icons">contact_mail</i>
                                            <h5>Email</h5>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <ul class="collection">
                                                <li class="collection-item">
                                                    <div class="input-fieldx">
                                                        <i class="secondary-content"><label><span>First name*</span></label></i>
                                                        <input type="text" name="first_name" placeholder="" value=<?php echo $user['first_name']; ?> type="text" />
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="collection">
                                                <li class="collection-item">
                                                    <div class="input-fieldx">
                                                        <i class="secondary-content"><label><span>Second name*</span></label></i>
                                                        <input type="text" name="last_name" placeholder="" value=<?php echo $user['last_name']; ?> type="text" />
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="collection">
                                                <li class="collection-item">
                                                    <div class="input-fieldx">
                                                        <i class="secondary-content"><label><span>City</span></label></i>
                                                        <input type="text" name="city" placeholder="" value=<?php echo $user['city']; ?> type="text" />
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="collection">
                                                <li class="collection-item">
                                                    <div class="input-fieldx">
                                                        <i class="secondary-content"><label><span>Address</span></label></i>
                                                        <input type="text" name="address" placeholder="" value=<?php echo $user['address']; ?> type="text" />
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul>
                                                <div class="browser-default">
                                                    <label>Country</label>
                                                    <select name="country">
                                                        <option value="" disabled selected><?php echo $user['country']; ?></option>
                                                        <?php foreach ($countriesList as $countryList) : ?>
                                                            <option value="<?php echo $countryList['country']; ?>">
                                                                <?php echo $countryList['country']; ?>
                                                            </option>
                                                        <?php endforeach; ?>

                                                    </select>
                                                </div>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="collection">
                                                <li class="collection-item">
                                                    <h5>Add Number</h5>
                                                    <input id="new_number" type="text" class="text" value="">
                                                    <a id="add_number" class="btn-floating btn-large waves-effect waves-teal"><i class="material-icons">add</i></a>
                                                </li>
                                            </ul>
                                            <div id="ajaxNumber"></div>
                                            <?php foreach ($userNumbers as $contactNumber) : ?>
                                                <ul class="collection">
                                                    <li class="collection-item">
                                                        <div class="input-fieldx">
                                                            <i class="secondary-content">

                                                                <input type="hidden" name="num_cbx[<?php echo ($contactNumber['id']) ?>]" value="0">
                                                                <input type="checkbox" id="num_cbx<?php echo ($contactNumber['id']) ?>" name="num_cbx[<?php echo ($contactNumber['id']) ?>]" <?php if ($contactNumber['public_status'] == 1) echo "checked='checked'"; ?>>
                                                                <label for="num_cbx<?php echo ($contactNumber['id']) ?>" class="check">
                                                                    <span>Publish field</span>
                                                                </label>
                                                            </i>
                                                            <input type="text" name="num[<?php echo ($contactNumber['id']) ?>]" placeholder="" value=<?php echo ($contactNumber['number']) ?> type="text" />
                                                        </div>
                                                    </li>
                                                </ul>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <ul class="collection">
                                                <li class="collection-item">
                                                    <h5>Add Email</h5>
                                                    <input id="new_email" type="text" class="text" value="">
                                                    <a id="add_email" class="btn-floating btn-large waves-effect waves-teal"><i class="material-icons">add</i></a>
                                                </li>
                                            </ul>
                                            <div id="ajaxEmail"></div>
                                            <?php foreach ($userEmails as $contactEmail) : ?>
                                                <ul class="collection">
                                                    <li class="collection-item">
                                                        <div class="input-fieldx">
                                                            <i class="secondary-content">
                                                                <input type="hidden" name="email_cbx[<?php echo ($contactEmail['id']) ?>]" value="0">
                                                                <input type="checkbox" id="email_cbx<?php echo ($contactEmail['id']) ?>" name="email_cbx[<?php echo ($contactEmail['id']) ?>]" <?php if ($contactEmail['public_status'] == 1) echo "checked='checked'"; ?>>
                                                                <label for="email_cbx<?php echo ($contactEmail['id']) ?>" class="check">
                                                                    <span>Publish field</span>
                                                                </label>
                                                            </i>
                                                            <input type="text" name="email[<?php echo ($contactEmail['id']) ?>]" placeholder="" value=<?php echo ($contactEmail['email']) ?> type="text" />
                                                        </div>
                                                    </li>
                                                </ul>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <br /><br />

                                <div class="waves-effect waves-light teal btn">
                                    <input type="submit" name="submit" value="SAVE" />
                                </div>

                                <br /><br />

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="/js/main.js"></script>



</body>