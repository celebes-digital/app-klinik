<?php

namespace App\SatuSehat\FHIR\Prerequisites;

use App\SatuSehat\OAuth2;
use Exception;
use Illuminate\Support\Facades\Http;

class Organization extends OAuth2
{
    protected string $url;
    protected string $endpoint      = 'Organization';
    protected array $organization   = ['resourceType' => 'Organization'];

    public function __construct()
    {
        parent::__construct();

        $this->url = $this->base_url . '/' . $this->endpoint;
        $this->organization['active'] = true;
    }

    public function addIdentifier(string $id)
    {
        $identifier['use']      = 'official';
        $identifier['system']   = "http://sys-ids.kemkes.go.id/organization/$id";
        $identifier['value']    = $id;

        $this->organization['identifier'][] = $identifier;
    }

    public function setName(string $name)
    {
        $this->organization['name'] = $name;
    }

    public function setType()
    {
        $type['coding']['system']       = 'http://terminology.hl7.org/CodeSystem/organization-type';
        $type['coding']['code']         = 'dept';
        $type['coding']['display']      = 'Hospital Department';

        $this->organization['type'][]   = $type;
    }

    public function addTelecom(string $system, string $value, string $use)
    {
        $telecom['system']  = $system;
        $telecom['value']   = $value;
        $telecom['use']     = $use;

        $this->organization['telecom'][] = $telecom;
    }

    public function addAddress(
        string $use = 'work',
        string $line,
        string $city,
        string $postalCode,
        string $country = 'ID'
    ) {
        $address['use']         = $use;
        $address['type']        = 'both';
        $address['line'][]      = $line;
        $address['city']        = $city;
        $address['postalCode']  = $postalCode;
        $address['country']     = $country;

        $this->organization['address'][] = $address;
    }

    public function setPartOf(string $reference, string $display)
    {
        $partOf['reference'] = "Organization/$reference";

        if ($display) $partOf['display'] = $display;

        $this->organization['partOf']['reference'] = $reference;
    }

    protected function setJson()
    {
        return json_encode($this->organization, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    protected function parseJson($json)
    {
        $data = json_decode($json, true);

        return [
            'id'                => $data['id'],
            'nama_puskesmas'    => $data['name'],
            'alamat'            => $data['address'][0]['line'][0],
            'no_telp'           => $data['telecom'][0]['value'],
            'email'             => $data['telecom'][1]['value'],
            'url'               => $data['telecom'][2]['value'],
            'kode_pos'          => $data['address'][0]['postalCode'],
            'provinsi'          => $data['address'][0]['extension'][0]['extension'][0]['valueCode'],
            'kabupaten'         => $data['address'][0]['extension'][0]['extension'][1]['valueCode'],
            'kecamatan'         => $data['address'][0]['extension'][0]['extension'][2]['valueCode'],
            'kelurahan'         => $data['address'][0]['extension'][0]['extension'][3]['valueCode'],
        ];
    }

    public function post()
    {
        try {
            $payload    = $this->setJson();
            $res        = $this->api()->post($this->url, $payload);

            return $this->parseJson($res->body());
        } catch (Exception $e) {
            return $e;
        }
    }

    public function get()
    {
        try {
            $res = $this->api()->get("$this->url/$this->organizationId");
            return $this->parseJson($res->body());
        } catch (Exception $e) {
            return $e;
        }
    }
}
