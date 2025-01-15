<?php

namespace App\SatuSehat;

use App\Models\DataSatuSehat;
use App\Models\TokenSatusehat;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class OAuth2
{
    protected $clientId;

    protected $clientSecret;

    protected $organizationId;

    protected $satu_sehat_url;

    protected $base_url;

    protected $auth_url;

    protected $consent_url;

    public function __construct()
    {
        $this->satu_sehat_url   = env('SATU_SEHAT_URL', 'https://api-satusehat-stg.dto.kemkes.go.id');

        $this->base_url         = env('SATU_SEHAT_BASE_URL', $this->satu_sehat_url . '/fhir-r4/v1');

        $this->auth_url         = env('SATUSEHAT_AUTH_URL', $this->satu_sehat_url . '/oauth2/v1');

        $this->consent_url      = env('SATUSEHAT_CONSENT_URL', $this->satu_sehat_url . '/consent/v1');
    }

    /**
     * Get token from Satu Sehat
     *
     * @return string
     */
    protected function getAccessToken()
    {
        // Ambil token dari db
        $dataToken = TokenSatusehat::first();

        // Jika token ada dan belum expired, return token
        if ($dataToken && $this->isExpired($dataToken)) {
            return $dataToken['access_token'];
        }

        // Jika tidak ada token atau sudah expired, generate token 
        $this->setDataSatuSehat();
        $newDataToken = $this->generateToken();

        // Simpan token ke db
        $this->saveToken($newDataToken);

        return $newDataToken['access_token'];
    }

    protected function isExpired($data)
    {
        $timeExpired = Carbon::createFromTimestampMs($data['issued_at'])
            ->addSeconds($data['expires_in'])->subMinutes(5);
        return $timeExpired > now();
    }

    protected function generateToken()
    {
        $response = Http::asForm()->post(
            $this->auth_url . '/accesstoken?grant_type=client_credentials',
            [
                'client_id'     => $this->clientId,
                'client_secret' => $this->clientSecret,
            ]
        );

        return $response->json();
    }

    protected function setDataSatuSehat()
    {
        $data = DataSatuSehat::first();

        if (!$data) {
            throw new Exception('Data Satu Sehat belum diatur');
        }

        $this->clientId         = $data->client_id;
        $this->clientSecret     = $data->client_secret;
        $this->organizationId   = $data->organization_id;
    }

    protected function saveToken($data)
    {
        // Simpan token ke db
        TokenSatusehat::updateOrCreate(
            ['client_id' => $data['client_id']],
            [
                'client_id'     => $data['client_id'],
                'access_token'  => $data['access_token'],
                'issued_at'     => $data['issued_at'],
                'expires_in'    => $data['expires_in'],
            ]
        );
    }

    protected function api(): \Illuminate\Http\Client\PendingRequest
    {
        return Http::withToken($this->getAccessToken());
    }
}
