<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait BranchScopeTrait
{
    public function scopeForBranch(Builder $query, $branchId = null)
    {
        if (!$branchId) {
            $branchId = optional(auth()->user())->branch_id;
        }

        return $query->where('branch_id', $branchId);
    }
}