<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerAuditLog extends Model
{
    use HasFactory;

    protected $table = 'customer_audit_logs';
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    protected $fillable = [
        'old_customer_id',
        'full_name',
        'whatsapp_number',
        'action',
        'old_data',
        'old_umrah_package_id'
    ];
    public $timestamps = true;
    public $incrementing = true;
    public function umrahPackage(): BelongsTo
    {
        return $this->belongsTo(UmrahPackage::class, 'old_umrah_package_id', 'id');
    }

    public static function createLog($customer, $action)
    {
        $oldData = [
            'customer' => $customer->toArray(),
        ];

        return self::create([
            'old_customer_id' => $customer->id,
            'full_name' => $customer->full_name,
            'whatsapp_number' => $customer->whatsapp_number,
            'action' => $action,
            'old_data' => json_encode($oldData),
            'old_umrah_package_id' => $customer->umrah_package_id,
        ]);
    }
}
