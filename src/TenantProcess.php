<?php


namespace Taokens\Teignore;


trait TenantProcess
{
    /**
     * 模型事件处理
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model){
            $tenantId = request()->attributes->get('tenant_id');
            $tenantCode = request()->attributes->get('tenant_code');
            $model->tenant_id = $tenantId;
            $model->tenant_code = $tenantCode;
        });
		
		static::updating(function (object $model){
            $tenantId = request()->attributes->get('tenant_id');
            $tenantCode = request()->attributes->get('tenant_code');
            $model->tenant_id = $tenantId;
            $model->tenant_code = $tenantCode;
        });
		
        static::addGlobalScope(function (object $model){
            $tenantId = request()->attributes->get('tenant_id');
            $tenantCode = request()->attributes->get('tenant_code');
            $model->where('tenant_id', $tenantId);
            $model->where('tenant_code', $tenantCode);
        });
    }
}