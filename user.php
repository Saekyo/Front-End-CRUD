<?php

include "config/koneksi.php";
include "library/oop.php";

$go = new oop();
$table = 'login';

@$password = base64_encode($_POST['pass']);

$field = array(
    'username' => @$_POST['user'],
    'password' => @$password
);
$redirect = "?menu=addUser";
@$where = "id = $_GET[id]";

if (isset($_POST['simpan'])) {
    $go->simpan($con, $table, $field, $redirect);
}

if (isset($_GET['hapus'])) {
    $go->hapus($con, $table, $where, $redirect);
}

if (isset($_GET['edit'])) {
    $edit = $go->edit($con, $table, $where);
}

if (isset($_POST['ubah'])) {
    $go->ubah($con, $table, $field, $where, $redirect);
}

?>


<body>
    <div class="container">
        <form method="post">
             <table id="table-id" class="table table-striped table-bordered" style="width:100%"> 
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = $go->tampil($con, $table);
                    $no = 0;
                    if ($data == "") {
                        echo "<tr><td colspan='4'>No Data</td></tr>";
                    } else {
                        foreach ($data as $r) {
                            $no++

                    ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r['username'] ?></td>
                                <td><?php echo $r['password'] ?></td>
                                <td class="text-center"><a class="btn btn-danger mr-2" href="?menu=addUser&hapus&id=<?php echo $r['id'] ?>" onclick="return confirm('Hapus Data?')">Delete</a> <span><a class="btn btn-primary ml-2" href="?menu=addUser&edit&id=<?php echo $r['id'] ?>">Edit</a></span></td>
                                
                            </tr>
                    <?php }
                    } ?>

                </tbody>
                <tfoot>
                    <td></td>
                    <td>
                        <input class="form-control" placeholder="Username" id="formUsername" type="text" name="user" value="<?php echo @$edit['username'] ?>" required>
                    </td>
                    <td>
                        <input class="form-control" placeholder="Password" id="formPassword" type="text" name="pass" value="<?php echo base64_decode(@$edit['password']) ?>" required>
                    </td>
                    <td colspan="2" class="text-center">
                        <?php if (@$_GET['id'] == "") { ?>
                            <input class="btn btn-success" type="submit" name="simpan" value="Save Data">
                        <?php } else { ?>
                            <input class="btn btn-success" type="submit" name="ubah" value="Edit Data">
                        <?php } ?>
                    </td>
                </tfoot>
            </table>
        </form>
    </div>
</body>
