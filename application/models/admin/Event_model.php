<?php
class Event_model extends CI_Model
{
    public function fetch_events()
    {
        $result = $this->db->query("SELECT * FROM event_details");
        return $result->num_rows() > 0 ? $result->result() : [];
    }

    public function fetch_seats($event_id)
    {
        $result = $this->db->query("SELECT * FROM seats WHERE event_id = ? AND status = 'available'", [$event_id]);
        return $result->num_rows() > 0 ? $result->result() : [];
    }

    public function insert_event_data($data)
    {
        return $this->db->insert('bookings', $data);
    }

    public function update_seat_status($seat_id)
    {
        $this->db->where('id', $seat_id);
        return $this->db->update('seats', ['status' => 'booked']);
    }
}
