<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public static function getAvatarUrl($nim, $name)
    {
        if (preg_match('/^([A-Za-z]+[0-9]+)\.([0-9]{4})\.(.+)$/', $nim, $matches)) {
            $group1 = strtoupper(substr($matches[1], 0, 1)); // e.g., 'A'
            $group2 = strtoupper($matches[1]);               // e.g., 'A11'
            $group3 = $matches[2];                           // e.g., '2024'
            return "https://mahasiswa.dinus.ac.id/images/foto/{$group1}/{$group2}/{$group3}/{$nim}.jpg";
        }
        
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=1ea3ff&color=fff&size=200';
    }
}
