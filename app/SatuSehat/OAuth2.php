<?php

namespace App\SatuSehat;

use App\Models\DataSatuSehat;
use App\Models\TokenSatusehat;
use Exception;
use Illuminate\Support\Facades\Http;

class OAuth2
{
    protected $clientId;

    protected $clientSecret;

    protected $organizationId;

    public $satu_sehat_url;

    public $base_url;

    protected $auth_url;

    protected $consent_url;

    public function __construct()
    {
        $this->satu_sehat_url = env('SATU_SEHAT_URL', 'https://api-satusehat-stg.dto.kemkes.go.id');

        $this->base_url = env('SATU_SEHAT_BASE_URL', $this->satu_sehat_url . '/api/v1');

        $this->auth_url = env('SATUSEHAT_AUTH_URL', $this->satu_sehat_url . '/oauth2/v1');

        $this->consent_url = env('SATUSEHAT_CONSENT_URL', $this->satu_sehat_url . '/consent/v1');
    }

    /**
     * Get token from Satu Sehat
     *
     * @return string
     */
    public function getToken()
    {
        // Ambil token dari db
        $token = TokenSatusehat::first();

        // Jika token ada dan belum expired, return token
        if ($token && $token->expires_in > now()) {
            return $token['access_token'];
        }

        // Jika tidak ada atau sudah expired, generate token 
        $newToken = $this->_generateToken();

        // Simpan token ke db
        $this->_saveToken($newToken);

        return $newToken['access_token'];
    }

    protected function _generateToken()
    {
        $this->_getDataSatuSehat();

        try {
            // Create token
            $response = Http::asForm()->post(
                $this->auth_url . '/accesstoken?grant_type=client_credentials',
                [
                    'client_id'     => $this->clientId,
                    'client_secret' => $this->clientSecret,
                ]
            );

            return $response->json();
        } catch (Exception $e) {
            return null;
        }
    }

    protected function _getDataSatuSehat()
    {
        $dataSatuSehat = DataSatuSehat::first();

        if ($dataSatuSehat) {
            $this->clientId         = $dataSatuSehat->client_id;
            $this->clientSecret     = $dataSatuSehat->client_secret;
            $this->organizationId   = $dataSatuSehat->organization_id;
        }
    }

    protected function _saveToken($data)
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
}
