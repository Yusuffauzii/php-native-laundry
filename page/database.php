<?php
class database{

    //Koneksi Ke Database
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "laundry";
    var $koneksi = "";
    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->username,
         $this->password, $this->database);
         if (mysqli_connect_error()){
             echo "Koneksi database gagal: ", mysqli_connect_error();
         }
    }

    //----PELANGGAN-----//
    //meneampilkan data
    function tampil_data(){
        $data = mysqli_query($this->koneksi, "select*from tb_pelanggan");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    function hitung_pelanggan(){
        $data = mysqli_query($this->koneksi, "select*from tb_pelanggan");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        $conn = count($hasil);
        echo $conn;
    }
    function tambah_data($id_pelanggan, $nm_pel,  $alamat, $hp){
        mysqli_query($this->koneksi,"insert into tb_pelanggan values('$id_pelanggan', '$nm_pel', '$alamat', '$hp')");  
    }
    function get_by_id($id_pelanggan)
    {
        $query = mysqli_query($this->koneksi, "select * from tb_pelanggan where id_pelanggan='$id_pelanggan' ");
        return $query->fetch_array();
    }
    function update_data($id_pelanggan, $nm_pel,  $alamat, $hp )
    {
        $query = mysqli_query($this->koneksi,"update tb_pelanggan set nm_pel='$nm_pel', alamat='$alamat', hp='$hp' where id_pelanggan='$id_pelanggan'");
    }
    function delete_data($id_pelanggan)
    {
      $query = mysqli_query($this->koneksi,"delete from tb_pelanggan where id_pelanggan='$id_pelanggan'");  
    }
    function cek_data($nm_user,$password)
    {
        
        $query = mysqli_query($this->koneksi,"select * from tb_user where nm_user='$nm_user' and password='$password'");
        $jum = mysqli_num_rows($query);
        if ($jum > 0)
        {
            header('location:../tampil.php');
        }
        else 
        {
            header('location:index.php');
        }
    }

    //----PAKET-----//
    //meneampilkan data
    function tampil_data_paket(){
        $data = mysqli_query($this->koneksi, "select*from tb_paket");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    function hitung_paket(){
        $data = mysqli_query($this->koneksi, "select*from tb_paket");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        $conn = count($hasil);
        echo $conn;
    }  
    function tambah_data_paket($id_paket, $nm_paket,  $harga){
        mysqli_query($this->koneksi,"insert into tb_paket values('$id_paket', '$nm_paket', '$harga')");  
    }function get_by_paket($id_paket)
    {
        $query = mysqli_query($this->koneksi, "select * from tb_paket where id_paket='$id_paket' ");
        return $query->fetch_array();
    }
    function update_data_paket($id_paket, $nm_paket,  $harga)
    {
        $query = mysqli_query($this->koneksi,"update tb_paket set nm_paket='$nm_paket', harga='$harga' where id_paket='$id_paket'");
    }
    function delete_data_paket($id_paket)
    {
      $query = mysqli_query($this->koneksi,"delete from tb_paket where id_paket='$id_paket'");  
    }

    //----KASIR-----//
    //meneampilkan data
    function tampil_data_kasir(){
        $data = mysqli_query($this->koneksi, "select*from tb_user");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    function hitung_kasir(){
        $data = mysqli_query($this->koneksi, "select*from tb_user");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        $conn = count($hasil);
        echo $conn;
    } 
    function tambah_data_kasir($id_user, $nm_user,  $password, $level){
        mysqli_query($this->koneksi,"insert into tb_user values('$id_user', '$nm_user', '$password','$level')");  
    }function get_by_kasir($id_user)
    {
        $query = mysqli_query($this->koneksi, "select * from tb_user where id_user='$id_user' ");
        return $query->fetch_array();
    }
    function update_data_kasir($id_user, $nm_user,  $password, $level)
    {
        $query = mysqli_query($this->koneksi,"update tb_user set nm_user='$nm_user', password='$password', level='$level' where id_user='$id_user'");
    }
    function delete_data_kasir($id_user)
    {
      $query = mysqli_query($this->koneksi,"delete from tb_user where id_user='$id_user'");  
    }

    //----TRANSAKSI-----//
    //meneampilkan data
    function tampil_data_tran(){
        $data = mysqli_query($this->koneksi, "select tb_transaksi.id_transaksi, tb_pelanggan.nm_pel, tb_user.nm_user, tb_paket.nm_paket,
                             tb_transaksi.tgl_transaksi, tb_transaksi.harga, tb_transaksi.jml_kilo, tb_transaksi.total from
                             tb_transaksi join tb_pelanggan on tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan
                            join tb_user on tb_transaksi.id_user 
                             = tb_user.id_user join tb_paket on tb_transaksi.id_paket = tb_paket.id_paket");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
        
    }
    function hitung_tran(){
        $data = mysqli_query($this->koneksi, "select*from tb_transaksi");
        while($row = mysqli_fetch_array($data)){
            $hasil[] = $row;
        }
        $conn = count($hasil);
        echo $conn;
    
    } 
    function hitung(){
        $i= 0;
        $data = mysqli_query($this->koneksi, "select*from tb_transaksi");
        while($row = mysqli_fetch_array($data)){
            $i++;
            $hasil[$i] = $row['total'];
           
        }
        echo array_sum($hasil);

    } 
    function tambah_data_tran($id_transaksi,$id_user, $id_pelanggan, $id_paket, $tgl_transaksi, $harga, $jml_kilo,$total){
        mysqli_query($this->koneksi,"insert into tb_transaksi values('$id_transaksi','$id_user','$id_pelanggan','$id_paket','$tgl_transaksi', '$harga', '$jml_kilo',$total)");  
    }function get_by_tran($id_transaksi)
    {
        $query = mysqli_query($this->koneksi, "select * from tb_transaksi where id_transaksi='$id_transaksi' ");
        return $query->fetch_array();
    }
    function update_data_tran($id_transaksi, $id_pelanggan, $id_paket, $tgl_transaksi, $harga, $jml_kilo,$total)
    {
        $query = mysqli_query($this->koneksi,"update tb_transaksi set id_pelanggan='$id_pelanggan', id_paket'$id_paket', tgl_transaksi='$tgl_transaksi', harga='$harga', jml_kilo='$jml_kilo',total='$total' where id_transaksi='$id_transaksi'");
    }
    function delete_data_tran($id_transaksi)
    {
      $query = mysqli_query($this->koneksi,"delete from tb_transaksi where id_transaksi='$id_transaksi'");  
    }
    
    


    


    //----LOGIN----//

    
    
    
}
?>