<?php

    class model_data extends CI_Model
    {
        function login($email,$password)
        {
            return $this->db->query("SELECT * FROM tb_users WHERE email='$email' AND password='$password'");
        }

        function contact($nama, $email, $pesan)
        {
            return $this->db->query("INSERT INTO tb_review(nama, email, pesan) VALUES('$nama','$email', '$pesan')");
        }

        function tampil_data()
        {
            return $this->db->get('tb_pohon');
        }

        function tampil_petani_data()
        {
            return $this->db->get('tb_petani');
        }

        function shop_data()
        {
            return $this->db->get('tb_pohon');
        }

        function sellers_data()
        {
            return $this->db->get('tb_petani');
        }

        function pohon_data()
        {
            return $this->db->get('tb_pohon');
        }

        function petani_data()
        {
            return $this->db->get('tb_petani');
        }

        function review_data()
        {
            return $this->db->get('tb_review');
        }

        function input_data($data,$table)
        {
            $this->db->insert($table,$data);
        }

        function edit_data($where,$table)
        {		
            return $this->db->get_where($table,$where);
        }

        function hapus_data($where,$table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function update_data($where,$data,$table)
        {
            $this->db->where($where);
            $this->db->update($table,$data);
        }
        
        function single_data($where, $table)
        {
            return $this->db->get_where($table,$where);
        }
    }

?>