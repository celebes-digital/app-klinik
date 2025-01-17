<?php

namespace App\SatuSehat\FHIR\Prerequisites;

use App\SatuSehat\OAuth2;
use Exception;
use Illuminate\Support\Facades\Http;

class Practitioner extends OAuth2
{
    protected string $url;
    protected string $endpoint      = 'Practitioner';
    protected array $organization   = ['resourceType' => 'Organization'];

    public function __construct()
    {
        parent::__construct();

        $this->url = $this->base_url . '/' . $this->endpoint;
        $this->organization['active'] = true;
    }

	protected function parseJson($json)
	{
		$data = json_decode($json, true);
		$data = $data['entry'][0]['resource'] ?? '';

		// dd($data);

		return [
			'ihs'		=> $data == '' ? '' : $data['id'],
			'no_str'	=> $data == '' ? '' : $data['qualification'][0]['identifier'][0]['value'],
			'alamat'	=> $data == '' ? '' : $data['address'][0]['line'][0],
			'kelamin'	=> $data == '' ? '' : $data['gender'],
			'tgl_lahir'	=> $data == '' ? '' : $data['birthDate'],
		];
	}

	public function get($nik)
	{
		try {
			$res = $this->api()->get("$this->url/?identifier=https://fhir.kemkes.go.id/id/nik|$nik");
			return $this->parseJson($res->body());
		} catch (Exception $e) {
			// dd($e);
			return $e;
		}
	}
}