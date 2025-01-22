<?php

namespace App\SatuSehat\FHIR\Prerequisites;

use App\SatuSehat\OAuth2;
use Exception;

class Patient extends OAuth2
{
	protected string $url;
	protected string $endpoint      = 'Patient';
	protected array $organization   = ['resourceType' => 'Organization'];

	public function __construct()
	{
		parent::__construct();

		$this->url = $this->base_url . '/' . $this->endpoint;
		$this->organization['active'] = true;
	}


	protected function parseJsonNikIbu($json)
	{
		$data = json_decode($json, true);

		// Jika tidak ada entry, kembalikan array kosong
		if (!isset($data['entry']) || !is_array($data['entry'])) {
			return [];
		}

		$result = [];

		// Loop melalui semua elemen dalam 'entry'
		foreach ($data['entry'] as $entry) {
			$resource = $entry['resource'] ?? null;

			if ($resource) {
				$result[] = [
					'birthdate' => $resource == null ? '' : $resource['birthDate'],
					'id'        => $resource == null ? '' : $resource['id'],
					'name'      => $resource == null ? '' : $resource['name'][0]['text'],
					'kembar'    => $resource == null ? '' : $resource['multipleBirthInteger'],
				];
			}
		}

		// Sertakan informasi 'total' jika ada
		$total = $data['total'] ?? '';

		return [
			'total' => $total == '' ? '' : $total,
			'data'  => $result,
		];
	}
	protected function parseJsonNGB($json)
	{
		$data = json_decode($json, true);
		// dd($data);
		$data = $data['entry'][0]['resource'] ?? '';

		$resource       = $data == '' ? '' : $data['entry'][0]['resource'];
		$resourceAlamat = $data == '' ? '' : $resource['address'][0]['extension'][0]['extension'];

		return [
			'nama'             => $data == '' ? '' : $resource['name'][0]['text'],
			'nik'              => $data == '' ? '' : $resource['identifier'][0]['value'],
			'kelamin'          => $data == '' ? '' : $resource['gender'],
			'kewarganegaraan'  => $data == '' ? '' : $resource['extension'][0]['valueCode'],
			'alamat'           => $data == '' ? '' : $resource['address'][0]['line'][0],
			'provinsi'         => $data == '' ? '' : $resourceAlamat[0]['valueCode'],
			'kabupaten'        => $data == '' ? '' : $resourceAlamat[1]['valueCode'],
			'kecamatan'        => $data == '' ? '' : $resourceAlamat[2]['valueCode'],
			'kelurahan'        => $data == '' ? '' : $resourceAlamat[3]['valueCode'],
			'rt'               => $data == '' ? '' : $resourceAlamat[4]['valueCode'],
			'rw'               => $data == '' ? '' : $resourceAlamat[5]['valueCode'],
		];
	}

	public function getNikIbu($nikIbu)
	{
		try {
			$res = $this->api()->get("$this->url?identifier=https://fhir.kemkes.go.id/id/nik-ibu|$nikIbu");
			return $this->parseJsonNikIbu($res->body());
		
		} catch (Exception $e) {
			return $e;
		}
	}

	public function getNGB($name, $birthdate, $gender)
	{
		try {
			$res = $this->api()->get("$this->url/?name=$name&birthdate=$birthdate&gender=$gender");
			return $this->parseJsonNGB($res->body());
		} catch (Exception $e) {
			return $e;
		}
	}
}
