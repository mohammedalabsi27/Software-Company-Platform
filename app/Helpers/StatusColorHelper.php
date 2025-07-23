<?php

if (!function_exists('getStatusColor')) {
    function getStatusColor($status)
    {
        return match($status) {
            'new' => 'secondary',
            'pending' => 'warning',
            'in_progress' => 'info',
            'completed' => 'success',
            'rejected' => 'danger',
            default => 'secondary',
        };
    }
}
