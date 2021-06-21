<?php


class oop{
        
        function login($con, $table, $username, $password, $redirect){
            
            session_start();
            
            $sql = "SELECT * FROM $table WHERE username='$username' AND password='$password'";
            
            $jalan = mysqli_query($con, $sql);
            
            $cek = mysqli_num_rows($jalan);          
            
            if($cek > 0){
                $_SESSION['user']=$username;
                echo "<script>
                alert('Welcome $username');
                document.location.href='$redirect';
                </script>";
            }
            
            else{
                echo "<script>
                alert('Login failed, please check your username and password');
                document.location.href='index.php';
                </script>";
            }
        }

        
        function simpan($con, $table, array $field, $redirect){
                    
            $sql = "INSERT INTO $table SET ";   
            foreach($field as $key => $value){
                $sql.=" $key = '$value',";
            }

            $sql = rtrim($sql, ',');            
            $jalan = mysqli_query($con, $sql);

            if($jalan){
                echo "<script>
                alert('Data successfully saved');
                document.location.href='$redirect';
                </script>";
            }
            
            else{
                echo "<script>
                alert('Data was not saved successfully');
                document.location.href='$redirect';
                </script>";
            }
        }

        //NEW CONTROLLER
        function buat($con, $table, array $field){
                    
            $sql = "INSERT INTO $table SET ";   
            foreach($field as $key => $value){
                $sql.=" $key = '$value',";
            }

            $sql = rtrim($sql, ',');            
            $jalan = mysqli_query($con, $sql);

            if($jalan){
                echo "<script>
                alert('Data successfully saved');
                document.location.href='index.php';
                </script>";
            }
            
            else{
                echo "<script>
                alert('Data was not saved successfully');
                document.location.href='index.php';
                </script>";
            }
        }

        function tampil($con, $table){
            $sql = "SELECT * FROM $table";
            $jalan = mysqli_query($con, $sql);
            while($data = mysqli_fetch_assoc($jalan))
                $isi[] = $data;
                return @$isi;
        }

        
        function hapus($con, $tabel, $where, $redirect){
            $sql = "DELETE FROM $tabel WHERE $where";
            $jalan = mysqli_query($con, $sql);
            if($jalan){
                echo "<script>alert('Data deleted successfully');document.location.href='$redirect'</script>";
            }else{
                echo "<script>alert('Data failed to deleted');document.location.href='$redirect'</script>";
            }
        }

        
        function edit($con, $tabel, $where){
            $sql = "SELECT * FROM $tabel WHERE $where";
            $jalan = mysqli_query($con, $sql);
            $tampung = mysqli_fetch_assoc($jalan);
            return $tampung;
        }

         
        function ubah($con, $tabel, array $field, $where, $redirect){
            $sql = "UPDATE $tabel SET ";
            foreach($field as $key => $value){
                $sql.= " $key = '$value',";
            }
            $sql = rtrim($sql, ',');
            $sql.= " WHERE $where";
            $jalan = mysqli_query($con, $sql);

            if($jalan){
                echo "<script>alert('Data changed successfully');document.location.href='$redirect'</script>";
            }else{
                echo "<script>alert('Data failed to change');document.location.href='$redirect'</script>";
            }
        }

}
?>