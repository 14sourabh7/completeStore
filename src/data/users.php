<?php
$users = array(
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    ),
    array(
        'user_id' => '101',
        'user_name' => 'abc',
        'password' => '12345',
        'name' => 'xyz',
        'email' => 'xyz@mail.com',
        'role' => 'customer'
    )
);


if (isset($_POST)) {
    switch ($_POST['action']) {
        case 'getAll':
            echo json_encode($users);
            break;
        case 'getUser':
            echo json_encode($users[$_POST['id']]);
            break;
    }
}
