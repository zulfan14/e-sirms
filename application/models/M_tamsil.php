<?php
class M_tamsil extends CI_Model
{
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get($tabel)
    {
        return $this->db->get($tabel)->result();
    }

    public function get_data_kriteria()
    {
        $this->db->select('tb_kriteria.*');
        $this->db->select('tb_variabel.*');
        $this->db->from('tb_kriteria');
        $this->db->join('tb_variabel', 'tb_variabel.id_variabel = tb_kriteria.id_variabel');
        return $this->db->get()->result();
        //         "SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
        // FROM Orders
        // INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;"
    }
    public function get_data_berobat()
    {
        $this->db->select('b.nama_kriteria, b.id_variabel, a.nm_variabel');
        $this->db->join('tb_variabel a', 'a.id_variabel = b.id_variabel');
        $this->db->where('a.id_variabel=b.id_variabel');

        return $this->db->get('tb_kriteria b')->result();
    }
    public function get_responden()
    {
        $this->db->select('a.*, b.nama_pendidikan, c.nama_jabatan');
        $this->db->join('tb_pendidikan b', 'b.id_pendidikan = a.id_pendidikan');
        $this->db->join('tb_jabatan c', 'c.id_jabatan = a.id_jabatan');
        $this->db->order_by('a.id_responden', 'asc');
        return $this->db->get('tb_responden a')->result();
    }
}
