<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{
    private $apiKey = "325ece4edd25f5720cfe09e0b188c831";

    public function provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_SSL_VERIFYPEER => 0, // Menonaktifkan verifikasi sertifikat SSL
            CURLOPT_SSL_VERIFYHOST => 0, // Menonaktifkan verifikasi host SSL
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->apiKey",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);

            $data_provinsi = $array_response['rajaongkir']['results'];

            echo "<option value=''>-- Pilih Provinsi --</option>";

            foreach ($data_provinsi as $value) {
                echo "<option value='" . $value['province_id'] . "' id_provinsi='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
            }
        }
    }
    public function kota()
    {

        $ambil_provinsi_id = $this->input->post('id_provinsi');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $ambil_provinsi_id,
            CURLOPT_SSL_VERIFYPEER => 0, // Menonaktifkan verifikasi sertifikat SSL
            CURLOPT_SSL_VERIFYHOST => 0, // Menonaktifkan verifikasi host SSL
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->apiKey"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, true);

            $data_kota = $array_response['rajaongkir']['results'];

            echo "<option value=''>-- Pilih Kota --</option>";
            foreach ($data_kota as $key => $value) {
                echo "<option value='" . $value['city_id'] . "'>" . $value['city_name'] . "</option>";
            }
        }
    }
    public function expedisi()
    {
        echo "<option value=''>--Pilih Expedisi--</option>";
        echo "<option value='jne'>JNE</option>";
        echo "<option value='tiki'>TIKI</option>";
        echo "<option value='pos'>POS. Indonesia</option>";
    }
    public function cost()
    {
        $origin = "501"; // Kode kota Yogyakarta (asal default)
        $destination = $this->input->post('destination'); // Kode kota tujuan
        $weight = $this->input->post('weight'); // Berat kiriman dalam gram
        $courier = $this->input->post('courier'); // Kurir yang digunakan

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_SSL_VERIFYPEER => 0, // Menonaktifkan verifikasi sertifikat SSL
            CURLOPT_SSL_VERIFYHOST => 0, // Menonaktifkan verifikasi host SSL
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "key: $this->apiKey"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
