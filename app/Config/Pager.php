<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Templates
     * --------------------------------------------------------------------------
     *
     * Pagination links are rendered out using views to configure their
     * appearance. This array contains aliases and the view names to
     * use when rendering the links.
     *
     * Within each view, the Pager object will be available as $pager,
     * and the desired group as $pagerGroup;
     *
     * @var array<string, string>
     */
    public $templates = [
        'default_full'   => 'CodeIgniter\Pager\Views\default_full',
        'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
        'default_head'   => 'CodeIgniter\Pager\Views\default_head',
        'lihat_data_kos_pagination' => 'App\Views\pemilik_kos\pagers\lihat_data_kos_pagination',
        'lihat_data_kamar_pagination' => 'App\Views\pemilik_kos\pagers\lihat_data_kamar_pagination',
        'lihat_data_penyewa_pagination' => 'App\Views\pemilik_kos\pagers\lihat_data_penyewa_pagination',
        'lihat_saldo_pagination' => 'App\Views\pemilik_kos\pagers\lihat_saldo_pagination',
        'riwayat_penarikan_saldo_pagination' => 'App\Views\pemilik_kos\pagers\riwayat_penarikan_saldo_pagination',
        'lihat_pemilik_kos_pagination' => 'App\Views\admin\pagers\lihat_pemilik_kos_pagination',
        'lihat_pembayaran_pagination' => 'App\Views\admin\pagers\lihat_pembayaran_pagination',
        'lihat_penarikan_saldo_pagination' => 'App\Views\admin\pagers\lihat_penarikan_saldo_pagination',
    ];

    /**
     * --------------------------------------------------------------------------
     * Items Per Page
     * --------------------------------------------------------------------------
     *
     * The default number of results shown in a single page.
     *
     * @var int
     */
    public $perPage = 20;
}
