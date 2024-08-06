<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Notifikasi extends CI_Model
{
    public function getNotifications()
    {
        $this->db->order_by('date_created', 'desc');
        $this->db->limit(3);
        return $this->db->get('notifications')->result();
    }
    public function removeNotification($notificationId)
    {
        $this->db->where('id', $notificationId);
        $this->db->delete('notifications');
    }
    public function getTotalNotificationCount()
    {
        return $this->db->count_all_results('notifications');
    }
}
