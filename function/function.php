<?php 
     $koneksi=mysqli_connect("localhost","root","","marvee");

    function data($query,$nama_tabel){
        global $koneksi;
        $result = mysqli_query($koneksi,$query." ".$nama_tabel);
        $rows=[];
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }

    function rupiah($nilai){
        return "Rp".number_format($nilai);
    }

    function hapus($nama_tabel){
        global $koneksi;
        mysqli_query($koneksi,"DELETE FROM"." "."$nama_tabel");
        return mysqli_affected_rows($koneksi);
    }

    function ubah_kategori($data){
        global $koneksi;
        $nama_kategori=htmlspecialchars($data["kategori"]);
        $keterangan=htmlspecialchars($data["keterangan"]);
        $kategori_id=htmlspecialchars($data["kategori_id"]);

        $nama_gambar = $_FILES["gambar"]["name"];
        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $ukuran = $_FILES["gambar"]["size"];

        if($ukuran === 2000000){
            echo "
                <script>
                    alert('Admin ganteng filenya terlalu besar');
                </script>;
            ";
            return false;
        }

        
        $data=data("SELECT gambar_kategori FROM","kategori WHERE kategori_id='$kategori_id'");

        if($nama_gambar || $tmp_name || $ukuran){
            foreach($data as $d){
            
                $hapus_file=unlink("images/barang/".$d["gambar_kategori"]);
    
                if($hapus_file == true){
                    $nama_gambar=strtolower($nama_gambar);
                    move_uploaded_file($tmp_name,"images/barang/".$nama_gambar);
                    mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$nama_kategori',keterangan='$keterangan',gambar_kategori='$nama_gambar' WHERE kategori_id = '$kategori_id' ");       
                }
    
            }
        }else{
            foreach($data as $d){
                $gambar_lama=$d["gambar_kategori"];
                mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$nama_kategori',keterangan='$keterangan',gambar_kategori='$gambar_lama' WHERE kategori_id = '$kategori_id' ");
            }
                   
        }
        

        return mysqli_affected_rows($koneksi);
    }

    function tambah_kategori($data){

        global $koneksi;
        $nama_kategori=htmlspecialchars($data["kategori"]);
        $keterangan=htmlspecialchars($data["keterangan"]);
        
        $nama_gambar = $_FILES["gambar"]["name"];
        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $ukuran = $_FILES["gambar"]["size"];
        $error = $_FILES["gambar"]["error"];

        if($error === 4){
            echo "
            <script>
                alert('Upload gambar dulu ya Admin ganteng');
            </script>;
        ";
        return false;
        }

        if($ukuran === 1000000){
            echo "
                <script>
                    alert('Admin ganteng filenya terlalu besar');
                </script>;
            ";
            return false;
        }
        $ekstensi_file_valid=["jpg","png","jpeg"];
        $ekstensi_file = explode(".",$nama_gambar);
        $ekstensi_file = strtolower(end($ekstensi_file));

        if(!in_array($ekstensi_file,$ekstensi_file_valid)){
            echo "
            <script>
                alert('Yang anda masukkan bukan gambar admin gantengku');
            </script>;
        ";
        return false;
        }else{
            $nama_file_baru = uniqid();
            $nama_file_baru .=".".$ekstensi_file;
        }

        move_uploaded_file($tmp_name,"images/barang/".$nama_file_baru);
        mysqli_query($koneksi,"INSERT INTO kategori VALUES('','$nama_kategori','$keterangan','$nama_file_baru')");

        return mysqli_affected_rows($koneksi);
    }

    function tambah_barang($data){

        global $koneksi;
        $kategori_id=htmlspecialchars($data["kategori_id"]);
        $nama_barang=htmlspecialchars($data["nama_barang"]);
        $harga=htmlspecialchars($data["harga"]);
        $deskripsi=htmlspecialchars($data["deskripsi"]);
        $ukuran_baju=$data["ukuran"];

        $nama_gambar = $_FILES["gambar"]["name"];
        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $ukuran = $_FILES["gambar"]["size"];
        $error = $_FILES["gambar"]["error"];

        if($error === 4){
            echo "
            <script>
                alert('Upload gambar dulu ya Admin ganteng');
            </script>;
        ";
        return false;
        }

        if($ukuran === 1000000){
            echo "
                <script>
                    alert('Admin ganteng filenya terlalu besar');
                </script>;
            ";
            return false;
        }
        $ekstensi_file_valid=["jpg","png","jpeg"];
        $ekstensi_file = explode(".",$nama_gambar);
        $ekstensi_file = strtolower(end($ekstensi_file));

        if(!in_array($ekstensi_file,$ekstensi_file_valid)){
            echo "
            <script>
                alert('Yang anda masukkan bukan gambar admin gantengku');
            </script>;
        ";
        return false;
        }else{
            $nama_file_baru = uniqid();
            $nama_file_baru .=".".$ekstensi_file;
        }

        move_uploaded_file($tmp_name,"images/barang/".$nama_file_baru);
        
        mysqli_query($koneksi,"INSERT INTO barang VALUES ('','$kategori_id','$nama_barang','$harga','$deskripsi','$nama_file_baru')");
        
        $id_barang = data("SELECT barang_id FROM","barang ORDER BY barang_id DESC LIMIT 1");
        foreach($id_barang as $ib){
            $barang_id = $ib["barang_id"];
        }

        for($i=0; $i < count($ukuran_baju); $i++){
            mysqli_query($koneksi,"INSERT INTO barang_ukuran VALUES ($barang_id,$ukuran_baju[$i])");
        }

        return mysqli_affected_rows($koneksi);
    }

    function ubah_barang($data){
        global $koneksi;
        $kategori_id=htmlspecialchars($data["kategori_id"]);
        $barang_id=htmlspecialchars($data["barang_id"]);
        $nama_barang=htmlspecialchars($data["nama_barang"]);
        $harga=htmlspecialchars($data["harga"]);
        $deskripsi=htmlspecialchars($data["deskripsi"]);
        $ukuran_baju = !empty($data["ukuran"])?$data["ukuran"]:null;

        $nama_gambar = $_FILES["gambar"]["name"];
        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $ukuran = $_FILES["gambar"]["size"];

        if($ukuran === 2000000){
            echo "
                <script>
                    alert('Admin ganteng filenya terlalu besar');
                </script>;
            ";
            return false;
        }

        
        $gambar=data("SELECT gambar FROM","barang WHERE barang_id='$barang_id'");

        if($nama_gambar || $tmp_name || $ukuran){

            if($ukuran_baju){
                for($i=0; $i<count($ukuran_baju); $i++){
                    mysqli_query($koneksi,"UPDATE barang_ukuran SET barang_id = '$barang_id',ukuran_id='$ukuran_baju[$i]'");
                }
            }
            foreach($gambar as $g){
            
                $hapus_file=unlink("images/barang/".$g["gambar"]);
    
                if($hapus_file == "True"){
                    $nama_gambar=strtolower($nama_gambar);
                    move_uploaded_file($tmp_name,"images/barang/".$nama_gambar);
                    mysqli_query($koneksi,"UPDATE barang SET kategori_id='$kategori_id',nama_barang='$nama_barang',harga='$harga',deskripsi='$deskripsi',gambar='$nama_gambar' WHERE barang_id = '$barang_id' ");       
                }
    
            }
        }else{
            if(!empty($ukuran_baju)){
                mysqli_query($koneksi,"DELETE FROM barang_ukuran WHERE barang_id = '$barang_id'");
                for($i=0; $i<count($ukuran_baju); $i++){
                    mysqli_query($koneksi,"INSERT INTO barang_ukuran VALUES ($barang_id,$ukuran_baju[$i]");
                }
            }

            foreach($gambar as $g){
                $gambar_lama=$g["gambar"];
                mysqli_query($koneksi,"UPDATE barang SET kategori_id='$kategori_id',nama_barang='$nama_barang',harga='$harga',deskripsi='$deskripsi',gambar='$gambar_lama' WHERE barang_id = '$barang_id' ");

            }
                   
        }
        
        return mysqli_affected_rows($koneksi);
}

    function tambah_pengiriman($data){
        global $koneksi;
        $nama_pengiriman = htmlspecialchars($data["nama_pengiriman"]);
        $ongkir = htmlspecialchars($data["ongkir"]);

        mysqli_query($koneksi,"INSERT INTO pengiriman VALUES('','$nama_pengiriman','$ongkir')");

        return mysqli_affected_rows($koneksi);
    }

    function ubah_pengiriman($data){
        global $koneksi;
        $nama_pengiriman = htmlspecialchars($data["nama_pengiriman"]);
        $ongkir = htmlspecialchars($data["ongkir"]);
        $pengiriman_id = htmlspecialchars($data["pengiriman_id"]);

        mysqli_query($koneksi,"UPDATE pengiriman SET nama_pengiriman='$nama_pengiriman',ongkir='$ongkir' WHERE pengiriman_id='$pengiriman_id'");

        return mysqli_affected_rows($koneksi);
    }

    function tambah_provinsi($data){
        global $koneksi;
        $provinsi = htmlspecialchars($data['nama_provinsi']);
        mysqli_query($koneksi,"INSERT INTO provinsi VALUES('','$provinsi')");
        return mysqli_affected_rows($koneksi);
    }

    function ubah_provinsi($data){
        global $koneksi;
        $provinsi = htmlspecialchars($data["nama_provinsi"]);
        $provinsi_id= htmlspecialchars($data["provinsi_id"]);
        mysqli_query($koneksi,"UPDATE provinsi SET nama_provinsi='$provinsi' WHERE provinsi_id='$provinsi_id'");
        return mysqli_affected_rows($koneksi);
        
    }

    function tambah_rekening($data){
        global $koneksi;
        $jenis_rekening=htmlspecialchars($data["jenis_rekening"]);
        $nama_rekening=htmlspecialchars($data["nama_rekening"]);
        $nomor_rekening=htmlspecialchars($data["nomor_rekening"]);

        $nama_gambar = $_FILES["gambar"]["name"];
        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $ukuran = $_FILES["gambar"]["size"];
        $error = $_FILES["gambar"]["error"];

        if($error === 4){
            echo "
            <script>
                alert('Upload gambar dulu ya Admin ganteng');
            </script>;
        ";
        return false;
        }

        if($ukuran === 1000000){
            echo "
                <script>
                    alert('Admin ganteng filenya terlalu besar');
                </script>;
            ";
            return false;
        }
        $ekstensi_file_valid=["jpg","png","jpeg"];
        $ekstensi_file = explode(".",$nama_gambar);
        $ekstensi_file = strtolower(end($ekstensi_file));

        if(!in_array($ekstensi_file,$ekstensi_file_valid)){
            echo "
            <script>
                alert('Yang anda masukkan bukan gambar admin gantengku');
            </script>;
        ";
        return false;
        }else{
            $nama_file_baru = uniqid();
            $nama_file_baru .=".".$ekstensi_file;
        }

        move_uploaded_file($tmp_name,"images/bank/".$nama_file_baru);
        mysqli_query($koneksi,"INSERT INTO rekening VALUES('','$jenis_rekening','$nama_rekening','$nomor_rekening','$nama_file_baru')");

        return mysqli_affected_rows($koneksi);
    }

    function ubah_rekening($data){
        global $koneksi;
        $jenis_rekening=htmlspecialchars($data["jenis_rekening"]);
        $nama_rekening=htmlspecialchars($data["nama_rekening"]);
        $no_rekening=htmlspecialchars($data["no_rekening"]);
        $rekening_id=htmlspecialchars($data["rekening_id"]);

        $nama_gambar = $_FILES["gambar"]["name"];
        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $ukuran = $_FILES["gambar"]["size"];

        if($ukuran === 1000000){
            echo "
                <script>
                    alert('Admin ganteng filenya terlalu besar');
                </script>;
            ";
            return false;
        }

        
        $data=data("SELECT gambar FROM","rekening WHERE rekening_id='$rekening_id'");

        if($nama_gambar || $tmp_name || $ukuran){
            foreach($data as $d){
            
                $hapus_file=unlink("images/bank/".$d["gambar"]);
    
                if($hapus_file == "True"){
                    $nama_gambar=strtolower($nama_gambar);
                    move_uploaded_file($tmp_name,"images/bank/".$nama_gambar);
                    mysqli_query($koneksi,"UPDATE rekening SET jenis_rekening='$jenis_rekening',nama_rekening='$nama_rekening',no_rekening='$no_rekening',gambar='$nama_gambar' WHERE rekening_id = '$rekening_id' ");       
                }
    
            }
        }else{
            foreach($data as $d){
                $gambar_lama=$d["gambar"];
                mysqli_query($koneksi,"UPDATE rekening SET jenis_rekening='$jenis_rekening',nama_rekening='$nama_rekening',no_rekening='$no_rekening',gambar='$gambar_lama' WHERE rekening_id = '$rekening_id' ");      
            }
                   
        }
        

        return mysqli_affected_rows($koneksi);

    }

    function tambah_ukuran($data){
        global $koneksi;
        $nama_ukuran=htmlspecialchars($data["nama_ukuran"]);

        mysqli_query($koneksi,"INSERT INTO ukuran VALUES('','$nama_ukuran')");
        return mysqli_affected_rows($koneksi);
    }
    function ubah_ukuran($data){
        global $koneksi;
        $ukuran_id=htmlspecialchars($data["ukuran_id"]);
        $nama_ukuran=htmlspecialchars($data["nama_ukuran"]);

        mysqli_query($koneksi,"UPDATE ukuran SET nama_ukuran='$nama_ukuran' WHERE ukuran_id='$ukuran_id'");
        return mysqli_affected_rows($koneksi);
    }
    function ubah_status($data){
        global $koneksi;
        $pesanan_id=htmlspecialchars($data["pesanan_id"]);
        $status=htmlspecialchars($data["status"]);

        mysqli_query($koneksi,"UPDATE pesanan SET status='$status' WHERE pesanan_id='$pesanan_id'");
        return mysqli_affected_rows($koneksi);
    }
   ?>