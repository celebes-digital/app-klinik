<?php

namespace App\SatuSehat\Terminologi;

use App\SatuSehat\OAuth2;
use Exception;
use Illuminate\Http\Client\Response;
use Livewire\Wireable;

class KodeWilayah extends OAuth2 implements Wireable
{
    protected string $url;

    public function __construct()
    {
        parent::__construct();

        $this->url = $this->satu_sehat_url . '/masterdata/v1';
    }

    public function getProvinsi($code = null)
    {
        try {
            $endpoint = '/provinces' . ($code ? '?codes=' . $code : '');
            $response = $this->api()->get($this->url . $endpoint);

            if ($response->status() !== 200) {
                throw new Exception('Gagal mengambil data provinsi');
            }

            return $this->toArray($response);
        } catch (Exception $e) {
            return [];
        }
    }

    public function getKabupaten($code = null)
    {
        try {
            $endpoint = '/cities' . ($code ? '?province_codes=' . $code : '');
            $response = $this->api()->get($this->url . $endpoint);

            if ($response->status() !== 200) {
                throw new Exception('Gagal mengambil data kabupaten');
            }

            return $this->toArray($response);
        } catch (Exception $e) {
            return [];
        }
    }

    public function getKecamatan($code = null)
    {
        try {
            $endpoint = '/districts' . ($code ? '?city_codes=' . $code : '');
            $response = $this->api()->get($this->url . $endpoint);

            if ($response->status() !== 200) {
                throw new Exception('Gagal mengambil data kecamatan');
            }

            return $this->toArray($response);
        } catch (Exception $e) {
            return [];
        }
    }

    public function getKelurahan($code = null)
    {
        try {
            $endpoint = '/sub-districts' . ($code ? '?district_codes=' . $code : '');
            $response = $this->api()->get($this->url . $endpoint);

            if ($response->status() !== 200) {
                throw new Exception('Gagal mengambil data kelurahan');
            }

            return $this->toArray($response);
        } catch (Exception $e) {
            return [];
        }
    }

    public function toLivewire()
    {
        return $this;
    }

    public static function fromLivewire($value)
    {
        return;
    }

    public function toArray(Response $res)
    {
        $data = json_decode($res->body(), true);
        return $data['data'];
        // return $res->json();
    }
}
