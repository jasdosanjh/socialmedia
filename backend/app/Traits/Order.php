<?php

namespace App\Traits;

trait Order {
    public function scopeLatestFirst($query) {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeOldestFirst($query) {
        return $query->orderBy('created_at', 'asc');
    }
}
