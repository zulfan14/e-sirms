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
}
