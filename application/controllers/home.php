<?php

    class home extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            
            $this->load->model('model_data');
            $this->load->helper('url');
            $this->load->library('mypdf');

            session_start();

            if (!isset($_SESSION['username'])) 
            {
                $this->load->view('views_login');
            }
            
        }

        function logout()
        {
            session_start();
            session_destroy();

            redirect(base_url());
        }

        public function index()
        {
            if (isset($_SESSION['username']) && $_SESSION['username'] != 'Admin') 
            {
                $data['pohon'] = $this->model_data->tampil_data()->result();
                $this->load->view('views_tampil',$data);
            }
        }

        public function shop()
        {
            if (isset($_SESSION['username'])) 
            {
                $data['pohon'] = $this->model_data->shop_data()->result();
                $this->load->view('views_shop',$data);
            }
        }

        public function sellers()
        {
            if (isset($_SESSION['username'])) 
            {
                $data['petani'] = $this->model_data->sellers_data()->result();
                $this->load->view('views_sellers',$data);
            }
        }

        public function contact()
        {
            if (isset($_SESSION['username'])) 
            {
                $this->load->view('views_contact');
            }
        }

        public function shopSingle($id)
        {
            if (isset($_SESSION['username'])) 
            {
                $where = array('id' => $id);
                $data['pohon'] = $this->model_data->single_data($where,'tb_pohon')->result();
                $this->load->view('views_shopSingle',$data);
            }
        }

        public function sellerSingle($id)
        {
            if (isset($_SESSION['username'])) 
            {
                $where = array('id' => $id);
                $data['petani'] = $this->model_data->single_data($where,'tb_petani')->result();
                $this->load->view('views_sellerSingle',$data);
            }
        }

        public function adminViews()
        {
            if (isset($_SESSION['username'])) 
            {
                $this->load->view('views_adminBeranda');
            }
        }

        public function produk()
        {
            if (isset($_SESSION['username'])) 
            {
                $data['pohon'] = $this->model_data->pohon_data()->result();
                $this->load->view('views_produk',$data);
            }
        }

        public function penjual()
        {
            if (isset($_SESSION['username'])) 
            {
                $data['petani'] = $this->model_data->petani_data()->result();
                $this->load->view('views_petani',$data);
            }
        }

        public function tambahProduk()
        {
            if (isset($_SESSION['username'])) 
            {
                $data['petani'] = $this->model_data->sellers_data()->result();
                $this->load->view('views_inputProduk',$data);
            }
        }

        public function tambahPetani()
        {
            if (isset($_SESSION['username'])) 
            {
                $this->load->view('views_inputPetani');
            }
        }

        public function editProduk($id,$id_pemilik)
        {
            if (isset($_SESSION['username'])) 
            {
                $where = array('id' => $id);
                $data['pohon'] = $this->model_data->edit_data($where,'tb_pohon')->result();
                $data['petani'] = $this->model_data->sellers_data()->result();

                $wherePetani = array('id' => $id_pemilik);
                $data['pemilik_pohon'] = $this->model_data->single_data($wherePetani,'tb_petani')->result();
                $this->load->view('views_editProduk',$data);
            }
        }

        public function editPetani($id)
        {
            if (isset($_SESSION['username'])) 
            {
                $where = array('id' => $id);
                $data['petani'] = $this->model_data->edit_data($where,'tb_petani')->result();
                $this->load->view('views_editPetani',$data);
            }
        }

        function fusionChart()
        {
            $this->load->view('views_chartpetani');
        }

        function tambahAksiProduk()
        {
            $nama = $this->input->post('nama');
            $buah = $this->input->post('buah');
            $deskripsi = $this->input->post('deskripsi');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $id_pemilik = $this->input->post('id_pemilik');
            $gambar = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = './assets/images/produk/';

            move_uploaded_file($source, $folder.$gambar);
     
            $data = array(
                'nama' => $nama,
                'buah' => $buah,
                'deskripsi' => $deskripsi,
                'harga' => $harga,
                'stok' => $stok,
                'gambar' => $gambar,
                'id_pemilik' => $id_pemilik,
                );
            $this->model_data->input_data($data,'tb_pohon');
            redirect(site_url('home/produk'));
        }

        function tambahAksiPetani()
        {
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $gambar = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = './assets/images/penjual/';

            move_uploaded_file($source, $folder.$gambar);
     
            $data = array(
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'alamat' => $alamat,
                'email' => $email,
                'gambar' => $gambar,
                'no_hp' => $no_hp,
                );
            $this->model_data->input_data($data,'tb_petani');
            redirect(site_url('home/penjual'));
        }

        public function editAksiProduk()
        {
            $id =  $this->input->post('id');
            $nama = $this->input->post('nama');
            $buah = $this->input->post('buah');
            $deskripsi = $this->input->post('deskripsi');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $id_pemilik = $this->input->post('id_pemilik');
            $gambar = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = './assets/images/produk/';

            if ($gambar != '') 
            {
                move_uploaded_file($source, $folder.$gambar);
                $data = array(
                    'nama' => $nama,
                    'buah' => $buah,
                    'deskripsi' => $deskripsi,
                    'harga' => $harga,
                    'stok' => $stok,
                    'gambar' => $gambar,
                    'id_pemilik' => $id_pemilik,
                    );
            }
            else
            {
                $data = array(
                    'nama' => $nama,
                    'buah' => $buah,
                    'deskripsi' => $deskripsi,
                    'harga' => $harga,
                    'stok' => $stok,
                    'id_pemilik' => $id_pemilik,
                    );
            }

            $where = array
            (
                'id' => $id
            );

            $this->model_data->update_data($where,$data,'tb_pohon');
            redirect(site_url('home/produk'));
        }

        public function editAksiPetani()
        {
            $id =  $this->input->post('id');
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $id_pemilik = $this->input->post('no_hp');
            $gambar = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = './assets/images/penjual/';

            if ($gambar != '') 
            {
                move_uploaded_file($source, $folder.$gambar);
                $data = array(
                    'nama' => $nama,
                    'deskripsi' => $deskripsi,
                    'alamat' => $alamat,
                    'email' => $email,
                    'gambar' => $gambar,
                    );
            }
            else
            {
                $data = array(
                    'nama' => $nama,
                    'deskripsi' => $deskripsi,
                    'alamat' => $alamat,
                    'email' => $email,
                    );
            }

            $where = array
            (
                'id' => $id
            );

            $this->model_data->update_data($where,$data,'tb_petani');
            redirect(site_url('home/penjual'));
        }

        function hapusProduk($id)
        {
            $where = array('id' => $id);
            $this->model_data->hapus_data($where,'tb_pohon');
            redirect(site_url('home/produk'));
        }

        function hapusPetani($id)
        {
            $where = array('id' => $id);
            $this->model_data->hapus_data($where,'tb_petani');
            redirect(site_url('home/penjual'));
        }

        function hapusReview($id)
        {
            $where = array('id' => $id);
            $this->model_data->hapus_data($where,'tb_review');
            redirect(site_url('home/review'));
        }

        function update()
        {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $jumlah_pohon = $this->input->post('jumlah_pohon');
         
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'jumlah_pohon' => $jumlah_pohon
            );
         
            $where = array(
                'id' => $id
            );
         
            $this->model_data->update_data($where,$data,'petani');
            redirect(base_url());
        }

        public function import_excel_produk()
        {
            require './assets/vendor/autoload.php';
            
            if(isset($_POST['submit'])){
                $err ="";
                $ekstensi="";
                $success="";

                $file_name = $_FILES['filexls']['name'];
                $file_data = $_FILES['filexls']['tmp_name'];

                if(empty($file_name)){
                    $err .="<li> silakan</li>";
                }else{
                    $ekstensi = pathinfo($file_name)['extension'];

                }

                $ekstensi_allowed = array("xls", "xlsx");
                if(!in_array($ekstensi, $ekstensi_allowed))
                {
                    $err .="<li>SILAHKAN BENER</li>";
                }

                if(empty($err)){
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
                    $spreadsheet = $reader->load($file_data);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray();

                    $jumlahData = 0;
                    for($i=1;$i<count ($sheetData);$i++)
                    {
                        $data = array(
                            'nama' => $sheetData[$i]['0'],
                            'buah' => $sheetData[$i]['1'],
                            'deskripsi' => $sheetData[$i]['2'],
                            'harga' => $sheetData[$i]['3'],
                            'stok' => $sheetData[$i]['4'],
                            'id_pemilik' => $sheetData[$i]['5'],
                            'gambar' => 'default.png'
                            );
                        $this->model_data->input_data($data,'tb_pohon');
                        
                        $jumlahData++;
                    }

                    redirect(site_url('home/produk'));
                }

                if($err){
                    ?>
                    <div class="alert alert-danger">
                        <ul><?php echo $err ?></ul>
                    </div>
                    <?php    
                }

                if($success){
                    ?>
                    <div class="alert alert-primary">
                        <ul><?php echo $success ?></ul>
                    </div>
                    <?php 
                } 
            }
        }

        public function import_excel_petani()
        {
            require './assets/vendor/autoload.php';
            
            if(isset($_POST['submit'])){
                $err ="";
                $ekstensi="";
                $success="";

                $file_name = $_FILES['filexls']['name'];
                $file_data = $_FILES['filexls']['tmp_name'];

                if(empty($file_name)){
                    $err .="<li> silakan</li>";
                }else{
                    $ekstensi = pathinfo($file_name)['extension'];

                }

                $ekstensi_allowed = array("xls", "xlsx");
                if(!in_array($ekstensi, $ekstensi_allowed))
                {
                    $err .="<li>SILAHKAN BENER</li>";
                }

                if(empty($err)){
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
                    $spreadsheet = $reader->load($file_data);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray();

                    $jumlahData = 0;
                    for($i=1;$i<count ($sheetData);$i++)
                    {
                        $data = array(
                            'nama' => $sheetData[$i]['0'],
                            'deskripsi' => $sheetData[$i]['1'],
                            'alamat' => $sheetData[$i]['2'],
                            'email' => $sheetData[$i]['3'],
                            'no_hp' => $sheetData[$i]['4'],
                            'gambar' => 'default.png'
                            );
                        $this->model_data->input_data($data,'tb_petani');
                        
                        $jumlahData++;
                    }

                    redirect(site_url('home/penjual'));
                }

                if($err){
                    ?>
                    <div class="alert alert-danger">
                        <ul><?php echo $err ?></ul>
                    </div>
                    <?php    
                }

                if($success){
                    ?>
                    <div class="alert alert-primary">
                        <ul><?php echo $success ?></ul>
                    </div>
                    <?php 
                } 
            }
        }

        
        public function export_excel_produk()
        {
            require './assets/vendor/autoload.php';

            $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();


            $column_header=["id","nama","buah","deskripsi","harga","stok","id_pemilik"];
            $column=1;
            foreach($column_header as $x_value) 
            {
                $sheet->setCellValueByColumnAndRow($column,1,$x_value);
                $column++;
            }

            $data['user'] = $this->model_data->tampil_data()->result();

            $i = 2;
            foreach($data['user'] as $u)
            {
                echo "<br>";
                $sheet->setCellValueByColumnAndRow(1,$i,$u->id);
                $sheet->setCellValueByColumnAndRow(2,$i,$u->nama);
                $sheet->setCellValueByColumnAndRow(3,$i,$u->buah);
                $sheet->setCellValueByColumnAndRow(4,$i,$u->deskripsi);
                $sheet->setCellValueByColumnAndRow(5,$i,$u->harga);
                $sheet->setCellValueByColumnAndRow(6,$i,$u->stok);
                $sheet->setCellValueByColumnAndRow(7,$i,$u->id_pemilik);
                $i++; 
            }


            // Write an .xlsx file
            $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

            // Save .xlsx file to the files directory
            $writer->save('./assets/hasil export/datapohon.xlsx');
            redirect(site_url('home/produk'));
            
        }

        public function export_excel_petani()
        {
            require './assets/vendor/autoload.php';

            $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();


            $column_header=["id","nama","deskripsi","alamat","email","no_hp"];
            $column=1;
            foreach($column_header as $x_value) 
            {
                $sheet->setCellValueByColumnAndRow($column,1,$x_value);
                $column++;
            }

            $data['user'] = $this->model_data->tampil_petani_data()->result();

            $i = 2;
            foreach($data['user'] as $u)
            {
                echo "<br>";
                $sheet->setCellValueByColumnAndRow(1,$i,$u->id);
                $sheet->setCellValueByColumnAndRow(2,$i,$u->nama);
                $sheet->setCellValueByColumnAndRow(3,$i,$u->deskripsi);
                $sheet->setCellValueByColumnAndRow(4,$i,$u->alamat);
                $sheet->setCellValueByColumnAndRow(5,$i,$u->email);
                $sheet->setCellValueByColumnAndRow(6,$i,$u->no_hp);
                $i++; 
            }


            // Write an .xlsx file
            $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

            // Save .xlsx file to the files directory
            $writer->save('./assets/hasil export/datapetani.xlsx');
            redirect(site_url('home/penjual'));
            
        }

        function open_pdf_produk()
        {
            $data['user'] = $this->model_data->tampil_data()->result();
            $this->load->view('views_pdfProduk',$data);
        }

        function open_pdf_petani()
        {
            $data['user'] = $this->model_data->tampil_petani_data()->result();
            $this->load->view('views_pdfPetani',$data);
        }

        public function review()
        {
            $data['review'] = $this->model_data->review_data()->result();
            $this->load->view('views_review',$data);
        }

        public function cekOngkir()
        {
            $this->load->view('views_cekOngkir');
        }
        
        public function kota($province)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$province,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: a8f76dd8b6d439e925cf162e4aa2c561"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) 
            {
            echo "cURL Error #:" . $err;
            } else 
            {
                $kota = json_decode($response,true) ;
                echo "<option value =''>Pilih Kota</option>";
                if($kota['rajaongkir']['status']['code'] == 200)
                {
                    foreach($kota['rajaongkir']['results'] as $kt)
                    {
                        echo "<option value ='$kt[city_id]' ".($kt['city_id'] = $this->input->post('kota') ? "selected":" ").">$kt[city_name]</option>";
                    }
                }
            }
        }

        public function cekOngkirAksi()
        {
            $data['ongkir'] = '';
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$this->input->post('kota')."&destination=".$this->input->post('kota_penerima')."&weight=".$this->input->post('berat')."&courier=".$this->input->post('ekspedisi')."",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: a8f76dd8b6d439e925cf162e4aa2c561"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            $data['ongkir'] = $response;
            }


            $this->load->view('views_cekOngkir', $data);
        }
    }

    

?>